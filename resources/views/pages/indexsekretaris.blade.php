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

<body>
    <x-sidebar></x-sidebar>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- Welcome Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Sekretaris Sekolah!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ipsum!</p>
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

                    <button class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 rounded-xl"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>

                    <button class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.39-1.353-6.391-3.636-8.505A4.92 4.92 0 0012 2a4.92 4.92 0 00-2.364.495C7.353 4.609 6 7.61 6 11v3.159c0 .417-.162.822-.405 1.12L4 17h5m0 0a3 3 0 006 0m-6 0V18m0-1h6" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Dashboard Sections -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-4 mx-10">
    <!-- XII RPL1 Card -->
    <div data-type="siswa" onclick="openModal('siswa')" class="flex items-center justify-center h-48 rounded-lg bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] p-4 cursor-pointer">
        <div class="flex flex-col items-center">
            <img src="{{ asset('img/kelas1.png') }}" alt="Icon" class="h-24 mb-4">
            <p class="text-xl font-bold text-white">XII RPL1</p>
        </div>
    </div>

    <!-- Guru Card -->
    <div data-type="guru" onclick="openModal('guru')" class="flex items-center justify-center h-48 rounded-lg bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] p-2 cursor-pointer">
        <div class="flex flex-col items-center">
            <img src="{{ asset('img/kelas2.png') }}" alt="Guru Icon" class="h-24 mb-4">
            <p class="text-xl font-bold text-white">Guru</p>
        </div>
    </div>
</div>


            <!-- Task Announcements -->
            <div class="p-4 mx-6">
                <div class=" p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% cursor-pointer" onclick="window.location.href='#'">
                    <img src="{{ asset('img/icon/chatlight.png') }}" alt="" class="h-8 mr-4 ">
                    <p class="text-white font-semibold">Silahkan Berkomunikasi</p>
                </div>
                <span class="text-lg font-medium text-[#5E9EB2] ">Pengumuman Tugas
                    <p class="text-xs text-[#ffff] font-extralight"> 1 July 2024</p>
                </span>
                <div class=" p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70%">
                    <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4 ">
                    <p class="text-white font-semibold">Tugas A</p>
                </div>
                <div class=" p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70%">
                    <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4">
                    <p class="text-white font-semibold">Tugas B</p>
                </div>
            </div>
        </div>
    </div>


   <!-- Modal -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 text-[#000]">
    <div class="bg-[#5E9EB2]/50 backdrop-blur-sm rounded-lg shadow-lg p-6 w-2/3 sm:w-1/2 lg:w-1/3  border border-[#83a4ad]">
        <h3 id="modal-title" class="text-xl font-semibold mb-6 text-center">Input Kehadiran</h3>
        <form>
            <div class="mb-4">
                <label for="name" id="name-label" class="block text-sm font-semibold">Nama Siswa</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] text-[#000]"  />
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
                <label for="lampiran" class=" block text-sm font-semibold ">Lampiran Surat</label>
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
        function openModal(type) {
    const modalTitle = document.getElementById('modal-title');
    const nameLabel = document.getElementById('name-label');
    const nameInput = document.getElementById('name');

    if (type === 'guru') {
        modalTitle.textContent = 'Input Kehadiran Guru';
        nameLabel.textContent = 'Nama Guru';
        nameInput.placeholder = 'Masukkan nama guru';
    } else if (type === 'siswa') {
        modalTitle.textContent = 'Input Kehadiran Siswa';
        nameLabel.textContent = 'Nama Siswa';
        nameInput.placeholder = 'Masukkan nama siswa';
    }

    document.getElementById('modal').classList.remove('hidden');
}

document.getElementById('close-modal').addEventListener('click', function () {
    document.getElementById('modal').classList.add('hidden');
});

    </script>

</body>

</html>
