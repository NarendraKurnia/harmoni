<header class="bg-gradient-to-r from-teal-800 to-cyan-600 sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">

      <!-- Left: Menu -->
      <div class="flex items-center space-x-6 text-white font-semibold">
        <a href="{{ route('home') }}" class="hover:text-yellow-300">Home</a>
        <a href="{{ route('tentangkami.index') }}" class="hover:text-yellow-300">Tentang Kami</a>
      </div>

      <!-- Middle: Search -->
      <div class="hidden md:flex flex-1 px-4">
        <form method="get" action="{{ route('ai-news.index') }}" 
              class="flex items-center bg-white rounded-full shadow px-3 py-1 w-full max-w-sm">
          <input type="text" name="q" placeholder="Cari..." value="{{ request('q') }}"
                 class="flex-1 bg-transparent focus:outline-none px-2 text-gray-700">
          <button type="submit" class="bg-white text-gray-700 rounded-full p-2 hover:bg-gray-100">
            🔍
          </button>
        </form>
      </div>

      <!-- Right: Logo + Hamburger -->
      <div class="flex items-center space-x-3">
        <!-- Logo -->
        <div class="flex-shrink-0">
          <img src="{{ asset('umum/images/ICON-PLN.png') }}" alt="PLN Logo" class="h-10">
        </div>
        <!-- Mobile Hamburger -->
        <div class="md:hidden">
          <button id="menu-toggle" class="text-white focus:outline-none">
            ☰
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2 text-white font-semibold">
    <form method="get" action="{{ route('ai-news.index') }}" 
          class="flex items-center bg-white rounded-full shadow px-3 py-1 w-full">
      <input type="text" name="q" placeholder="Cari..." value="{{ request('q') }}"
             class="flex-1 bg-transparent focus:outline-none px-2 text-gray-700">
      <button type="submit" class="bg-white text-gray-700 rounded-full p-2 hover:bg-gray-100">
        🔍
      </button>
    </form>
  </div>
</header>

<script>
  document.getElementById('menu-toggle').addEventListener('click', function () {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>
