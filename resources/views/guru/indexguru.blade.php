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
    <x-sidebar></x-sidebar>


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
                        <input type="text" placeholder="Search..."
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
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

            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-4 mx-10">
                <!-- Monday -->
                <div class="flex flex-col">
                    <p class="text-2xl text-[#6CC6EC] mb-4 font-bold">Senin</p>
                    <div
                        class="flex flex-col items-center justify-center h-96 w-80 max-w-full rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
                        <img src="{{ asset('img/icon/printi.png') }}" alt="">
                        <div class="flex flex-col items-center">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon">
                                <div class="text-center bg-[#fff] rounded-md py-1">
                                    <p class="xl:text-2xl lg:text-md text-gray-400 dark:text-gray-500">Fulani S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-8">
                                <p class="text-[#fff]">jadwal</p>
                                <h1 class="text-3xl text-[#fff]">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tuesday -->
                <div class="flex flex-col">
                    <p class="text-2xl text-[#6CC6EC] mb-4 font-bold">Selasa</p>
                    <div
                        class="flex flex-col items-center justify-center h-96 w-80 max-w-full rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
                        <img src="{{ asset('img/icon/printi.png') }}" alt="">
                        <div class="flex flex-col items-center">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon">
                                <div class="text-center bg-[#fff] rounded-md py-1">
                                    <p class="xl:text-2xl lg:text-md text-gray-400 dark:text-gray-500">Fulani S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-8">
                                <p class="text-[#fff]">jadwal</p>
                                <h1 class="text-3xl text-[#fff]">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wednesday -->
                <div class="flex flex-col">
                    <p class="text-2xl text-[#6CC6EC] mb-4 font-bold">Rabu</p>
                    <div
                        class="flex flex-col items-center justify-center h-96 w-80 max-w-full rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
                        <img src="{{ asset('img/icon/printi.png') }}" alt="">
                        <div class="flex flex-col items-center">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon">
                                <div class="text-center bg-[#fff] rounded-md py-1">
                                    <p class="xl:text-2xl lg:text-md text-gray-400 dark:text-gray-500">Fulani S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-8">
                                <p class="text-[#fff]">jadwal</p>
                                <h1 class="text-3xl text-[#fff]">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thursday -->
                <div class="flex flex-col">
                    <p class="text-2xl text-[#6CC6EC] mb-4 font-bold">Kamis</p>
                    <div
                        class="flex flex-col items-center justify-center h-96 w-80 max-w-full rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
                        <img src="{{ asset('img/icon/printi.png') }}" alt="">
                        <div class="flex flex-col items-center">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon">
                                <div class="text-center bg-[#fff] rounded-md py-1">
                                    <p class="xl:text-2xl lg:text-md text-gray-400 dark:text-gray-500">Fulani S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-8">
                                <p class="text-[#fff]">jadwal</p>
                                <h1 class="text-3xl text-[#fff]">Matematika</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Friday -->
                <div class="flex flex-col">
                    <p class="text-2xl text-[#6CC6EC] mb-4 font-bold">Jumat</p>
                    <div
                        class="flex flex-col items-center justify-center h-96 w-80 max-w-full rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
                        <img src="{{ asset('img/icon/printi.png') }}" alt="">
                        <div class="flex flex-col items-center">
                            <div class="mt-4">
                                <img src="{{ asset('img/icon/guru.png') }}" alt="guru-icon">
                                <div class="text-center bg-[#fff] rounded-md py-1">
                                    <p class="xl:text-2xl lg:text-md text-gray-400 dark:text-gray-500">Fulani S.pd</p>
                                </div>
                            </div>
                            <div class="text-center my-8">
                                <p class="text-[#fff]">jadwal</p>
                                <h1 class="text-3xl text-[#fff]">Matematika</h1>
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
