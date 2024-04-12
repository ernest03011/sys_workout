<?php

namespace Core\Middleware;

use Core\Session;
use Core\Response;

class Guest
{
  public function handle(){
    if( Session::has('user') ?? false ){
      Response::handler("FORBIDDEN");
      exit();
    }
  }
   
}
