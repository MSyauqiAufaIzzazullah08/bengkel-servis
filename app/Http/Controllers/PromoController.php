<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promo = Promo::with('pembayarans')->get();

        return view('promo.index', compact('promo'));
    }

    public function create()
    {
        return view('promo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_promo' => 'required',
            'jenis_diskon' => 'required',
            'nilai_diskon' => 'required|numeric',
            'minimal_transaksi' => 'required|numeric',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date',
            'kuota' => 'required|integer',
        ]);

        Promo::create([
            'kode_promo' => $request->kode_promo,
            'jenis_diskon' => $request->jenis_diskon,
            'nilai_diskon' => $request->nilai_diskon,
            'minimal_transaksi' => $request->minimal_transaksi,
            'periode_mulai' => $request->periode_mulai,
            'periode_selesai' => $request->periode_selesai,
            'kuota' => $request->kuota,
        ]);

        return redirect('/promo');
    }

    public function edit($id)
    {
        $promo = Promo::findOrFail($id);

        return view('promo.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_promo' => 'required',
            'jenis_diskon' => 'required',
            'nilai_diskon' => 'required|numeric',
            'minimal_transaksi' => 'required|numeric',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date',
            'kuota' => 'required|integer',
        ]);

        $promo = Promo::findOrFail($id);

        $promo->update([
            'kode_promo' => $request->kode_promo,
            'jenis_diskon' => $request->jenis_diskon,
            'nilai_diskon' => $request->nilai_diskon,
            'minimal_transaksi' => $request->minimal_transaksi,
            'periode_mulai' => $request->periode_mulai,
            'periode_selesai' => $request->periode_selesai,
            'kuota' => $request->kuota,
        ]);

        return redirect('/promo');
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);

        $promo->delete();

        return redirect('/promo');
    }
}