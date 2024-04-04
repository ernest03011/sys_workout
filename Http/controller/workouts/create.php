<?php

use Core\Database;
use Http\controller\Curl\CurlController;

$data = (new Database)->query('SELECT exercise_name FROM exercises')->get();

view("workouts/create.view.php", [
  'exerciseNameList' => $data ?? ''
]); 