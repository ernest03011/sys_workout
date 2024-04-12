<?php

use Core\Router;
use Core\Session;
use Core\Response;
use Core\JWTHandler;

const BASE_PATH = __DIR__ ."/../";

session_start();

require BASE_PATH . "vendor/autoload.php";
require BASE_PATH . "Core/functions.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$router =  new \Core\Router();
require BASE_PATH . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {

  if(Session::has('user')){
    $user = Session::get('user');

    $decodedToken = JWTHandler::decode($user['token']);
    // dd($decodedToken);
    if(! $decodedToken){
      Session::flush();
      Session::destroy();
      Response::handler("UNAUTHORIZED");
    }
    
    $router->route($uri, $method);

  }else if((getCurrentURI() == '/auth-token') || (getCurrentURI() == '/login')){

    $router->route($uri, $method);
  }else{
    Session::flush();
    Session::destroy();
    Response::handler("UNAUTHORIZED");
  }




} catch (ValidationException $exception) {

  Session::flash('errors', $exception->errors);
  Session::flash('old', $exception->old);

  return $router->redirect($router->previousUrl());
  
}

Session::unflash();
