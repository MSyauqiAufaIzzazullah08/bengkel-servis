<?php

namespace App\Http\Controllers;

use App\Models\HomeServis;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\MontirLapangan;
use Illuminate\Http\Request;

class HomeServisController extends Controller
{
    public function index()
    {
        $homeServis = HomeServis::with([
            'pelanggan',
            'kendaraan',
            'montirLapangan'
        ])->get();

        return view('homeservice.index', compact('homeServis'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::with('pelanggan')->get();
        $montir = MontirLapangan::all();

        return view('homeservice.create', compact(
            'pelanggan',
            'kendaraan',
            'montir'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'id_kendaraan' => 'required',
            'id_montir' => 'nullable',
            'alamat' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        HomeServis::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_kendaraan' => $request->id_kendaraan,
            'id_montir' => $request->id_montir ?: null,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect('/homeservice');
    }

    public function edit($id)
    {
        $homeServis = HomeServis::findOrFail($id);

        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::with('pelanggan')->get();
        $montir = MontirLapangan::all();

        return view('homeservice.edit', compact(
            'homeServis',
            'pelanggan',
            'kendaraan',
            'montir'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'id_kendaraan' => 'required',
            'id_montir' => 'nullable',
            'alamat' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        $homeServis = HomeServis::findOrFail($id);

        $homeServis->update([
            'id_pelanggan' => $request->id_pelanggan,
            'id_kendaraan' => $request->id_kendaraan,
            'id_montir' => $request->id_montir ?: null,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect('/homeservice');
    }

    public function destroy($id)
    {
        $homeServis = HomeServis::findOrFail($id);

        $homeServis->delete();

        return redirect('/homeservice');
    }
}