<div>
    {{-- Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('siswa') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            &larr; Kembali ke Manajemen Siswa
        </a>
    </div>
<div>
<div>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 text-left w-16">No</th>
                <th class="py-2 px-4 text-left">Nama Orang Tua</th>
                <th class="py-2 px-4 text-left">Nama Siswa</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse ($listOrangtua as $item)
                <tr>
                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ $item->nama }}</td>
                    <td class="py-2 px-4">{{ $item->siswa->nama ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">Tidak ada data orang tua.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
