<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use App\Models\KategoriSparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index()
    {
        $spareParts = SparePart::with([
            'kategori',
            'orderDetail'
        ])->get();

        return view('sparepart.index', compact('spareParts'));
    }

    public function create()
    {
        $kategori = KategoriSparePart::all();

        return view('sparepart.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable',
        ]);

        SparePart::create([
            'kategori_id' => $request->kategori_id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
        ]);

        return redirect('/sparepart');
    }

    public function edit($id)
    {
        $sparePart = SparePart::findOrFail($id);
        $kategori = KategoriSparePart::all();

        return view('sparepart.edit', compact(
            'sparePart',
            'kategori'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable',
        ]);

        $sparePart = SparePart::findOrFail($id);

        $sparePart->update([
            'kategori_id' => $request->kategori_id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
        ]);

        return redirect('/sparepart');
    }

    public function destroy($id)
    {
        $sparePart = SparePart::findOrFail($id);

        $sparePart->delete();

        return redirect('/sparepart');
    }
}