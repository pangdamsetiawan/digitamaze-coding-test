<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Kontainer untuk semua kartu --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="{{ route('kelas') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center hover:bg-gray-50 transition">
                    <div class="mb-4">
                        <h3 class="font-bold text-2xl">🎓</h3>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Manajemen Kelas</h3>
                    <p class="text-gray-600 text-sm">Atur semua data kelas di sekolah.</p>
                </a>

                <a href="{{ route('guru') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center hover:bg-gray-50 transition">
                    <div class="mb-4">
                        <h3 class="font-bold text-2xl">👩‍🏫</h3>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Manajemen Guru</h3>
                    <p class="text-gray-600 text-sm">Atur semua data guru pengajar.</p>
                </a>

                <a href="{{ route('siswa') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center hover:bg-gray-50 transition">
                    <div class="mb-4">
                        <h3 class="font-bold text-2xl">🧑‍🎓</h3>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Manajemen Siswa</h3>
                    <p class="text-gray-600 text-sm">Atur semua data siswa di sekolah.</p>
                </a>

                <a href="{{ route('summary') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center hover:bg-gray-50 transition">
                    <div class="mb-4">
                        <h3 class="font-bold text-2xl">📊</h3>
                    </div>
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">List Siswa,Kelas dan Guru</h3>
                    <p class="text-gray-600 text-sm">Lihat semua data dalam satu halaman.</p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
