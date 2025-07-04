<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        // Mengambil siswa beserta data kelasnya menggunakan eager loading
        $siswas = Siswa::with('kelas')->get();
        return response()->json(['data' => $siswas]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswas',
            'kelas_id' => 'required|exists:kelas,id', // Memastikan kelas_id ada di tabel kelas
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $siswa = Siswa::create($request->all());
        return response()->json(['data' => $siswa->load('kelas')], 201);
    }

    public function show(Siswa $siswa)
    {
        // Memuat relasi kelas saat menampilkan detail
        return response()->json(['data' => $siswa->load('kelas')]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswas,nis,' . $siswa->id,
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $siswa->update($request->all());
        return response()->json(['data' => $siswa->load('kelas')]);
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return response()->json(['message' => 'Data siswa berhasil dihapus']);
    }
}
