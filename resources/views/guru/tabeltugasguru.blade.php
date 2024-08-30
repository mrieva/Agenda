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
    <x-sidebarguru></x-sidebarguru>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text- [#5E9EB2] dark:text-gray-500">Welcome Back, Guru Sekolah!</h3>
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
                    <button onclick="window.location.href='{{ route('settings-guru') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-guru') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <!-- Buttons and Dropdown aligned horizontally -->
            <div class="flex items-center mx-10 mb-6">
                <div class="flex items-center space-x-4 flex-grow">
                    <button id="belumDiperiksaBtn" class="bg-[#5E9EB2] text-white px-4 py-2 rounded-lg shadow-lg">Belum
                        Diperiksa</button>
                    <button id="sudahDiperiksaBtn" class="bg-white text-[#5E9EB2] px-4 py-2 rounded-lg shadow-lg">Sudah
                        Diperiksa</button>
                </div>
                <select id="kelas"
                    class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-3 py-1.5 text-sm ml-auto focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                    <option>Pilih Kelas</option>
                    <option>Kelas 1</option>
                    <option>Kelas 2</option>
                    <option>Kelas 3</option>
                </select>
            </div>

            <!-- Table for Belum Diperiksa -->
            <div id="belumDiperiksaTable" class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Kelas</th>
                            <th scope="col" class="px-6 py-3">Tugas</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">Budi Santoso</td>
                            <td class="px-6 py-4">XI DKV 1</td>
                            <td class="px-6 py-4">Matematika - Latihan Soal 1</td>
                            <td class="px-6 py-4">Belom Diperiksa</td>
                            <td class="px-6 py-4">
                                <button class="bg-[#5E9EB2] text-white px-4 py-2 rounded-lg">Konfirmasi</button>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">Siti Aminah</td>
                            <td class="px-6 py-4">XI DKV 1</td>
                            <td class="px-6 py-4">Bahasa Inggris - Latihan Soal 2</td>
                            <td class="px-6 py-4">Belom Diperiksa</td>
                            <td class="px-6 py-4">
                                <button class="bg-[#5E9EB2] text-white px-4 py-2 rounded-lg">Konfirmasi</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table for Sudah Diperiksa -->
            <div id="sudahDiperiksaTable" class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10 hidden">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Kelas</th>
                            <th scope="col" class="px-6 py-3">Tugas</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data untuk tabel Sudah Diperiksa -->
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">Joko Widodo</td>
                            <td class="px-6 py-4">XI DKV 2</td>
                            <td class="px-6 py-4">Fisika - Latihan Soal 3</td>
                            <td class="px-6 py-4">Sudah Diperiksa</td>
                            <td class="px-6 py-4">
                                <button class="bg-[#5E9EB2] text-white px-4 py-2 rounded-lg">Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('belumDiperiksaBtn').addEventListener('click', function() {
            document.getElementById('belumDiperiksaTable').style.display = 'block';
            document.getElementById('sudahDiperiksaTable').style.display = 'none';
            this.classList.add('bg-[#5E9EB2]');
            this.classList.remove('text-white');
            document.getElementById('sudahDiperiksaBtn').classList.remove('bg-[#5E9EB2]');
            document.getElementById('sudahDiperiksaBtn').classList.add('text-[#5E9EB2]');
        });

        document.getElementById('sudahDiperiksaBtn').addEventListener('click', function() {
            document.getElementById('belumDiperiksaTable').style.display = 'none';
            document.getElementById('sudahDiperiksaTable').style.display = 'block';
            this.classList.add('bg-[#5E9EB2]');
            this.classList.remove('text-[#5E9EB2]');
            document.getElementById('belumDiperiksaBtn').classList.remove('bg-[#5E9EB2]');
            document.getElementById('belumDiperiksaBtn').classList.add('text-[#5E9EB2]');
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
