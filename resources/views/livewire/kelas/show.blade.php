<div>
    {{-- Tombol Kembali --}}
    <a href="{{ route('kelas') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mb-4">
        &larr; Kembali ke Daftar Kelas
    </a>

    {{-- Tabel Daftar Siswa --}}
    <div class="mb-8">
        <h3 class="text-lg font-bold mb-4">Daftar Siswa di Kelas {{ $kelas->nama }}</h3>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left">#</th>
                    <th class="py-3 px-4 text-left">Nama Siswa</th>
                    <th class="py-3 px-4 text-left">NIS</th>
                    <th class="py-3 px-4 text-left">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kelas->siswas as $siswa)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $siswa->nama }}</td>
                        <td class="py-3 px-4">{{ $siswa->nis }}</td>
                        <td class="py-3 px-4">{{ $kelas->nama }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4">Belum ada siswa di kelas ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tabel Daftar Guru --}}
    <div>
        <h3 class="text-lg font-bold mb-4">Daftar Guru untuk Kelas {{ $kelas->nama }}</h3>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left">#</th>
                    <th class="py-3 px-4 text-left">Nama Guru</th>
                    <th class="py-3 px-4 text-left">NIP</th>
                    <th class="py-3 px-4 text-left">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kelas->gurus as $guru)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $guru->nama }}</td>
                        <td class="py-3 px-4">{{ $guru->nip }}</td>
                        <td class="py-3 px-4">{{ $kelas->nama }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4">Belum ada guru yang mengajar di kelas ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
