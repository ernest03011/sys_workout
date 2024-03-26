<?php view("partials/head.php"); ?>

<!-- <h1>Add a new Workout!</h1> -->
<!-- 
<form action="/add" method="POST">
          <div class="grid">
            <label for="firstname">Name: </label>
            <input
              type="text"
              name="firstname"
              placeholder="First name"
              aria-label="First name"
              required
            />
            <label for="email">Email: </label>
            <input
              type="email"
              name="email"
              placeholder="Email address"
              aria-label="Email address"
              autocomplete="email"
              required
            />
            <button type="submit">Subscribe</button>
          </div>

          <details class="dropdown">
              <summary role="button" class="secondary">Target</summary>
              <ul>
                <li><a href="#" data-theme-switcher="auto">Auto</a></li>
                <li><a href="#" data-theme-switcher="light">Light</a></li>
                <li><a href="#" data-theme-switcher="dark">Dark</a></li>
              </ul>
            </details>


          <fieldset>
            <label for="terms">
              <input type="checkbox" role="switch" id="terms" name="terms" />
              I agree to the
              <a href="#" onclick="event.preventDefault()">Privacy Policy</a>
            </label>
          </fieldset>
</form>
 -->

<h2>Add Workout Details</h2>
<form action="/add" method="POST" id="workout_form">
    <!-- Workout Name -->
    <label for="workout_name">Workout Name:</label>
    <input type="text" id="workout_name" name="workout_name" required><br>
        
        <!-- Exercise Details -->
    <div id="exercise_fields">
      <div class="exercise">
        <h3>Exercise 1</h3>
        <label for="exercise_name">Exercise Name:</label>
        <!-- <input type="text" id="exercise_name" name="exercise_name" required><br> -->
        <select name="exercise_name" id="exercise_name" required>
          <option value="">--- Choose an Exercise name ---</option>
          <option value="red">Red</option>
          <option value="green">Green</option>
          <option value="blue">Blue</option>
        </select>
                  
        <label for="sets">Sets:</label>
        <input type="number" id="sets" name="sets" required><br>
                  
        <label for="reps">Reps:</label>
        <input type="number" id="reps" name="reps" required><br>
                  
        <label for="weight">Weight (lbs):</label>
        <input type="number" id="weight" name="weight"><br>
                  
        <label for="duration">Duration (mins):</label>
        <input type="number" id="duration" name="duration"><br>
                  
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"></textarea>
        </div>
    </div>
        
        <!-- Add Exercise Button -->
   <button type="button" id="add_exercise_btn">Add Exercise</button>
   <button type="button" id="start_again_btn">Start Again</button>
        
        <!-- Submit Button -->
  <button type="submit" id="add_submit_workout">Submit Workout</button>
</form>



<?php view("partials/nav.php"); ?>
<?php view("partials/footer.php"); ?>
