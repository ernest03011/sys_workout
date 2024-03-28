<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>

<!-- Show PHP messages -->

<?php 
    use Core\Session;
    if(Session::has('added_workout')){
        echo "<p>" . Session::get('added_workout') . "</p>";
    }

?>

<!-- <h1>Workout Sessions</h1> -->

<!-- Section A: Displaying registered workout sessions -->
<section id="registered_sessions">
    <h2>Registered Workout Sessions</h2>
    <ul>
    
        <?php foreach($workouts as $workout) : ?>
            <li><?= htmlspecialchars($workout['workout_name']); ?><span><?= htmlspecialchars($workout['date']); ?></span> <a href='/workout?id=<?= htmlspecialchars($workout['workout_id']); ?>'>View Details</a></li>
        <?php endforeach; ?>

        <!-- Add more entries as needed -->
    </ul>
</section>

<!-- Section B: Button to create a new workout session -->
<section id="create_session">
    <h2>Create a New Workout Session</h2>
    <!-- <button id="create_session_btn">Create Workout Session</button> -->
    <a href="/add" class="text-blue">Create Workout Session</a>

      
</section>



<?php view('partials/footer.php'); ?>
