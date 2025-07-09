<?php

namespace App\Livewire\Laporan;

use App\Models\orangtua;
use Livewire\Component;

class OrangtuaReport extends Component
{
    public function render()
    {
        return view('livewire.laporan.orangtua-report',[
            'listOrangtua' => Orangtua::with('siswa')->get(),
        ]);
    }
}
