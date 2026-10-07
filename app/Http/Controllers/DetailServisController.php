<?php

namespace App\Http\Controllers;

use App\Models\DetailServis;
use App\Models\BookingServis;
use App\Models\LayananServis;
use App\Models\SparePart;
use Illuminate\Http\Request;

class DetailServisController extends Controller
{
    public function index()
    {
        $detail = DetailServis::with([
            'bookingServis.pelanggan',
            'bookingServis.kendaraan',
            'layananServis',
            'sparePart'
        ])->get();

        return view('detailservis.index', compact('detail'));
    }

    public function create()
    {
        $booking = BookingServis::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        $layanan = LayananServis::all();

        $sparepart = SparePart::all();

        return view('detailservis.create', compact(
            'booking',
            'layanan',
            'sparepart'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
            'layanan_id' => 'required',
            'id_sparepart' => 'nullable',
            'harga' => 'required|numeric',
            'catatan' => 'nullable',
        ]);

        DetailServis::create([
            'booking_id' => $request->booking_id,
            'layanan_id' => $request->layanan_id,
            'id_sparepart' => $request->id_sparepart ?: null,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
        ]);

        return redirect('/detailservis');
    }

    public function edit($id)
    {
        $detail = DetailServis::findOrFail($id);

        $booking = BookingServis::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        $layanan = LayananServis::all();

        $sparepart = SparePart::all();

        return view('detailservis.edit', compact(
            'detail',
            'booking',
            'layanan',
            'sparepart'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'booking_id' => 'required',
            'layanan_id' => 'required',
            'id_sparepart' => 'nullable',
            'harga' => 'required|numeric',
            'catatan' => 'nullable',
        ]);

        $detail = DetailServis::findOrFail($id);

        $detail->update([
            'booking_id' => $request->booking_id,
            'layanan_id' => $request->layanan_id,
            'id_sparepart' => $request->id_sparepart ?: null,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
        ]);

        return redirect('/detailservis');
    }

    public function destroy($id)
    {
        $detail = DetailServis::findOrFail($id);

        $detail->delete();

        return redirect('/detailservis');
    }
}