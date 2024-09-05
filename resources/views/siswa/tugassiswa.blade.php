<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        /* Dropdown Styles */
        #dropdownMenu {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        #dropdownMenu.show {
            display: block;
            opacity: 1;
            transform: scale(1);
        }

        /* Consistent icon sizes */
        .icon-button {
            width: 40px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
            background-color: rgba(94, 158, 178, 0.2); /* Adjusted for visibility */
            border-radius: 8px; /* Consistent rounded corners */
        }

        /* Custom button styles */
        .bg-custom {
            background-color: #5E9EB2; /* Warna tombol yang baru */
            transition: background-color 0.3s ease; /* Efek transisi yang halus */
        }

        .bg-custom:hover {
            background-color: #4BA6B0; /* Warna saat hover */
        }

        /* Responsive search input */
        .search-input {
            flex: 1; /* Take up available space */
            margin-right: 0.5rem; /* Space between input and button */
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <!-- Sidebar -->
    <x-sidebarsiswa></x-sidebarsiswa>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64">

        <!-- Welcome Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
            <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Siswa Sekolah!</h3>
                <p class="text-sm text-[#83a4ad] dark:text-gray-300"></p>
            </div>

            <!-- Right Section (Search, Profile, Notifications) -->
            <div class="flex items-center justify-center md:justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                <!-- Search Form -->
                <form class="relative flex items-center bg-[#5e9eb234] dark:bg-gray-700 rounded-lg w-8 h-8 md:w-auto md:h-auto">
                    <!-- Search Icon in Mobile -->
                    <button type="submit" class="flex items-center justify-center w-full h-full md:hidden">
                        <i class='bx bx-search text-gray-600 dark:text-gray-300'></i>
                    </button>
                    <!-- Search Input in Desktop -->
                    <input type="text" class="bg-transparent text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] hidden md:block" placeholder="search">
                    <i class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500 hidden md:block'></i>
                </form>

                <!-- Profile Button -->
                <button onclick="window.location.href='{{ route('settings-siswa') }}'" class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                    <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                </button>

                <!-- Notification Button -->
                <button onclick="window.location.href='{{ route('notif-siswa') }}'" class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                    <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
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
        </div>

        <!-- Task and Comment Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
            <!-- Task Section -->
            <div class="col-span-1 bg-gray-100 p-4 rounded-lg dark:bg-gray-900">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300">Tugas</h3>
                <div class="flex flex-col space-y-2 mt-2">
                    <!-- Dropdown Button -->
                    <div class="relative inline-block text-left w-full">
                        <button type="button" class="flex items-center justify-center px-4 py-2 bg-custom text-white rounded-lg focus:outline-none w-full" id="dropdownButton">
                            <i class='bx bx-plus mr-2'></i> Tambah Atau Buat
                        </button>
                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg shadow-lg">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-300">
                                <li><a href="#googleDrive" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Google Drive</a></li>
                                <li><a href="#link" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Link</a></li>
                                <li><a href="#uploadFile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Upload File</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tandai Sudah Selesai Button -->
                    <button class="flex items-center justify-center px-4 py-2 bg-custom text-white rounded-lg focus:outline-none w-full">Tandai Sudah Selesai</button>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="col-span-1 bg-gray-100 p-4 rounded-lg dark:bg-gray-900">
                <textarea class="w-full px-4 py-2 text-gray-700 bg-gray-200 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" rows="3" placeholder="Tambahkan komentar pribadi..."></textarea>
                <div class="flex justify-end mt-2">
                    <button class="w-full px-4 py-2 text-sm font-medium text-white bg-custom rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        // Dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('show');
            });

            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>
