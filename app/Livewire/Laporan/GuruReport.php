<?php

namespace App\Livewire\Laporan;

use App\Models\Kelas;
use Livewire\Component;

class GuruReport extends Component
{
    public $filterKelasId = '';

    public function render()
    {
        // Ambil data KELAS dan filter berdasarkan ID kelas jika ada
        // Muat juga relasi gurunya agar efisien
        $kelas = Kelas::with('gurus')
            ->when($this->filterKelasId, function ($query) {
                $query->where('id', $this->filterKelasId);
            })
            ->get();

        return view('livewire.laporan.guru-report', [
            'listSemuaKelas' => Kelas::all(), // Untuk dropdown filter
            'listKelasDenganGuru' => $kelas, // Data utama yang sudah dikelompokkan
        ]);
    }
}
