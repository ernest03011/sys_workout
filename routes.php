<?php

$router->get('/test', "test.php");
$router->get('/', "workouts/dashboard.php");

$router->get('/dashboard', "workouts/index.php");

$router->get('/add', "workouts/create.php");
$router->post('/add', "workouts/store.php");

$router->get('/login', "sessions/create.php")->only('guest');
$router->post('/login', "sessions/store.php")->only('guest');

$router->post('/auth-token', "sessions/auth.token.php")->only('guest');

$router->get("/workouts", "workouts/index.php")->only('auth');
$router->get("/workout", "workouts/show.php")->only('auth');


