<?php view('partials/head.php'); ?>

<?php
    use Core\Session;
    if(Session::has('token')){
        echo "
            <div class='bg-green-500 text-white px-4 py-2 rounded-md mb-4'>
                <p>" . Session::get('token') . "</p>
            </div>
        ";
    }
?>

<form action="/auth-token" method="POST" class="mt-4">
    <label for="token" class="block font-bold mb-2">Add token:</label>
    <input type="text" id="token" name="token" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
    <input type="hidden" id="username" name="username" value="<?= $username ?>">
    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Submit</button>
</form>


<?php view('partials/footer.php'); ?>

