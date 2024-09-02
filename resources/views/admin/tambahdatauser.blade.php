<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <x-sidebaradm></x-sidebaradm>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 max-h-full">
            <div class="min-h-screen flex flex-col">
                <div class="flex flex-1">
                    <!-- Content -->
                    <div class="flex-1">
                        <div class="py-3">
                            <h2 class="text-2xl font-bold text-[#5E9EB2] px-4">Add User</h2>
                            <p class="text-[#5E9EB2] mb-4 px-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>

                        <!-- Wrapper for Form and Image -->
                        <div class="flex items-evenly justify-evenly">
                            <!-- Form Section -->
                            <div class="w-full bg-white p-6 rounded-lg shadow-md">
                                <form action="{{ route('add-user.store') }}" method="POST">
                                    @csrf
                                    <!-- Custom File Input -->
                                    <div class="mb-4">
                                        <label for="profile_image"
                                            class="block text-sm font-medium text-[#5E9EB2] mb-2">Input Profil</label>
                                        <div
                                            class="file-upload flex items-center justify-center border-2 border-dashed border-[#5E9EB2] rounded-lg h-48 cursor-pointer hover:bg-blue-50">
                                            <input type="file" name="profile_image" id="profile_image"
                                                class="absolute opacity-0 cursor-pointer">
                                            <div class="text-center">
                                                <img src="{{ asset('img/uploadicon.png') }}" alt="Upload Icon"
                                                    class="mx-auto mb-2">
                                                <p class="text-lg font-bold text-gray-500"><span
                                                        class="text-[#5E9EB2]">Click to Upload</span> or Drag and Drop
                                                </p>
                                                <p class="text-lg font-medium text-gray-400">JPG, JPEG, PNG, or GIF
                                                    (Recommended Size 50x50px)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="nisn" class="block text-sm font-medium text-[#5E9EB2]">Input
                                            NISN</label>
                                        <input type="text" name="nisn" id="nisn"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="username" class="block text-sm font-medium text-[#5E9EB2]">Input
                                            Username</label>
                                        <input type="text" name="username" id="username"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="block text-sm font-medium text-[#5E9EB2]">Input
                                            Password</label>
                                        <input type="password" name="password" id="password"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_confirmation"
                                            class="block text-sm font-medium text-[#5E9EB2]">Ulangi Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="role" class="block tb;ext-sm font-medium text-[#5E9EB2]">Input
                                            Role</label>
                                        <select name="role" id="role"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                            <option value="">Pilih Role</option>
                                            <option value="siswa">Siswa</option>
                                            <option value="guru">Guru</option>
                                            <option value="sekretaris">Sekretaris</option>
                                            <option value="kepala_sekolah">Kepala Sekolah</option>
                                        </select>
                                    </div>
                                    <div class="flex justify-between">
                                        <button type="reset"
                                            class="bg-transparent font-semibold text-[#5E9EB2] duration-200 border-2 border-[#5E9EB2] px-16 py-2 rounded-md hover:bg-[#5E9EB2] hover:text-[#fff]">reset</button>
                                        <button type="submit"
                                            class="bg-[#5E9EB2] font-semibold text-white duration-200 px-16 py-2 rounded-md hover:bg-transparent border-2 border-transparent hover:border-2 hover:border-[#5E9EB2] hover:text-[#5E9EB2]">save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
