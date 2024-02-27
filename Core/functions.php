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

function view($path)
{
  require base_path("views/{$path}");
}
