<?php view("partials/head.php"); ?>

<h1>Add a new Workout!</h1>

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




<?php view("partials/nav.php"); ?>
<?php view("partials/footer.php"); ?>
