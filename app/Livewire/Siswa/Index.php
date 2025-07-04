<?php

namespace App\Livewire\Siswa;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public $nama, $nis, $kelas_id;
    public $siswa_id;
    public $isModalOpen = false;

    public function render()
    {
        return view('livewire.siswa.index', [
            'listSiswa' => Siswa::with('kelas')->latest()->get(),
            'listKelas' => Kelas::all(),
        ]);
    }

    public function create()
    {
        $this->reset(['nama', 'nis', 'kelas_id', 'siswa_id']);
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $this->siswa_id = $id;
        $this->nama = $siswa->nama;
        $this->nis = $siswa->nis;
        $this->kelas_id = $siswa->kelas_id;
        $this->isModalOpen = true;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswas,nis,' . $this->siswa_id,
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Siswa::updateOrCreate(
            ['id' => $this->siswa_id],
            [
                'nama' => $this->nama,
                'nis' => $this->nis,
                'kelas_id' => $this->kelas_id
            ]
        );

        session()->flash('message', $this->siswa_id ? 'Data siswa berhasil diupdate.' : 'Data siswa berhasil ditambahkan.');

        $this->closeModal();
        $this->reset(['nama', 'nis', 'kelas_id', 'siswa_id']);
    }

    public function delete($id)
    {
        Siswa::find($id)->delete();
        session()->flash('message', 'Data siswa berhasil dihapus.');
    }
}
