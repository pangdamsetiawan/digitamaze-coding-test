<div>
    {{-- Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('kelas') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            &larr; Kembali ke Manajemen Kelas
        </a>
    </div>
<div>
    {{-- Filter Dropdown --}}
    <div class="mb-6">
        <label for="filterKelas" class="mr-2">Tampilkan Kelas Spesifik:</label>
        <select wire:model.live="filterKelasId" id="filterKelas" class="border rounded p-1">
            <option value="">Semua Kelas</option>
            @foreach ($listSemuaKelas as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>
    </div>

    {{-- Satu Tabel Gabungan --}}
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <table class="min-w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left w-16">#</th>
                    <th class="py-2 px-4 text-left">Nama Guru</th>
                    <th class="py-2 px-4 text-left">NIP</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($listKelasDenganGuru as $kelas)
                    {{-- Hanya tampilkan grup jika ada guru di dalamnya --}}
                    @if ($kelas->gurus->isNotEmpty())

                        {{-- Baris Khusus untuk Judul Kelas --}}
                        <tr class="bg-gray-100 font-bold">
                            <td colspan="3" class="py-2 px-4 text-gray-700">
                                Guru yang Mengajar di Kelas: {{ $kelas->nama }}
                            </td>
                        </tr>

                        {{-- Looping untuk guru di dalam kelas ini --}}
                        @foreach ($kelas->gurus as $guru)
                            <tr>
                                <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4">{{ $guru->nama }}</td>
                                <td class="py-2 px-4">{{ $guru->nip }}</td>
                            </tr>
                        @endforeach

                    @endif
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
