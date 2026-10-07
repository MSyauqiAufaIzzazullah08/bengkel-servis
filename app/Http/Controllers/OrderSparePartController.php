<?php

namespace App\Http\Controllers;

use App\Models\OrderSparePart;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class OrderSparePartController extends Controller
{
    public function index()
    {
        $order = OrderSparePart::with([
            'pelanggan',
            'orderDetail.sparePart',
            'pengiriman.ekspedisi',
            'pembayaran.metodePembayaran',
            'rating'
        ])->get();

        return view('order.index', compact('order'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();

        return view('order.create', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'tanggal_order' => 'required|date',
            'status' => 'required',
            'total_harga' => 'required|numeric',
            'alamat_pengiriman' => 'required',
        ]);

        OrderSparePart::create([
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal_order' => $request->tanggal_order,
            'status' => $request->status,
            'total_harga' => $request->total_harga,
            'alamat_pengiriman' => $request->alamat_pengiriman,
        ]);

        return redirect('/order');
    }

    public function edit($id)
    {
        $order = OrderSparePart::findOrFail($id);

        $pelanggan = Pelanggan::all();

        return view('order.edit', compact(
            'order',
            'pelanggan'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'tanggal_order' => 'required|date',
            'status' => 'required',
            'total_harga' => 'required|numeric',
            'alamat_pengiriman' => 'required',
        ]);

        $order = OrderSparePart::findOrFail($id);

        $order->update([
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal_order' => $request->tanggal_order,
            'status' => $request->status,
            'total_harga' => $request->total_harga,
            'alamat_pengiriman' => $request->alamat_pengiriman,
        ]);

        return redirect('/order');
    }

    public function destroy($id)
    {
        $order = OrderSparePart::findOrFail($id);

        $order->delete();

        return redirect('/order');
    }
}