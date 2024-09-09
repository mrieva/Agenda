<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <x-sidebaradm></x-sidebaradm>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 max-h-full">
            <div class="min-h-screen flex flex-col">
                <div class="flex flex-1">
                    <!-- Content -->
                    <div class="flex-1">
                        <div class="py-3">
                            <h2 class="text-2xl font-bold text-[#5E9EB2] px-4">Tambah User</h2>
                            <p class="text-[#5E9EB2] mb-4 px-4">Isi formulir berikut untuk menambahkan user baru.</p>
                        </div>

                        <!-- Wrapper for Form and Image -->
                        <div class="flex items-center justify-center">
                            <!-- Form Section -->
                            <div class="w-full bg-white p-6 rounded-lg shadow-md">
                                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Custom File Input -->
                                    <div class="mb-4">
                                        <label for="profile_picture"
                                            class="block text-sm font-medium text-[#5E9EB2] mb-2">Profil Gambar</label>
                                        <div
                                            class="drop-zone file-upload flex items-center justify-center border-2 border-dashed border-[#5E9EB2] rounded-lg h-48 cursor-pointer hover:bg-blue-50 relative">
                                            <input type="file" name="profile_picture" id="profile_picture"
                                                class="absolute inset-0 opacity-0 cursor-pointer">
                                            <div class="text-center">
                                                <img src="{{ asset('img/uploadicon.png') }}" alt="Upload Icon"
                                                    class="mx-auto mb-2">
                                                <span id="file-name">
                                                    <p class="text-lg font-bold text-gray-500"><span
                                                            class="text-[#5E9EB2]">Klik untuk Mengunggah</span> atau
                                                        Seret
                                                        dan Jatuhkan</p>
                                                    <p class="text-lg font-medium text-gray-400">JPG, JPEG, PNG
                                                        (Ukuran yang Disarankan 50x50px)</p>
                                                </span>
                                            </div>
                                        </div>
                                        @error('profile_picture')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="nisn"
                                            class="block text-sm font-medium text-[#5E9EB2]">NISN/NIPD</label>
                                        <input type="text" name="nisn" id="nisn"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                        @error('nisn')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="name"
                                            class="block text-sm font-medium text-[#5E9EB2]">Username</label>
                                        <input type="text" name="name" id="name"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                        @error('name')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="email"
                                            class="block text-sm font-medium text-[#5E9EB2]">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                        @error('email')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password"
                                            class="block text-sm font-medium text-[#5E9EB2]">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                        @error('password')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="role"
                                            class="block text-sm font-medium text-[#5E9EB2]">Role</label>
                                        <select name="role" id="role" onchange="updateFields()"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                            <option value="">Pilih Role</option>
                                            <option value="siswa">Siswa</option>
                                            <option value="guru">Guru</option>
                                            <option value="sekretaris">Sekretaris</option>
                                            <option value="kepala_sekolah">Kepala Sekolah</option>
                                        </select>
                                        @error('role')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Additional Fields -->
                                    <div id="kelas-field" class="mb-4" style="display: none;">
                                        <label for="kelas"
                                            class="block text-sm font-medium text-[#5E9EB2]">Kelas</label>
                                        <select name="kelas" id="kelas"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                            <option value="">Pilih Kelas</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                        @error('kelas')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="jurusan-field" class="mb-4" style="display: none;">
                                        <label for="jurusan"
                                            class="block text-sm font-medium text-[#5E9EB2]">Jurusan</label>
                                        <select name="jurusan" id="jurusan"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                            <option value="">Pilih Jurusan</option>
                                            <option value="Otomatisasi dan Tata Kelola Perkantoran">OTKP</option>
                                            <option value="Akuntansi dan Keuangan Lembaga">AKL</option>
                                            <option value="Bisnis Daring dan Pemasaran">BDP</option>
                                            <option value="Rekayasa Perangkat Lunak">RPL</option>
                                            <option value="Multimedia">MM</option>
                                            <option value="Desain Komunikasi Visual">DKV</option>
                                            <option value="Tata Busana">TBs</option>
                                        </select>
                                        @error('jurusan')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="mapel-field" class="mb-4" style="display: none;">
                                        <label for="mapel"
                                            class="block text-sm font-medium text-[#5E9EB2]">Mapel</label>
                                        <select name="mapel" id="mapel"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                            <option value="">Pilih Mapel</option>
                                            <option value="matematika">Matematika</option>
                                            <option value="ipa">Kimia</option>
                                            <option value="ips">Fisika</option>
                                            <option value="bahasa_indonesia">Bahasa Indonesia</option>
                                            <option value="bahasa_inggris">Bahasa Inggris</option>
                                            <option value="pkn">PPKn</option>
                                            <option value="pkn">PAI</option>
                                            <option value="pkn">Sejarah</option>
                                            <option value="pkn">PPL</option>
                                            <option value="pkn">PWPB</option>
                                            <option value="pkn">PBO</option>
                                            <option value="pkn">Basis Data</option>
                                        </select>
                                        @error('mapel')
                                            <div class="text-red-500 text-sm">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="flex justify-between">
                                        <button type="reset"
                                            class="bg-transparent font-semibold text-[#5E9EB2] duration-200 border-2 border-[#5E9EB2] px-16 py-2 rounded-md hover:bg-[#5E9EB2] hover:text-white">Reset</button>
                                        <button type="submit"
                                            class="bg-[#5E9EB2] font-semibold text-white duration-200 px-16 py-2 rounded-md hover:bg-transparent border-2 border-transparent hover:border-[#5E9EB2] hover:text-[#5E9EB2]">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropZone = document.querySelector('.drop-zone');

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('dragover');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            const fileName = e.dataTransfer.files[0]?.name || 'Klik untuk Mengunggah atau Seret dan Jatuhkan';
            document.getElementById('file-name').innerText = fileName;
        });
    </script>


    <script>
        // Fungsi untuk mengupdate field berdasarkan role
        function updateFields() {
            var role = document.getElementById('role').value;

            // Reset semua field tambahan
            document.getElementById('kelas-field').style.display = 'none';
            document.getElementById('jurusan-field').style.display = 'none';
            document.getElementById('mapel-field').style.display = 'none';

            // Tampilkan field sesuai dengan role yang dipilih
            if (role === 'siswa' || role === 'sekretaris') {
                document.getElementById('kelas-field').style.display = 'block';
                document.getElementById('jurusan-field').style.display = 'block';
            } else if (role === 'guru') {
                document.getElementById('mapel-field').style.display = 'block';
            }
        }

        // Update file name di input gambar
        document.getElementById('profile_picture').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Klik untuk Mengunggah atau Seret dan Jatuhkan';
            document.getElementById('file-name').innerText = fileName;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
