<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('tailwindcharts/css/flowbite.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="resources/css/app.css">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings</title>
</head>

<body>
    <x-sidebarkepsek></x-sidebarkepsek>

    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2]">Settings</h3>
            </div>

            <!-- Tabs -->
            <div class="flex border-b border-[#5E9EB2] gap-x-10">
                <button class="py-2 px-4 text-[#5E9EB2] border-b-2 border-[#5E9EB2]">Profile</button>
                <button class="py-2 px-4 text-[#5E9EB2]  border-[#5E9EB2]">Soon</button>
            </div>

            <!-- Main Content -->
            <div class="bg-transparent dark:bg-gray-800 rounded-lg text-[#5E9EB2]">
                <!-- Profile Section -->
                <div class="flex items-center gap-4">
                    <!-- Profile Picture -->
                    <div class="flex w-full overflow-hidden">
                        <div class="image-wrapper flex px-5 py-10">
                            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                class="w-32 h-32 rounded-full object-cover opa" alt="">
                        </div>
                        <div class="flex flex-col justify-center px-5">
                            <h4 class="text-4xl font-bold text-[#5E9EB2]">{{ $user->name }}</h4>
                            <p class="text-md text-[#5E9EB2]">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="grid grid-cols-2 items-center gap-x-10 gap-y-6">
                    <div class="w-[100%]">
                        <label for="first_name" class="block text-sm font-medium text-[#5E9EB2]">Nama Depan</label>
                        <input type="text" id="first_name" name="first_name" value="{{ $first_name }}" readonly
                            class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2] cursor-auto" />
                    </div>

                    <div class="w-[100%]">
                        <label for="last_name" class="block text-sm font-medium text-[#5E9EB2]">Nama Belakang</label>
                        <input type="text" id="last_name" name="last_name" value="{{ $last_name }}" readonly
                            class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2] cursor-auto" />
                    </div>


                    <div class="w-[100%]">
                        <label for="name" class="block text-sm font-medium text-[#5E9EB2]">NIPD</label>
                        <input type="text" id="name" name="name" value="{{ $user->nisn }}" readonly
                            class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2] cursor-auto" />
                    </div>

                    <div class="w-[100%]">
                        <label for="role" class="block text-sm font-medium text-[#5E9EB2]">Email</label>
                        <input id="role" name="role" value="{{ $user->email }}" readonly
                            class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2] cursor-auto">
                        </input>
                    </div>

                    <div class="w-[100%]">
                        <label for="name" class="block text-sm font-medium text-[#5E9EB2]">Role</label>
                        <input type="text" id="name" name="name" value="{{ $user->role }}" readonly
                            class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2] cursor-auto" />
                    </div>



                    <div class="w-full">
                        <label for="name" class="block text-sm font-medium text-[#5E9EB2]"></label>
                        <div class="flex gap-x-4 mt-5">
                            <a href="{{ route('edit-profile') }}"
                                class="mt-1 py-2 px-3 border-[#5E9EB2] border-2 w-full bg-transparent text-[#5E9EB2] rounded-md shadow-sm hover:bg-[#4d8aa1] hover:text-[#FFF] duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5E9EB2] text-center">Edit
                                Profile</a>
                            <button
                                class="mt-1 py-2 px-3 border-[#7c7c7c] border-2 w-full bg-[#7c7c7c] text-[#FFF] rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5E9EB2] cursor-not-allowed"
                                disabled>Cancel</button>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.querySelector('[data-collapse-toggle="dropdown-example"]');
            const dropdownMenu = document.getElementById('dropdown-example');

            dropdownToggle.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>
