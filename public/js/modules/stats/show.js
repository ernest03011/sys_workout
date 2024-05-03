// Extract reps and weight data
let repsData = workouts.map((workout) => workout.reps.split(",").map(Number));
let weightData = workouts.map((workout) =>
  workout.weight.split(",").map(Number)
);
let dates = workouts.map((workout) => workout.date);

// Reps Comparison Chart
let repsChartCtx = document.getElementById("repsChart").getContext("2d");
let repsChart = new Chart(repsChartCtx, {
  type: "line",
  data: {
    labels: dates,
    datasets: [
      {
        label: "Reps",
        data: repsData,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
    plugins: {
      // Disable chart animations
      animation: {
        enabled: false,
      },
    },
  },
});

// Weight Comparison Chart
let weightChartCtx = document.getElementById("weightChart").getContext("2d");
let weightChart = new Chart(weightChartCtx, {
  type: "line",
  data: {
    labels: dates,
    datasets: [
      {
        label: "Weight (Lbs)",
        data: weightData,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
    plugins: {
      // Disable chart animations
      animation: {
        enabled: false,
      },
    },
  },
});
