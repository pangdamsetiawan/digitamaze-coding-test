<div>
    {{-- BAGIAN ATAS HALAMAN --}}
    <div class="flex justify-between items-center mb-4">
        {{-- Judul dipindahkan ke sini --}}
        <h3 class="text-lg font-bold">Daftar Kelas</h3>

        {{-- Grup Tombol di Kanan --}}
        <div class="flex gap-2">
            <a href="{{ route('laporan.siswa') }}" wire:navigate class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                List Siswa berdasarkan kelasnya
            </a>
            <a href="{{ route('laporan.guru') }}" wire:navigate class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                List Guru berdasarkan Kelasnya
            </a>
            <a href="{{ route('summary') }}" wire:navigate class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                List guru dan siswa
            </a>
            <button wire:click="create()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Tambah Kelas
            </button>
        </div>
    </div>


    {{-- Pesan Sukses --}}
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    {{-- Modal Form --}}
    @if ($isModalOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">{{ $kelas_id ? 'Edit Kelas' : 'Tambah Kelas Baru' }}</h2>
                <form wire:submit.prevent="store">
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Kelas:</label>
                        <input type="text" id="nama" wire:model="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Batal
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ $kelas_id ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Tabel Data --}}
    <table class="min-w-full bg-white">
        <thead class="bg-gray-200">
            <tr>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">#</th>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nama Kelas</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($listKelas as $item)
                <tr class="border-b">
                    <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="text-left py-3 px-4">{{ $item->nama }}</td>
                    <td class="text-left py-3 px-4 flex gap-2">
                        <button wire:click="edit({{ $item->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                            Edit
                        </button>
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
                    <td colspan="3" class="text-center py-4">Data belum ada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
