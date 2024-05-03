import FormHandler from "../workouts/FormHandler.js";
import toggleNotesDetails from "../workouts/handler.js";

const addExerciseButton = document.getElementById("add_exercise_btn");
const submitWorkoutButton = document.getElementById("add_submit_workout");
const myForm = document.getElementById("workout_form");

const myFormHandler = new FormHandler(myForm);

const startAgainBtn = document.getElementById("start_again_btn");
const workoutName = document.getElementById("workout_name");
const exerciseName = document.getElementById("exercise_name");
const sets = document.getElementById("sets");

const workoutDetailSectionBtn = document.getElementById(
  "workout-detail-section-btn"
);

if (workoutDetailSectionBtn) {
  // This should require the handler.js file and take the toggleNotesDetails function from there.
  workoutDetailSectionBtn.addEventListener("click", toggleNotesDetails);
}

if (startAgainBtn) {
  startAgainBtn.addEventListener("click", () => {
    myFormHandler.resetValues();
    workoutName.value = "";
    exercisesArray = [];
  });
}

if (sets) {
  sets.addEventListener("change", myFormHandler.handleWeightRepsInputs);
}

if (addExerciseButton) {
  addExerciseButton.addEventListener("click", (event) => {
    event.preventDefault();
    myFormHandler.addExerciseHandler();
  });
}

if (exerciseName) {
  exerciseName.addEventListener(
    "change",
    myFormHandler.handleDurationInputVisibility
  );
}

if (submitWorkoutButton) {
  submitWorkoutButton.addEventListener("click", (event) => {
    event.preventDefault();

    myFormHandler.submitWorkoutHandler();
  });
}
