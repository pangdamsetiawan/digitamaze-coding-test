<div>
    <div class="mb-4">
        <label for="filterKelas" class="mr-2">Filter Berdasarkan Kelas:</label>
        <select wire:model.live="filterKelasId" id="filterKelas" class="border rounded p-1">
            <option value="">Semua Kelas</option>
            @foreach ($listKelas as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>
    </div>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 px-4 text-left">#</th>
                <th class="py-3 px-4 text-left">Nama Guru</th>
                <th class="py-3 px-4 text-left">NIP</th>
                <th class="py-3 px-4 text-left">Mengajar di Kelas</th>
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
                            <span class="bg-gray-200 rounded-full px-2 py-1 text-xs">{{ $k->nama }}</span>
                        @endforeach
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-4">Data tidak ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
