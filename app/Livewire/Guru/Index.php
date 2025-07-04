<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use App\Models\Kelas; // <-- Tambahkan ini
use Livewire\Component;

class Index extends Component
{
    public $nama, $nip, $guru_id;
    public $isModalOpen = false;

    // Untuk menampung kelas-kelas yang dipilih untuk seorang guru
    public $selectedKelas = [];

    // Untuk memfilter daftar guru berdasarkan kelas
    public $filterKelasId = '';

    public function render()
    {
        // Query untuk memfilter guru jika filter kelas dipilih
        $gurus = Guru::with('kelas')
            ->when($this->filterKelasId, function ($query) {
                $query->whereHas('kelas', function ($subQuery) {
                    $subQuery->where('kelas.id', $this->filterKelasId);
                });
            })
            ->get();

        return view('livewire.guru.index', [
            'listGuru' => $gurus,
            'listKelas' => Kelas::all(), // <-- Kirim daftar semua kelas ke view
        ]);
    }

    public function create()
    {
        $this->reset(['nama', 'nip', 'guru_id', 'selectedKelas']);
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function edit($id)
    {
        $guru = Guru::with('kelas')->findOrFail($id);
        $this->guru_id = $id;
        $this->nama = $guru->nama;
        $this->nip = $guru->nip;
        // Ambil ID kelas yang diajar guru ini dan simpan ke properti
        $this->selectedKelas = $guru->kelas->pluck('id')->toArray();
        $this->isModalOpen = true;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus,nip,' . $this->guru_id,
        ]);

        $guru = Guru::updateOrCreate(
            ['id' => $this->guru_id],
            ['nama' => $this->nama, 'nip' => $this->nip]
        );

        // Sinkronkan kelas yang diajar guru ini di tabel pivot
        $guru->kelas()->sync($this->selectedKelas);

        session()->flash('message', $this->guru_id ? 'Data guru berhasil diupdate.' : 'Data guru berhasil ditambahkan.');

        $this->closeModal();
        $this->reset(['nama', 'nip', 'guru_id', 'selectedKelas']);
    }

    public function delete($id)
    {
        Guru::find($id)->delete();
        session()->flash('message', 'Data guru berhasil dihapus.');
    }
}
