const addExerciseButton = document.getElementById("add_exercise_btn");
const submitWorkoutButton = document.getElementById("add_submit_workout");
const myForm = document.getElementById("workout_form");
const exerciseTableBody = document.getElementById(
  "exercise-details-table-body"
);

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

  addValuesToThetable(Object.values(data));
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

addExerciseButton.addEventListener("click", (event) => {
  event.preventDefault();

  const myForm = document.forms["exercise_form"];

  // Iterate over the form's elements collection
  for (let i = 0; i < myForm.length; i++) {
    const element = myForm[i];

    // Check if the element is an input field
    if (element.tagName === "INPUT" || element.tagName === "TEXTAREA") {
      // Print the value of the input field
      // console.log(element.name + ": " + element.value);
      const result = validateInputField(element.value);
      if (result === false) {
        didplayErrorMessage();
        return;
      }
    }
  }

  addExercisesToTheArray();
  removeErrorMessage();
});

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

function addValuesToThetable(arrValue) {
  const tr = document.createElement("tr");
  tr.classList.add("bg-white", "hover:bg-gray-100");

  // Loop through each value in arrValue and create a corresponding table data cell (<td>)
  arrValue.forEach((value) => {
    const td = document.createElement("td");
    td.classList.add("px-4", "py-2", "border", "border-gray-200");
    td.textContent = value;
    tr.appendChild(td);
  });

  // Append the table row to the table body
  exerciseTableBody.appendChild(tr);
}

function validateInputField(value) {
  return value.trim() != "";
}

function didplayErrorMessage() {
  const parentElement = document.getElementById("create-workout-page");
  const firstChild = parentElement.firstElementChild;
  // console.log(firstChild);
  const elemntID = firstChild.getAttribute("id");

  if (elemntID === "error-msg") {
    return;
  }

  const p = document.createElement("p");
  p.classList.add(
    "my-4",
    "rounded-md",
    "py-2",
    "px-4",
    "text-white",
    "bg-green-500"
  );
  p.setAttribute("id", "error-msg");

  p.textContent = "There was an error when submitting the Workout, try again";

  // document.getElementById("create-workout-page").appendChild(p);
  parentElement.insertBefore(p, firstChild);
}

function removeErrorMessage() {
  const parentElement = document.getElementById("create-workout-page");
  const firstChild = parentElement.firstElementChild;
  const elemntID = firstChild.getAttribute("id");

  if (elemntID === "error-msg") {
    parentElement.removeChild(firstChild);
  }
}
