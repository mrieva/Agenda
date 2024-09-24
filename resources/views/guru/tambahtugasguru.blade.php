<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guru</title>
    <!-- Flowbite CSS dan Boxicons -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <!-- Preloader dan Sidebar -->
    <x-preloader></x-preloader>
    <x-sidebarguru></x-sidebarguru>

    <!-- Container utama -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- Bagian atas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <div class="h-24 rounded bg-transparent dark:bg-gray-800 p-4">
                    <h3 class="text-xl sm:text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Buat Tugas untuk Siswa
                    </h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300"></p>
                </div>

                <!-- Pencarian, Profil, dan Notifikasi -->
                <div
                    class="flex items-center justify-center md:justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <form
                        class="relative flex items-center bg-[#5e9eb234] dark:bg-gray-700 rounded-lg w-8 h-8 md:w-auto md:h-auto">
                        <button type="submit" class="flex items-center justify-center w-full h-full md:hidden">
                            <i class='bx bx-search text-gray-600 dark:text-gray-300'></i>
                        </button>
                        <input type="text"
                            class="bg-transparent text-gray-600 dark:text-gray-300 rounded-lg px-9 py-2 hidden md:block"
                            placeholder="search">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500 hidden md:block'></i>
                    </form>

                    <button onclick="window.location.href='{{ route('settings-guru') }}'"
                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <button onclick="window.location.href='{{ route('notif-guru') }}'"
                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <!-- Form tambah tugas -->
            <div class="grid grid-cols-1 gap-16 mb-4 mx-4 sm:mx-10">
                <div class="relative flex flex-col p-6 rounded-xl bg-[#bfdbe2] border border-gray-200 shadow-lg">
                    <form action="{{ route('gurutugas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap sm:flex-nowrap space-x-0 sm:space-x-4 mb-4">

                            <!-- Pilih kelas -->
                            <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                                <label for="kelas" class="block text-gray-700 font-semibold mb-2">Untuk
                                    Kelas:</label>
                                <select id="kelas" name="kelas"
                                    class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full">
                                    <option value="">Pilih Kelas</option>
                                    <option value="X">Kelas X</option>
                                    <option value="XI">Kelas XI</option>
                                    <option value="XII">Kelas XII</option>
                                </select>
                            </div>


                            <!-- Jurusan -->
                            <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                                <label for="jurusan" class="block text-gray-700 font-semibold mb-2">Jurusan:</label>
                                <select id="jurusan" name="jurusan"
                                    class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full">
                                    <option value="">Pilih Jurusan</option>
                                    <option value="RPL 1">RPL 1</option>
                                    <option value="RPL 2">RPL 2</option>
                                    <option value="MM">MM</option>
                                    <option value="DKV 1">DKV 1</option>
                                    <option value="DKV 2">DKV 2</option>
                                    <option value="OTKP 1">OTKP 1</option>
                                    <option value="OTKP 2">OTKP 2</option>
                                    <option value="OTKP 3">OTKP 3</option>
                                    <option value="PM 1">PM 1</option>
                                    <option value="PM 2">PM 2</option>
                                    <option value="AKL 1">AKL 1</option>
                                    <option value="AKL 2">AKL 2</option>
                                    <option value="TBS 1">TBS 1</option>
                                    <option value="TBS 2">TBS 2</option>
                                    <!-- Tambahkan jurusan lain sesuai kebutuhan -->
                                </select>
                            </div>


                            <!-- Tengat -->
                            <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                                <label for="tengat" class="block text-gray-700 font-semibold mb-2">Tenggat:</label>
                                <input type="datetime-local" name="tengat" id="tengat"
                                    class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full">
                            </div>

                            <!-- Topik -->
                            <div class="w-full sm:w-1/2">
                                <label for="topik" class="block text-gray-700 font-semibold mb-2">Topik:</label>
                                <input type="text" id="topik" name="topik"
                                    class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full"
                                    placeholder="Masukkan topik">
                            </div>
                        </div>

                        <!-- Deskripsi tugas -->
                        <div class="mb-4">
                            <label for="deskripsi-tugas" class="block text-gray-700 font-semibold mb-2">Deskripsi
                                Tugas:</label>
                            <textarea id="deskripsi-tugas" name="deskripsi"
                                class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full h-32"
                                placeholder="Masukkan deskripsi tugas"></textarea>
                        </div>

                        <!-- Ketentuan tugas -->
                        <div class="mb-4">
                            <label for="ketentuan" class="block text-gray-700 font-semibold mb-2">Ketentuan
                                Tugas:</label>
                            <textarea id="ketentuan" name="ketentuan"
                                class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full h-32"
                                placeholder="Masukkan ketentuan tugas (misal: format file, batasan waktu, dll.)"></textarea>
                        </div>

                        <!-- Pilihan media -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Media Pembelajaran: </label>
                            <div class="flex items-center space-x-4 mb-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="media_type" value="file"
                                        class="form-radio text-[#5E9EB2]" checked>
                                    <span class="ml-2 text-gray-700">Upload File</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="media_type" value="url"
                                        class="form-radio text-[#5E9EB2]">
                                    <span class="ml-2 text-gray-700">Masukkan URL</span>
                                </label>
                            </div>

                            <!-- Upload file -->
                            <div id="file-input" class="mb-4 mt-8">
                                <input type="file" id="file" name="file" class="hidden">
                                <label for="file"
                                    class="bg-[#5E9EB2] text-white font-medium py-2 px-6 rounded-lg shadow-md hover:bg-[#4b8795] transition cursor-pointer">
                                    Pilih File
                                </label>
                                <span id="file-name" class="ml-4 text-gray-700"></span>
                            </div>

                            <!-- Input URL -->
                            <div id="url-input" class="mb-4 hidden">
                                <label for="url" class="block text-gray-700 font-semibold mb-2">Masukkan
                                    URL:</label>
                                <input type="url" id="url" name="url"
                                    class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 w-full"
                                    placeholder="Masukkan URL media pembelajaran">
                            </div>
                        </div>

                        <!-- Tombol submit -->
                        <button type="submit"
                            class="bg-[#5E9EB2] text-white font-medium py-2 px-6 rounded-lg shadow-md hover:bg-[#4b8795] transition">Kirim
                            Tugas</button>
                    </form>

                    <!-- Flash Message -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                            role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script>
        // JS untuk toggle antara file input dan URL input
        const fileInput = document.getElementById('file-input');
        const urlInput = document.getElementById('url-input');
        const mediaTypeInputs = document.querySelectorAll('input[name="media_type"]');

        mediaTypeInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.value === 'file') {
                    fileInput.classList.remove('hidden');
                    urlInput.classList.add('hidden');
                } else {
                    fileInput.classList.add('hidden');
                    urlInput.classList.remove('hidden');
                }
            });
        });

        // Menampilkan nama file yang dipilih
        const fileUpload = document.getElementById('file');
        const fileNameDisplay = document.getElementById('file-name');

        fileUpload.addEventListener('change', function() {
            fileNameDisplay.textContent = this.files[0].name;
        });
    </script>
    <!-- Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
