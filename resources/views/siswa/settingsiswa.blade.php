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
    <x-sidebarsiswa>
    </x-sidebarsiswa>

    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2]">Settings</h3>
            </div>

            <!-- Tabs -->
            <div class="flex border-b border-[#5E9EB2] mb-4">
                <button class="py-2 px-4 text-[#5E9EB2] border-b-2 border-[#5E9EB2]">Basic Info</button>
                <button class="py-2 px-4 text-[#5E9EB2]" onclick="window.location.href='{{ route('notif-siswa') }}'">Notification</button>
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
                            <button data-modal-target="editModal" data-modal-toggle="editModal"
                                class="flex items-center py-1 px-3 text-[#5E9EB2] rounded">
                                <img src="{{ asset('img/icon/Edit.png') }}" class="w-4 h-4 mr-1" alt="">
                            </button>
                            <button data-modal-target="hapusModal" data-modal-toggle="hapusModal"
                                class="flex items-center py-1 px-3 text-[#5E9EB2] rounded">
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

    <!-- Edit Modal -->
    <div id="editModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Edit Profile
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="editModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414 1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Form edit profile goes here...
                    </p>
                    <!-- Add your form fields here -->
                </div>
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-hide="editModal" type="button"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <button data-modal-hide="editModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hapus Modal -->
    <div id="hapusModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Delete Profile
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="hapusModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414 1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Are you sure you want to delete your profile?
                    </p>
                    <!-- Add confirmation details here -->
                </div>
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-hide="hapusModal" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                    <button data-modal-hide="hapusModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
