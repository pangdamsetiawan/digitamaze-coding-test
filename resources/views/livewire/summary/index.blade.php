<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-xl font-bold mb-4 border-b pb-2">Ringkasan Data Sekolah</h3>

    <table class="min-w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th colspan="3" class="py-2 px-4 border text-center">Guru & Kelas</th>
                <th colspan="3" class="py-2 px-4 border text-center">Siswa & Kelas</th>
            </tr>
            <tr>
                <th class="py-2 px-4 border">No</th>
                <th class="py-2 px-4 border">Nama Guru</th>
                <th class="py-2 px-4 border">Kelas</th>
                <th class="py-2 px-4 border">No</th>
                <th class="py-2 px-4 border">Nama Siswa</th>
                <th class="py-2 px-4 border">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < $maxRow; $i++)
                <tr>
                    {{-- Kolom Guru --}}
                    <td class="py-2 px-4 border text-center">{{ isset($guruList[$i]) ? $i + 1 : '' }}</td>
                    <td class="py-2 px-4 border">{{ $guruList[$i]['nama'] ?? '-' }}</td>
                    <td class="py-2 px-4 border">{{ $guruList[$i]['kelas'] ?? '-' }}</td>

                    {{-- Kolom Siswa --}}
                    <td class="py-2 px-4 border text-center">{{ isset($siswaList[$i]) ? $i + 1 : '' }}</td>
                    <td class="py-2 px-4 border">{{ $siswaList[$i]['nama'] ?? '-' }}</td>
                    <td class="py-2 px-4 border">{{ $siswaList[$i]['kelas'] ?? '-' }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
