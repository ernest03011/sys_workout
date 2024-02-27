<?php

$router->get('/', "test.php");

$router->get('/dashboard', "workouts/index.php");

$router->get('/add', "workouts/create.php");
$router->post('/add', "workouts/store.php");

