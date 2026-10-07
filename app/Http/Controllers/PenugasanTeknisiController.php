<?php

namespace App\Http\Controllers;

use App\Models\PenugasanTeknisi;
use App\Models\BookingServis;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class PenugasanTeknisiController extends Controller
{
    public function index()
    {
        $penugasan = PenugasanTeknisi::with([
            'bookingServis.pelanggan',
            'bookingServis.kendaraan',
            'teknisi'
        ])->get();

        return view('penugasan.index', compact('penugasan'));
    }

    public function create()
    {
        $booking = BookingServis::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        $teknisi = Teknisi::all();

        return view('penugasan.create', compact(
            'booking',
            'teknisi'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_booking' => 'required',
            'id_teknisi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        PenugasanTeknisi::create([
            'id_booking' => $request->id_booking,
            'id_teknisi' => $request->id_teknisi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect('/penugasan');
    }

    public function edit($id)
    {
        $penugasan = PenugasanTeknisi::findOrFail($id);

        $booking = BookingServis::with([
            'pelanggan',
            'kendaraan'
        ])->get();

        $teknisi = Teknisi::all();

        return view('penugasan.edit', compact(
            'penugasan',
            'booking',
            'teknisi'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_booking' => 'required',
            'id_teknisi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        $penugasan = PenugasanTeknisi::findOrFail($id);

        $penugasan->update([
            'id_booking' => $request->id_booking,
            'id_teknisi' => $request->id_teknisi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect('/penugasan');
    }

    public function destroy($id)
    {
        $penugasan = PenugasanTeknisi::findOrFail($id);

        $penugasan->delete();

        return redirect('/penugasan');
    }
}