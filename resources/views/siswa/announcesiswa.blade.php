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

<body class="bg-gray-50 dark:bg-gray-900">

    <!-- Sidebar -->
    <x-sidebarsiswa class="z-40"></x-sidebarsiswa>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64">

        <!-- Welcome Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
            <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, {{ Auth::user()->name }}
                </h3>
                <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Dolorem ipsum!</p>
            </div>

            <!-- Right Section (Search, Profile, Notifications) -->
            <div class="flex items-center lg:justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                <!-- Search Form -->
                <form class="relative flex items-center">
                    <input type="text" placeholder="Search..."
                        class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                    <i
                        class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500'></i>
                </form>

                <!-- Profile Button -->
                <button onclick="window.location.href='{{ route('setsekret') }}'"
                    class="flex items-center justify-center lg:w-10 lg:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                    <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                </button>

                <!-- Notification Button -->
                <button onclick="window.location.href='{{ route('notif-sekret') }}'"
                    class="flex items-center justify-center lg:w-10 lg:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                    <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                </button>
            </div>
        </div>

        <!-- Announcement Section -->
        <div class="max-w-7xl mx-auto p-4">
            <!-- Header Section -->
            <div class="bg-white shadow-md rounded-lg p-6 flex justify-between items-center dark:bg-gray-800">
                <div>
                    <h1 class="text-2xl font-semibold text-[#5E9EB2] dark:text-white">{{ $task->topik }}</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Diberikan oleh: <span
                            class="font-semibold">{{ $task->nama_guru }}</span></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-300">
                        Tenggat waktu: {{ \Carbon\Carbon::parse($task->tengat)->format('d F Y, H:i') }}
                    </p>
                </div>
            </div>

            <!-- Main Content -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Task Detail Section -->
                <div class="col-span-2 bg-white shadow-md space-y-4 rounded-lg p-6 dark:bg-gray-800">
                    <h2 class="text-lg font-semibold text-[#5E9EB2] dark:text-white">Deskripsi Tugas</h2>
                    <p class="text-gray-600 dark:text-gray-300">{{ $task->deskripsi }}</p>
                    <h2 class="text-lg font-semibold text-[#5E9EB2] dark:text-white">Ketentuan Tugas</h2>
                    <p class="text-gray-600 dark:text-gray-300">{{ $task->ketentuan }}</p>
                </div>

                <!-- Media Pembelajaran + Submission Section -->
                <div class="col-span-1 space-y-6">
                    <!-- Media Pembelajaran -->
                    <div class="bg-white shadow-md rounded-lg p-6 dark:bg-gray-800">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Media Pembelajaran</h3>
                        <div class="mt-4">
                            @if ($task->file)
                                <input type="text" readonly value="{{ basename($task->file) }}"
                                    class="w-full bg-gray-100 text-gray-700 px-3 py-2 rounded-lg dark:bg-gray-700 dark:text-gray-300">
                                <div class="flex items-center space-x-2 mt-2">
                                    <button onclick="openPreviewModal('{{ asset('storage/' . $task->file) }}')"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-400">
                                        Preview
                                    </button>
                                    <a href="{{ asset('storage/' . $task->file) }}" download
                                        class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400">
                                        Download
                                    </a>
                                </div>
                            @elseif($task->url)
                                <input type="text" readonly value="{{ parse_url($task->url, PHP_URL_HOST) }}"
                                    class="w-full bg-gray-100 text-gray-700 px-3 py-2 rounded-lg dark:bg-gray-700 dark:text-gray-300">
                                <button type="button" onclick="window.open('{{ $task->url }}', '_blank')"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-400 mt-2">
                                    Kunjungi
                                </button>
                            @else
                                <p class="text-gray-500 dark:text-gray-300">Tidak ada media pembelajaran tersedia.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Submission Section -->
                    <div class="bg-white shadow-md rounded-lg p-6 dark:bg-gray-800">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pengumpulan Tugas</h3>
                        <div class="mt-4 space-y-4">
                            <button id="openLinkModal" data-task-id="{{ $task->id }}"
                                class="flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-400 w-full">
                                <i class='bx bx-link mr-2'></i> Tambahkan Link
                            </button>

                            @if ($task->is_closed)
                                <p class="text-red-500 text-sm">Tugas ini sudah ditutup, tenggat waktu:
                                    {{ \Carbon\Carbon::parse($task->tengat)->format('d F Y H:i') }}</p>
                            @else
                                <button id="openFileModal" data-task-id="{{ $task->id }}"
                                    class="flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-400 w-full">
                                    <i class='bx bx-file mr-2'></i> Tambahkan File
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for File Preview -->
            <div id="previewModal"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                <div class="bg-white p-6 rounded-lg dark:bg-gray-700 max-w-7xl mx-auto">
                    <h3 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-300">Preview File</h3>
                    <iframe id="filePreview" src="" width="1000vh" height="450vh"
                        class="border rounded-lg"></iframe>
                    <div class="flex justify-end mt-4">
                        <button id="closePreviewModal"
                            class="px-4 py-2 bg-gray-500 text-white rounded-lg">Tutup</button>
                    </div>
                </div>
            </div>

            <!-- Modal for Link Submission -->
            <div id="linkModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <form action="{{ route('submit.tugas') }}" method="POST"
                    class="bg-white p-6 rounded-lg dark:bg-gray-700">
                    @csrf
                    <input type="hidden" name="media_type" value="url">
                    <input type="hidden" name="id" id="linkTaskId">
                    <h3 class="text-xl font-bold mb-4 text-gray-700 dark:text-gray-300">Tambahkan Link</h3>
                    <input type="text" name="judul" placeholder="Judul Tugas" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 mb-2">
                    <input type="url" name="siswa_url" placeholder="URL" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 mb-4">
                    <div class="flex justify-end mt-4">
                        <button type="button" id="closeLinkModal"
                            class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-400">Kirim</button>
                    </div>
                </form>
            </div>

            <!-- Modal for File Submission -->
            <div id="fileModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <form action="{{ route('submit.tugas') }}" method="POST" enctype="multipart/form-data"
                    class="bg-white p-6 rounded-lg dark:bg-gray-700">
                    @csrf
                    <input type="hidden" name="media_type" value="file">
                    <input type="hidden" name="id" id="fileTaskId">
                    <h3 class="text-xl font-bold mb-4 text-gray-700 dark:text-gray-300">Tambahkan File</h3>
                    <input type="text" name="judul" placeholder="Judul Tugas" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 mb-2 w-[400px]">
                    <div class="mt-2">
                        <label for="fileInput"
                            class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer w-full">
                            <i class='bx bx-file mr-2'></i> <span id="file-name">Pilih File</span>
                        </label>
                        <input type="file" id="fileInput" name="siswa_file" required class="hidden"
                            onchange="document.getElementById('file-name').textContent = this.files[0] ? this.files[0].name : 'Pilih File'">
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" id="closeFileModal"
                            class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-400">Kirim</button>
                    </div>
                </form>
                @if ($errors->any())
                    <script>
                        window.alert("{{ implode("\\n", $errors->all()) }}")
                    </script>
                @endif
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        const linkModal = document.getElementById('linkModal');
        const fileModal = document.getElementById('fileModal');
        const previewModal = document.getElementById('previewModal');
        const filePreview = document.getElementById('filePreview');
        const openLinkModal = document.getElementById('openLinkModal');
        const openFileModal = document.getElementById('openFileModal');
        const closeLinkModal = document.getElementById('closeLinkModal');
        const closeFileModal = document.getElementById('closeFileModal');
        const closePreviewModal = document.getElementById('closePreviewModal');

        openLinkModal.addEventListener('click', function() {
            const taskId = this.getAttribute('data-task-id');
            document.getElementById('linkTaskId').value = taskId; // Set task ID for link submission
            linkModal.classList.remove('hidden');
        });

        openFileModal.addEventListener('click', function() {
            const taskId = this.getAttribute('data-task-id');
            document.getElementById('fileTaskId').value = taskId; // Set task ID for file submission
            fileModal.classList.remove('hidden');
        });

        closeLinkModal.addEventListener('click', function() {
            linkModal.classList.add('hidden');
        });

        closeFileModal.addEventListener('click', function() {
            fileModal.classList.add('hidden');
        });

        closePreviewModal.addEventListener('click', function() {
            previewModal.classList.add('hidden');
        });

        window.addEventListener('click', function(event) {
            if (event.target === linkModal) {
                linkModal.classList.add('hidden');
            }
            if (event.target === fileModal) {
                fileModal.classList.add('hidden');
            }
            if (event.target === previewModal) {
                previewModal.classList.add('hidden');
            }
        });

        function openPreviewModal(fileUrl) {
            filePreview.src = fileUrl;
            previewModal.classList.remove('hidden');
        }

        // Debugging for form submission
        document.querySelector('#linkModal form').addEventListener('submit', function(event) {
            const taskId = document.getElementById('linkTaskId').value;
            console.log("Submitting link with Task ID:", taskId);
        });

        document.querySelector('#fileModal form').addEventListener('submit', function(event) {
            const taskId = document.getElementById('fileTaskId').value;
            console.log("Submitting file with Task ID:", taskId);
        });
    </script>

</body>

</html>
