<script src="../js/modules/partials/nav.js"></script>

<div class="min-h-full">

  <nav class="bg-gray-800">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        
        <div class="flex items-center">

          <div class="hidden md:block">

            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/" class="<?= getCurrentURI() == '/' ? 'bg-gray-900' : 'hover:bg-gray-700 hover:text-white'?>  text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
              <a href="/workouts" class="<?= getCurrentURI() == '/workouts' ? 'bg-gray-900' : 'hover:bg-gray-700 hover:text-white'?> text-gray-300 rounded-md px-3 py-2 text-sm font-medium">Workouts</a>
              <a href="/stats" class="<?= getCurrentURI() == '/stats' ? 'bg-gray-900' : 'hover:bg-gray-700 hover:text-white'?> text-gray-300 rounded-md px-3 py-2 text-sm font-medium">Stats</a>

              <form action="/logout" method="POST">
                <input type="hidden" name="_method" value="DELETE">

                <button class=" <?= getCurrentURI() == '/logout' ? 'bg-gray-900' : 'hover:bg-gray-700 hover:text-white'?> text-gray-300 block rounded-md px-3 py-2 text-base font-mediu">Logout</button>
              </form>

            </div>

          </div>

        </div>
        
        <div class="-mr-2 flex md:hidden">

          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>

            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg id="open-mobile-menu-btn" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg id="close-mobile-menu-btn" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>

        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="/" class="<?= getCurrentURI() == '/' ? 'bg-gray-900' : 'hover:bg-gray-700 hover:text-white'?>  text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Home</a>
        <a href="/workouts" class="<?= getCurrentURI() == '/workouts' ? 'bg-gray-900' : 'hover:bg-gray-700 hover:text-white'?> text-gray-300 block rounded-md px-3 py-2 text-base font-medium">Workouts</a>
        <a href="/stats" class="<?= getCurrentURI() == '/stats' ? 'bg-gray-900' : 'hover:bg-gray-700 hover:text-white'?> text-gray-300 block rounded-md px-3 py-2 text-base font-medium">Stats</a>
        <a href="/logout" class="<?= getCurrentURI() == '/logout' ? 'bg-gray-900' : 'hover:bg-gray-700 hover:text-white'?> text-gray-300 block rounded-md px-3 py-2 text-base font-medium">Logout</a>


      </div>

    </div>

  </nav>


  <!-- I can pass like a header variable to show different info depending on the page and by default it could use an empty variable -->

  <!-- <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
  </header> -->
  <main>

