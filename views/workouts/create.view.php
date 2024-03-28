<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>


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
          
          <?php foreach($targets as $target) : ?>
 
            <option value="<?php htmlspecialchars($target['target']); ?>">
              <?php htmlspecialchars($target['target']); ?>
            </option>


          <?php endforeach; ?>
<!-- 
          <option value="red">Red</option>
          <option value="green">Green</option>
          <option value="blue">Blue</option> -->
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



<?php view("partials/footer.php"); ?>
