<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $metode = MetodePembayaran::with('pembayarans')->get();

        return view('metodepembayaran.index', compact('metode'));
    }

    public function create()
    {
        return view('metodepembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_metode' => 'required',
            'deskripsi' => 'nullable',
        ]);

        MetodePembayaran::create([
            'nama_metode' => $request->nama_metode,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/metodepembayaran');
    }

    public function edit($id)
    {
        $metode = MetodePembayaran::findOrFail($id);

        return view('metodepembayaran.edit', compact('metode'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_metode' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $metode = MetodePembayaran::findOrFail($id);

        $metode->update([
            'nama_metode' => $request->nama_metode,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/metodepembayaran');
    }

    public function destroy($id)
    {
        $metode = MetodePembayaran::findOrFail($id);

        $metode->delete();

        return redirect('/metodepembayaran');
    }
}