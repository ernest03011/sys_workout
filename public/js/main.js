const addExerciseButton = document.getElementById("add_exercise_btn");
const submitWorkoutButton = document.getElementById("add_submit_workout");
const myForm = document.getElementById("workout_form");

const exerciseName = document.getElementById("exercise_name");
const sets = document.getElementById("sets");
const reps = document.getElementById("reps");
const weight = document.getElementById("weight");
const duration = document.getElementById("duration");
const notes = document.getElementById("notes");

const exercisesArray = [];

function addExercisesToTheArray() {
  let data = {
    exerciseName: exerciseName.value,
    sets: sets.value,
    reps: reps.value,
    weight: weight.value,
    duration: duration.value,
    notes: notes.value,
  };

  let jsonData = JSON.stringify(data);
  exercisesArray.push(jsonData); // Push data into exercisesArray

  exerciseName.value = "";
  sets.value = "";
  reps.value = "";
  weight.value = "";
  duration.value = "";
  notes.value = "";
}

function resetValues() {
  exercisesArray = [];
}

addExerciseButton.addEventListener("click", addExercisesToTheArray);

submitWorkoutButton.addEventListener("click", (event) => {
  event.preventDefault();

  addExercisesToTheArray();

  if (exercisesArray.length === 0) {
    alert("Please add any exercise to the workout!");
  } else {
    exercisesArray.forEach(function (exercise) {
      // Create a new hidden input element
      var input = document.createElement("input");
      input.type = "hidden";
      input.name = "exercises[]"; // Use the same name for each input to create an array
      input.value = exercise;

      // Append the input element to the form
      myForm.appendChild(input);
    });
    console.log("Testing");
    myForm.submit();

    resetValues();
  }
});

document
  .getElementById("start_again_btn")
  .addEventListener("click", resetValues);
