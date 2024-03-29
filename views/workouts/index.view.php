<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>

<!-- Show PHP messages -->

<?php 
    use Core\Session;
    if(Session::has('added_workout')){
        echo "
            <div class='bg-green-500 text-white px-4 py-2 rounded-md mb-4'>
                <p>" . Session::get('added_workout') . "</p>
            </div>
        ";
    }

?>

<!-- <h1>Workout Sessions</h1> -->

<!-- Section A: Displaying registered workout sessions -->
<section id="registered_sessions" class="p-4">
    <h2 class="text-2xl font-bold mb-4">Registered Workout Sessions</h2>
    <ul>
        <?php foreach($workouts as $workout) : ?>
            <li class="flex justify-between items-center border-b border-gray-200 py-2">
                <span class="text-lg"><?= htmlspecialchars($workout['workout_name']); ?></span>
                <span class="text-gray-600"><?= htmlspecialchars($workout['date']); ?></span>
                <a href='/workout?id=<?= htmlspecialchars($workout['workout_id']); ?>' class="text-blue-500 hover:text-blue-700">View Details</a>
            </li>
        <?php endforeach; ?>
        <!-- Add more entries as needed -->
    </ul>
</section>


<!-- Section B: Button to create a new workout session -->
<section id="create_session" class="p-4">
    <h2 class="text-2xl font-bold mb-4">Create a New Workout Session</h2>
    <!-- <button id="create_session_btn">Create Workout Session</button> -->
    <a href="/add" class="text-blue-500 hover:text-blue-700">Create Workout Session</a>
</section>




<?php view('partials/footer.php'); ?>
