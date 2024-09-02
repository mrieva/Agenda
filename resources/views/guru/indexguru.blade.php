<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guru Sekolah</title>
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
                    <button onclick="window.location.href='{{ route('settings-guru') }}'"
                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button onclick="window.location.href='{{ route('notif-guru') }}'"
                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-16 mb-4 mx-4 md:mx-10">
                <!-- Monday -->
                <div class="flex flex-col items-center cursor-pointer" onclick="window.location.href='{{ route('kelasguru') }}'">
                    <p class="text-xl md:text-2xl text-[#6CC6EC] mb-2 md:mb-4 font-bold">Senin</p>
                    <div
                        class="flex flex-col items-center justify-center h-auto w-full max-w-sm md:max-w-xs rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] shadow-lg">
                        <img src="{{ asset('img/icon/printi.png') }}" alt=""
                            class="w-16 md:w-20 lg:w-24 h-auto mt-4">
                        <div class="flex flex-col items-center mt-4">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon"
                                    class="w-16 md:w-20 lg:w-24 h-auto">
                                <div class="text-center bg-[#fff] rounded-md py-1 px-2 shadow-sm">
                                    <p class="text-xs md:text-sm lg:text-md text-gray-500 dark:text-gray-600">Fulani
                                        S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-4 md:my-6">
                                <p class="text-xs md:text-sm lg:text-base text-[#fff]">jadwal</p>
                                <h1 class="text-xl md:text-2xl lg:text-3xl text-[#fff] font-semibold">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tuesday -->
                <div class="flex flex-col items-center cursor-pointer" onclick="window.location.href='{{ route('kelasguru') }}'">
                    <p class="text-xl md:text-2xl text-[#6CC6EC] mb-2 md:mb-4 font-bold">Selasa</p>
                    <div
                        class="flex flex-col items-center justify-center h-auto w-full max-w-sm md:max-w-xs rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] shadow-lg">
                        <img src="{{ asset('img/icon/printi.png') }}" alt=""
                            class="w-16 md:w-20 lg:w-24 h-auto mt-4">
                        <div class="flex flex-col items-center mt-4">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon"
                                    class="w-16 md:w-20 lg:w-24 h-auto">
                                <div class="text-center bg-[#fff] rounded-md py-1 px-2 shadow-sm">
                                    <p class="text-xs md:text-sm lg:text-md text-gray-500 dark:text-gray-600">Fulani
                                        S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-4 md:my-6">
                                <p class="text-xs md:text-sm lg:text-base text-[#fff]">jadwal</p>
                                <h1 class="text-xl md:text-2xl lg:text-3xl text-[#fff] font-semibold">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wednesday -->
                <div class="flex flex-col items-center cursor-pointer" onclick="window.location.href='{{ route('kelasguru') }}'"">
                    <p class="text-xl md:text-2xl text-[#6CC6EC] mb-2 md:mb-4 font-bold">Rabu</p>
                    <div
                        class="flex flex-col items-center justify-center h-auto w-full max-w-sm md:max-w-xs rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] shadow-lg">
                        <img src="{{ asset('img/icon/printi.png') }}" alt=""
                            class="w-16 md:w-20 lg:w-24 h-auto mt-4">
                        <div class="flex flex-col items-center mt-4">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon"
                                    class="w-16 md:w-20 lg:w-24 h-auto">
                                <div class="text-center bg-[#fff] rounded-md py-1 px-2 shadow-sm">
                                    <p class="text-xs md:text-sm lg:text-md text-gray-500 dark:text-gray-600">Fulani
                                        S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-4 md:my-6">
                                <p class="text-xs md:text-sm lg:text-base text-[#fff]">jadwal</p>
                                <h1 class="text-xl md:text-2xl lg:text-3xl text-[#fff] font-semibold">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thursday -->
                <div class="flex flex-col items-center cursor-pointer" onclick="window.location.href='{{ route('kelasguru') }}'">
                    <p class="text-xl md:text-2xl text-[#6CC6EC] mb-2 md:mb-4 font-bold">Kamis</p>
                    <div
                        class="flex flex-col items-center justify-center h-auto w-full max-w-sm md:max-w-xs rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] shadow-lg">
                        <img src="{{ asset('img/icon/printi.png') }}" alt=""
                            class="w-16 md:w-20 lg:w-24 h-auto mt-4">
                        <div class="flex flex-col items-center mt-4">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon"
                                    class="w-16 md:w-20 lg:w-24 h-auto">
                                <div class="text-center bg-[#fff] rounded-md py-1 px-2 shadow-sm">
                                    <p class="text-xs md:text-sm lg:text-md text-gray-500 dark:text-gray-600">Fulani
                                        S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-4 md:my-6">
                                <p class="text-xs md:text-sm lg:text-base text-[#fff]">jadwal</p>
                                <h1 class="text-xl md:text-2xl lg:text-3xl text-[#fff] font-semibold">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Friday -->
                <div class="flex flex-col items-center cursor-pointer" onclick="window.location.href='{{ route('kelasguru') }}'"">
                    <p class="text-xl md:text-2xl text-[#6CC6EC] mb-2 md:mb-4 font-bold">Jumat</p>
                    <div
                        class="flex flex-col items-center justify-center h-auto w-full max-w-sm md:max-w-xs rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC] shadow-lg">
                        <img src="{{ asset('img/icon/printi.png') }}" alt=""
                            class="w-16 md:w-20 lg:w-24 h-auto mt-4">
                        <div class="flex flex-col items-center mt-4">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon"
                                    class="w-16 md:w-20 lg:w-24 h-auto">
                                <div class="text-center bg-[#fff] rounded-md py-1 px-2 shadow-sm">
                                    <p class="text-xs md:text-sm lg:text-md text-gray-500 dark:text-gray-600">Fulani
                                        S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-4 md:my-6">
                                <p class="text-xs md:text-sm lg:text-base text-[#fff]">jadwal</p>
                                <h1 class="text-xl md:text-2xl lg:text-3xl text-[#fff] font-semibold">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
