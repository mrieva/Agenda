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
    <x-preloader></x-preloader>
    <x-sidebarsekret></x-sidebarsekret>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- Welcome Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, {{ Auth::user()->name }}!
                    </h3>
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
                    <button onclick="window.location.href='{{ route('setsekret') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-sekret') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>

            </div>

            <!-- Dashboard Sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-4 mx-10">
                <!-- XII RPL1 Card -->
                <div id="section1" data-type="siswa"
                    class="flex items-center justify-center h-48 rounded-lg bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] p-4 cursor-pointer">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/kelas1.png') }}" alt="Icon" class="h-24 mb-4">
                        <p class="text-xl font-bold text-white">XII RPL1</p>
                    </div>
                </div>

                <!-- Guru Card -->
                <div id="section2" data-type="guru"
                    class="flex items-center justify-center h-48 rounded-lg bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] p-2 cursor-pointer">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/kelas2.png') }}" alt="Guru Icon" class="h-24 mb-4">
                        <p class="text-xl font-bold text-white">Guru</p>
                    </div>
                </div>
            </div>

            <!-- Task Announcements -->
            <div class="p-4 mx-6">
                <!-- Container for Button and Form -->
                <div id="communicationButton"
                    class="p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% cursor-pointer">
                    <img src="{{ asset('img/icon/chatlight.png') }}" alt="" class="h-8 mr-4">
                    <p class="text-white font-semibold">Silahkan Berkomunikasi</p>
                </div>

                <!-- Hidden Form with Animation -->
                <div id="communicationForm"
                    class="hidden mt-4 p-4 border-2 border-gray-200 rounded-lg bg-[#e6f5fc] dark:bg-gray-800 w-full opacity-0 transform scale-y-0 origin-top transition-all duration-500">
                    <textarea
                        class="w-full h-40 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                        placeholder="Write your message..."></textarea>
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex space-x-2">
                            <button
                                class="bg-gray-200 p-2 rounded hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500">
                                <i class='bx bx-italic'></i>
                            </button>
                            <button
                                class="bg-gray-200 p-2 rounded hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500">
                                <i class='bx bx-underline'></i>
                            </button>
                            <button
                                class="bg-gray-200 p-2 rounded hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500">
                                <i class='bx bx-list-ul'></i>
                            </button>
                            <button
                                class="bg-gray-200 p-2 rounded hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500">
                                <i class='bx bx-link'></i>
                            </button>
                        </div>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Posting
                        </button>
                    </div>
                </div>


                <span class="text-lg font-medium text-[#5E9EB2] ">Pengumuman Tugas
                    <p class="text-xs text-[#ffff] font-extralight"> 1 July 2024</p>
                </span>

                 <!-- Loop Through Tasks -->
            <a href="" class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
                <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4">
                <p class="text-white font-semibold"></p>
            </a>


            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div id="modal"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 text-white hidden">
        <div
            class="bg-[#5E9EB2]/50 backdrop-blur-sm rounded-lg shadow-lg p-6 w-2/3 sm:w-1/2 lg:w-1/3 border border-[#83a4ad]">
            <h3 id="modal-title" class="text-2xl font-semibold mb-6 text-center">Input Kehadiran</h3>
            <form action="{{ route('kehadiran.store') }}" method="POST" enctype="multipart/form-data"
                aria-labelledby="modal-title">
                @csrf
                <input type="hidden" id="role" name="role" value="">
                <!-- Input tersembunyi untuk role -->

                <div class="mb-4">
                    <label for="name" id="name-label" class="block text-sm font-semibold">Nama</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] text-gray-900"
                        placeholder="Masukkan nama siswa" required />
                </div>

                <div class="mb-4">
                    <label for="kehadiran" class="block text-sm font-semibold">Kehadiran</label>
                    <select id="kehadiran" name="kehadiran"
                        class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] text-gray-900"
                        required>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-semibold">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] text-gray-900"
                        placeholder="Tambahkan deskripsi (opsional)"></textarea>
                </div>

                <div class="mb-4">
                    <label for="lampiran" class="block text-sm font-semibold">Lampiran Surat</label>
                    <div class="mt-2">
                        <p id="file-name" class="text-gray-200 mb-2"></p> <!-- Nama file akan muncul di sini -->
                        <button type="button" id="upload-btn"
                            class="w-full px-4 py-2 bg-[#6CC6EC] text-white font-semibold rounded-lg hover:bg-[#4c8da3]">
                            Unggah File
                        </button>
                        <input type="file" id="lampiran" name="lampiran" class="hidden"
                            accept=".pdf,.jpg,.jpeg,.png" /> <!-- Input file hidden -->
                    </div>
                </div>

                <div class="flex justify-between">
                    <button type="button" id="close-modal"
                        class="px-6 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">Cancel</button>
                    <button type="submit"
                        class="px-6 py-2 bg-[#fff] text-[#6CC6EC] font-semibold rounded-lg hover:bg-[#4c8da3] hover:text-[#fff] focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">Input
                        </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        document.getElementById('section1').addEventListener('click', function() {
            document.getElementById('role').value = 'siswa'; // Set role ke siswa
            openModal();
        });

        document.getElementById('section2').addEventListener('click', function() {
            document.getElementById('role').value = 'guru'; // Set role ke guru
            openModal();
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            closeModal();
        });

        // Fungsi untuk membuka modal
        function openModal() {
            var modal = document.getElementById('modal');
            modal.classList.remove('hidden'); // Hapus class 'hidden' untuk membuka modal
            modal.classList.add('flex'); // Tambahkan class 'flex' untuk menampilkan modal
            modal.classList.remove('opacity-0', 'scale-y-0'); // Menampilkan modal dengan animasi
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            var modal = document.getElementById('modal');
            modal.classList.add('hidden'); // Tambahkan class 'hidden' untuk menutup modal
            modal.classList.remove('flex'); // Hapus class 'flex' agar tidak terlihat
            modal.classList.add('opacity-0', 'scale-y-0'); // Sembunyikan dengan animasi
        }

        // Event listener untuk membuka modal saat bagian "siswa" atau "guru" di klik
        document.getElementById('section1').addEventListener('click', function() {
            document.getElementById('role').value = 'siswa'; // Set role ke siswa
            openModal(); // Buka modal
        });

        document.getElementById('section2').addEventListener('click', function() {
            document.getElementById('role').value = 'guru'; // Set role ke guru
            openModal(); // Buka modal
        });

        // Event listener untuk menutup modal saat tombol close di klik
        document.getElementById('close-modal').addEventListener('click', function() {
            closeModal();
        });

        //komunikasi
        document.getElementById('communicationButton').addEventListener('click', function() {
            var form = document.getElementById('communicationForm');
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
                setTimeout(function() {
                    form.classList.remove('opacity-0', 'scale-y-0');
                }, 10);
            } else {
                form.classList.add('opacity-0', 'scale-y-0');
                setTimeout(function() {
                    form.classList.add('hidden');
                }, 500);
            }
        });
    </script>
    <script>
        // Ketika tombol upload diklik
        document.getElementById('upload-btn').addEventListener('click', function() {
            document.getElementById('lampiran').click(); // Memicu input file yang tersembunyi
        });

        // Menampilkan nama file setelah file diunggah
        document.getElementById('lampiran').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : '';
            document.getElementById('file-name').textContent = fileName; // Menampilkan nama file di atas tombol
        });
    </script>

</body>

</html>
