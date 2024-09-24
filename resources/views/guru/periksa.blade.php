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
    <x-sidebarguru></x-sidebarguru>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64">

        <!-- Welcome Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
            <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, {{ Auth::user()->name }}!
                </h3>
                <p class="text-sm mt-2 text-[#83a4ad] dark:text-gray-300">Disini adalah detail pengumpulan tugas siswa
                    untuk anda periksa</p>
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

        <!-- Header Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-4 dark:bg-gray-800 mx-1">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-semibold text-[#5E9EB2] dark:text-white">{{ $tugas->judul }}</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Diberikan oleh: <span class="font-semibold">{{ $tugas->nama_siswa }}</span></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Tenggat waktu: </strong> {{ \Carbon\Carbon::parse($guruTugas->tengat)->format('d F Y, H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-1">
            <!-- Task Details Section -->
            <div class="col-span-2 p-6 rounded-lg bg-white shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300">Detail Tugas</h3>
                <p class="mt-4"><strong>Kelas: </strong>{{ $tugas->kelas_siswa }} {{ $tugas->jurusan_siswa }}</p>

                @php
                    $tenggat = \Carbon\Carbon::parse($guruTugas->tengat);
                    $waktuDiserahkan = \Carbon\Carbon::parse($tugas->updated_at);
                @endphp
                <p class="mt-4">
                    @if ($waktuDiserahkan->greaterThan($tenggat))
                        <span class="text-red-500 font-bold">Diserahkan Terlambat</span> <strong>pada</strong>
                        {{ $waktuDiserahkan->format('d M Y, H:i') }}
                    @else
                        <span class="text-green-500 font-bold">Diserahkan Tepat Waktu</span> <strong>pada</strong>
                        {{ $waktuDiserahkan->format('d M Y, H:i') }}
                    @endif
                </p>

                <!-- Task Media Section (File or URL) -->
                <div class="flex space-x-4 mt-4 items-center">
                    <p><strong>Media Tugas: </strong></p>

                    @if ($tugas->media_type == 'file' && $tugas->siswa_file)
                        <input type="text" value="{{ basename($tugas->siswa_file) }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-600 cursor-not-allowed"
                            readonly>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg"
                            onclick="previewFile('{{ asset('storage/' . $tugas->siswa_file) }}')">
                            Preview
                        </button>
                        <a href="{{ asset('storage/' . $tugas->siswa_file) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg ml-2" download>Download</a>
                    @elseif ($tugas->media_type == 'url' && $tugas->siswa_url)
                        <input type="text" value="{{ $tugas->siswa_url }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-600 cursor-not-allowed"
                            readonly>
                        <a href="{{ $tugas->siswa_url }}" class="bg-green-500 text-white px-4 py-2 rounded-lg"
                            target="_blank" rel="noopener noreferrer">
                            Kunjungi Link
                        </a>
                    @else
                        <span class="text-gray-500">Tidak ada media</span>
                    @endif
                </div>
            </div>

            <!-- Evaluation Section -->
            <div class="bg-white shadow-lg p-4 rounded-lg dark:bg-gray-900">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300">Penilaian</h3>

                <form action="{{ route('periksa.update', $tugas->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Input for Score -->
                    <div class="mt-2 space-y-2">
                        <label for="nilai" class="block text-gray-700 dark:text-gray-300">Nilai</label>
                        <input type="number" id="nilai" name="nilai" min="0" max="100"
                            class="border border-gray-300 rounded-lg px-4 py-2 w-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300"
                            required>
                    </div>

                    <!-- Status Update Button -->
                    <div class="mt-4 space-y-2">
                        <label class="block text-gray-700 dark:text-gray-300">Periksa Tugas</label>
                        <button type="submit"
                            class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 focus:outline-none">
                            Tandai Sudah Diperiksa
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Preview -->
        <div id="previewModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
            <div class="bg-white p-4 rounded-lg shadow-lg max-w-5xl w-full h-auto">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">File Preview</h3>
                    <button class="text-gray-600 hover:text-gray-800" id="closePreviewModal">&times;</button>
                </div>
                <div class="h-[80vh] overflow-auto">
                    <iframe id="filePreview" class="w-full h-full hidden"></iframe>
                    <pre id="codePreview" class="bg-gray-800 text-white p-4 rounded-lg overflow-auto hidden"></pre>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.js"></script>

    <script>
        // Script untuk handle preview file
        function previewFile(filePath) {
            const fileExtension = filePath.split('.').pop().toLowerCase();
            const previewModal = document.getElementById('previewModal');
            const filePreview = document.getElementById('filePreview');
            const codePreview = document.getElementById('codePreview');

            filePreview.src = '';
            filePreview.classList.add('hidden');
            codePreview.classList.add('hidden');

            if (fileExtension === 'pdf' || fileExtension === 'docx' || fileExtension === 'pptx') {
                filePreview.src = filePath;
                filePreview.classList.remove('hidden');
            } else if (['txt', 'html', 'css', 'js', 'php'].includes(fileExtension)) {
                fetch(filePath)
                    .then(response => response.text())
                    .then(data => {
                        codePreview.textContent = data;
                        codePreview.classList.remove('hidden');
                    });
            } else {
                alert('Preview tidak tersedia untuk format ini.');
            }

            previewModal.classList.remove('hidden');
        }

        document.getElementById('closePreviewModal').onclick = function () {
            document.getElementById('previewModal').classList.add('hidden');
        };
    </script>

</body>

</html>
