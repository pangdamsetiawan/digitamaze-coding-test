<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Index extends Component
{
    public $nama;
    public $kelas_id; // Properti untuk menyimpan ID saat edit
    public $isModalOpen = false;

    public function render()
    {
        $kelas = Kelas::all();
        return view('livewire.kelas.index', [
            'listKelas' => $kelas,
        ]);
    }

    public function create()
    {
        $this->reset(['nama', 'kelas_id']); // Reset juga kelas_id
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function edit($id)
    {
        $kela = Kelas::findOrFail($id);
        $this->kelas_id = $id;
        $this->nama = $kela->nama;
        $this->isModalOpen = true;
    }

    public function store()
    {
        $this->validate([
            // Validasi unik akan mengabaikan id saat ini jika sedang mengedit
            'nama' => 'required|string|max:255|unique:kelas,nama,' . $this->kelas_id,
        ]);

        // Cari berdasarkan ID, atau buat baru jika ID tidak ada
        Kelas::updateOrCreate(
            ['id' => $this->kelas_id],
            ['nama' => $this->nama]
        );

        session()->flash('message', $this->kelas_id ? 'Data kelas berhasil diupdate.' : 'Data kelas berhasil ditambahkan.');

        $this->closeModal();
        $this->reset(['nama', 'kelas_id']);
    }

    public function delete($id)
    {
        Kelas::find($id)->delete();
        session()->flash('message', 'Data kelas berhasil dihapus.');
    }
}
