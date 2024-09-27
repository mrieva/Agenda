<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <x-preloader></x-preloader>
    <x-sidebarguru></x-sidebarguru>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back,
                        {{ Auth::user()->name }}!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300"></p>
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

            <!-- Banner Section -->
            <div class="grid grid-cols-1 gap-16 mb-4 mx-4 md:mx-10">
                <div class="relative flex items-center justify-center h-48 md:h-64 rounded-xl bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('img/background-banner.png') }}')">

                    <button onclick="window.location.href='{{ route('tambahtugas') }}'"
                        class="absolute bottom-4 left-7 bg-[#5E9EB2] text-white font-medium py-1 px-3 rounded-lg shadow-md flex items-center space-x-2">
                        <!-- Ukuran disesuaikan -->
                        <span>Tambahkan Tugas</span>
                    </button>
                </div>
            </div>
            <!-- Modal Background -->
            <div id="modal-bg"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <!-- Modal Content -->
                <div class="bg-white rounded-lg p-6 shadow-xl w-96">
                    <h2 class="text-xl font-semibold mb-4">Ganti Background Banner</h2>
                    <form>
                        <label class="block mb-2 text-gray-700">Pilih Gambar:</label>
                        <input type="file" id="bannerImage" class="block w-full mb-4" accept="image/*">
                        <div class="flex justify-end space-x-2">
                            <button type="button" id="cancelBtn"
                                class="border border-[#5E9EB2] text-[#5E9EB2] py-2 px-4 rounded-lg">Batal</button>
                            <button type="button" id="saveBtn"
                                class="bg-[#5E9EB2] text-white py-2 px-4 rounded-lg">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="p-4">
                <h2 class="text-2xl font-bold mb-4">Data Kehadiran Siswa</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Siswa
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tanggal Kehadiran
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kehadiran as $data)
                                <tr>
                                    <!-- Menampilkan nama siswa dari kolom name di tabel kehadirans -->
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $data->name }}
                                    </td>

                                    <!-- Menampilkan tanggal kehadiran -->
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $data->created_at->format('d-m-Y') }}
                                    </td>
                                    <!-- Menampilkan status kehadiran-->
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $data->kehadiran }}
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
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
                // Show the form with animation
                communicationForm.classList.remove('hidden');
                setTimeout(() => {
                    communicationForm.classList.remove('opacity-0', 'scale-y-0');
                    communicationForm.classList.add('opacity-100', 'scale-y-100');
                }, 10); // Slight delay to allow transition
            } else {
                // Hide the form with animation
                communicationForm.classList.remove('opacity-100', 'scale-y-100');
                communicationForm.classList.add('opacity-0', 'scale-y-0');

                // After the transition, hide the form completely
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
        const toggleAnnouncementFormButton = document.getElementById('toggleAnnouncementForm');
        const announcementForm = document.getElementById('announcementForm');

        toggleAnnouncementFormButton.addEventListener('click', () => {
            if (announcementForm.classList.contains('hidden')) {
                // Show the form with animation
                announcementForm.classList.remove('hidden');
                setTimeout(() => {
                    announcementForm.classList.remove('opacity-0', 'scale-y-0');
                    announcementForm.classList.add('opacity-100', 'scale-y-100');
                }, 10); // Slight delay to allow transition
            } else {
                // Hide the form with animation
                announcementForm.classList.remove('opacity-100', 'scale-y-100');
                announcementForm.classList.add('opacity-0', 'scale-y-0');

                // After the transition, hide the form completely
                announcementForm.addEventListener('transitionend', () => {
                    if (announcementForm.classList.contains('opacity-0')) {
                        announcementForm.classList.add('hidden');
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
                    document.querySelector('.bg-cover').style.backgroundImage = `url('${e.target.result}')`;
                }
                reader.readAsDataURL(bannerImage);
            }
            document.getElementById('modal-bg').classList.add('hidden');
        });
    </script>



</body>

</html>
