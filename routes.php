<?php

$router->get('/test', "test.php");
$router->get('/', "workouts/dashboard.php")->only('auth');

$router->get('/add', "workouts/create.php")->only('auth');
$router->post('/add', "workouts/store.php")->only('auth');

$router->get('/login', "sessions/create.php")->only('guest');
$router->post('/login', "sessions/store.php")->only('guest');

$router->delete('/logout', "sessions/destroy.php")->only('auth');

$router->post('/auth-token', "sessions/auth.token.php")->only('guest');

$router->get("/workouts", "workouts/index.php")->only('auth');
$router->get("/workout", "workouts/show.php")->only('auth');

$router->get("/exercises", "exercises/show.php")->only('auth');


