<?php view('partials/head.php'); ?>
<?php view('partials/nav.php'); ?>

<div class="container mx-auto py-8">
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

    // Extract reps and weight data
    let repsData = workouts.map(workout => workout.reps.split(',').map(Number));
    let weightData = workouts.map(workout => workout.weight.split(',').map(Number));
    let dates = workouts.map(workout => workout.date);

    // Reps Comparison Chart
    let repsChartCtx = document.getElementById('repsChart').getContext('2d');
    let repsChart = new Chart(repsChartCtx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Reps',
                data: repsData,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Weight Comparison Chart
    let weightChartCtx = document.getElementById('weightChart').getContext('2d');
    let weightChart = new Chart(weightChartCtx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Weight',
                data: weightData,
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php view('partials/footer.php'); ?>