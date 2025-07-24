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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back,
                        {{ Auth::user()->name }}!
                    </h3>
                </div>

                <div class="flex items-center justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <div class="flex items-center space-x-4 cursor-pointer"
                        onclick="window.location.href='{{ route('settings-kepsek') }}'">
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                            class="w-10 h-10 rounded-full object-cover" alt="">
                        <div>
                            <p class="text-x font-bold text-[#5E9EB2] dark:text-gray-500">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-[#83a4ad] dark:text-gray-300">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-4 mx-10">
                @php
                    $kelasUser = Auth::user()->kelas;
                    $jurusanUser = Auth::user()->jurusan;
                @endphp

                <div id="section1" data-type="siswa"
                    class="flex items-center justify-center h-48 rounded-lg bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] p-4 cursor-pointer">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/kelas1.png') }}" alt="Icon" class="h-24 mb-4">
                        <p class="text-xl font-bold text-white">{{ $kelasUser }} {{ $jurusanUser }}</p>
                    </div>
                </div>

                <div id="section2" data-type="guru"
                    class="flex items-center justify-center h-48 rounded-lg bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] p-2 cursor-pointer">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/kelas2.png') }}" alt="Guru Icon" class="h-24 mb-4">
                        <p class="text-xl font-bold text-white">Guru</p>
                    </div>
                </div>
            </div>

            <div class="p-4 mx-6">
                @php
                    $currentDate = null;
                @endphp

                @if ($tugas->count() === 0)
                    <div class="mt-6 ml-2 mb-2">
                        <h2 class="text-sm font-semibold text-[#5E9EB2]">Tidak ada tugas yang tersedia.</h2>
                    </div>
                @else
                    @foreach ($tugas as $t)
                        @php
                            $tugasDate = \Carbon\Carbon::parse($t->created_at)->format('d F Y');
                        @endphp

                        @if ($tugasDate !== $currentDate)
                            <div class="mt-6 ml-2 mb-2">
                                <h2 class="text-sm font-semibold text-[#5E9EB2]">{{ $tugasDate }}</h2>
                            </div>
                            @php
                                $currentDate = $tugasDate;
                            @endphp
                        @endif

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

    <div id="modal"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 text-white hidden">
        <div
            class="bg-[#5E9EB2]/50 backdrop-blur-sm rounded-lg shadow-lg p-6 w-2/3 sm:w-1/2 lg:w-1/3 border border-[#83a4ad]">
            <h3 id="modal-title" class="text-2xl font-semibold mb-6 text-center">Input Kehadiran</h3>
            <form action="{{ route('kehadiran.store') }}" method="POST" enctype="multipart/form-data"
                aria-labelledby="modal-title">
                @csrf
                <input type="hidden" id="role" name="role" value="siswa">
                <input type="hidden" id="name" name="name"> <!-- Hidden input for name -->
                <div class="mb-4">
                    <label for="user_id" id="user-label" class="block text-sm font-semibold">Nama</label>
                    <select id="user_id" name="user_id"
                        class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] text-gray-900"
                        required>
                        <option value="">Pilih Nama</option> <!-- Opsi default -->
                        @foreach ($siswa as $id => $nama)
                            <option value="{{ $id }}">{{ $nama }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-4">
                    <label for="kehadiran" class="block text-sm font-semibold">Kehadiran</label>
                    <select id="kehadiran" name="kehadiran"
                        class="w-full px-4 py-2 mt-2 bg-white border border-[#83a4ad] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] text-gray-900"
                        required>
                        <option value="hadir">Tanpa Keterangan</option>
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

                <div class="flex justify-center">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-[#5E9EB2] rounded-lg hover:bg-[#4A8C9F] focus:outline-none focus:bg-[#4A8C9F]">Simpan</button>
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 ml-4 focus:outline-none focus:bg-red-700">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        // Ketika klik section siswa
        document.getElementById('section1').addEventListener('click', function() {
            document.getElementById('role').value = 'siswa'; // Set role ke siswa
            document.getElementById('user-label').textContent = 'Nama Siswa';

            // Update select option untuk siswa
            let siswaOptions = '<option value="">Pilih Nama</option>';
            @foreach ($siswa as $id => $nama)
                siswaOptions += `<option value="{{ $id }}">{{ $nama }}</option>`;
            @endforeach
            document.getElementById('user_id').innerHTML = siswaOptions;

            openModal();
        });

        // Ketika klik section guru
        document.getElementById('section2').addEventListener('click', function() {
            document.getElementById('role').value = 'guru'; // Set role ke guru
            document.getElementById('user-label').textContent = 'Nama Guru';

            // Update select option untuk guru
            let guruOptions = '<option value="">Pilih Nama</option>';
            @foreach ($gurus as $id => $nama)
                guruOptions += `<option value="{{ $id }}">{{ $nama }}</option>`;
            @endforeach
            document.getElementById('user_id').innerHTML = guruOptions;

            openModal();
        });

        // Update hidden input name saat memilih user_id
        document.getElementById('user_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('name').value = selectedOption.text; // Set value name berdasarkan text
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.js"></script>
</body>

</html>
