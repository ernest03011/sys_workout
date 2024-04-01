<?php

use Core\Database;
use Http\controller\Curl\CurlController;

// $url = 'https://exercisedb.p.rapidapi.com/';
// $params = 'exercises/target/lats?limit=1';

// $ch = new CurlController($url, $params);
// $response_arr = $ch->execute();
// $ch->close();

// dd($response_arr);

// dd($response_arr['response']);

// $data = (new Database)->query('SELECT target_name FROM exercises WHERE exercise_id > :exercise_id', [
//   'exercise_id' => 0 
// ])->get();

view("workouts/create.view.php", [
  'targets' => $data ?? ''
]); 