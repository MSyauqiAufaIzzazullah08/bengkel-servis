<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\BookingServis;
use App\Models\OrderSparePart;
use App\Models\Promo;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with([
            'bookingServis.pelanggan',
            'orderSparePart.pelanggan',
            'promo',
            'metodePembayaran'
        ])->get();

        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $booking = BookingServis::with('pelanggan')->get();
        $orders = OrderSparePart::with('pelanggan')->get();
        $promo = Promo::all();
        $metode = MetodePembayaran::all();

        return view('pembayaran.create', compact(
            'booking',
            'orders',
            'promo',
            'metode'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_booking' => 'nullable',
            'id_order' => 'nullable',
            'id_promo' => 'nullable',
            'metode_pembayaran_id' => 'required',
            'jumlah' => 'required|numeric|min:0',
            'status' => 'required',
            'tanggal_bayar' => 'nullable|date',
            'bukti_pembayaran' => 'nullable',
        ]);

        Pembayaran::create([
            'id_booking' => $request->id_booking ?: null,
            'id_order' => $request->id_order ?: null,
            'id_promo' => $request->id_promo ?: null,
            'metode_pembayaran_id' => $request->metode_pembayaran_id,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'tanggal_bayar' => $request->tanggal_bayar,
            'bukti_pembayaran' => $request->bukti_pembayaran,
        ]);

        return redirect('/pembayaran');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $booking = BookingServis::with('pelanggan')->get();
        $orders = OrderSparePart::with('pelanggan')->get();
        $promo = Promo::all();
        $metode = MetodePembayaran::all();

        return view('pembayaran.edit', compact(
            'pembayaran',
            'booking',
            'orders',
            'promo',
            'metode'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_booking' => 'nullable',
            'id_order' => 'nullable',
            'id_promo' => 'nullable',
            'metode_pembayaran_id' => 'required',
            'jumlah' => 'required|numeric|min:0',
            'status' => 'required',
            'tanggal_bayar' => 'nullable|date',
            'bukti_pembayaran' => 'nullable',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([
            'id_booking' => $request->id_booking ?: null,
            'id_order' => $request->id_order ?: null,
            'id_promo' => $request->id_promo ?: null,
            'metode_pembayaran_id' => $request->metode_pembayaran_id,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'tanggal_bayar' => $request->tanggal_bayar,
            'bukti_pembayaran' => $request->bukti_pembayaran,
        ]);

        return redirect('/pembayaran');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect('/pembayaran');
    }
}