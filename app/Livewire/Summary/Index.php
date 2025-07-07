<?php

namespace App\Livewire\Summary;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $rows = collect();

        $kelasList = Kelas::with(['gurus', 'siswas'])->get();

        foreach ($kelasList as $kelas) {
            $max = max($kelas->gurus->count(), $kelas->siswas->count());

            for ($i = 0; $i < $max; $i++) {
                $rows->push([
                    'kelas' => $i === 0 ? $kelas->nama : '', // hanya di baris pertama
                    'guru' => $kelas->gurus[$i]->nama ?? '-',
                    'siswa' => $kelas->siswas[$i]->nama ?? '-',
                ]);
            }
        }

        return view('livewire.summary.index', [
            'listData' => $rows,
        ]);
    }
}
