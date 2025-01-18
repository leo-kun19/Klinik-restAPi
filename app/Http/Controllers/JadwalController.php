<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Menampilkan semua data jadwal
    public function index()
    {
        return \App\Models\Jadwal::with('dokter')->get();
    }

    // Menambahkan data jadwal baru
    public function store(Request $request)
    {
        return \App\Models\Jadwal::create($request->all());
    }

    // Menampilkan data jadwal berdasarkan ID
    public function show($id)
    {
        return \App\Models\Jadwal::with('dokter')->findOrFail($id);
    }

    // Mengupdate data jadwal
    public function update(Request $request, $id)
    {
        $jadwal = \App\Models\Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        return $jadwal;
    }

    // Menghapus data jadwal
    public function destroy($id)
    {
        \App\Models\Jadwal::destroy($id);
        return response()->json(['message' => 'Jadwal deleted']);
    }
}

