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
</head>

<body>
    <x-sidebarsekret></x-sidebarsekret>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- Welcome Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Sekretaris Sekolah!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ipsum!</p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <div class="flex items-center lg:justify-end xs:justify-center xss:justify-center h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form class="relative flex items-center">
                        <input type="text" placeholder="Search..." class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                        <i class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500'></i>
                    </form>

                    <!-- Profile Button -->
                    <button onclick="window.location.href='{{ route('setsekret') }}'" class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-sekret') }}'" class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>

            </div>

            <!-- Dashboard Sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-4 mx-10">
                <!-- XII RPL1 Card -->
                <div id="section1" data-type="siswa" class="flex items-center justify-center h-48 rounded-lg bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] p-4 cursor-pointer">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/kelas1.png') }}" alt="Icon" class="h-24 mb-4">
                        <p class="text-xl font-bold text-white">XII RPL1</p>
                    </div>
                </div>

                <!-- Guru Card -->
                <div id="section2" data-type="guru" class="flex items-center justify-center h-48 rounded-lg bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] p-2 cursor-pointer">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/kelas2.png') }}" alt="Guru Icon" class="h-24 mb-4">
                        <p class="text-xl font-bold text-white">Guru</p>
                    </div>
                </div>
            </div>

            <!-- Task Announcements -->
            <div class="p-4 mx-6">
                <div class=" p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% cursor-pointer" onclick="window.location.href='komunikasi-sekretaris'">
                    <img src="{{ asset('img/icon/chatlight.png') }}" alt="" class="h-8 mr-4 ">
                    <p class="text-white font-semibold">Silahkan Berkomunikasi</p>
                </div>
                <span class="text-lg font-medium text-[#5E9EB2] ">Pengumuman Tugas
                    <p class="text-xs text-[#ffff] font-extralight"> 1 July 2024</p>
                </span>
                <!-- Task A -->
                <a href="{{ route('annnsekret') }}" class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
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
                <a href="#" class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
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
    </div>
</div>

<!-- Modal -->
<div id="modal" class=" fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 text-[#000]">
    <div class="bg-[#5E9EB2]/50 backdrop-blur-sm rounded-lg shadow-lg p-6 w-2/3 sm:w-1/2 lg:w-1/3 border border-[#83a4ad]">
        <h3 id="modal-title" class="text-xl font-semibold mb-6 text-center">Input Kehadiran</h3>
        <form>
            <div class="mb-4">
                <label for="name" id="name-label" class="block text-sm font-semibold">Nama Siswa</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] text-[#000]" />
            </div>
            <div class="mb-4">
                <label for="kehadiran" class="block text-sm font-semibold">Kehadiran</label>
                <select id="kehadiran" name="kehadiran" class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-semibold">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]"></textarea>
            </div>
            <div class="mb-4">
                <label for="lampiran" class="block text-sm font-semibold">Lampiran Surat</label>
                <input type="file" id="lampiran" name="lampiran" class="rounded-xl w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] text[#000]" />
            </div>
            <div class="flex justify-between">
                <button type="button" id="close-modal" class="px-6 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-[#fff] text-[#6CC6EC] font-semibold rounded-lg hover:bg-[#4c8da3] hover:text-[#fff]">Input Kehadiran</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script>
    document.getElementById('section1').addEventListener('click', function() {
        openModal();
    });

    document.getElementById('section2').addEventListener('click', function() {
        openModal();
    });

    document.getElementById('close-modal').addEventListener('click', function() {
        closeModal();
    });

    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>

</body>

</html>
