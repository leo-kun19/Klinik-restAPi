<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan semua data obat
    public function index()
    {
        return \App\Models\Obat::all();
    }

    // Menambahkan data obat baru
    public function store(Request $request)
    {
        return \App\Models\Obat::create($request->all());
    }

    // Menampilkan data obat berdasarkan ID
    public function show($id)
    {
        return \App\Models\Obat::findOrFail($id);
    }

    // Mengupdate data obat
    public function update(Request $request, $id)
    {
        $obat = \App\Models\Obat::findOrFail($id);
        $obat->update($request->all());
        return $obat;
    }

    // Menghapus data obat
    public function destroy($id)
    {
        \App\Models\Obat::destroy($id);
        return response()->json(['message' => 'Obat deleted']);
    }
}
