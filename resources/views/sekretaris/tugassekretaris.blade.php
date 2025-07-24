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
    <x-preloader></x-preloader>
    <x-sidebarsekret></x-sidebarsekret>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back,
                        {{ Auth::user()->name }}!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Berikut adalah daftar tugas anda</p>
                </div>
                <div
                    class="flex items-center lg:justify-end xs:justify-center h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <form class="relative flex items-center">
                        <input type="text" placeholder="Search..."
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500'></i>
                    </form>
                    <button onclick="window.location.href='{{ route('setsekret') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>
                    <button onclick="window.location.href='{{ route('notif-sekret') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="flex items-center justify-start space-x-4 mb-6">
                <button id="belumDiperiksaBtn"
                    class="px-4 py-1 text-sm font-semibold text-[#5E9EB2] rounded-full border-4 border-[#fff]-opacity-60">Belum
                    Diserahkan</button>
                <button id="sudahDiperiksaBtn"
                    class="px-4 py-1 text-sm font-semibold text-white bg-[#5E9EB2] rounded-full border-4 border-[#fff]-opacity-60">Sudah
                    Diserahkan</button>
            </div>

            <div id="belumDiperiksaTable">
                @php
                    $lastDate = '';
                @endphp
                @foreach ($tugas as $t)
                    @php
                        $tugasDate = \Carbon\Carbon::parse($t->created_at)->format('d F Y');
                    @endphp

                    @if ($tugasDate !== $lastDate)
                        <div class="mt-6 ml-2 mb-2">
                            <h2 class="text-sm font-semibold text-[#5E9EB2]">{{ $tugasDate }}</h2>
                        </div>
                        @php
                            $lastDate = $tugasDate;
                        @endphp
                    @endif

                    <a href="{{ route('annnsekret', ['id' => $t->id]) }}"
                        class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
                        <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4">
                        <p class="text-white font-semibold">{{ $t->topik }} - {{ $t->nama_guru }}</p>
                    </a>
                @endforeach
            </div>

            <div id="sudahDiperiksaTable" class="hidden">
                @php
                    $lastSubmittedDate = '';
                @endphp
                @foreach ($tugasDiserahkan as $t)
                    @php
                        $submittedDate = \Carbon\Carbon::parse($t->created_at)->format('d F Y');
                    @endphp

                    @if ($submittedDate !== $lastSubmittedDate)
                        <div class="mt-6 ml-2 mb-2">
                            <h2 class="text-sm font-semibold text-[#5E9EB2]">{{ $submittedDate }}</h2>
                        </div>
                        @php
                            $lastSubmittedDate = $submittedDate;
                        @endphp
                    @endif

                    <a href="{{ route('deskdiserahkansekret', ['id' => $t->guru_tugas_id]) }}"
                        class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
                        <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4">
                        <p class="text-white font-semibold">{{ $t->guruTugas->topik }} -
                            {{ $t->guruTugas->nama_guru }}</p>
                    </a>
                @endforeach
            </div>

        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cek dari localStorage state tombol yang aktif
            let activeTab = localStorage.getItem("activeTab");

            if (activeTab === "sudahDiperiksa") {
                sudahDiperiksaTable.classList.remove("hidden");
                belumDiperiksaTable.classList.add("hidden");

                sudahDiperiksaBtn.classList.add("bg-[#5E9EB2]", "text-white");
                sudahDiperiksaBtn.classList.remove("bg-white", "text-[#5E9EB2]");
                belumDiperiksaBtn.classList.add("bg-white", "text-[#5E9EB2]");
                belumDiperiksaBtn.classList.remove("bg-[#5E9EB2]", "text-white");
            } else {
                belumDiperiksaTable.classList.remove("hidden");
                sudahDiperiksaTable.classList.add("hidden");

                belumDiperiksaBtn.classList.add("bg-[#5E9EB2]", "text-white");
                belumDiperiksaBtn.classList.remove("bg-white", "text-[#5E9EB2]");
                sudahDiperiksaBtn.classList.add("bg-white", "text-[#5E9EB2]");
                sudahDiperiksaBtn.classList.remove("bg-[#5E9EB2]", "text-white");
            }

            belumDiperiksaBtn.addEventListener("click", () => {
                belumDiperiksaTable.classList.remove("hidden");
                sudahDiperiksaTable.classList.add("hidden");

                belumDiperiksaBtn.classList.add("bg-[#5E9EB2]", "text-white");
                belumDiperiksaBtn.classList.remove("bg-white", "text-[#5E9EB2]");
                sudahDiperiksaBtn.classList.add("bg-white", "text-[#5E9EB2]");
                sudahDiperiksaBtn.classList.remove("bg-[#5E9EB2]", "text-white");

                // Simpan state tombol aktif ke localStorage
                localStorage.setItem("activeTab", "belumDiperiksa");
            });

            sudahDiperiksaBtn.addEventListener("click", () => {
                sudahDiperiksaTable.classList.remove("hidden");
                belumDiperiksaTable.classList.add("hidden");

                sudahDiperiksaBtn.classList.add("bg-[#5E9EB2]", "text-white");
                sudahDiperiksaBtn.classList.remove("bg-white", "text-[#5E9EB2]");
                belumDiperiksaBtn.classList.add("bg-white", "text-[#5E9EB2]");
                belumDiperiksaBtn.classList.remove("bg-[#5E9EB2]", "text-white");

                // Simpan state tombol aktif ke localStorage
                localStorage.setItem("activeTab", "sudahDiperiksa");
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
