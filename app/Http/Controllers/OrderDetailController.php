<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderSparePart;
use App\Models\SparePart;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::with([
            'orderSparePart.pelanggan',
            'sparePart'
        ])->get();

        return view('orderdetail.index', compact('orderDetails'));
    }

    public function create()
    {
        $orders = OrderSparePart::with('pelanggan')->get();
        $spareParts = SparePart::all();

        return view('orderdetail.create', compact(
            'orders',
            'spareParts'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_order' => 'required',
            'id_sparepart' => 'required',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        OrderDetail::create([
            'id_order' => $request->id_order,
            'id_sparepart' => $request->id_sparepart,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect('/orderdetail');
    }

    public function edit($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);

        $orders = OrderSparePart::with('pelanggan')->get();
        $spareParts = SparePart::all();

        return view('orderdetail.edit', compact(
            'orderDetail',
            'orders',
            'spareParts'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_order' => 'required',
            'id_sparepart' => 'required',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        $orderDetail = OrderDetail::findOrFail($id);

        $orderDetail->update([
            'id_order' => $request->id_order,
            'id_sparepart' => $request->id_sparepart,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect('/orderdetail');
    }

    public function destroy($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);

        $orderDetail->delete();

        return redirect('/orderdetail');
    }
}