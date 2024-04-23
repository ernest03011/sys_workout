<?php

use Core\Router;
use Core\Database;

$db = new Database;

$exercise_name = $_GET['name'];

$data = $db->query('SELECT e.exercise_name, we.sets, we.reps, we.weight, we.duration, w.date from exercises e JOIN workoutexercises we ON e.exercise_id = we.exercise_id JOIN workouts w ON we.workout_id = w.workout_id WHERE e.exercise_name = :exercise_name', [
  'exercise_name' => $exercise_name
])->get();


if(empty($data)){
  $prevUrl = Router::previousUrl();
  Router::redirect_with($prevUrl, [
    "error" => "There are no stats for this exercise yet!"
  ]);
}

view('stats/show.view.php', [
  'data' => $data
]);
