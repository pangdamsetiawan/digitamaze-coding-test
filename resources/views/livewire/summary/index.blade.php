<div>
    {{-- Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('kelas') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            &larr; Kembali ke Manajemen Kelas
        </a>
    </div>
<div>
<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-xl font-bold mb-4 border-b pb-2">Ringkasan Data Sekolah</h3>

    <table class="min-w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border">Kelas</th>
                <th class="py-2 px-4 border">Nama Guru</th>
                <th class="py-2 px-4 border"> Nama Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listData as $data)
                <tr>
                    <td class="py-2 px-4 border">{{ $data['kelas'] }}</td>
                    <td class="py-2 px-4 border">{{ $data['guru'] }}</td>
                    <td class="py-2 px-4 border">{{ $data['siswa'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
