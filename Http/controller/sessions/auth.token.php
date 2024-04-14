<?php

    // Task - Once the token is verified, then I can call login method from the authenticator
      // The user will be redirected to the Dashboard
    // If the code is not verified, I will request the user to login again so a new token is generated. 

    // username - token

use Core\Router;
use Core\Authenticator;

    $username = $_POST['username'];
    $token = $_POST['token'];

    $resp = Authenticator::validateAttemptToken($username, $token);

    if(! $resp['user_id']){
      $url = Router::previousUrl();
      $error = [
        'token' => 'Unable to validate token, double-check it or try to log in again'
      ];
      Router::redirect_with($url, $error);
    }

    $isItAdmin = Authenticator::isItAdmin($username);

    $data = [
      'user_id' => $resp['user_id'],
      'attempt_id' => $resp['attempt_id'],
      'username' => $username,
      'admin' => $isItAdmin
    ];

    Authenticator::login($data);