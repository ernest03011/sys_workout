<?php

use Core\Router;
use Core\Database;

// Show an specific workout based on the ID

$workout_id = $_GET['id'];
$db = new Database;

$workouts = $db->query('SELECT w.workout_name, w.date, e.exercise_name, e.target_name, we.sets, we.reps, we.weight, we.duration, we.notes FROM workouts w JOIN workoutexercises we ON w.workout_id = we.workout_id
JOIN exercises e ON we.exercise_id = e.exercise_id WHERE w.workout_id = :workout_id;
', [
  'workout_id' => $workout_id
])->get();


if(empty($workouts)){
  $prevUrl = Router::previousUrl();
  Router::redirect_with($prevUrl, [
    "error" => "There was an error trying to view this workouts!"
  ]);
}
 
view('workouts/show.view.php', [
  'workouts' => $workouts
]); 