<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <x-sidebarsekret>

    </x-sidebarsekret>
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2]">Settings</h3>
            </div>

            <!-- Tabs -->
            <div class="flex border-b border-[#5E9EB2] mb-4">
                <button class="py-2 px-4 text-[#5E9EB2] border-b-2 border-[#5E9EB2]">Basic Info</button>
                <button class="py-2 px-4 text-[#5E9EB2]" onclick="window.location.href='{{ route('notif-sekret') }}'"">Notification</button>
            </div>

            <!-- Main Content -->
            <div class="p-4 bg-transparent dark:bg-gray-800 rounded-lg text-[#5E9EB2]">
                <!-- Profile Section -->
                <div class="flex items-center gap-4 mb-6">
                    <!-- Profile Picture -->
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="path_to_your_image.png" alt="Profile Picture" class="object-cover w-full h-full" />
                    </div>

                    <!-- Profile Details -->
                    <div class="flex flex-col">
                        <h4 class="text-lg font-bold text-[#5E9EB2] dark:text-gray-300 mb-2">Profile Pictures</h4>

                        <div class="flex items-center gap-4 mb-2">
                            <p class="text-lg text-[#5E9EB2] dark:text-gray-400">Edit</p>
                            <button class="flex items-center py-1 px-3 text-[#5E9EB2] rounded">
                                <img src="{{ asset('img/icon/Edit.png') }}" class="w-4 h-4 mr-1" alt="">
                            </button>
                            <button class="flex items-center py-1 px-3 text-[#5E9EB2] rounded">
                                <img src="{{ asset('img/icon/Hapus.png') }}" class="w-4 h-4 mr-1" alt="">
                            </button>
                        </div>

                        <p class="text-sm text-[#5E9EB2]">We Support PNGs, JPGs</p>
                    </div>
                </div>
                <!-- Form Section -->
                <div class="grid grid-cols-2 gap-y-4 gap-x-2">
                    <!-- First Row of Form Inputs -->
                    <div class="col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="mb-7">
                            <label for="full-name" class="block text-sm font-medium text-[#5E9EB2]">Full Name</label>
                            <input type="text" id="full-name" name="full-name"
                                class="mt-1 block w-full md:w-80 px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2]" />
                        </div>

                        <div class="mb-7">
                            <label for="username" class="block text-sm font-medium text-[#5E9EB2]">Username</label>
                            <input type="text" id="username" name="username"
                                class="mt-1 block w-full md:w-80 px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2]" />
                        </div>
                    </div>

                    <!-- Second Row of Form Inputs -->
                    <div class="col-span-1">
                        <label for="kelas" class="block text-sm font-medium text-[#5E9EB2]">Kelas</label>
                        <select id="kelas" name="kelas"
                            class="mt-1 block w-full md:w-64 px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2]">
                            <!-- Options -->
                            <option value="1" class="text-[#5E9EB2]">Kelas 10</option>
                            <option value="1" class="text-[#5E9EB2]">Kelas 11</option>
                            <option value="1" class="text-[#5E9EB2]">Kelas 12</option>
                        </select>
                    </div>
                </div>



                <!-- Buttons -->
                <div class="flex gap-4 mt-6">
                    <button
                        class="py-2 px-4 bg-[#5E9EB2] text-white rounded-md shadow-sm hover:bg-[#4d8aa1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5E9EB2]">
                        Save
                    </button>
                    <button
                        class="py-2 px-4 border border-[#5E9EB2] text-[#5E9EB2] rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5E9EB2]">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
