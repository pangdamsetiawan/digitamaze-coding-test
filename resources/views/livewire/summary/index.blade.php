<div class="flex flex-col gap-8">

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4 border-b pb-2">Daftar Semua Kelas</h3>
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($listKelas as $item)
                    <tr>
                        <td class="py-3 px-3">{{ $loop->iteration }}</td>
                        <td class="py-3 px-3">{{ $item->nama }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="text-center py-4">Data belum ada</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4 border-b pb-2">Daftar Semua Guru</h3>
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Guru</th>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">NIP</th>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">Mengajar di Kelas</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($listGuru as $item)
                    <tr>
                        <td class="py-3 px-3">{{ $loop->iteration }}</td>
                        <td class="py-3 px-3">{{ $item->nama }}</td>
                        <td class="py-3 px-3">{{ $item->nip }}</td>
                        {{-- Kolom baru untuk menampilkan kelas yang diajar --}}
                        <td class="py-3 px-3">
                            @foreach ($item->kelas as $k)
                                <span class="bg-gray-200 rounded-full px-2 py-1 text-xs font-semibold text-gray-700 mr-1">
                                    {{ $k->nama }}
                                </span>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4">Data belum ada</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4 border-b pb-2">Daftar Semua Siswa</h3>
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Siswa</th>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">NIS</th>
                    <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($listSiswa as $item)
                    <tr>
                        <td class="py-3 px-3">{{ $loop->iteration }}</td>
                        <td class="py-3 px-3">{{ $item->nama }}</td>
                        <td class="py-3 px-3">{{ $item->nis }}</td>
                        <td class="py-3 px-3">{{ $item->kelas->nama ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4">Data belum ada</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
