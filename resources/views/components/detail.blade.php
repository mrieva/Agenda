<div id="modalLihat{{ $tugas->id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Tugas: {{ $tugas->judul }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="modalLihat{{ $tugas->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="{{ route('update-nilai', $tugas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nilai" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Nilai</label>
                        <input type="text" id="nilai" name="nilai" value="{{ $tugas->nilai }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#5E9EB2] focus:border-[#5E9EB2] block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Status</label>
                        <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#5E9EB2] focus:border-[#5E9EB2] block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="Belum Diperiksa" {{ $tugas->status == 'Belum Diperiksa' ? 'selected' : '' }}>
                                Belum Diperiksa</option>
                            <option value="Sudah Diperiksa" {{ $tugas->status == 'Sudah Diperiksa' ? 'selected' : '' }}>
                                Sudah Diperiksa</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="submit"
                            class="px-4 py-2 bg-[#5E9EB2] text-white rounded-lg">Update</button>
                        <button type="button" data-modal-hide="modalLihat{{ $tugas->id }}"
                            class="px-4 py-2 bg-gray-300 text-black rounded-lg">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
