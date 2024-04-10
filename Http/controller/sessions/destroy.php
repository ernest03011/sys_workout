<?php

use Core\Router;
use Core\Session;

Session::flush();

Session::destroy();

Router::redirect('/login');