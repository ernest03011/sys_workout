<?php


$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises/target/lats?limit=1",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: exercisedb.p.rapidapi.com",
		"X-RapidAPI-Key: ea75e19c82msh781fafff442f79cp1055b9jsnea6de9717e62"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

// if ($err) {
// 	echo "cURL Error #:" . $err;
// } else {
// 	echo $response;
// }

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	dd($response);
	// print_r($response);
	// echo $response;
}

// - Getting an specific exercise https://exercisedb.p.rapidapi.com/exercises/exercise/0007

// - "bodyPart":"back",
// - "equipment":"cable",
// - "gifUrl":"https://v2.exercisedb.io/image/Xv2khbni0JTeRn",
// - "id":"0007",
// - "name":"alternate lateral pulldown",
// - "target":"lats","
// - secondaryMuscles":["biceps","rhomboids"],
// - "instructions":["Sit on the cable machine with your back straight and feet flat on the ground.","Grasp the handles with an overhand grip, slightly wider than shoulder-width apart.","Lean back slightly and pull the handles towards your chest, squeezing your shoulder blades together.","Pause for a moment at the peak of the movement, then slowly release the handles back to the starting position.","Repeat for the desired number of repetitions."]

// - https://exercisedb.p.rapidapi.com/exercises/target/lats?limit=1

// - "bodyPart":"back",
// - "equipment":"cable",
// - "gifUrl":"https://v2.exercisedb.io/image/Xv2khbni0JTeRn",
// - "id":"0007",
// - "name":"alternate lateral pulldown",
// - "target":"lats",
// - "secondaryMuscles":["biceps","rhomboids"],
// - "instructions":["Sit on the cable machine with your back straight and feet flat on the ground.","Grasp the handles with an overhand grip, slightly wider than shoulder-width apart.","Lean back slightly and pull the handles towards your chest, squeezing your shoulder blades together.","Pause for a moment at the peak of the movement, then slowly release the handles back to the starting position.","Repeat for the desired number of repetitions."]}