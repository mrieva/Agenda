<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Table Tugas</title>
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
                <div class="flex flex-col justify-center h-24 rounded bg-transparent dark:bg-gray-800 p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back,
                        {{ Auth::user()->name }}!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300"></p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <div
                    class="flex items-center justify-center md:justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <form
                        class="relative flex items-center bg-[#5e9eb234] dark:bg-gray-700 rounded-lg w-8 h-8 md:w-auto md:h-auto">
                        <input type="text"
                            class="bg-transparent text-gray-600 dark:text-gray-300 rounded-lg px-8 py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] hidden md:block"
                            placeholder="search">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500 hidden md:block'></i>
                    </form>

                    <!-- Profile Button -->
                    <button onclick="window.location.href='{{ route('settings-guru') }}'"
                        class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-guru') }}'"
                        class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <!-- Buttons and Dropdown aligned horizontally -->
            <div class="flex flex-col sm:flex-row items-center mx-4 sm:mx-10 mb-6">
                <div
                    class="flex flex-col sm:flex-row items-center sm:space-x-4 w-full sm:w-auto space-y-2 sm:space-y-0 mb-4 sm:mb-0">
                    <button id="belumDiperiksaBtn"
                        class="bg-[#5E9EB2] text-white px-4 py-2 rounded-lg shadow-lg w-full sm:w-auto text-center active">Belum
                        Diperiksa</button>
                    <button id="sudahDiperiksaBtn"
                        class="bg-white text-[#5E9EB2] px-4 py-2 rounded-lg shadow-lg w-full sm:w-auto text-center">Sudah
                        Diperiksa</button>
                </div>
            </div>

            <!-- Table for Belum Diperiksa -->
            <div id="belumDiperiksaTable" class="overflow-x-auto relative shadow-md sm:rounded-lg mx-4 sm:mx-10">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Nama</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Kelas</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Judul Tugas</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Status</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($belumDiperiksa as $tugas)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-4 sm:px-6 sm:py-4">{{ $tugas->nama_siswa }}</td>
                                <td class="px-4 py-4 sm:px-6 sm:py-4">{{ $tugas->kelas_siswa }}
                                    {{ $tugas->jurusan_siswa }}</td>
                                <td class="px-4 py-4 sm:px-6 sm:py-4">{{ $tugas->judul }}</td>
                                <td class="px-4 py-4 sm:px-6 sm:py-4">{{ $tugas->status }}</td>
                                <td class="px-4 py-4 sm:px-6 sm:py-4">
                                    <button class="bg-[#5E9EB2] text-white px-4 py-2 rounded-lg"
                                        onclick="window.location.href='{{ route('periksa', $tugas->id) }}'">Periksa
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Table for Sudah Diperiksa -->
            <div id="sudahDiperiksaTable" class="overflow-x-auto relative shadow-md sm:rounded-lg mx-4 sm:mx-10 hidden">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Nama</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Kelas</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Judul Tugas</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Nilai</th>
                            <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sudahDiperiksa as $tugas)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-4 sm:px-6 sm:py-4">{{ $tugas->nama_siswa }}</td>
                                <td class="px-4 py-4 sm:px-6 sm:py-4">{{ $tugas->kelas_siswa }}
                                    {{ $tugas->jurusan_siswa }}</td>
                                <td class="px-4 py-4 sm:px-6 sm:py-4">{{ $tugas->judul }}</td>
                                <td class="px-4 py-4 sm:px-6 sm:py-4">{{ $tugas->nilai }}</td>
                                <td class="px-4 py-4 sm:px-6 sm:py-4">
                                    <button class="bg-[#5E9EB2] text-white px-4 py-2 rounded-lg"
                                    onclick="window.location.href='{{ Route('previewTugas.show', $tugas->id) }}'">Lihat
                                </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <script>
        belumDiperiksaBtn.addEventListener('click', () => {
            belumDiperiksaTable.classList.remove('hidden');
            sudahDiperiksaTable.classList.add('hidden');

            // Aktifkan tombol belum diperiksa
            belumDiperiksaBtn.classList.add('bg-[#5E9EB2]', 'text-white');
            belumDiperiksaBtn.classList.remove('bg-white', 'text-[#5E9EB2]');

            // Nonaktifkan tombol sudah diperiksa
            sudahDiperiksaBtn.classList.add('bg-white', 'text-[#5E9EB2]');
            sudahDiperiksaBtn.classList.remove('bg-[#5E9EB2]', 'text-white');
        });

        sudahDiperiksaBtn.addEventListener('click', () => {
            sudahDiperiksaTable.classList.remove('hidden');
            belumDiperiksaTable.classList.add('hidden');

            // Aktifkan tombol sudah diperiksa
            sudahDiperiksaBtn.classList.add('bg-[#5E9EB2]', 'text-white');
            sudahDiperiksaBtn.classList.remove('bg-white', 'text-[#5E9EB2]');

            // Nonaktifkan tombol belum diperiksa
            belumDiperiksaBtn.classList.add('bg-white', 'text-[#5E9EB2]');
            belumDiperiksaBtn.classList.remove('bg-[#5E9EB2]', 'text-white');
        });

        function openModal(id, nilai, status) {
            document.getElementById('tugasId').value = id;
            document.getElementById('nilai').value = nilai;
            document.getElementById('status').value = status;
            document.getElementById('modalLihat').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalLihat').classList.add('hidden');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
