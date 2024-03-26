<?php

namespace Core\Middleware;

use Core\Session;

class Authenticated{

  public function handle(){
    if(! Session::has('user') ?? false){

      header('location: /');
      exit();
    }
  }
}