<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>

<!-- // dd($workout); -->
<h2>Workout Sessions</h2>
<table>
    <tr>
        <th>Workout Name</th>
        <th>Exercise</th>
        <th>Date</th>
        <th>BodyPart</th>
        <th>Equipment</th>
        <th>Target</th>
        <th>Secondary Muscles</th>
        <th>Instructions</th>
    </tr>
    <tr>
        <td><?= htmlspecialchars($workout['workout_name']); ?></td>
        <td><?= htmlspecialchars($workout['exercise_name']); ?></td>
        <td><?= htmlspecialchars($workout['date']); ?></td>
        <td><?= htmlspecialchars($exercise_data_from_api['bodyPart']); ?></td>
        <td><?= htmlspecialchars($exercise_data_from_api['equipment']); ?></td>
        <td><?= htmlspecialchars($exercise_data_from_api['target']); ?></td>
        <td><?= htmlspecialchars(json_encode($exercise_data_from_api['secondaryMuscles'])); ?></td>
        <td><?= htmlspecialchars(json_encode($exercise_data_from_api['instructions'])); ?></td>
    </tr>
   
</table>

<br/>
<br/>

<picture>
    <img src="<?= htmlspecialchars($exercise_data_from_api['gifUrl']); ?>" alt="">
</picture>

<?php view("partials/footer.php"); ?>

<!-- exercise_data_from_api -->

<!-- {"bodyPart":"waist","equipment":"body weight","gifUrl":"https://v2.exercisedb.io/image/Hkfb84WY8VkL9D","id":"0006","name":"alternate heel touchers","target":"abs","secondaryMuscles":["obliques"],"instructions":["Lie flat on your back with your knees bent and feet flat on the ground.","Extend your arms straight out to the sides, parallel to the ground.","Engaging your abs, lift your shoulders off the ground and reach your right hand towards your right heel.","Return to the starting position and repeat on the left side, reaching your left hand towards your left heel.","Continue alternating sides for the desired number of repetitions."]} -->