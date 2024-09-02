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
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Siswa Sekolah!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Dolorem ipsum!</p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <div
                    class="flex items-center justify-center md:justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form
                        class="relative flex items-center bg-[#5e9eb234] dark:bg-gray-700 rounded-lg w-8 h-8 md:w-auto md:h-auto">
                        <!-- Search Icon in Mobile -->
                        <button type="submit" class="flex items-center justify-center w-full h-full md:hidden">
                            <i class='bx bx-search text-gray-600 dark:text-gray-300'></i>
                        </button>
                        <!-- Search Input in Desktop -->
                        <input type="text"
                            class="bg-transparent text-gray-600 dark:text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2] hidden md:block"
                            placeholder="search">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500 hidden md:block'></i>
                    </form>

                    <!-- Profile Button -->
                    <button onclick="window.location.href='{{ route('settings-siswa') }}'"
                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-siswa') }}'"
                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>


            <div class="grid grid-cols-1 gap-16 mb-4 mx-4 md:mx-10">
                <div class="relative flex items-center justify-center h-48 md:h-64 rounded-xl bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('img/background-banner.png') }}')">
                    <!-- Tombol Sesuaikan di kanan atas -->
                    <button id="customizeBtn"
                        class="absolute top-2 right-2 bg-[#5E9EB2] text-white font-medium py-1 px-2 md:px-3 rounded-lg shadow-md flex items-center space-x-1 md:space-x-2">
                        <img src="{{ asset('img/icon/Pencil.png') }}" alt="" class="w-3 h-3 md:w-4 md:h-4">
                        <span class="text-sm md:text-base">Sesuaikan</span>
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


            <div class="grid grid-cols-1 md:grid-cols-1 gap-16 mb-4 mx-4 md:mx-10">
                <!-- Container for Button and Form -->
                <div class="w-full">
                    <!-- "Silahkan Berkomunikasi" Button -->
                    <div class="flex items-center h-24 rounded-xl bg-gradient-to-r from-[#6CC6EC] to-[#5E9EB2] w-full">
                        <button id="toggleForm" class="flex items-center space-x-4 ml-4 md:ml-10 w-full">
                            <img src="{{ asset('img/icon/chatlight.png') }}" class="w-8 h-8 md:w-10 md:h-10"
                                alt="Chat Icon">
                            <span class="text-lg md:text-2xl font-medium mt-1 text-white">Silahkan Berkomunikasi</span>
                        </button>
                    </div>

                    <!-- Hidden Form with Animation -->
                    <div id="communicationForm"
                        class="hidden mt-4 p-4 border-2 border-gray-200 rounded-lg bg-[#e6f5fc] dark:bg-gray-800 w-full opacity-0 transform scale-y-0 origin-top transition-all duration-500">
                        <textarea
                            class="w-full h-32 md:h-40 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                            placeholder="Write your message..."></textarea>
                        <div class="flex flex-col md:flex-row justify-between items-center mt-4">
                            <div class="flex space-x-2 mb-2 md:mb-0">
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
                </div>
            </div>

            <div class="grid grid-cols-1 gap-8 md:gap-16 mb-4 mx-4 md:mx-10 z-30">
                <p class="text-xl md:text-2xl text-[#6CC6EC] font-bold">Pengumuman Tugas</p>

                <!-- Tugas A -->
                <div
                    class="relative flex items-center h-20 md:h-24 rounded-xl bg-gradient-to-r from-[#6CC6EC] to-[#5E9EB2] mt-[-1.5rem]">
                    <button class="flex items-center space-x-2 md:space-x-4 ml-4 md:ml-10">
                        <div class="flex items-center justify-center h-full">
                            <img src="{{ asset('img/icon/tugasb.png') }}" class="w-8 h-8 md:w-9 md:h-9" alt="test img">
                        </div>
                        <div>
                            <span class="text-lg md:text-2xl text-white font-medium mt-1">Tugas A</span>
                            <p class="text-xs text-[#ffff] font-extralight">1 July 2024</p>
                        </div>
                    </button>
                    <!-- Tombol titik tiga vertikal -->
                    <button class="absolute top-1/2 right-2 md:right-4 transform -translate-y-1/2"
                        onclick="openModal('modalA')">
                        <div class="flex flex-col space-y-1">
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                        </div>
                    </button>
                </div>

                <!-- Tugas B -->
                <div
                    class="relative flex items-center h-20 md:h-24 rounded-xl bg-gradient-to-r from-[#6CC6EC] to-[#5E9EB2] mt-[-1.5rem]">
                    <button class="flex items-center space-x-2 md:space-x-4 ml-4 md:ml-10">
                        <div class="flex items-center justify-center h-full">
                            <img src="{{ asset('img/icon/tugasb.png') }}" class="w-8 h-8 md:w-9 md:h-9"
                                alt="test img">
                        </div>
                        <div>
                            <span class="text-lg md:text-2xl text-white font-medium mt-1">Tugas B</span>
                            <p class="text-xs text-[#ffff] font-extralight">1 July 2024</p>
                        </div>
                    </button>
                    <!-- Tombol titik tiga vertikal -->
                    <button class="absolute top-1/2 right-2 md:right-4 transform -translate-y-1/2"
                        onclick="openModal('modalB')">
                        <div class="flex flex-col space-y-1">
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Compact Modal Template -->
            <div id="modalA"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                <div class="bg-white rounded-lg p-3 w-64 md:w-48">
                    <button class="text-right w-full text-[#5E9EB2] mb-2 text-sm"
                        onclick="closeModal('modalA')">×</button>
                    <ul>
                        <li>
                            <button
                                class="block w-full text-left px-2 py-1 text-[#5E9EB2] text-sm hover:bg-gray-200">Salin
                                Link</button>
                        </li>
                        <li>
                            <button
                                class="block w-full text-left px-2 py-1 text-[#5E9EB2] text-sm hover:bg-gray-200">Report</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="modalB"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                <div class="bg-white rounded-lg p-3 w-64 md:w-48">
                    <button class="text-right w-full text-[#5E9EB2] mb-2 text-sm"
                        onclick="closeModal('modalB')">×</button>
                    <ul>
                        <li>
                            <button
                                class="block w-full text-left px-2 py-1 text-[#5E9EB2] text-sm hover:bg-gray-200">Salin
                                Link</button>
                        </li>
                        <li>
                            <button
                                class="block w-full text-left px-2 py-1 text-[#5E9EB2] text-sm hover:bg-gray-200">Report</button>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
    </div>
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        window.addEventListener('click', function(e) {
            const modals = document.querySelectorAll('.fixed.inset-0');
            modals.forEach(modal => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
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
                    document.querySelector('.bg-cover').style.backgroundImage = `url('${e.target.result}')`;
                }
                reader.readAsDataURL(bannerImage);
            }
            document.getElementById('modal-bg').classList.add('hidden');
        });
    </script>
</body>

</html>
