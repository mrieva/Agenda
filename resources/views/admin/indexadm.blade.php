<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <x-sidebaradm></x-sidebaradm>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 max-h-full">

            <div
                class="grid grid-cols-1 md:grid-cols-1 sm:grid-cols-1 xs:grid-cols-1 xss:grid-cols-1 lg:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3
                        class="xl:text-3xl lg:text-2xl md:text-xl xss:text-sm font-bold text-[#5E9EB2] dark:text-gray-500">
                        Admin Page</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Modifikasi Data User di Halaman Ini!</p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <div
                    class="flex items-center lg:justify-end xs:justify-center xss:justify-center h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form action="{{ route('search') }}" method="GET" class="relative flex items-center">
                        <input type="text" name="query" placeholder="Search..." id="search-input"
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500'></i>
                    </form>

                    <!-- Add User Button -->
                    <button onclick="window.location.href='{{ route('tambahuser') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-user-plus text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>

            <!-- Table Header with Filters -->
            <div class="flex justify-between items-center mb-4 px-10">
                <h1 class="text-xl font-bold text-[#5E9EB2]">Data User</h1>
                <form action="{{ route('indexadm') }}" method="GET" class="flex space-x-4">
                    <select name="role" onchange="this.form.submit()"
                        class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-4 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                        <option value="">All Roles</option>
                        <option value="siswa" {{ request('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="guru" {{ request('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="sekretaris" {{ request('role') == 'sekretaris' ? 'selected' : '' }}>Sekretaris
                        </option>
                        <option value="kepala_sekolah" {{ request('role') == 'kepala_sekolah' ? 'selected' : '' }}>
                            Kepala Sekolah</option>
                    </select>

                    <select name="sortDirection" onchange="this.form.submit()"
                        class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-4 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                        <option value="desc" {{ request('sortDirection') == 'desc' ? 'selected' : '' }}>Terbaru
                        </option>
                        <option value="asc" {{ request('sortDirection') == 'asc' ? 'selected' : '' }}>Terlama
                        </option>
                    </select>
                </form>
            </div>

            <!-- Table -->
            <div class="relative overflow-x-auto shadow-inner xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Profil</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">NISN/NIPD</th>
                            <th scope="col" class="px-6 py-3">Role</th>

                            @if (
                                $users->contains(function ($user) {
                                    return $user->role === 'siswa' || $user->role === 'sekretaris';
                                }))
                                <th scope="col" class="px-6 py-3">Kelas</th>
                                <th scope="col" class="px-6 py-3">Jurusan</th>
                            @endif

                            @if ($users->contains('role', 'guru'))
                                <th scope="col" class="px-6 py-3">Mapel</th>
                            @endif

                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $item->profile_picture) }}" alt="Profile Picture"
                                        class="w-10 h-10 rounded-full object-cover">
                                </td>
                                <td class="px-6 py-4">{{ $item->name }}</td>
                                <td class="px-6 py-4">{{ $item->nisn }}</td>
                                <td class="px-6 py-4">{{ $item->role }}</td>

                                @if ($item->role === 'siswa')
                                    <td class="px-6 py-4">{{ $item->kelas }}</td>
                                    <td class="px-6 py-4">{{ $item->jurusan }}</td>
                                @elseif ($item->role === 'sekretaris')
                                    <td class="px-6 py-4">{{ $item->kelas }}</td>
                                    <td class="px-6 py-4">{{ $item->jurusan }}</td>
                                @else
                                    <td class="px-6 py-4">-</td> <!-- Kosongkan kolom -->
                                    <td class="px-6 py-4">-</td> <!-- Kosongkan kolom -->
                                @endif

                                @if ($item->role === 'guru')
                                    <td class="px-6 py-4">{{ $item->mapel }}</td>
                                @else
                                    <td class="px-6 py-4">-</td> <!-- Kosongkan kolom -->
                                @endif

                                <td class="px-6 py-6 flex space-x-4">
                                    <button type="button"
                                        class="edit-button font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        data-action="{{ route('user.update', $item->id) }}"
                                        data-user='@json($item)'>
                                        Edit
                                    </button>
                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div id="editModal" class="fixed inset-0 z-50 hidden flex bg-gray-900 bg-opacity-50 items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-xl font-bold mb-4 text-[#5E9EB2]">Edit User</h2>

            <form id="editForm" action="{{ route('user.update', $item->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="edit_name" class="block text-gray-700">Name</label>
                    <input type="text" id="edit_name" name="name" value="{{ old('name', $item->name) }}"
                        class="bg-gray-200 border rounded p-2 w-full">
                </div>

                <div class="mb-4">
                    <label for="edit_email" class="block text-gray-700">Email</label>
                    <input type="email" id="edit_email" name="email" value="{{ old('email', $item->email) }}"
                        class="bg-gray-200 border rounded p-2 w-full">
                </div>

                <div class="mb-4">
                    <label for="edit_nisn" class="block text-gray-700">NISN</label>
                    <input type="text" id="edit_nisn" name="nisn" value="{{ old('nisn', $item->nisn) }}"
                        class="bg-gray-200 border rounded p-2 w-full">
                </div>

                <div class="mb-4">
                    <label for="edit_role" class="block text-gray-700">Role</label>
                    <select id="edit_role" name="role" class="bg-gray-200 border rounded p-2 w-full">
                        <option value="siswa" {{ old('role', $item->role) == 'siswa' ? 'selected' : '' }}>Siswa
                        </option>
                        <option value="guru" {{ old('role', $item->role) == 'guru' ? 'selected' : '' }}>Guru
                        </option>
                        <option value="sekretaris" {{ old('role', $item->role) == 'sekretaris' ? 'selected' : '' }}>
                            Sekretaris</option>
                        <option value="kepala_sekolah"
                            {{ old('role', $item->role) == 'kepala_sekolah' ? 'selected' : '' }}>Kepala Sekolah
                        </option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="edit_profile_picture" class="block text-gray-700">Profile Picture</label>
                    <input type="file" id="edit_profile_picture" name="profile_picture"
                        class="bg-gray-200 border rounded p-2 w-full">
                </div>

                <div class="mb-4" id="mapel_field"
                    style="display: {{ old('role', $item->role) === 'guru' ? 'block' : 'none' }};">
                    <label for="edit_mapel" class="block text-gray-700">Mapel</label>
                    <input type="text" id="edit_mapel" name="mapel" value="{{ old('mapel', $item->mapel) }}"
                        class="bg-gray-200 border rounded p-2 w-full">
                </div>

                <div class="mb-4" id="jurusan_field"
                    style="display: {{ old('role', $item->role) === 'siswa' || old('role', $item->role) === 'sekretaris' ? 'block' : 'none' }};">
                    <label for="edit_jurusan" class="block text-gray-700">Jurusan</label>
                    <input type="text" id="edit_jurusan" name="jurusan"
                        value="{{ old('jurusan', $item->jurusan) }}" class="bg-gray-200 border rounded p-2 w-full">
                </div>

                <div class="mb-4" id="kelas_field"
                    style="display: {{ old('role', $item->role) === 'siswa' || old('role', $item->role) === 'sekretaris' ? 'block' : 'none' }};">
                    <label for="edit_kelas" class="block text-gray-700">Kelas</label>
                    <input type="text" id="edit_kelas" name="kelas" value="{{ old('kelas', $item->kelas) }}"
                        class="bg-gray-200 border rounded p-2 w-full">
                </div>


                <div class="flex justify-end">
                    <button type="button" id="closeModal"
                        class="bg-red-500 text-white rounded px-4 py-2 mr-2">Cancel</button>
                    <button type="submit" class="bg-[#5E9EB2] text-white rounded px-4 py-2">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('edit_role').addEventListener('change', function() {
            const role = this.value;
            document.getElementById('mapel_field').style.display = role === 'guru' ? 'block' : 'none';
            document.getElementById('jurusan_field').style.display = role === 'siswa' ? 'block' : 'none';
            document.getElementById('kelas_field').style.display = role === 'siswa' ? 'block' : 'none';
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('editModal');
            const closeModal = document.getElementById('closeModal');
            const editForm = document.getElementById('editForm');

            // Function to open the modal and populate the form
            function openModal(actionUrl, user) {
                editForm.action = actionUrl;
                document.getElementById('edit_name').value = user.name;
                document.getElementById('edit_email').value = user.email;
                document.getElementById('edit_nisn').value = user.nisn;
                document.getElementById('edit_role').value = user.role;
                document.getElementById('edit_mapel').value = user.mapel || '';
                document.getElementById('edit_jurusan').value = user.jurusan || '';
                document.getElementById('edit_kelas').value = user.kelas || '';

                document.getElementById('mapel_field').style.display = user.role === 'guru' ? 'block' : 'none';
                document.getElementById('jurusan_field').style.display = user.role === 'siswa' || user.role ===
                    'sekretaris' ? 'block' : 'none';
                document.getElementById('kelas_field').style.display = user.role === 'siswa' || user.role ===
                    'sekretaris' ? 'block' : 'none';

                editModal.classList.remove('hidden');
            }

            // Event listener for close button
            closeModal.addEventListener('click', function() {
                editModal.classList.add('hidden');
            });

            // Event listener for Edit button
            document.querySelectorAll('.edit-button').forEach(button => {
                button.addEventListener('click', function() {
                    const user = this.dataset.user;
                    const actionUrl = this.dataset.action;
                    openModal(actionUrl, JSON.parse(user));
                });
            });
        });
    </script>


</body>

</html>
