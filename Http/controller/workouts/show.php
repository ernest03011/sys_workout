<?php

use Core\Database;
use Http\controller\Curl\CurlController;

// Show an specific workout based on the ID

$workout_id = $_GET['id'];
$db = new Database;

$workout = $db->query('SELECT w.workout_name, w.date, e.exercise_name FROM workouts w JOIN workoutexercises we ON w.workout_id = we.workout_id
JOIN exercises e ON we.exercise_id = e.exercise_id WHERE w.workout_id = :workout_id;
', [
  'workout_id' => $workout_id
])->find();

$url = 'https://exercisedb.p.rapidapi.com/';

$exercise_name = replaceSpacesWithPercent20($workout['exercise_name']);
$params = "exercises/name/{$exercise_name}";

$ch = new CurlController($url, $params);
$response_arr = $ch->execute();
$ch->close();

$data = json_decode($response_arr[0], true)[0];
 
view('workouts/show.view.php', [
  'workout' => $workout,
  'exercise_data_from_api' => $data
]);