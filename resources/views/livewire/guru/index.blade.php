<div>
    {{-- Tombol dan Pesan Sukses --}}
    <button wire:click="create()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4">
        Tambah Guru
    </button>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    {{-- Modal Form --}}
    @if ($isModalOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">{{ $guru_id ? 'Edit Guru' : 'Tambah Guru Baru' }}</h2>
                <form wire:submit.prevent="store">
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama Guru:</label>
                        <input type="text" id="nama" wire:model="nama" class="shadow w-full border rounded py-2 px-3">
                        @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nip" class="block text-gray-700">NIP:</label>
                        <input type="text" id="nip" wire:model="nip" class="shadow w-full border rounded py-2 px-3">
                        @error('nip') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Kelas yang Diajar:</label>
                        <div class="grid grid-cols-3 gap-2 mt-2">
                            @foreach ($listKelas as $k)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" wire:model.live="selectedKelas" value="{{ $k->id }}" class="form-checkbox h-5 w-5 text-blue-600">
                                        <span class="ml-2 text-gray-700">{{ $k->nama }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ $guru_id ? 'Update' : 'Simpan' }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Filter Dropdown --}}
    <div class="mb-4">
        <label for="filterKelas" class="mr-2">Filter Berdasarkan Kelas:</label>
        <select wire:model.live="filterKelasId" id="filterKelas" class="border rounded p-1">
            <option value="">Semua Kelas</option>
            @foreach ($listKelas as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>
    </div>

    {{-- Tabel Data --}}
    <h3 class="text-lg font-bold mb-4">Daftar Guru</h3>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 px-4 text-left">#</th>
                <th class="py-3 px-4 text-left">Nama Guru</th>
                <th class="py-3 px-4 text-left">NIP</th>
                <th class="py-3 px-4 text-left">Mengajar di Kelas</th>
                <th class="py-3 px-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($listGuru as $item)
                <tr class="border-b">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">{{ $item->nama }}</td>
                    <td class="py-3 px-4">{{ $item->nip }}</td>
                    <td class="py-3 px-4">
                        @foreach ($item->kelas as $k)
                            <span class="bg-gray-200 rounded-full px-2 py-1 text-xs font-semibold text-gray-700 mr-2">{{ $k->nama }}</span>
                        @endforeach
                    </td>
                    <td class="py-3 px-4 flex gap-2">
                        <button wire:click="edit({{ $item->id }})" class="bg-blue-500 text-white font-bold py-1 px-2 rounded">Edit</button>

                        {{-- Tombol Hapus dengan Modal Kustom Alpine.js --}}
                        <div x-data="{ showModal: false, itemId: null }">
                            <button @click="showModal = true; itemId = {{ $item->id }};" class="bg-red-500 text-white font-bold py-1 px-2 rounded">
                                Hapus
                            </button>

                            <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" @click.away="showModal = false">
                                <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                                    <h2 class="text-lg font-bold mb-4">Konfirmasi Hapus</h2>
                                    <p class="mb-4">Apakah Anda yakin ingin menghapus data ini?</p>
                                    <div class="flex justify-end">
                                        <button @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                            Batal
                                        </button>
                                        <button wire:click="delete(itemId)" @click="showModal = false" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Ya, Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Data belum ada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
