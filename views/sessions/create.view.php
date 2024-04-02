<?php view('partials/head.php'); ?>


<?php
    use Core\Session;

    if(Session::has('password')){
        $msg = Session::get('password') ?? '';
        echo "
            <div class='bg-green-500 text-white px-4 py-2 rounded-md mb-4'>
                <p>" . $msg . "</p>
            </div>
        ";
    }

    if(Session::has('username')){
        $msg = Session::get('username') ?? '';
        echo "
            <div class='bg-green-500 text-white px-4 py-2 rounded-md mb-4'>
                <p>" . $msg . "</p>
            </div>
        ";
    }
?>

<form action="/login" method="POST" class="w-full max-w-sm mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Login</h1>
    <div class="mb-4">
        <label for="username" class="block font-bold mb-2">Username:</label>
        <input type="text" name="username" id="username" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label for="password" class="block font-bold mb-2">Password:</label>
        <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
    </div>
    <section class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Login</button>
        <a href="register" class="text-blue-500 hover:underline">Register</a>
    </section>
</form>


<?php view('partials/footer.php'); ?>
