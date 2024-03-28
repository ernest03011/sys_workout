<?php view("partials/head.php"); ?>
<?php view("partials/nav.php"); ?>


  <!-- <h1>404 - Page Not Found</h1>
  <p>The page you are looking for does not exist.</p> -->
  <!--
  This example requires updating your template:

  ```
  <html class="h-full">
  <body class="h-full">
  ```
-->

  <div class="text-center">
    <p class="text-base font-semibold text-indigo-600">404</p>
    <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Page not found</h1>
    <p class="mt-6 text-base leading-7 text-gray-600">Sorry, we couldn’t find the page you’re looking for.</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <a href="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go back home</a>
      <a href="/workouts" class="text-sm font-semibold text-gray-900">See Workouts <span aria-hidden="true">&rarr;</span></a>
    </div>
  </div>


<?php view("partials/footer.php"); ?>
