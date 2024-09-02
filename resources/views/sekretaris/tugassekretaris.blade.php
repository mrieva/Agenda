<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <x-sidebarsekret></x-sidebarsekret>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Sekretaris Sekolah!
                    </h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Dolorem ipsum!</p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <div
                    class="flex items-center lg:justify-end xs:justify-center xss:justify-center h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form class="relative flex items-center">
                        <input type="text" placeholder="Search..."
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500'></i>
                    </form>

                    <!-- Profile Button -->
                    <button onclick="window.location.href='{{ route('setsekret') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-sekret') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>

            </div>

            <!-- Filter Buttons -->
            <div class="flex items-center justify-start space-x-4 mb-6">
                <button
                    class="px-4 py-1 text-sm font-semibold text-white bg-[#5E9EB2] rounded-full border-4 border-[#fff]-opacity-60">Belum
                    Diserahkan</button>
                <button
                    class="px-4 py-1 text-sm font-semibold text-[#5E9EB2] rounded-full border-4 border-[#fff]-opacity-60"">Sudah
                    Diserahkan</button>
                <button
                    class="px-8 py-1 text-sm font-semibold text-[#5E9EB2] rounded-full border-4 border-[#fff]-opacity-60"">Seleksi</button>
            </div>

            <!-- Task A -->
            <a href="{{ route('annnsekret') }}"
                class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
                <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4 ">
                <p class="text-white font-semibold">Tugas A</p>
                <!-- Tombol titik tiga vertikal -->
                <button class="absolute top-1/2 right-4 transform -translate-y-1/2">
                    <div class="flex flex-col space-y-1">
                        <span class="block w-1 h-1 bg-white rounded-full"></span>
                        <span class="block w-1 h-1 bg-white rounded-full"></span>
                        <span class="block w-1 h-1 bg-white rounded-full"></span>
                    </div>
                </button>
            </a>

            <!-- Task B -->
            <a href="{{ route('annnsekret') }}"
                class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
                <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4">
                <p class="text-white font-semibold">Tugas B</p>
                <!-- Tombol titik tiga vertikal -->
                <button class="absolute top-1/2 right-4 transform -translate-y-1/2">
                    <div class="flex flex-col space-y-1">
                        <span class="block w-1 h-1 bg-white rounded-full"></span>
                        <span class="block w-1 h-1 bg-white rounded-full"></span>
                        <span class="block w-1 h-1 bg-white rounded-full"></span>
                    </div>
                </button>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
