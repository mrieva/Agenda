<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('tailwindcharts/css/flowbite.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="resources/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
</head>

<body>
    <x-sidebarkepsek></x-sidebarkepsek>
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2]">Edit Profile</h3>
            </div>

            <!-- Profile Edit Form -->
            <div class="bg-transparent dark:bg-gray-800 rounded-lg text-[#5E9EB2]">
                <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Profile Picture -->
                    <div class="flex items-center gap-4">
                        <div class="flex w-full overflow-hidden">
                            <div class="image-wrapper flex px-5 py-10">
                                <img id="profileImage" src="{{ asset('storage/' . $user->profile_picture) }}"
                                    class="w-32 h-32 rounded-full object-cover" alt="Profile Picture">
                            </div>
                            <div class="flex flex-col justify-center px-5">
                                <h4 class="text-4xl font-bold text-[#5E9EB2]">{{ $user->name }}</h4>
                                <p class="text-md text-[#5E9EB2]">{{ $user->email }}</p>
                            </div>
                            <div class="flex flex-col justify-center px-5 ml-auto">
                                <input type="file" name="profile_picture" id="profile_picture" class="hidden"
                                    onchange="previewImage()">

                                    <label for="profile_picture" class="cursor-pointer py-2 px-4 bg-[#5E9EB2] text-white rounded-md shadow-sm hover:bg-[#4d8aa1] duration-200">
                                        Ganti Foto Profil
                                    </label>
                            </div>
                        </div>
                        @error('profile_picture')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="grid grid-cols-2 items-center gap-x-10 gap-y-6">
                        <!-- Form Fields -->
                        <div class="w-[100%]">
                            <label for="first_name" class="block text-sm font-medium text-[#5E9EB2]">Nama
                                Depan</label>
                            <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}"
                                class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2]" />
                            @error('name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="w-[100%]">
                            <label for="last_name" class="block text-sm font-medium text-[#5E9EB2]">Nama
                                Belakang</label>
                            <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}"
                                class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2]" />
                            @error('name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-[100%]">
                            <label for="nisn" class="block text-sm font-medium text-[#5E9EB2]">NIP</label>
                            <input type="text" id="nisn" name="nisn" value="{{ $user->nisn }}"
                                class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2]" />
                            @error('nisn')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-[100%]">
                            <label for="email" class="block text-sm font-medium text-[#5E9EB2]">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}"
                                class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2]" />
                            @error('email')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-[100%]">
                            <label for="role" class="block text-sm font-medium text-[#5E9EB2]">Role</label>
                            <input type="text" id="role" name="role" value="{{ $user->role }}"
                                class="mt-1 block w-full px-3 py-2 border border-[#5E9EB2] rounded-md shadow-sm focus:outline-none focus:ring-[#5E9EB2] focus:border-[#5E9EB2]"
                                readonly />
                        </div>

                        <div class="w-full">
                            <div class="flex gap-x-4 mt-5">
                                <button type="submit"
                                    class="mt-1 py-2 px-3 border-[#5E9EB2] border-2 w-full bg-transparent text-[#5E9EB2] rounded-md shadow-sm hover:bg-[#4d8aa1] hover:text-[#FFF] duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5E9EB2] text-center">Save
                                    Changes</button>
                                <a href="{{ route('settings-kepsek') }}"
                                    class="mt-1 py-2 px-3 border-[#5E9EB2] border-2 w-full bg-[#5E9EB2] text-[#FFF] rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#5E9EB2] text-center hover:bg-[#4d8aa1]">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const input = document.getElementById('profile_picture');
            const image = document.getElementById('profileImage');

            // Cek jika ada file yang dipilih
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result; // Ganti src gambar dengan preview dari file yang dipilih
                }

                reader.readAsDataURL(input.files[0]); // Convert file ke URL
            }
        }
    </script>
</body>

</html>
