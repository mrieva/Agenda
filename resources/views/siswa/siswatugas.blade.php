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
    <x-sidebarsiswa></x-sidebarsiswa>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Siswa Sekolah!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <!-- Right Section (Search, Profile, Notifications) -->
                <div
                    class="flex items-center justify-center md:justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form
                        class="relative flex items-center bg-[#5e9eb234] dark:bg-gray-700 rounded-lg w-8 h-8 md:w-auto md:h-auto">
                        <!-- Search Icon in Mobile -->
                        <button type="submit" class="flex items-center justify-center w-full h-full md:hidden">
                            <i class='bx bx-search text-gray-600 dark:text-gray-300'></i>
                        </button>
                        <!-- Search Input in Desktop -->
                        <input type="text"
                            class="bg-transparent text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] hidden md:block"
                            placeholder="search">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500 hidden md:block'></i>
                    </form>

                    <!-- Profile Button -->
                    <button onclick="window.location.href='{{ route('settings-siswa') }}'"
                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-siswa') }}'"
                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap items-center justify-start space-x-2 mb-6 md:space-x-4">
                <button
                    class="px-2 py-1 text-xs md:text-sm font-semibold text-white bg-[#5E9EB2] rounded-full border-4 border-[#fff] opacity-60">
                    Belum Diserahkan
                </button>
                <button
                    class="px-2 py-1 text-xs md:text-sm font-semibold text-[#5E9EB2] rounded-full border-4 border-[#fff] opacity-60">
                    Sudah Diserahkan
                </button>
                <button
                    class="px-4 py-1 text-xs md:text-sm font-semibold text-[#5E9EB2] rounded-full border-4 border-[#fff] opacity-60">
                    Seleksi
                </button>
            </div>


            <!-- Modal -->
            <div x-data="{ open: false }">
                <!-- Task A -->
                <a href="{{ route('siswa-tugas') }}"
                    class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
                    <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4 ">
                    <p class="text-white font-semibold">Tugas A</p>
                    <!-- Tombol titik tiga vertikal -->
                    <button @click="open = true" class="absolute top-1/2 right-4 transform -translate-y-1/2">
                        <div class="flex flex-col space-y-1">
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                        </div>
                    </button>
                </a>

                <!-- Task B -->
                <a href="{{ route('siswa-tugas') }}"
                    class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
                    <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4">
                    <p class="text-white font-semibold">Tugas B</p>
                    <!-- Tombol titik tiga vertikal -->
                    <button @click="open = true" class="absolute top-1/2 right-4 transform -translate-y-1/2">
                        <div class="flex flex-col space-y-1">
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                        </div>
                    </button>
                </a>

                <!-- Modal Overlay -->
                <div x-show="open" @click.away="open = false"
                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg p-4 w-64">
                        <ul class="space-y-2">
                            <li><button class="w-full text-left px-4 py-2 text-blue-600 hover:bg-gray-200">Salin
                                    Link</button></li>
                            <li><button
                                    class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-200">Report</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <!-- Include Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
