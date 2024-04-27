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

const workoutName = document.getElementById("workout_name");

let exercisesArray = [];

const mobileMenuButton = document.querySelector(
  '[aria-controls="mobile-menu"]'
);

const startAgainBtn = document.getElementById("start_again_btn");

const workoutDetailSectionBtn = document.getElementById(
  "workout-detail-section-btn"
);

function addExercisesToTheArray() {
  let data = [];

  if (exerciseName.value == "Cardio") {
    data = {
      exerciseName: exerciseName.value,
      sets: sets.value,
      reps: "0",
      weight: "0",
      duration: duration.value,
      notes: notes.value,
    };
  } else {
    const reps = document.querySelectorAll('[name="reps"]');
    const weight = document.querySelectorAll('[name="weight"]');

    let repsValues = Array.from(reps).map((rep) => {
      return rep.value;
    });
    let weightValues = Array.from(weight).map((wght) => {
      return wght.value;
    });

    data = {
      exerciseName: exerciseName.value,
      sets: sets.value,
      reps: repsValues.join(", "),
      weight: weightValues.join(", "),
      duration: "0",
      notes: notes.value,
    };
  }

  addValuesToThetable(Object.values(data));
  let jsonData = JSON.stringify(data);
  exercisesArray.push(jsonData);
  resetExerciseFormInputFields();
}

function resetExerciseFormInputFields() {
  const myForm = document.forms["exercise_form"];

  for (let i = 0; i < myForm.length; i++) {
    const element = myForm[i];

    if (element.tagName === "INPUT" || element.tagName === "TEXTAREA") {
      console.log("Are you even being run?");
      if (
        element.type !== "submit" &&
        element.type !== "button" &&
        element.type !== "reset"
      ) {
        element.value = ""; // Reset value for input fields and textareas
      }
    } else {
      console.log(element);
      if (element.id === "sets") {
        element.value = "1";
        handleWeightRepsInputs();
      } else if (element.id === "exercise_name") {
        element.value = "--- Choose an Exercise name ---";
      }
    }
  }
}

function resetValues() {
  exercisesArray = [];
  resetExerciseFormInputFields();
  workoutName.value = "";
}

if (addExerciseButton) {
  addExerciseButton.addEventListener("click", (event) => {
    event.preventDefault();

    const myForm = document.forms["exercise_form"];

    // Iterate over the form's elements collection
    for (let i = 0; i < myForm.length; i++) {
      const element = myForm[i];
      const isItCardio = exerciseName.value == "Cardio" ? true : false;

      if (element.tagName === "INPUT" || element.tagName === "TEXTAREA") {
        if (
          isItCardio &&
          (element.name == "reps" || element.name == "weight")
        ) {
          continue;
        } else if (!isItCardio && element.name == "duration") {
          continue;
        }

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
}

if (submitWorkoutButton) {
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
      myForm.submit();

      resetValues();
    }
  });
}

if (startAgainBtn) {
  startAgainBtn.addEventListener("click", resetValues);
}

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

function toggleNotesDetails() {
  const noteDetailSection = document.getElementById("workout-detail-section");

  const sectionStatus = noteDetailSection.dataset.toggleStatus;

  if (sectionStatus == "hidden") {
    noteDetailSection.classList.remove("hidden", "opacity-0", "translate-y-1");
    noteDetailSection.classList.add("flex", "opacity-100", "translate-y-0");

    noteDetailSection.dataset.toggleStatus = "visible";
  } else if (sectionStatus == "visible") {
    noteDetailSection.classList.remove("flex", "opacity-100", "translate-y-0");
    noteDetailSection.classList.add("hidden", "opacity-0", "translate-y-1");

    noteDetailSection.dataset.toggleStatus = "hidden";
  }
}

if (workoutDetailSectionBtn) {
  workoutDetailSectionBtn.addEventListener("click", toggleNotesDetails);
}

function toggleMobileMenu() {
  const isExpanded = mobileMenuButton.ariaExpanded;
  // console.log(mobileMenuButton.ariaExpanded);

  const mobileMenu = document.getElementById("mobile-menu");
  const openMobileMenuBtn = mobileMenuButton.querySelector(
    "#open-mobile-menu-btn"
  );
  const closeMobileMenuBtn = mobileMenuButton.querySelector(
    "#close-mobile-menu-btn"
  );

  if (isExpanded == "false") {
    mobileMenu.classList.remove("md:hidden");
    mobileMenu.classList.add("hidden");

    openMobileMenuBtn.classList.remove("hidden");
    openMobileMenuBtn.classList.add("block");

    closeMobileMenuBtn.classList.remove("block");
    closeMobileMenuBtn.classList.add("hidden");
  } else if (isExpanded == "true") {
    mobileMenu.classList.remove("hidden");
    mobileMenu.classList.add("md:hidden");

    openMobileMenuBtn.classList.remove("block");
    openMobileMenuBtn.classList.add("hidden");

    closeMobileMenuBtn.classList.remove("hidden");
    closeMobileMenuBtn.classList.add("block");
  }

  mobileMenuButton.ariaExpanded = isExpanded == "true" ? "false" : "true";
}

if (mobileMenuButton) {
  mobileMenuButton.addEventListener("click", toggleMobileMenu);
}

function handleWeightRepsInputs() {
  const container = document.getElementById("strength");
  const setsValue = Number(sets.value);
  container.innerHTML = "";

  // Clear existing content inside the container
  // This step is optional depending on your use case
  // container.innerHTML = "";

  // Create a document fragment to hold the new input fields
  const fragment = document.createDocumentFragment();

  // Create input fields for each set
  for (let index = 0; index < setsValue; index++) {
    const div = document.createElement("div");
    div.classList.add("sets");

    const repsLabel = document.createElement("label");
    repsLabel.htmlFor = "reps" + index;
    repsLabel.textContent = "Reps:";
    div.appendChild(repsLabel);

    const repsInput = document.createElement("input");
    repsInput.type = "number";
    repsInput.name = "reps";
    repsInput.id = "reps" + index;
    repsInput.required = true;
    repsInput.classList.add("focus:outline-none", "focus:border-blue-500");
    div.appendChild(repsInput);

    const weightLabel = document.createElement("label");
    weightLabel.htmlFor = "weight" + index;
    weightLabel.textContent = "Weight (lbs):";
    div.appendChild(weightLabel);

    const weightInput = document.createElement("input");
    weightInput.type = "number";
    weightInput.name = "weight";
    weightInput.id = "weight" + index;
    weightInput.required = true;
    weightInput.classList.add("focus:outline-none", "focus:border-blue-500");
    div.appendChild(weightInput);
    div.classList.add("mb-2");

    fragment.appendChild(div);
  }

  // Append the fragment with the new input fields to the container
  container.appendChild(fragment);
}

if (sets) {
  sets.addEventListener("change", handleWeightRepsInputs);
}

function handleDurationInputVisibility() {
  const cardioSection = document.getElementById("cardio");
  const strengthSection = document.getElementById("strength");

  const isItCardio = exerciseName.value == "Cardio" ? true : false;

  if (isItCardio) {
    cardioSection.classList.add("block");
    cardioSection.classList.remove("hidden");

    strengthSection.classList.add("hidden");
    strengthSection.classList.remove("block");
  } else {
    cardioSection.classList.remove("block");
    cardioSection.classList.add("hidden");

    strengthSection.classList.remove("hidden");
    strengthSection.classList.add("block");
  }
}

if (exerciseName) {
  exerciseName.addEventListener("change", handleDurationInputVisibility);
}
