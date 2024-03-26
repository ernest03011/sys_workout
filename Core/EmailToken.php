<?php

namespace Core;

class EmailToken extends Email
{
  public static function handler(string $receiverName, string $token ) : bool
  {
    $body = sprintf("Here is the token that you should use to complete the log in process: %s",$token);

    $params = [
      'receiver_name' => $receiverName,
      'body' => $body
    ];

    $result = parent::send($params);

    return $result;
  }
}
