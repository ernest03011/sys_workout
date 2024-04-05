<?php

use Core\Router;
use Core\Validator;
use Http\controller\Curl\CurlController;

$exercise_name = strtolower(trim($_GET['name']));
$prev_url = Router::previousUrl();

if(! Validator::string($exercise_name)){

  Router::redirect_with($prev_url, [
    'error' => "Something went wrong while displaying the Exercise, try again!"
  ]);

}

try {

  $url = 'https://exercisedb.p.rapidapi.com/';
  $params = "exercises/name/{$exercise_name}";

  $ch = new CurlController($url, $params);
  $response_arr = $ch->execute();
  $err = $ch->getErrors();

  $ch->close();


  if ($err) {

    Router::redirect_with($prev_url, [
      'error' => "Something went wrong while displaying the Exercise, try again!"
    ]);
    
  } else {
    $data = json_decode($response_arr[0], true)[0];
    
    if(! $data){      
      Router::redirect_with($prev_url, [
        'error' => "Something went wrong while displaying the Exercise, try again!"
      ]);
    }else{
      view("exercises/show.view.php", [
        'exercise' => $data
      ]);
    }
  
  }



} catch (\Exception $e) {
  Router::redirect_with($prev_url, [
    'error' => "Something went wrong while displaying the Exercise, try again!"
  ]);
}

