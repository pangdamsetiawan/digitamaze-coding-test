<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return response()->json(['data' => $gurus]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $guru = Guru::create($request->all());
        return response()->json(['data' => $guru], 201);
    }

    public function show(Guru $guru)
    {
        return response()->json(['data' => $guru]);
    }

    public function update(Request $request, Guru $guru)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus,nip,' . $guru->id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $guru->update($request->all());
        return response()->json(['data' => $guru]);
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return response()->json(['message' => 'Data guru berhasil dihapus']);
    }
}
