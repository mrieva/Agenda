<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guru Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
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
                <div class="flex items-center justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form class="relative">
                        <input type="text"
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]"
                            placeholder="search">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M18.25 10.5a7.75 7.75 0 11-15.5 0 7.75 7.75 0 0115.5 0z" />
                        </svg>
                    </form>

                    <!-- Profile Button -->
                    <button
                        class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 rounded-xl"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>

                    <!-- Notification Button -->
                    <button
                        class="flex items-center justify-center w-10 h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-xl">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.39-1.353-6.391-3.636-8.505A4.92 4.92 0 0012 2a4.92 4.92 0 00-2.364.495C7.353 4.609 6 7.61 6 11v3.159c0 .417-.162.822-.405 1.12L4 17h5m0 0a3 3 0 006 0m-6 0V18m0-1h6" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-4 mx-10">
    <!-- Monday -->
    <div class="flex flex-col cursor-pointer" onclick="window.location.href='{{ route('kelasdipilih') }}'">
        <div class="flex flex-col items-center justify-center h-96 w-80 max-w-full rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
            <img src="{{ asset('img/icon/printi.png') }}" alt="">
            <div class="flex flex-col items-center">
                <div class="mt-4">
                    <img src="{{ asset('img/icon/amico.png') }}" alt="guru-icon">
                </div>
                <div class="text-center my-8">
                    <h1 class="text-3xl text-[#fff]">XI RPL 1</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Tuesday -->
    <div class="flex flex-col cursor-pointer" onclick="window.location.href='{{ route('kelasdipilih') }}'">
        <div class="flex flex-col items-center justify-center h-96 w-80 max-w-full rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
            <img src="{{ asset('img/icon/printi.png') }}" alt="">
            <div class="flex flex-col items-center">
                <div class="mt-4">
                    <img src="{{ asset('img/icon/pana.png') }}" alt="guru-icon">
                </div>
                <div class="text-center my-8">
                    <h1 class="text-3xl text-[#fff]">XI RPL 2</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Wednesday -->
    <div class="flex flex-col cursor-pointer" onclick="window.location.href='{{ route('kelasdipilih') }}'">
        <div class="flex flex-col items-center justify-center h-96 w-80 max-w-full rounded-xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
            <img src="{{ asset('img/icon/printi.png') }}" alt="">
            <div class="flex flex-col items-center">
                <div class="mt-4">
                    <img src="{{ asset('img/icon/rafiki1.png') }}" alt="guru-icon">
                </div>
                <div class="text-center my-8">
                    <h1 class="text-3xl text-[#fff]">XI DKV 1</h1>
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
