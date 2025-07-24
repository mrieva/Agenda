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
    <x-sidebarsiswa></x-sidebarsiswa>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, {{ Auth::user()->name }}</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300"></p>
                </div>

                <div class="flex items-center justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <div class="flex items-center space-x-4 cursor-pointer"
                        onclick="window.location.href='{{ route('settings-kepsek') }}'">
                        <img src="{{asset('storage/' . Auth::user()->profile_picture)}}"
                            class="w-10 h-10 rounded-full object-cover" alt="">
                        <div>
                            <p class="text-x font-bold text-[#5E9EB2] dark:text-gray-500">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-[#83a4ad] dark:text-gray-300">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 gap-16 mb-4 mx-4 md:mx-10">
                <div class="relative flex items-center justify-center h-48 md:h-64 rounded-xl bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ session('banner_url', asset('img/background-banner.png')) }}')">

                    <!-- Tombol Sesuaikan di kanan atas -->

                </div>
            </div>

            <!-- Task Announcements -->
            <div class="p-4 mx-6">
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
                <span class="text-lg font-medium text-[#5E9EB2] ">Tugas:
                </span>

                <!-- Loop Through Tasks -->
                @php
                    $currentDate = null; // Variabel untuk menyimpan tanggal saat ini dalam loop
                @endphp

                @if ($tugas->count() === 0)
                    <div class="mt-6 ml-2 mb-2">
                        <h2 class="text-sm font-semibold text-[#5E9EB2]">Tidak ada tugas yang tersedia.</h2>
                    </div>
                @else
                    @foreach ($tugas as $t)
                        @php
                            // Format tanggal pembuatan tugas
                            $tugasDate = \Carbon\Carbon::parse($t->created_at)->format('d F Y');
                        @endphp

                        <!-- Cek apakah tanggal berubah, jika ya tampilkan tanggal baru -->
                        @if ($tugasDate !== $currentDate)
                            <div class="mt-6 ml-2 mb-2">
                                <h2 class="text-sm font-semibold text-[#5E9EB2]">{{ $tugasDate }}</h2>
                            </div>
                            @php
                                // Update tanggal saat ini
                                $currentDate = $tugasDate;
                            @endphp
                        @endif

                        <!-- Tampilkan tugas -->
                        <a href="{{ route('annnsiswa', ['id' => $t->id]) }}"
                            class="relative p-4 rounded-lg mb-4 flex items-center h-20 bg-gradient-to-r from-[#6CC6EC] from-[-40%] to-[#5E9EB2] to70% hover:bg-[#5E9EB2] transition-colors duration-200">
                            <img src="{{ asset('img/icon/tugasb.png') }}" alt="" class="h-8 mr-4">
                            <p class="text-white font-semibold">{{ $t->topik }}</p>
                        </a>
                    @endforeach
                @endif


            </div>
        </div>
    </div>
    </div>


    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        const toggleFormButton = document.getElementById('toggleForm');
        const communicationForm = document.getElementById('communicationForm');

        toggleFormButton.addEventListener('click', () => {
            if (communicationForm.classList.contains('hidden')) {
                communicationForm.classList.remove('hidden');
                setTimeout(() => {
                    communicationForm.classList.remove('opacity-0', 'scale-y-0');
                }, 10); // Slight delay to allow transition
            } else {
                communicationForm.classList.add('opacity-0', 'scale-y-0');
                communicationForm.addEventListener('transitionend', () => {
                    if (communicationForm.classList.contains('opacity-0')) {
                        communicationForm.classList.add('hidden');
                    }
                }, {
                    once: true
                });
            }
        });
    </script>
    <script>
        // Show the modal when the "Sesuaikan" button is clicked
        document.getElementById('customizeBtn').addEventListener('click', function() {
            document.getElementById('modal-bg').classList.remove('hidden');
        });

        // Hide the modal when the "Batal" button is clicked
        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.getElementById('modal-bg').classList.add('hidden');
        });

        // Update the background image when the "Simpan" button is clicked
        document.getElementById('saveBtn').addEventListener('click', function() {
            const bannerImage = document.getElementById('bannerImage').files[0];
            if (bannerImage) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.bg-cover').style.backgroundImage = url('${e.target.result}');
                }
                reader.readAsDataURL(bannerImage);
            }
            document.getElementById('modal-bg').classList.add('hidden');
        });
    </script>
    <script>
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

        @if (session('success'))
            <
            div class = "alert alert-success" >
            {{ session('success') }}
                <
                /div>
        @endif

        @if ($errors->any())
            <
            div class = "alert alert-danger" >
            <
            ul >
                @foreach ($errors->all() as $error)
                    <
                    li > {{ $error }} < /li>
                @endforeach <
                /ul> < /
            div >
        @endif
    </script>
</body>

</html>
