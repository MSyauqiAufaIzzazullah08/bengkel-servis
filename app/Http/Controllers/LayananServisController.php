<?php

namespace App\Http\Controllers;

use App\Models\LayananServis;
use Illuminate\Http\Request;

class LayananServisController extends Controller
{
    public function index()
    {
        $layanan = LayananServis::with([
            'bookingServis',
            'detailServis'
        ])->get();

        return view('layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'estimasi_waktu' => 'required',
            'deskripsi' => 'nullable',
        ]);

        LayananServis::create([
            'nama_layanan' => $request->nama_layanan,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'estimasi_waktu' => $request->estimasi_waktu,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/layanan');
    }

    public function edit($id)
    {
        $layanan = LayananServis::findOrFail($id);

        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'estimasi_waktu' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $layanan = LayananServis::findOrFail($id);

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'estimasi_waktu' => $request->estimasi_waktu,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/layanan');
    }

    public function destroy($id)
    {
        $layanan = LayananServis::findOrFail($id);

        $layanan->delete();

        return redirect('/layanan');
    }
}