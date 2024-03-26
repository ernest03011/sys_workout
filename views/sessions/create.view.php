<?php view('partials/head.php'); ?>
<?php view('partials/nav.php'); ?>

<main>
    <?php
        use Core\Session;

        if(Session::has('password')){
            $msg = Session::get('password') ?? '';
            echo "<p>{$msg}</p>";
        }
        if(Session::has('username')){
            $msg = Session::get('username') ?? '';
            echo "<p>{$msg}</p>";
        }
    ?>
    <form action="/login" method="POST">
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit">Login</button>
            <a href="register">Register</a>
        </section>
    </form>
</main>

<?php view('partials/footer.php'); ?>
