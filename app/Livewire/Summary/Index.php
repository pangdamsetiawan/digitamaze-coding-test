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
        'listGuru' => Guru::select('nama')->get(),
        'listSiswa' => Siswa::select('nama')->get(),
        'listKelas' => Kelas::select('nama')->get(),
    ]);
}

}
