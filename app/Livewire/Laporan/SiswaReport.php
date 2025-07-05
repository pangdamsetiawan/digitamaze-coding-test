<?php
namespace App\Livewire\Laporan;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class SiswaReport extends Component
{
    public $filterKelasId = '';

    public function render()
    {
        $siswas = Siswa::with('kelas')
            ->when($this->filterKelasId, function ($query) {
                $query->where('kelas_id', $this->filterKelasId);
            })
            ->get();

        return view('livewire.laporan.siswa-report', [
            'listSiswa' => $siswas,
            'listKelas' => Kelas::all(),
        ]);
    }
}
