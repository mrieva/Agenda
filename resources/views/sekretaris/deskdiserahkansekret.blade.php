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
    <x-sidebarsekret></x-sidebarsekret>

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

        <div class="max-w-7xl mx-auto p-4">
            <!-- Header Section -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-4 dark:bg-gray-800 mx-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-semibold text-[#5E9EB2] dark:text-white">{{ $task->topik }}</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Diberikan oleh: <span
                                class="font-semibold">{{ $task->nama_guru }}</span></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Tenggat waktu:
                            {{ \Carbon\Carbon::parse($task->tengat)->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-6">
                <!-- Checking Section -->
                <div class="col-span-2 p-5 rounded-lg bg-white shadow-md dark:bg-gray-800 mb-6">
                    <h3 class="text-xl font-medium text-[#5E9EB2] dark:text-gray-300 mb-4">Status Pemeriksaan</h3>
                    <div class="text-sm text-gray-600 dark:text-gray-300">
                        <p class="mt-3 text-[15px] font-medium">Judul Pengumpulan: {{ $submittedTask->judul }}</p>
                        <p class="mt-3 text-[15px] font-medium">
                            Status Pemeriksaan:
                            <span
                                class="{{ $submittedTask->status === 'belum diperiksa' ? 'text-red-500' : 'text-green-500' }}">{{ $submittedTask->status }}</span>
                        </p>
                        <p class="mt-3 text-[15px] font-medium">Nilai:
                            <span
                                class="{{ $submittedTask->nilai >= 77 ? 'text-green-500' : 'text-red-500' }}">{{ $submittedTask->nilai }}</span>
                        </p>
                        <div class="mt-3">
                            <p class="text-[15px] font-medium">Media Pembelajaran:</p>
                            <form>
                                <div class="flex items-center mt-2">
                                    @if ($task->file)
                                        @php $fileName = basename($task->file); @endphp
                                        <input type="text" value="{{ $fileName }}"
                                            class="form-input border rounded p-2 mr-2" readonly>
                                        <a href="{{ asset('storage/tugas/' . $fileName) }}" class="text-blue-500"
                                            download>
                                            <i class='bx bx-download text-2xl'></i>
                                        </a>
                                    @elseif ($task->url)
                                        <input type="text" value="{{ $task->url }}"
                                            class="form-input border rounded p-2 mr-2" readonly>
                                        <a href="{{ $task->url }}" class="text-blue-500" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class='bx bx-link text-2xl'></i>
                                        </a>
                                    @else
                                        <span class="text-gray-500">Tidak ada media</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Task and Submission Status Section -->
                <div class="col-span-1">
                    <div class="bg-white p-4 rounded-lg shadow-lg dark:bg-gray-900 mb-4">
                        <h3 class="text-lg font-medium text-[#5E9EB2] dark:text-gray-300 mb-4">Status Pengumpulan Tugas
                        </h3>
                        @php
                            $tenggat = \Carbon\Carbon::parse($task->tengat);
                            $waktuDiserahkan = \Carbon\Carbon::parse($submittedTask->updated_at);
                        @endphp
                        <p class="text-gray-800 dark:text-gray-200">
                            @if ($waktuDiserahkan->greaterThan($tenggat))
                                <span class="text-red-500 font-bold">Terlambat</span> pada
                                {{ $waktuDiserahkan->format('d M Y, H:i') }}
                            @else
                                <span class="text-green-500 font-bold">Diserahkan</span> pada
                                {{ $waktuDiserahkan->format('d M Y, H:i') }}
                            @endif
                        </p>
                    </div>

                    <!-- Submitted Tasks Section -->
                    <div class="bg-white p-4 rounded-lg shadow-lg dark:bg-gray-900">
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">Pengumpulan Tugas</h3>
                        <form action="{{ route('cancelSubSekret', ['id' => $task->id]) }}" method="POST" class="mt-4" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan penyerahan tugas? Pembatalan tugas akan mereset status diperiksa dan nilai Anda')">
                            @csrf
                            @if ($submittedTask->siswa_file)
                        <div class="flex items-center space-x-4 mb-4">
                        <i class='bx bx-file text-2xl text-blue-500'></i>
                        <input type="text" value="{{ basename($submittedTask->siswa_file) }}"
                            class="form-input border rounded p-2 mr-2" readonly>
                        <a href="{{ asset('storage/' . basename($submittedTask->siswa_file)) }}" download>
                            <i class='bx bx-download text-blue-500 text-2xl'></i>
                        </a>
                    </div> @endif
                            @if ($submittedTask->siswa_url) <div class="flex items-center mb-4">
                        <i class='bx bx-link text-2xl text-green-500 mx-1'></i>
                        <input type="text" value="{{ $submittedTask->siswa_url }}"
                            class="form-input border rounded p-2 mr-2" readonly>
                        <a href="{{ $submittedTask->siswa_url }}" target="_blank"
                            rel="noopener noreferrer">
                            <i class='bx bx-link-external text-green-500 text-2xl'></i>
                        </a>
                    </div> @endif
                            <button type="submit"
                            class="py-2 bg-red-500 text-white rounded-lg hover:bg-red-400 focus:outline-none w-full">
                            <i class='bx bx-x-circle mr-2'></i> Batalkan Pengiriman
                            </button>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
