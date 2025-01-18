<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    // Menampilkan semua data rekam medis
    public function index()
    {
        return \App\Models\RekamMedis::with(['pasien', 'dokter'])->get();
    }

    // Menambahkan data rekam medis baru
    public function store(Request $request)
    {
        return \App\Models\RekamMedis::create($request->all());
    }

    // Menampilkan data rekam medis berdasarkan ID
    public function show($id)
    {
        return \App\Models\RekamMedis::with(['pasien', 'dokter'])->findOrFail($id);
    }

    // Mengupdate data rekam medis
    public function update(Request $request, $id)
    {
        $rekamMedis = \App\Models\RekamMedis::findOrFail($id);
        $rekamMedis->update($request->all());
        return $rekamMedis;
    }

    // Menghapus data rekam medis
    public function destroy($id)
    {
        \App\Models\RekamMedis::destroy($id);
        return response()->json(['message' => 'Rekam Medis deleted']);
    }
}
