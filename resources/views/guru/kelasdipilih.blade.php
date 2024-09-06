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
    <x-sidebarguru></x-sidebarguru>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3 class="text-2xl font-bold text-[#5E9EB2] dark:text-gray-500">Welcome Back, Guru Sekolah!</h3>
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

            <!-- Banner Section -->
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
                    <button onclick="window.location.href='{{ route('tambahtugas') }}'"
                        class="absolute bottom-4 left-7 bg-[#5E9EB2] text-white font-medium py-1 px-3 rounded-lg shadow-md flex items-center space-x-2">
                        <!-- Ukuran disesuaikan -->
                        <span>Tambahkan Tugas</span>
                    </button>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-1 gap-16 mb-4 mx-10">
                <!-- Container for Button and Form -->
                <div class="w-full">
                    <!-- "Silahkan Berkomunikasi" Button -->
                    <div
                        class="flex items-center h-24 rounded-xl bg-white w-full  border-solid border-2 border-[#5E9EB2]">
                        <button id="toggleForm" class="flex space-x-4 ml-10 w-full">
                            <span class="text-xl font-medium mt-1 text-[#5E9EB2]">Disinilah Di sinilah Anda dapat
                                berbicara dengan kelas Anda</span>
                        </button>
                    </div>

                    <!-- Hidden Form with Animation -->
                    <div id="communicationForm"
                        class="hidden mt-4 p-4 border-2 border-gray-200 rounded-lg bg-[#e6f5fc] dark:bg-gray-800 w-full opacity-0 transform scale-y-0 origin-top transition-all duration-500">
                        <textarea
                            class="w-full h-40 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                            placeholder="Write your message..."></textarea>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex justify-start space-x-4 mb-4">
                                <button
                                    class="flex items-center justify-center w-10 h-10 bg-white-600 border-2 border-black text-white rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                                    <img src="{{ asset('img/icon/Google drive.png') }}" alt="">
                                </button>

                                <button
                                    class="flex items-center justify-center w-10 h-10 bg-white-600 border-2 border-black text-white rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                                    <img src="{{ asset('img/icon/Youtube.png') }}" alt="">
                                </button>

                                <button
                                    class="flex items-center justify-center w-10 h-10 bg-white-600 border-2 border-black text-white rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                                    <img src="{{ asset('img/icon/Upload.png') }}" alt="">
                                </button>

                                <button
                                    class="flex items-center justify-center w-10 h-10 bg-white-600 border-2 border-black text-white rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                                    <img src="{{ asset('img/icon/Link.png') }}" alt="">
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
                <!-- Container for Button and Form -->
                <div class="w-full">
                    <!-- "Tambah Pengumuman" Button -->
                    <div class="flex items-center h-24 rounded-xl  border-solid border-2 border-[#5E9EB2] w-full">
                        <button id="toggleAnnouncementForm" class="flex space-x-4 ml-10 w-full">
                            <span class="text-xl font-medium mt-1 text-[#5E9EB2]">Disinilah Di sinilah Anda dapat
                                menambah pengumuman</span>
                        </button>
                    </div>

                    <!-- Hidden Form with Animation -->
                    <div id="announcementForm"
                        class="hidden mt-4 p-4 border-2 border-gray-200 rounded-lg bg-[#e6f5fc] dark:bg-gray-800 w-full opacity-0 transform scale-y-0 origin-top transition-all duration-500">
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                            placeholder="Title of the Announcement">
                        <textarea
                            class="w-full h-40 p-2 mt-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                            placeholder="Details of the announcement..."></textarea>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex justify-start space-x-4 mb-4">
                                <button
                                    class="flex items-center justify-center w-10 h-10 bg-white-600 border-2 border-black text-white rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                                    <img src="{{ asset('img/icon/Google drive.png') }}" alt="">
                                </button>

                                <button
                                    class="flex items-center justify-center w-10 h-10 bg-white-600 border-2 border-black text-white rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                                    <img src="{{ asset('img/icon/Youtube.png') }}" alt="">
                                </button>

                                <button
                                    class="flex items-center justify-center w-10 h-10 bg-white-600 border-2 border-black text-white rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                                    <img src="{{ asset('img/icon/Upload.png') }}" alt="">
                                </button>

                                <button
                                    class="flex items-center justify-center w-10 h-10 bg-white-600 border-2 border-black text-white rounded-full shadow-md hover:bg-[#5E9EB2] transition duration-300">
                                    <img src="{{ asset('img/icon/Link.png') }}" alt="">
                                </button>
                            </div>

                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Posting
                            </button>
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



</body>

</html>
