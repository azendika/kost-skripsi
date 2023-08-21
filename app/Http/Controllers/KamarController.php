<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\LokasiKos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KamarController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $katakunci = $request->input('katakunci');

$data = Kamar::when($katakunci, function ($query) use ($katakunci) {
        return $query->where('no_kamar', 'like', "%$katakunci%");
    })
    ->orderBy('no_kamar', 'desc')
    ->paginate(5);

return view('kamar.index', compact('data'));
    }
    
    // Show the form for creating a new resource.
    public function create()
    {
        $lokasiKosOptions = LokasiKos::all();
        return view('kamar.create', compact('lokasiKosOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kamar' => 'required|string|unique:kamar,no_kamar',
            'harga' => 'required',
            'keterangan' => 'required',
            'fasilitas' => 'required',
        ], [
            'no_kamar.required' => 'no_kamar wajib di isi',
            'no_kamar.unique' => 'no_kamar sudah digunakan',
            'harga.required' => 'harga wajib di isi',
            'keterangan.required' => 'keterangan wajib di isi',
            'fasilitas.required' => 'fasilitas wajab di isi',
        ]);

        $lokasi = LokasiKos::findOrFail($request->lokasi_id); // Use lokasi_id instead of id

        $data = [
            'kost_id' => $lokasi->id,
            'no_kamar' => $request->no_kamar,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'fasilitas' => $request->fasilitas
        ];

        Kamar::create($data);
        return redirect()->route('kamar.index')->with('success', 'Berhasil menambahkan data');
    }

    // ... Other methods ...


    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $data = Kamar::findOrFail($id);
        return view('kamar.edit', compact('data'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'harga' => 'required',
            'keterangan' => 'required',
            'fasilitas' => 'required',
        ], [
            'harga.required' => 'harga wajib di isi',
            'keterangan.required' => 'keterangan wajib di isi',
            'fasilitas.required' => 'fasilitas wajab di isi'
        ]);

        $data = [
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'fasilitas' => $request->fasilitas
        ];

        Kamar::where('id', $id)->update($data);
        return redirect()->route('kamar.index')->with('success', 'Berhasil melakukan update data');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        Kamar::where('id', $id)->delete();
        return redirect()->route('kamar.index')->with('success', 'Berhasil melakukan delete');
    }
}
