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
    <x-preloader></x-preloader>
    <x-sidebarguru></x-sidebarguru>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-4 md:mx-10">
                <!-- Left Section (Welcome Text) -->
                <div class="flex flex-col justify-center items-start h-24 rounded bg-transparent dark:bg-gray-800 p-4">
                    <h3 class="text-xl md:text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Siswa Sekolah!</h3>
                    <p class="text-xs md:text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ipsum!</p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <div class="flex items-center justify-between md:justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-2 md:space-x-4">
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
                    <button onclick="window.location.href='{{ route('settings-guru') }}'" class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-guru') }}'" class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <!-- Banner Section -->
            <div class="grid grid-cols-1 gap-4 mb-4 mx-4 md:mx-10">
                <div class="relative flex items-center justify-center h-64 rounded-xl bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('img/background-banner.png') }}')">
                    <!-- Tombol Sesuaikan di kanan atas -->
                    <button class="absolute top-2 right-2 bg-[#5E9EB2] text-white font-medium py-1 px-3 rounded-lg shadow-md flex items-center space-x-2">
                        <img src="{{ asset('img/icon/Pencil.png') }}" alt="" class="w-4 h-4">
                        <span>Sesuaikan</span>
                    </button>

                    <!-- Tombol Tambah Tugas -->
                    <button onclick="window.location.href='{{ route('tambahtugas') }}'" class="absolute bottom-4 left-4 md:left-7 bg-[#5E9EB2] text-white font-medium py-1 px-3 rounded-lg shadow-md flex items-center space-x-2">
                        <span>Tambahkan Tugas</span>
                    </button>
                </div>
            </div>

            <!-- Form Tambah Tugas -->
            <div class="grid grid-cols-1 gap-4 mb-4 mx-4 md:mx-10">
                <div class="relative flex flex-col p-6 rounded-xl bg-[#bfdbe2] border border-gray-200 shadow-lg">
                    <!-- Pilihan untuk Kelas dan Mata Pelajaran -->
                    <div class="flex flex-col md:flex-row md:space-x-4 mb-4">
                        <div class="w-full md:w-1/2">
                            <label for="kelas" class="block text-gray-700 font-semibold mb-2">Untuk Kelas:</label>
                            <select id="kelas" class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                                <option>Pilih Kelas</option>
                                <option>Kelas 1</option>
                                <option>Kelas 2</option>
                                <option>Kelas 3</option>
                            </select>
                        </div>

                        <div class="w-full md:w-1/2 mt-4 md:mt-0">
                            <label for="mapel" class="block text-gray-700 font-semibold mb-2">Mata Pelajaran:</label>
                            <select id="mapel" class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                                <option>Pilih Mata Pelajaran</option>
                                <option>Matematika</option>
                                <option>Bahasa Indonesia</option>
                                <option>Ilmu Pengetahuan Alam</option>
                            </select>
                        </div>
                    </div>

                    <!-- Input Deskripsi Tugas -->
                    <div class="mb-4">
                        <label for="deskripsi-tugas" class="block text-gray-700 font-semibold mb-2">Deskripsi Tugas:</label>
                        <textarea id="deskripsi-tugas" class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full h-32 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]" placeholder="Masukkan deskripsi tugas"></textarea>
                    </div>

                    <!-- Tombol Upload -->
                    <div class="flex justify-start space-x-4 mb-4">
                        <button class="flex items-center justify-center w-10 h-10 bg-white border-2 border-black rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                            <img src="{{ asset('img/icon/Google drive.png') }}" alt="">
                        </button>
                        <button class="flex items-center justify-center w-10 h-10 bg-white border-2 border-black rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                            <img src="{{ asset('img/icon/Youtube.png') }}" alt="">
                        </button>
                        <button class="flex items-center justify-center w-10 h-10 bg-white border-2 border-black rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                            <img src="{{ asset('img/icon/Upload.png') }}" alt="">
                        </button>
                        <button class="flex items-center justify-center w-10 h-10 bg-white border-2 border-black rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                            <img src="{{ asset('img/icon/Link.png') }}" alt="">
                        </button>
                    </div>

                    <!-- Tombol Posting -->
                    <div class="flex justify-end">
                        <button class="bg-[#5E9EB2] text-white font-medium py-2 px-6 rounded-lg shadow-md hover:bg-[#4b8795] transition duration-300">Posting</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
