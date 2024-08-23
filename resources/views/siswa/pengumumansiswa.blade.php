<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64">

        <!-- Welcome Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
            <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Siswa Sekolah!</h3>
                <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Dolorem ipsum!</p>
            </div>

            <!-- Search and Profile -->
            <div class="flex items-center justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
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

                <button
                    class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 rounded-xl"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </button>

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
        <div class="p-6 rounded-lg bg-white shadow-md dark:bg-gray-800">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-[#5E9EB2]">Pengumuman Pengumpulan Tugas</h2>
                <span class="text-sm text-gray-500 dark:text-gray-400">9 Juni 2024</span>
            </div>
            <div class="text-sm text-gray-600 dark:text-gray-300">
                <p><strong>Format Pengumpulan:</strong></p>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>

                <p class="mt-4"><strong>Ketentuan Tugas:</strong></p>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>

                <p class="mt-4"><strong>Perubahan Batas Waktu Pengumpulan:</strong></p>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>

            <!-- Submission Section -->
            <div class="mt-4">
                <button
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 3.25a.75.75 0 01.75-.75h6.5a.75.75 0 01.75.75v12a.75.75 0 01-.75.75h-6.5A.75.75 0 0110 15.25v-4.75H6a.75.75 0 01-.75-.75V10H1.5a.75.75 0 010-1.5H5.25V6.75A.75.75 0 016 6h4V1.75a.75.75 0 01.75-.75H10zm1.5 8.25H15a.75.75 0 01.75.75v5.25H13a.75.75 0 01-.75-.75v-4.5zm-8.5 2.25v2.25h5.25v-5.25h-2.25V9.25H1.75v4.25z" />
                    </svg>
                    Tambah Akun Buat
                </button>
            </div>

            <!-- Comments Section -->
            <div class="mt-4 border-t border-gray-200 pt-4 dark:border-gray-700">
                <textarea
                    class="w-full px-4 py-2 text-gray-700 bg-gray-200 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                    rows="3" placeholder="Tambahkan komentar pribadi..."></textarea>
                <div class="flex justify-end mt-2">
                    <button
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600">
                        Kirim
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
