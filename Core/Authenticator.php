<?php

namespace Core;

class Authenticator 
{

  public static function attempt(string $username, string $password) : array
  {
    $db = new Database;

    $user = $db->query('select * from users where username = :username', [
      'username' => $username,
    ])->find(); 

    $isAValidUser = true;    
    if($user){

      $isPasswordVerified = true;

      if($isPasswordVerified){
        $data = [
          'username' => $user['username'],
          'user_id' => $user['user_id']
        ];

        $resp = self::sendToken($data);

        if($resp['success']){
          self::logAttempt($user['user_id'], $resp['token']);
          
          $isAValidUser = true;      

          $result = [
            'isAValidUser' => $isAValidUser,
            'token' => $resp['token']];
          return $result;
          
        }
      }
    }

    $result = [
      'isAValidUser' => $isAValidUser,
      'token' => $resp['token']
    ];

    return $result;
  }

  public static function login(array $data)
  {
    // Task - Update some the args is an array with the customer data
    // I could add if it is admin or not to the payload  

    $payload = [
      'name' => $data['username'],
      'user_id' => $data['user_id'],
      'admin' => $data['admin']
    ];

    $token = JWTHandler::encode($payload, 10800);
    Session::put('user', [
      'name' => $data['username'],
      'token' => $token]
    );

    $newSessionID = Session::regenerateID();

    self::logLoginSessions([
      'user_id' => $data['user_id'],
      'login_attempt_id' => $data['attempt_id'],
      'session_id' => $newSessionID
    ]);

    (new Database)->query('UPDATE loginattempts SET is_token_verified = :is_token_verified WHERE attempt_id = :attempt_id', [
      'is_token_verified' => 1,
      'attempt_id' => $data['attempt_id']
    ]);

    Router::redirect("/");
  }

  public static function logout(){
    Session::destroy();
  }

  public static function sendToken($data) : array
  {

    $success = false;
    // $token = generateRandomToken();
    $payload = [
      'name' => $data['username'],
      'user_id' => $data['user_id']
    ];

    $token = JWTHandler::encode($payload, 900);

    $result = EmailToken::handler('Jhon Doe', $token);

    if(! $result){
      $success = false;
      $token = '';
    }else{
      $success = true;
    }

    return [
      'success' => $success,
      'token' => $token
    ];
  }

  public static function validateAttemptToken(string $username, string $token) : array
  {    
    $db = new Database;

    if($token){

      $decodedToken = JWTHandler::decode($token);

      if(! $decodedToken){
        $url = Router::previousUrl();
        $error = [
          'token' => 'Unable to validate token, double-check it or try to log in again'
        ];
        Router::redirect_with($url, $error);
      }
      
    }
 
    $user = $db->query("SELECT u.user_id, la.attempt_id, la.is_token_verified FROM users u JOIN LoginAttempts la ON u.user_id = la.user_id WHERE u.username = :username AND la.token = :token
    ", [
      ':username' => $username,
      ':token' => $token
    ])->find(); 

    if($user && isset($user['is_token_verified']) && $user['is_token_verified'] == 0){
      return [
        'user_id' => $user['user_id'],
        'attempt_id' => $user['attempt_id']
      ];
    }else{
      return [
        'user_id' => false,
        'attempt_id' => false
      ];
    }

  }

  public static function logAttempt(string $user_id, string $token) : void
  {
   
    (new Database)->query('INSERT INTO loginattempts (user_id, token, ip_address, user_agent) VALUES (:user_id, :token, :ip_address, :user_agent)', [
      'user_id' => $user_id,
      'token' => $token,
      'ip_address' => $_SERVER['SERVER_ADDR'] ?? '127.0.0.1',
      'user_agent' => $_SERVER['HTTP_USER_AGENT']
    ]);

  }

  public static function logLoginSessions(array $data) : void
  {
    
   (new Database)->query('INSERT INTO loginsessions (user_id, login_attempt_id, session_id) VALUES (:user_id, :login_attempt_id, :session_id)', [
    'user_id' => $data['user_id'],
    'login_attempt_id' => $data['login_attempt_id'],
    'session_id' => $data['session_id']
   ]);

  }

  public static function isItAdmin($username) : bool
  {
    $db = new Database;

    $result = $db->query('SELECT role.role_name FROM UserRolesMap map JOIN users u ON u.user_id = map.user_id JOIN UserRoles role ON map.role_id = role.role_id WHERE u.username = :username ', [
      'username' => $username
    ])->get();

    if(isset($result[0])){
      return $result[0]['role_name'] == 'admin' ? true : false;
    }else{
      return false;
    }

  }


}
