<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Menampilkan semua data pasien
    public function index()
    {
        return \App\Models\Pasien::all();
    }

    // Menambahkan data pasien baru
    public function store(Request $request)
    {
        return \App\Models\Pasien::create($request->all());
    }

    // Menampilkan data pasien berdasarkan ID
    public function show($id)
    {
        return \App\Models\Pasien::findOrFail($id);
    }

    // Mengupdate data pasien
    public function update(Request $request, $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->update($request->all());
        return $pasien;
    }

    // Menghapus data pasien
    public function destroy($id)
    {
        \App\Models\Pasien::destroy($id);
        return response()->json(['message' => 'Pasien deleted']);
    }
}
