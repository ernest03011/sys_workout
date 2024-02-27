<?php

use Http\controller\Curl\CurlController;

$url = 'https://exercisedb.p.rapidapi.com/';
$params = 'exercises/target/lats?limit=1';

$ch = new CurlController($url, $params);
$response_arr = $ch->execute();
$ch->close();

dd($response_arr);

dd($response_arr['response']);

view("workouts/create.php");

