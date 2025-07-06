<?php

namespace App\Livewire\Laporan;

use App\Models\Kelas;
use Livewire\Component;

class SiswaReport extends Component
{
    public $filterKelasId = '';

    public function render()
    {
        // Ambil data KELAS (bukan siswa) dan filter berdasarkan ID kelas jika ada
        $kelas = Kelas::with('siswas')
            ->when($this->filterKelasId, function ($query) {
                $query->where('id', $this->filterKelasId);
            })
            ->get();

        return view('livewire.laporan.siswa-report', [
            'listSemuaKelas' => Kelas::all(), // Untuk dropdown filter
            'listKelasDenganSiswa' => $kelas, // Data utama yang sudah dikelompokkan
        ]);
    }
}
