<?php

use Core\Database;

$db = new Database();
$workouts = $db->query('select * from workouts')->get(); 

view("workouts/index.view.php", [
  'workouts' => $workouts]);