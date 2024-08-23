<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <x-sidebar></x-sidebar>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Siswa Sekolah!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Dolorem ipsum!</p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <div class="flex items-center justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form class="relative">
                        <input type="text"
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]"
                            placeholder="search">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M18.25 10.5a7.75 7.75 0 11-15.5 0 7.75 7.75 0 0115.5 0z" />
                        </svg>
                    </form>

                    <!-- Profile Button -->
                    <button
                        class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 rounded-xl"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>

                    <!-- Notification Button -->
                    <button
                        class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.39-1.353-6.391-3.636-8.505A4.92 4.92 0 0012 2a4.92 4.92 0 00-2.364.495C7.353 4.609 6 7.61 6 11v3.159c0 .417-.162.822-.405 1.12L4 17h5m0 0a3 3 0 006 0m-6 0V18m0-1h6" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Announcement Section -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mx-10">
                <div class="text-center mb-4">
                    <h2 class="text-xl flex justify-start  font-bold text-gray-700 dark:text-gray-300">Pengumuman Pengumpulan Tugas</h2>
                    <p class="text-gray-500 flex justify-start  dark:text-gray-400">M.Zalfa Akran Nur Hidayatullah · 9 Juni 2024 · 100 Point</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Format Pengumpulan:</h3>
                    <p class="text-gray-600 dark:text-gray-400">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Ketentuan Tugas:</h3>
                    <p class="text-gray-600 dark:text-gray-400">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Perubahan Batas Waktu Pengumpulan:</h3>
                    <p class="text-gray-600 dark:text-gray-400">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
            <!-- Personal Comment Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-4 mx-10">
                <div class="bg-[#5E9EB2] p-2 rounded-lg">
                    <!-- Menggunakan flexbox untuk menempatkan dua teks di samping satu sama lain -->
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white dark:text-gray-300">Komentar Pribadi</h3>
                        <h3 class="text-lg font-semibold text-white dark:text-gray-300">Komentar Pribadi</h3>
                    </div>

                    <!-- Menggunakan flexbox untuk menempatkan dua tombol di samping satu sama lain -->
                    <div class="flex space-x-4 mt-6">
                        <button class="bg-[#ffffff] text-white font-medium w-1/2 py-2 px-6 rounded-lg h-12 shadow-md hover:bg-[#4b8795] transition duration-300">Agung</button>
                        <button class="bg-[#141313] text-white font-medium w-1/2 py-2 px-6 rounded-lg h-12 shadow-md hover:bg-[#4b8795] transition duration-300">Tambahan</button>
                    </div>
                </div>
                <div class="bg-[#5E9EB2] p-2 rounded-lg">
                    <h3 class="text-lg font-semibold text-white dark:text-gray-300">Komentar Pribadi</h3>
                    <textarea id="personal-comment-2" class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 mt-3 rounded-lg px-4 py-2 w-full h-24 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]" placeholder="Tambahkan komentar pribadi untuk saran dan ulasan"></textarea>
                </div>
            </div>



            <div class="flex justify-end items-center mt-4 mx-10">
                <button class="bg-[#5E9EB2] text-white font-medium py-2 px-6 rounded-lg shadow-md hover:bg-[#4b8795] transition duration-300">Tambah Atau Buat</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
