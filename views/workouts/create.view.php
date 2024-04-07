<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>


<div class="container mx-auto px-4" id="create-workout-page">

<!-- Show PHP messages -->

    <?php 
        use Core\Session;
        if(Session::has('error')){
            echo "
                <div class='bg-green-500 text-white px-4 py-2 rounded-md mb-4'>
                    <p>" . Session::get('error') . "</p>
                </div>
            ";
        }

    ?>


    <h2 class="text-2xl font-bold mb-4">Add Workout Details</h2>

    <!-- More details section -->
    <div class="relative">
        <button id="workout-detail-section-btn" type="button" class="inline-flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 hover:bg-indigo-500 rounded-md border-4 " aria-expanded="false">
            <span>See more details</span>
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </button>

        <div data-toggle-status="hidden" id="workout-detail-section" class="absolute left-1/2 z-10 mt-5  w-screen max-w-max -translate-x-1/2 px-4 hidden opacity-0 translate-y-1">
            <div class="w-screen max-w-md flex-auto overflow-hidden rounded-3xl bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5">
                <!-- Section A -->
                <div class="p-4">
                    <h5>Thing to add when adding the notes</h5>
                    <ul>
                        <li>Did you increase the weight from last session?</li>
                        <li>Were you able to achieve more reps with the same weight?</li>
                        <li>Were you able to achieve more reps with the same weight?</li>
                        <li>Did you manage to reduce rest time between sets?</li>
                        <li>Did you notice any improvements in form during this exercise?</li>
                        <li>How fatigued did you feel during the last set?</li>
                        <li>Did you focus on achieving better range of motion?</li>
                        <li>Did you try using a new grip/stance for better engagement?</li>
                        <li>Did you experiment with tempo variations?</li>
                        <li>Did you notice any muscle imbalances during the exercise?</li>
                        <li>Did you incorporate drop sets/supersets for added intensity?</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    <!-- Main form for workout name -->
    <form action="/add" method="POST" id="workout_form" class="mb-8">
        <div class="mb-4">
            <label for="workout_name" class="block font-bold mb-1">Workout Name:</label>
            <input type="text" id="workout_name" name="workout_name" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
        </div>
    </form>

    <!-- Form for adding exercises -->
    <form id="exercise_form" class="mb-8">
        <div id="exercise_fields" class="mb-4">
            <div class="exercise mb-4 border border-gray-300 p-4 rounded-md">
                <h3 class="text-lg font-bold mb-2">Exercise 1</h3>
                <label for="exercise_name" class="block font-bold mb-1">Exercise Name:</label>
                <!-- <input type="text" name="exercise_name" id="exercise_name" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500"> -->
                <select name="exercise_name" id="exercise_name" required class="focus:outline-none focus:border-blue-500">
                    <option value="">--- Choose an Exercise name ---</option>
                    <?php foreach($exerciseNameList as $exerciseName) : ?>
                        <option value="<?= htmlspecialchars($exerciseName["exercise_name"]); ?>">
                            <?= htmlspecialchars($exerciseName["exercise_name"]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="sets" class="block font-bold mb-1">Sets:</label>
                <input type="number" name="sets" id="sets" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                <label for="reps" class="block font-bold mb-1">Reps:</label>
                <input type="number" name="reps" id="reps" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                <label for="weight" class="block font-bold mb-1">Weight (lbs):</label>
                <input type="number" name="weight" id="weight" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                <label for="duration" class="block font-bold mb-1">Duration (mins):</label>
                <input type="number" name="duration" id="duration" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                <label for="notes" class="block font-bold mb-1">Notes:</label>
                <textarea name="notes" id="notes" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500"></textarea>
            </div>
        </div>

        <!-- Add Exercise Button -->
        <button type="button" id="add_exercise_btn" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-4 hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Add Exercise</button>
        <button type="button" id="start_again_btn" class="bg-red-500 text-white px-4 py-2 rounded-md mr-4 hover:bg-red-700 focus:outline-none focus:bg-red-700">Start Again</button>
    </form>

    <!-- Tables with the exercises -->
    <div class="container mx-auto px-4">
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Exercise in queue to be submitted</h2>

            <!-- Exercise details -->
            <table class="table-auto border-collapse border border-gray-200" id="exercise-details-table">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-200">Exercise Name</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-200">Sets</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-200">Reps</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-200">Weight (lbs)</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-200">Duration (mins)</th>
                        <th class="px-4 py-2 bg-gray-200 border border-gray-200">Notes</th>
                        
                    </tr>
                </thead>
                <tbody id="exercise-details-table-body">
                    <!-- <tr>
                        <td class="px-4 py-2 border border-gray-200">Workout 1</td>
                        <td class="px-4 py-2 border border-gray-200">Exercise 1</td>
                        <td class="px-4 py-2 border border-gray-200">2024-03-28</td>
                        <td class="px-4 py-2 border border-gray-200">Body Part 1</td>
                        <td class="px-4 py-2 border border-gray-200">Equipment 1</td>
                        <td class="px-4 py-2 border border-gray-200">Target 1</td>
                       
                    </tr> -->
                    <!-- You can add more rows here as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <br>

    <!-- Submit Button -->
    <button type="button" id="add_submit_workout" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700">Submit Workout</button>

</div>


<?php view("partials/footer.php"); ?>
