<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>

    <div class="text-center">
        <p class="text-base font-semibold text-indigo-600">401</p>
        <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Unauthorized</h1>
        <p class="mt-6 text-base leading-7 text-gray-600">Sorry, you are not authorized to access this resource.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <p class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Please <a href="/login">login</a> to access this page.</p>
        </div>
    </div>

<?php view("partials/footer.php"); ?>
    