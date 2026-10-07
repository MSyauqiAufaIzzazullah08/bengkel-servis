<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan semua pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::with([
            'kendaraan',
            'bookingServis',
            'orderSparePart',
            'homeServis',
            'rating'
        ])->get();

        return view('pelanggan.index', compact('pelanggan'));
    }

    // Menampilkan form tambah pelanggan
    public function create()
    {
        return view('pelanggan.create');
    }

    // Menyimpan pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_daftar' => $request->tanggal_daftar,
        ]);

        return redirect('/pelanggan')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Menampilkan form edit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    // Mengupdate pelanggan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_daftar' => $request->tanggal_daftar,
        ]);

        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan berhasil diubah.');
    }

    // Menghapus pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();

        return redirect('/pelanggan')
            ->with('success', 'Pelanggan berhasil dihapus.');
    }
}