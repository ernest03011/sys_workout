<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>

<div class="container">
  <h1>403 - Forbidden</h1>
  <p>Sorry, you don't have permission to access this resource.</p>
  <p>Return to <a href="/">homepage</a>.</p>
</div>


<div class="text-center">
    <p class="text-base font-semibold text-indigo-600">403</p>
    <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Forbidden</h1>
    <p class="mt-6 text-base leading-7 text-gray-600">Sorry, you don't have permission to access this resource.</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <a href="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go back home</a>
    </div>
  </div>

<?php view("partials/footer.php"); ?>
