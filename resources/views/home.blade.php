<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="m-0 font-poppins bg-cover bg-center bg-no-repeat h-screen" style="background-image: url('{{ asset('img/bg.jpeg') }}');">
  <nav class="mt-7 z-50" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="ml-14" src="{{ asset('img/logo.png') }}" alt="EduNote Logo" width="90px">
          </div>
        </div>
        <div class="hidden md:flex items-center mr-14 space-x-4">
            <a href="/" class="text-gray-300 hover:border-white px-3 py-2 rounded-md font-medium">Home</a>
            <a href="/about" class="text-gray-300 hover:border-white px-3 py-2 rounded-md font-medium">About</a>
            <a href="/contact" class="text-gray-300 hover:border-white px-3 py-2 rounded-md font-medium">Contact</a>
          <div class="relative">
            <button type="button" @click="isOpen = !isOpen" class="border border-white bg-white text-blue-600 px-7 py-1.5 rounded-md text-sm font-medium transition-colors duration-300 ease-in-out hover:bg-transparent hover:text-gray-300">
                Login
              </button>
            <div x-show="isOpen"
                 x-transition:enter="transition ease-out duration-100 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <img src="{{ asset('img/headmaster.png') }}" alt="Kepala Sekolah" class="w-6 h-6 mr-2">
                Kepala Sekolah
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <img src="{{ asset('img/teacher.png') }}" alt="Guru" class="w-6 h-6 mr-2">
                Guru
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <img src="{{ asset('img/sekretarit.png') }}" alt="Sekretaris" class="w-6 h-6 mr-2">
                Sekretaris
              </a>
              <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <img src="{{ asset('img/student.png') }}" alt="Siswa" class="w-6 h-6 mr-2">
                Siswa
              </a>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
        <a href="/about" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About</a>
        <a href="/contact" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
      </div>
      <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
          </div>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Kepala Sekolah</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Guru</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sekretaris</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Siswa</a>
        </div>
      </div>
    </div>
  </nav>

  <main class="pt-20">
    <div class="relative flex items-center justify-center h-screen">
        <div class="absolute top-[135px] left-[113px] text-left p-5 bg-opacity-70">
            <h1 class="text-8xl text-[#ffffff] m-0 font-extrabold tracking-wide">EduNote.</h1>
            <p class="text-2xl text-[#ffffff] m-0">Indonesia Maju Dengan<br>Generasi Baru!</p>
            <a href="#" class="inline-block mt-5 px-10 py-2 text-blue-400 bg-white border-none rounded-md text-xl">Log in</a>
        </div>
        <div class="absolute ml-96 top-5 z-0">
            <img src="{{ asset('img/elipse.png') }}" alt="elipse" class="z-10 relative left-32 bottom-16" width="655">
            <img src="{{ asset('img/ketua.png') }}" alt="ketua" class="absolute z-20 top-[-10px] left-[255px]" width="465">
        </div>
    </div>
  </main>
</body>
</html>
