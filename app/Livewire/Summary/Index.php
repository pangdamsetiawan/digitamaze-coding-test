<?php

namespace App\Livewire\Summary;

use App\Models\Guru;
use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $guruList = [];

        $gurus = Guru::with('kelas')->get();
        foreach ($gurus as $guru) {
            if ($guru->kelas->isEmpty()) {
                $guruList[] = ['nama' => $guru->nama, 'kelas' => '-'];
            } else {
                foreach ($guru->kelas as $kelas) {
                    $guruList[] = ['nama' => $guru->nama, 'kelas' => $kelas->nama];
                }
            }
        }

        $siswaList = [];

        $siswas = Siswa::with('kelas')->get();
        foreach ($siswas as $siswa) {
            $siswaList[] = ['nama' => $siswa->nama, 'kelas' => $siswa->kelas->nama ?? '-'];
        }

        // jumlah baris maksimal
        $max = max(count($guruList), count($siswaList));

        return view('livewire.summary.index', [
            'guruList' => $guruList,
            'siswaList' => $siswaList,
            'maxRow' => $max
        ]);
    }
}
