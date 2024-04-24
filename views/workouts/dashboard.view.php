<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>

<?php 

    showMessage(['error']);

?>

<div class="container mx-auto px-4 mt-8">
    <h1 class="text-3xl font-bold mb-8">Workout Sessions</h1>

    <!-- Section A: Displaying registered workout sessions -->
    <section id="registered_sessions" class="mb-8">
        <h2 class="text-xl font-bold mb-4">Registered Workout Sessions</h2>
        <ul>
            <?php foreach($workouts as $workout) : ?>
                <li class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span><?= htmlspecialchars($workout['workout_name']); ?></span>
                    <span><?= htmlspecialchars($workout['date']); ?></span>
                    <a href='/workout?id=<?= htmlspecialchars($workout['workout_id']); ?>' class="text-blue-500 hover:text-blue-700">View Details</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="/workouts" class="text-blue-500 hover:text-blue-700 block mt-4">View All Workout Sessions</a> <!-- Link to show all sessions -->
    </section>

    <!-- Section B: Button to create a new workout session -->
    <section id="create_session">
        <h2 class="text-xl font-bold mb-4">Create a New Workout Session</h2>
        <!-- <button id="create_session_btn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Create Workout Session</button> -->
        <a href="/add" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">Create Workout Session</a>
    </section>
</div>


<?php view("partials/footer.php"); ?>
