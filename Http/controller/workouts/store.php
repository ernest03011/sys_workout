<?php

use Core\Router;
use Core\Database;

$workout_name = $_POST['workout_name'];
$exercises = $_POST['exercises'];

$db = new Database;

function findExerciseId(string $name, Database $db)
{
  $exercise = $db->query('SELECT * FROM exercises WHERE exercise_name = :exercise_name', [
    'exercise_name' => $name
  ])->find();

  return $exercise ? $exercise['exercise_id'] : false;
}

$workout_id = $db->query('INSERT INTO workouts (user_id, workout_name) VALUES (:user_id, :workout_name)', [
  'user_id' => 1,
  'workout_name' => $workout_name
])->lastInsertedId();

$exercises_array = [];

foreach ($exercises as $exercise) {
  
  $decodedExercise = json_decode($exercise, true);
  $exercise_id = findExerciseId($decodedExercise['exerciseName'], $db);

  $exercises_array[] = $decodedExercise; 

  if(! $exercise_id == false && ! empty($decodedExercise) ){

    $db->query('INSERT INTO workoutexercises (workout_id, exercise_id, sets, reps, weight, duration, notes) VALUES (:workout_id, :exercise_id, :sets, :reps, :weight, :duration, :notes)', [
      'workout_id' => $workout_id, 
      'exercise_id' => $exercise_id,
      'sets' => $decodedExercise['sets'],
      'reps' => $decodedExercise['reps'],
      'weight' => $decodedExercise['weight'],
      'duration' => $decodedExercise['duration'],
      'notes' => $decodedExercise['notes'],
  
    ]);

  }else{
    Router::redirect_with('/add',[
      'error' => 'Please try to add the workout again, something went wrong!'
    ]);
  }


}

$workout = $db->query('SELECT * FROM workoutexercises where workout_id = :workout_id', 
[
  'workout_id' => $workout_id
]);

// dd($workout);

Router::redirect_with('/workouts',[
  'added_workout' => 'A new workout has been added!'
]);