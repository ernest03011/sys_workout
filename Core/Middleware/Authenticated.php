<?php

namespace Core\Middleware;

use Core\Response;
use Core\Session;

class Authenticated{

  public function handle(){
    if(! Session::has('user') ?? false){
      Response::handler("FORBIDDEN");
      exit();
    }
  }
}