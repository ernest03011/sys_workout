<?php

use Core\Router;
use Core\Validator;
use Core\Authenticator;

if(is_post_request()){

  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  $errors = [];

  if(! Validator::string($password, 8, 255)){
    dd($password . " store.php");
    $errors['password'] = "The password is required";
  }

  if(! Validator::string($username, 3, 255)){
    dd($username . " store.php");

    $errors['username'] = "The username is required";
  }

  if(! empty($errors)){
    // dd($errors);
    Router::redirect_with('login', $errors);
  }

  $resp = (new Authenticator)
  ->attempt($username, $password);

  if(! $resp['isAValidUser']){

      $errors = [
        'login' => 'No matching account found for that email address and password.'
      ];

      $previousURL = Router::previousUrl();
      Router::redirect_with($previousURL, $errors); 
  }

  view('token/index.view.php', [
    'username' => $username
  ]);

}