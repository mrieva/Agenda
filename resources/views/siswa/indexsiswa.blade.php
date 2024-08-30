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
    <x-sidebar></x-sidebar>
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
                    class="flex items-center lg:justify-end xs:justify-center xss:justify-center h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form class="relative flex items-center">
                        <input type="text"
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]"
                            placeholder="search">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500'></i>
                    </form>

                    <!-- Profile Button -->
                    <button
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-16 mb-4 mx-10">
                <div class="relative flex items-center justify-center h-64 rounded-xl bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('img/background-banner.png') }}')">
                    <!-- Tombol Sesuaikan di kanan atas -->
                    <button
                        class="absolute top-2 right-2 bg-[#5E9EB2] text-white font-medium py-1 px-3 rounded-lg shadow-md flex items-center space-x-2">
                        <img src="{{ asset('img/icon/Pencil.png') }}" alt="" class="w-4 h-4">
                        <!-- Ukuran disesuaikan -->
                        <span>Sesuaikan</span>
                    </button>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-1 gap-16 mb-4 mx-10">
                <!-- Container for Button and Form -->
                <div class="w-full">
                    <!-- "Silahkan Berkomunikasi" Button -->
                    <div class="flex items-center h-24 rounded-xl bg-gradient-to-r from-[#6CC6EC] to-[#5E9EB2] w-full">
                        <button id="toggleForm" class="flex space-x-4 ml-10 w-full">
                            <img src="{{ asset('img/icon/Chat.png') }}" class="w-10 h-10" alt="Chat Icon">
                            <span class="text-2xl font-medium mt-1 text-white">Silahkan Berkomunikasi</span>
                        </button>
                    </div>

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
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-16 mb-4 mx-10">
                <p class="text-2xl text-[#6CC6EC] font-bold">Pengumuman Tugas</p>

                <!-- Tugas A -->
                <div
                    class="relative flex items-center h-20 rounded-xl bg-gradient-to-r from-[#6CC6EC] to-[#5E9EB2] mt-[-1.5rem]">
                    <button class="flex items-center space-x-4 ml-10">
                        <div class="flex items-center justify-center h-full">
                            <img src="{{ asset('img/icon/TugasS.png') }}" class="w-9 h-9" alt="test img">
                        </div>
                        <div>
                            <span class="text-2xl text-white font-medium mt-1">Tugas A</span>
                            <p class="text-xs text-[#ffff] font-extralight">1 July 2024</p>
                        </div>
                    </button>
                    <!-- Tombol titik tiga vertikal -->
                    <button class="absolute top-1/2 right-4 transform -translate-y-1/2">
                        <div class="flex flex-col space-y-1">
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                        </div>
                    </button>
                </div>

                <!-- Tugas B -->
                <div
                    class="relative flex items-center h-20 rounded-xl bg-gradient-to-r from-[#6CC6EC] to-[#5E9EB2] mt-[-1.5rem]">
                    <button class="flex items-center space-x-4 ml-10">
                        <div class="flex items-center justify-center h-full">
                            <img src="{{ asset('img/icon/TugasS.png') }}" class="w-9 h-9" alt="test img">
                        </div>
                        <div>
                            <span class="text-2xl text-white font-medium mt-1">Tugas B</span>
                            <p class="text-xs text-[#ffff] font-extralight">1 July 2024</p>
                        </div>
                    </button>
                    <!-- Tombol titik tiga vertikal -->
                    <button class="absolute top-1/2 right-4 transform -translate-y-1/2">
                        <div class="flex flex-col space-y-1">
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                            <span class="block w-1 h-1 bg-white rounded-full"></span>
                        </div>
                    </button>
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
</body>

</html>
