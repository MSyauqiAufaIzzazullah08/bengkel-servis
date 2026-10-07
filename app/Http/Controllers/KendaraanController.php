<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan semua kendaraan
    public function index()
    {
        $kendaraan = Kendaraan::with([
            'pelanggan',
            'bookingServis',
            'homeServis'
        ])->get();

        return view('kendaraan.index', compact('kendaraan'));
    }

    // Form tambah kendaraan
    public function create()
    {
        $pelanggan = Pelanggan::orderBy('nama')->get();

        return view('kendaraan.create', compact('pelanggan'));
    }

    // Menyimpan kendaraan
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:Pelanggan,id_pelanggan',
            'merk' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'tahun' => 'required|integer|min:1900|max:2100',
            'nopol' => 'required|string|max:20',
        ]);

        Kendaraan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'merk' => $request->merk,
            'model' => $request->model,
            'tahun' => $request->tahun,
            'nopol' => $request->nopol,
        ]);

        return redirect('/kendaraan')
            ->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    // Form edit kendaraan
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $pelanggan = Pelanggan::orderBy('nama')->get();

        return view('kendaraan.edit', compact(
            'kendaraan',
            'pelanggan'
        ));
    }

    // Update kendaraan
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:Pelanggan,id_pelanggan',
            'merk' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'tahun' => 'required|integer|min:1900|max:2100',
            'nopol' => 'required|string|max:20',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->update([
            'id_pelanggan' => $request->id_pelanggan,
            'merk' => $request->merk,
            'model' => $request->model,
            'tahun' => $request->tahun,
            'nopol' => $request->nopol,
        ]);

        return redirect('/kendaraan')
            ->with('success', 'Data kendaraan berhasil diubah.');
    }

    // Hapus kendaraan
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->delete();

        return redirect('/kendaraan')
            ->with('success', 'Kendaraan berhasil dihapus.');
    }
}