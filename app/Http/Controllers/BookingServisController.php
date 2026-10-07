<?php

namespace App\Http\Controllers;

use App\Models\BookingServis;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\Cabang;
use App\Models\LayananServis;
use Illuminate\Http\Request;

class BookingServisController extends Controller
{
    public function index()
    {
        $booking = BookingServis::with([
            'pelanggan',
            'kendaraan',
            'cabang',
            'layananServis'
        ])->get();

        return view('booking.index', compact('booking'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();

        $kendaraan = Kendaraan::with('pelanggan')->get();

        $cabang = Cabang::all();

        $layanan = LayananServis::all();

        return view('booking.create', compact(
            'pelanggan',
            'kendaraan',
            'cabang',
            'layanan'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'id_kendaraan' => 'required',
            'id_cabang' => 'required',
            'layanan_id' => 'required',
            'tanggal_booking' => 'required|date',
            'waktu_booking' => 'required',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        BookingServis::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_kendaraan' => $request->id_kendaraan,
            'id_cabang' => $request->id_cabang,
            'layanan_id' => $request->layanan_id,
            'tanggal_booking' => $request->tanggal_booking,
            'waktu_booking' => $request->waktu_booking,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect('/booking');
    }

    public function edit($id)
    {
        $booking = BookingServis::findOrFail($id);

        $pelanggan = Pelanggan::all();

        $kendaraan = Kendaraan::with('pelanggan')->get();

        $cabang = Cabang::all();

        $layanan = LayananServis::all();

        return view('booking.edit', compact(
            'booking',
            'pelanggan',
            'kendaraan',
            'cabang',
            'layanan'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'id_kendaraan' => 'required',
            'id_cabang' => 'required',
            'layanan_id' => 'required',
            'tanggal_booking' => 'required|date',
            'waktu_booking' => 'required',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        $booking = BookingServis::findOrFail($id);

        $booking->update([
            'id_pelanggan' => $request->id_pelanggan,
            'id_kendaraan' => $request->id_kendaraan,
            'id_cabang' => $request->id_cabang,
            'layanan_id' => $request->layanan_id,
            'tanggal_booking' => $request->tanggal_booking,
            'waktu_booking' => $request->waktu_booking,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect('/booking');
    }

    public function destroy($id)
    {
        $booking = BookingServis::findOrFail($id);

        $booking->delete();

        return redirect('/booking');
    }
}