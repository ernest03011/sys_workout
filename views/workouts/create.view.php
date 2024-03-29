<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>


<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Add Workout Details</h2>
    <form action="/add" method="POST" id="workout_form" class="mb-8">
        <!-- Workout Name -->
        <div class="mb-4">
            <label for="workout_name" class="block font-bold mb-1">Workout Name:</label>
            <input type="text" id="workout_name" name="workout_name" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
        </div>

        <!-- Exercise Details -->
        <div id="exercise_fields" class="mb-4">
            <div class="exercise mb-4 border border-gray-300 p-4 rounded-md">
                <h3 class="text-lg font-bold mb-2">Exercise 1</h3>
                <label for="exercise_name" class="block font-bold mb-1">Exercise Name:</label>
                <select name="exercise_name" id="exercise_name" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                    <option value="">--- Choose an Exercise name ---</option>
                    <?php foreach($targets as $target) : ?>
                        <option value="<?= htmlspecialchars($target['target']); ?>">
                            <?= htmlspecialchars($target['target']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="sets" class="block font-bold mb-1">Sets:</label>
                <input type="number" id="sets" name="sets" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                <label for="reps" class="block font-bold mb-1">Reps:</label>
                <input type="number" id="reps" name="reps" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                <label for="weight" class="block font-bold mb-1">Weight (lbs):</label>
                <input type="number" id="weight" name="weight" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                <label for="duration" class="block font-bold mb-1">Duration (mins):</label>
                <input type="number" id="duration" name="duration" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                <label for="notes" class="block font-bold mb-1">Notes:</label>
                <textarea id="notes" name="notes" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500"></textarea>
            </div>
        </div>

        <!-- Add Exercise Button -->
        <button type="button" id="add_exercise_btn" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-4 hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Add Exercise</button>
        <button type="button" id="start_again_btn" class="bg-red-500 text-white px-4 py-2 rounded-md mr-4 hover:bg-red-700 focus:outline-none focus:bg-red-700">Start Again</button>

        <!-- Submit Button -->
        <button type="submit" id="add_submit_workout" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700">Submit Workout</button>
    </form>
</div>




<?php view("partials/footer.php"); ?>
