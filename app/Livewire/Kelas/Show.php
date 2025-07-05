<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Show extends Component
{
    public Kelas $kelas;

    public function mount(Kelas $kelas)
    {
        // Memuat relasi siswa dan guru agar lebih efisien
        $this->kelas = $kelas->load(['siswas', 'gurus']);
    }

    public function render()
    {
        return view('livewire.kelas.show');
    }
}
