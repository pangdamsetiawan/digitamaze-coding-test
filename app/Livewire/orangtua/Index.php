<?php

namespace App\Livewire\orangtua;

use App\Models\orangtua;
use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public $nama, $siswa_id, $orangtua_id;
    public $isModalOpen = false;

    public function render()
    {
        return view('livewire.orangtua.index', [
            'listOrangtua' => Orangtua::with('siswa')->get(),
            'listSiswa' => Siswa::all(),
        ]);
    }

    public function create()
    {
        $this->reset(['nama', 'siswa_id', 'orangtua_id']);
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function edit($id)
    {
        $orangtua = orangtua::findOrFail($id);
        $this -> orangtua_id = $id;
        $this->nama = $orangtua->nama;
        $this->siswa_id = $orangtua->siswa_id;
        $this->isModalOpen = true;
    }

      public function store() {
        $this->validate([
            'nama' => 'required|string|max:255',
            'siswa_id' => 'required|exists:siswas,id|unique:orangtuas,siswa_id,' . $this->orangtua_id,
        ]);
        Orangtua::updateOrCreate(['id' => $this->orangtua_id], [
            'nama' => $this->nama,
            'siswa_id' => $this->siswa_id,
        ]);
        session()->flash('message', $this->orangtua_id ? 'Data berhasil diupdate.' : 'Data berhasil ditambahkan.');
        $this->closeModal();
    }

    public function delete($id) {
        Orangtua::find($id)->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }
}
