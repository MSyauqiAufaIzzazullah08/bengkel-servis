<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\OrderSparePart;
use App\Models\Ekspedisi;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = Pengiriman::with([
            'orderSparePart.pelanggan',
            'ekspedisi'
        ])->get();

        return view('pengiriman.index', compact('pengiriman'));
    }

    public function create()
    {
        $orders = OrderSparePart::with('pelanggan')->get();
        $ekspedisi = Ekspedisi::all();

        return view('pengiriman.create', compact(
            'orders',
            'ekspedisi'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_order' => 'required',
            'id_ekspedisi' => 'required',
            'kurir' => 'required',
            'no_resi' => 'required',
            'status' => 'required',
            'estimasi_tiba' => 'nullable|date',
            'tanggal_kirim' => 'nullable|date',
        ]);

        Pengiriman::create([
            'id_order' => $request->id_order,
            'id_ekspedisi' => $request->id_ekspedisi,
            'kurir' => $request->kurir,
            'no_resi' => $request->no_resi,
            'status' => $request->status,
            'estimasi_tiba' => $request->estimasi_tiba,
            'tanggal_kirim' => $request->tanggal_kirim,
        ]);

        return redirect('/pengiriman');
    }

    public function edit($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);

        $orders = OrderSparePart::with('pelanggan')->get();
        $ekspedisi = Ekspedisi::all();

        return view('pengiriman.edit', compact(
            'pengiriman',
            'orders',
            'ekspedisi'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_order' => 'required',
            'id_ekspedisi' => 'required',
            'kurir' => 'required',
            'no_resi' => 'required',
            'status' => 'required',
            'estimasi_tiba' => 'nullable|date',
            'tanggal_kirim' => 'nullable|date',
        ]);

        $pengiriman = Pengiriman::findOrFail($id);

        $pengiriman->update([
            'id_order' => $request->id_order,
            'id_ekspedisi' => $request->id_ekspedisi,
            'kurir' => $request->kurir,
            'no_resi' => $request->no_resi,
            'status' => $request->status,
            'estimasi_tiba' => $request->estimasi_tiba,
            'tanggal_kirim' => $request->tanggal_kirim,
        ]);

        return redirect('/pengiriman');
    }

    public function destroy($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);

        $pengiriman->delete();

        return redirect('/pengiriman');
    }
}