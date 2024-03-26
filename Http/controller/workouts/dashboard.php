<?php

use Core\Database;

// Shows the dashboard page, like a homepage for the website.

$db = new Database();
$workouts = $db->query('select * from workouts LIMIT 3')->get(); 

view("workouts/dashboard.view.php", [
  'workouts' => $workouts]);