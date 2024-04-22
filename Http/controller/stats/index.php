<?php

use Core\Database;


$db = new Database;

$exercises = $db->query('SELECT exercise_name from exercises')->get();

view('stats/index.view.php', [
  'exercises' => $exercises
]);
