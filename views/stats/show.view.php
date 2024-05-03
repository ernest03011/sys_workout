<?php view('partials/head.php'); ?>
<?php view('partials/nav.php'); ?>

<div class="container mx-auto py-8 mt-8">
    <h1 class="text-3xl font-bold text-center mb-8">Workout Comparison for <?= $data[0]["exercise_name"]; ?></h1>
    
    <!-- Weight Comparison Chart -->
    <div class="mb-8">
        <canvas id="weightChart" width="400" height="200"></canvas>
    </div>

    <!-- Reps Comparison Chart -->
    <div class="mb-8">
        <canvas id="repsChart" width="400" height="200"></canvas>
    </div>


    <!-- Duration Comparison Chart (Optional) -->
    <!-- <div>
        <canvas id="durationChart" width="400" height="200"></canvas>
    </div> -->
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data from PHP
    let workouts = <?= json_encode($data); ?>;
</script>

<script src="../js/modules/stats/show.js"></script>

<?php view('partials/footer.php'); ?>