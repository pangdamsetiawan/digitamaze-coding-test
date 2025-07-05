<?php

namespace App\Livewire\Laporan;

use App\Models\Guru;
use App\Models\Kelas;
use Livewire\Component;

class GuruReport extends Component
{
    public $filterKelasId = '';

    public function render()
    {
        $gurus = Guru::with('kelas')
            ->when($this->filterKelasId, function ($query) {
                $query->whereHas('kelas', function ($subQuery) {
                    $subQuery->where('kelas.id', $this->filterKelasId);
                });
            })
            ->get();

        return view('livewire.laporan.guru-report', [
            'listGuru' => $gurus,
            'listKelas' => Kelas::all(),
        ]);
    }
}
