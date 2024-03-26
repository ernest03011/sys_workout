<?php

function dd($value)
{

  echo '<pre>';
  var_dump($value);
  echo '</pre>';

  exit();

}

function base_path($path)
{
    return BASE_PATH . $path;
}

function abort($code = 404)
{
  http_response_code($code);

  require base_path("views/{$code}.php");

  die();
}

function view($path, $attributes = [])
{

  extract($attributes);
  require base_path("views/{$path}");
}

function is_get_request(){
  return strtoupper($_SERVER['REQUEST_METHOD']) == 'GET';
}

function is_post_request(){
  return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
}

function generateRandomToken($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

function replaceSpacesWithPercent20($string) {
  return str_replace(' ', '%20', trim($string));
}


