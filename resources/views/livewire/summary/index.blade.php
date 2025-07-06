<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-xl font-bold mb-4 border-b pb-2">Ringkasan Data Sekolah</h3>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700 border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Guru</th>
                    <th class="px-4 py-2 border">Nama Siswa</th>
                    <th class="px-4 py-2 border">Nama Kelas</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $max = max(count($listGuru), count($listSiswa), count($listKelas));
                @endphp

                @for ($i = 0; $i < $max; $i++)
                    <tr class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="px-4 py-2 border">{{ $i + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $listGuru[$i]->nama ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $listSiswa[$i]->nama ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $listKelas[$i]->nama ?? '-' }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
