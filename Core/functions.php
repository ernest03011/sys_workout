<?php

use Core\Session;

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

function getCurrentURI(){
  return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

function showMessage($keys) {

  $colorClass = [
    'error' => 'bg-red-500',
    'added_workout' => 'bg-green-500'

  ];

  foreach ($keys as $key) {

    $color = $colorClass[$key] ?? "bg-green-500";
      if (Session::has($key)) {
          echo "
              <div class='$color text-white px-4 py-2 rounded-md mb-4'>
                  <p>" . htmlspecialchars(Session::get($key)) . "</p>
              </div>
          ";
      }
  }
}