<?php view('partials/head.php'); ?>
<?php view('partials/nav.php'); ?>

<?php
    use Core\Session;
    if(Session::has('token')){
        echo "<p>{$session::get('token')}</p>";
    }
?>

<form action="/auth-token" method="POST">
    <label for="inputField">Add token:</label>
    <input type="text" id="token" name="token">
    <input type="hidden" id="username" name="username" value="<?= $username ?>">
    <br>
    <input type="submit" value="Submit">
</form>

<?php view('partials/footer.php'); ?>

