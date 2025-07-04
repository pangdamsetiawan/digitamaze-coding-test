<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Menampilkan semua data kelas.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json([
            'message' => 'Data kelas berhasil diambil',
            'data' => $kelas
        ], 200);
    }

    /**
     * Menyimpan data kelas baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:kelas',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kelas = Kelas::create($request->all());

        return response()->json([
            'message' => 'Data kelas berhasil dibuat',
            'data' => $kelas
        ], 201);
    }

    /**
     * Menampilkan satu data kelas.
     */
    public function show(Kelas $kela)
    {
        // Di Laravel, kita bisa langsung inject model seperti ini,
        // tapi kita ganti variabelnya ke $kela karena 'kelas' adalah nama tabel.
        return response()->json([
            'message' => 'Detail data kelas berhasil diambil',
            'data' => $kela
        ], 200);
    }

    /**
     * Meng-update data kelas.
     */
    public function update(Request $request, Kelas $kela)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:kelas,nama,' . $kela->id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kela->update($request->all());

        return response()->json([
            'message' => 'Data kelas berhasil diupdate',
            'data' => $kela
        ], 200);
    }

    /**
     * Menghapus data kelas.
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return response()->json([
            'message' => 'Data kelas berhasil dihapus'
        ], 200);
    }
}
