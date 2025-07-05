<?php
namespace App\Livewire\Summary;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.summary.index', [
            'listSiswa' => Siswa::with('kelas')->get(),
            'listKelas' => Kelas::all(),
            'listGuru' => Guru::with('kelas')->get(), // Mengambil guru beserta data kelasnya
        ]);
    }
}
