<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Http\Request;

class EkspedisiController extends Controller
{
    public function index()
    {
        $ekspedisi = Ekspedisi::with([
            'pengiriman'
        ])->get();

        return view('ekspedisi.index', compact('ekspedisi'));
    }

    public function create()
    {
        return view('ekspedisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekspedisi' => 'required',
            'kontak' => 'nullable',
        ]);

        Ekspedisi::create([
            'nama_ekspedisi' => $request->nama_ekspedisi,
            'kontak' => $request->kontak,
        ]);

        return redirect('/ekspedisi');
    }

    public function edit($id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);

        return view('ekspedisi.edit', compact('ekspedisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ekspedisi' => 'required',
            'kontak' => 'nullable',
        ]);

        $ekspedisi = Ekspedisi::findOrFail($id);

        $ekspedisi->update([
            'nama_ekspedisi' => $request->nama_ekspedisi,
            'kontak' => $request->kontak,
        ]);

        return redirect('/ekspedisi');
    }

    public function destroy($id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);

        $ekspedisi->delete();

        return redirect('/ekspedisi');
    }
}