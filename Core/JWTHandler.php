<?php

namespace Core;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHandler
{

  protected $issuedAt;
  protected $expire;
  private $payload;


  public function __construct(array $params, $exp) {
    date_default_timezone_set($_ENV['TIME_ZONE']);

    $this->issuedAt = time();
    $this->expire = $this->issuedAt + $exp;

    $this->payload = [
      'iss' => $_ENV['JWT_ISS'],
      'aud'=> $_ENV['JWT_AUD'],
      "customerId" => $params['user_id'],
      "name" => $params['name'],
      // "admin" => $params['admin'],
      "iat" => $this->issuedAt,
      "exp" => $this->expire,
      
    ];
  }

  public static function encode(array $params, $exp = 10800){
    $obj = new self($params, $exp);
    return JWT::encode($obj->payload, $_ENV['JWT_KEY'], $_ENV['JWT_ALG']);
  }

  public static function decode($token){

    try {

      $decode = JWT::decode($token, new Key($_ENV['JWT_KEY'], $_ENV['JWT_ALG']));

      // An object is returned 
      return $decode;

    } catch (\Exception $e) {

      return false;
    }
  }
  
}
