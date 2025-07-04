<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-lg font-bold mb-4 border-b pb-2">Daftar Kelas</h3>
        <ul class="list-disc list-inside">
            @forelse ($listKelas as $item)
                <li>{{ $item->nama }}</li>
            @empty
                <li class="list-none">Data belum ada</li>
            @endforelse
        </ul>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-lg font-bold mb-4 border-b pb-2">Daftar Guru</h3>
        <ul class="list-disc list-inside">
            @forelse ($listGuru as $item)
                <li>{{ $item->nama }}</li>
            @empty
                <li class="list-none">Data belum ada</li>
            @endforelse
        </ul>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <h3 class="text-lg font-bold mb-4 border-b pb-2">Daftar Siswa</h3>
        <ul class="list-disc list-inside">
            @forelse ($listSiswa as $item)
                <li>{{ $item->nama }} (Kelas: {{ $item->kelas->nama ?? 'N/A' }})</li>
            @empty
                <li class="list-none">Data belum ada</li>
            @endforelse
        </ul>
    </div>

</div>
