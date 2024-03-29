<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>

<!-- // dd($workout); -->
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Workout Sessions</h2>
    <div class="overflow-x-auto">
        <table class="table-auto border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Workout Name</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Exercise</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Date</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">BodyPart</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Equipment</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Target</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Secondary Muscles</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Instructions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['workout_name']); ?></td>
                    <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['exercise_name']); ?></td>
                    <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['date']); ?></td>
                    <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($exercise_data_from_api['bodyPart']); ?></td>
                    <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($exercise_data_from_api['equipment']); ?></td>
                    <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($exercise_data_from_api['target']); ?></td>
                    <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars(json_encode($exercise_data_from_api['secondaryMuscles'])); ?></td>
                    <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars(json_encode($exercise_data_from_api['instructions'])); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="my-8">
        <img src="<?= htmlspecialchars($exercise_data_from_api['gifUrl']); ?>" alt="">
    </div>
</div>

<?php view("partials/footer.php"); ?>

<!-- exercise_data_from_api -->

<!-- {"bodyPart":"waist","equipment":"body weight","gifUrl":"https://v2.exercisedb.io/image/Hkfb84WY8VkL9D","id":"0006","name":"alternate heel touchers","target":"abs","secondaryMuscles":["obliques"],"instructions":["Lie flat on your back with your knees bent and feet flat on the ground.","Extend your arms straight out to the sides, parallel to the ground.","Engaging your abs, lift your shoulders off the ground and reach your right hand towards your right heel.","Return to the starting position and repeat on the left side, reaching your left hand towards your left heel.","Continue alternating sides for the desired number of repetitions."]} -->