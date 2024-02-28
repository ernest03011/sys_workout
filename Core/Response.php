<?php 

namespace Core;

class Response
{
  private const MAP = [
    'NOT_FOUND' => 404,
    'FORBIDDEN' => 403, 
    'UNAUTHORIZED' => 401
  ];

  public static function handler(string $resp)
  {

    $response_code = self::MAP[$resp]; 
    view("{$response_code}.php");

  }

}