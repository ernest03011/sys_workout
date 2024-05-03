class FormHandler {
  // notes;

  constructor(formElement) {
    this.form = formElement;
    this.exercisesArray = [];
  }

  // Submit Workout

  submitWorkoutHandler() {
    const myForm = document.getElementById("workout_form");

    this.addExercisesToTheArray();

    if (this.exercisesArray.length === 0) {
      alert("Please add any exercise to the workout!");
    } else {
      this.exercisesArray.forEach(function (exercise) {
        // Create a new hidden input element
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "exercises[]"; // Use the same name for each input to create an array
        input.value = exercise;

        // Append the input element to the form
        myForm.appendChild(input);
      });
      myForm.submit();

      this.resetValues();
    }
  }

  // Submit Exercise\\

  addExerciseHandler() {
    const myForm = document.forms["exercise_form"];
    const exerciseName = document.getElementById("exercise_name");

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

        const result = this.validateInputField(element.value);
        if (result === false) {
          this.didplayErrorMessage();
          return;
        }
      }
    }

    this.addExercisesToTheArray();
    this.removeErrorMessage();
  }

  addExercisesToTheArray() {
    let data = [];
    const exerciseName = document.getElementById("exercise_name");
    const sets = document.getElementById("sets");
    const duration = document.getElementById("duration");
    const notes = document.getElementById("notes");

    const workoutName = document.getElementById("workout_name");

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

    this.addValuesToThetable(Object.values(data));
    let jsonData = JSON.stringify(data);
    this.exercisesArray.push(jsonData);
    this.resetExerciseFormInputFields();
  }

  addValuesToThetable(arrValue) {
    const exerciseTableBody = document.getElementById(
      "exercise-details-table-body"
    );
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

  // Display Message.

  didplayErrorMessage() {
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

  // Remove Message.

  removeErrorMessage() {
    const parentElement = document.getElementById("create-workout-page");
    const firstChild = parentElement.firstElementChild;
    const elemntID = firstChild.getAttribute("id");

    if (elemntID === "error-msg") {
      parentElement.removeChild(firstChild);
    }
  }

  // Handle Duration section display

  handleDurationInputVisibility() {
    const cardioSection = document.getElementById("cardio");
    const strengthSection = document.getElementById("strength");
    const exerciseName = document.getElementById("exercise_name");

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
  // Handle Reps / Weight section display.'

  handleWeightRepsInputs() {
    const container = document.getElementById("strength");
    const sets = document.getElementById("sets");
    const setsValue = Number(sets.value);
    container.innerHTML = "";

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

  // Reset Exercise

  resetValues() {
    // exercisesArray = [];
    this.resetExerciseFormInputFields();
    // workoutName.value = "";
  }

  resetExerciseFormInputFields() {
    //
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
          this.handleWeightRepsInputs();
        } else if (element.id === "exercise_name") {
          element.value = "--- Choose an Exercise name ---";
        }
      }
    }
  }

  // Validate input fields are not empty.

  validateInputField(value) {
    return value.trim() != "";
  }
}

export default FormHandler;
