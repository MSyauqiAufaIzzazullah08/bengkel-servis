<?php

namespace App\Http\Controllers;

use App\Models\KategoriSparePart;
use Illuminate\Http\Request;

class KategoriSparePartController extends Controller
{
    public function index()
    {
        $kategori = KategoriSparePart::with([
            'sparePart'
        ])->get();

        return view('kategori-sparepart.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori-sparepart.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ]);

        KategoriSparePart::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/kategori-sparepart');
    }

    public function edit($id)
    {
        $kategori = KategoriSparePart::findOrFail($id);

        return view('kategori-sparepart.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kategori = KategoriSparePart::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/kategori-sparepart');
    }

    public function destroy($id)
    {
        $kategori = KategoriSparePart::findOrFail($id);

        $kategori->delete();

        return redirect('/kategori-sparepart');
    }
}