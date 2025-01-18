<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
class DokterController extends Controller
{
    public function index()
    {
        return \App\Models\Dokter::all();
    }
    
    public function store(Request $request)
    {
        return \App\Models\Dokter::create($request->all());
    }
    
    public function update(Request $request, $id)
    {
        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->update($request->all());
        return $dokter;
    }
    
    public function destroy($id)
    {
        \App\Models\Dokter::destroy($id);
        return response()->json(['message' => 'Dokter deleted']);
    }
}
