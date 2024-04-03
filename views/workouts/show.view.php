<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>

<!-- // dd($workout); -->
<div class="container mx-auto px-4">

    <h2 class="text-2xl font-bold mb-4">Workout Session: <?= htmlspecialchars($workouts[0]['workout_name']); ?></h2>
    <h3>Date: <?= htmlspecialchars($workouts[0]['date']); ?></h3>
    <p class="my-4"><span class="font-bold">NOTE:</span> Click Exercise Name for more information about the exercise!</p>
    <div class="overflow-x-auto">
        <table class="table-auto border-collapse border border-gray-200">
            <thead>

                <tr>

                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Exercise</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Target</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Sets</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Reps</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Weight</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Duration</th>
                    <th class="px-4 py-2 bg-gray-200 border border-gray-200">Notes</th>
                </tr>

            </thead>
            <tbody>

                <?php foreach($workouts as $workout) : ?>
                    
                    <tr>
                        <td class="px-4 py-2 border border-gray-200"> <a class="font-semibold text-indigo-600" href="exercises?name=<?= htmlspecialchars($workout['exercise_name']); ?>"><?= htmlspecialchars($workout['exercise_name']); ?></a></td>
                        <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['target']); ?></td>
                        <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['sets']); ?></td>
                        <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['reps']); ?></td>
                        <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['weight']); ?></td>
                        <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['duration']); ?></td>
                        <td class="px-4 py-2 border border-gray-200"><?= htmlspecialchars($workout['notes']); ?></td>
                    </tr>
           
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</div>

<?php view("partials/footer.php"); ?>   