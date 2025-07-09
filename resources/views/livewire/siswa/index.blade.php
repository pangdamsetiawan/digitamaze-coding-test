<div>
    {{-- Tombol dan Pesan Sukses --}}
    <button wire:click="create()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4">
        Tambah Siswa
    </button>
    <a href="{{ route('laporan.orangtua') }}" wire:navigate class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
    Tabel Siswa dan orangtuanya
    </a>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    {{-- Modal Form --}}
    @if ($isModalOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">{{ $siswa_id ? 'Edit Siswa' : 'Tambah Siswa Baru' }}</h2>
                <form wire:submit.prevent="store">
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama Siswa:</label>
                        <input type="text" id="nama" wire:model="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                        @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nis" class="block text-gray-700">NIS:</label>
                        <input type="text" id="nis" wire:model="nis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                        @error('nis') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kelas_id" class="block text-gray-700">Kelas:</label>
                        <select id="kelas_id" wire:model="kelas_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($listKelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ $siswa_id ? 'Update' : 'Simpan' }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Tabel Data --}}
    <h3 class="text-lg font-bold mb-4">Daftar Siswa</h3>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">#</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama Siswa</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">NIS</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Kelas</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($listSiswa as $item)
                <tr class="border-b">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">{{ $item->nama }}</td>
                    <td class="py-3 px-4">{{ $item->nis }}</td>
                    <td class="py-3 px-4">{{ $item->kelas->nama ?? 'N/A' }}</td>
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
