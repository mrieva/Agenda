<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <x-preloader></x-preloader>

    <!-- Sidebar -->
    <x-sidebarsekret></x-sidebarsekret>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64">

        <!-- Welcome Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
            <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Sekretaris Sekolah!</h3>
                <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ipsum!</p>
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
              <button
                  onclick="window.location.href='{{ route('setsekret') }}'"
                  class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                  <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
              </button>

              <!-- Notification Button -->
              <button
                  onclick="window.location.href='{{ route('notif-sekret') }}'"
                  class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
<!-- Task Section -->
<div class="col-span-1 bg-gray-100 p-4 rounded-lg dark:bg-gray-900">
    <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300">Tugas</h3>
    <div class="mt-2 space-y-2">

        <!-- Button to Open Link Modal -->
        <button id="openLinkModal" class="flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-400 focus:outline-none w-full">
            <i class='bx bx-link mr-2'></i> Tambahkan Link
        </button>

        <!-- Button to Open File Modal -->
        <button id="openFileModal" class="flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-400 focus:outline-none w-full">
            <i class='bx bx-file mr-2'></i> Tambahkan File
        </button>

    </div>
</div>

<!-- Modal untuk Input Link -->
<div id="linkModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg dark:bg-gray-700">
        <h3 class="text-xl font-bold mb-4 text-gray-700 dark:text-gray-300">Tambahkan Link</h3>
        <form action="{{ route('submit.link') }}" method="POST">
            @csrf
            <input type="text" name="judul" placeholder="Judul Tugas" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 mb-2">
            <input type="text" name="link" placeholder="Link" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500" required>
            <div class="flex justify-end mt-4">
                <button type="button" id="closeLinkModal" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-400 mr-2">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">Tambahkan Link</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk Input File -->
<div id="fileModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg dark:bg-gray-700">
        <h3 class="text-xl font-bold mb-4 text-gray-700 dark:text-gray-300">Tambahkan File</h3>
        <form action="{{ route('submit.file') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="judul" placeholder="Judul Tugas" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 mb-2">
            <label for="fileInput" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer w-full">
                <i class='bx bx-file mr-2'></i> Pilih File
            </label>
            <input type="file" id="fileInput" name="file" class="hidden">
            <div class="flex justify-end mt-4">
                <button type="button" id="closeFileModal" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-400 mr-2">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500">Tambahkan File</button>
            </div>
        </form>
    </div>
</div>


            <!-- Comments Section -->
            <div class="col-span-2 bg-gray-100 p-4 rounded-lg dark:bg-gray-900">
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
    <script>
       // Link Modal
const openLinkModal = document.getElementById('openLinkModal');
const closeLinkModal = document.getElementById('closeLinkModal');
const linkModal = document.getElementById('linkModal');

openLinkModal.addEventListener('click', () => {
    linkModal.classList.remove('hidden');
});

closeLinkModal.addEventListener('click', () => {
    linkModal.classList.add('hidden');
});

// File Modal
const openFileModal = document.getElementById('openFileModal');
const closeFileModal = document.getElementById('closeFileModal');
const fileModal = document.getElementById('fileModal');

openFileModal.addEventListener('click', () => {
    fileModal.classList.remove('hidden');
});

closeFileModal.addEventListener('click', () => {
    fileModal.classList.add('hidden');
});

    </script>


    @if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

</body>

</html>
