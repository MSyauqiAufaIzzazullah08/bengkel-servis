<?php

namespace App\Http\Controllers;

use App\Models\OperasionalCabang;
use App\Models\Cabang;
use Illuminate\Http\Request;

class OperasionalCabangController extends Controller
{
    public function index()
    {
        $operasional = OperasionalCabang::with([
            'cabang'
        ])->get();

        return view('operasional.index', compact('operasional'));
    }

    public function create()
    {
        $cabang = Cabang::whereDoesntHave('operasionalCabang')
            ->orderBy('nama_cabang')
            ->get();

        return view('operasional.create', compact('cabang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cabang_id' => 'required|exists:cabang,id_cabang|unique:OperasionalCabang,cabang_id',
            'total_booking' => 'required|integer|min:0',
            'total_transaksi' => 'required|integer|min:0',
            'pendapatan' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'laporan' => 'nullable|string|max:255',
        ]);

        OperasionalCabang::create([
            'cabang_id' => $request->cabang_id,
            'total_booking' => $request->total_booking,
            'total_transaksi' => $request->total_transaksi,
            'pendapatan' => $request->pendapatan,
            'stok' => $request->stok,
            'laporan' => $request->laporan,
        ]);

        return redirect('/operasional')
            ->with('success', 'Data operasional berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $operasional = OperasionalCabang::findOrFail($id);

        $cabang = Cabang::where(function ($query) use ($operasional) {
            $query->whereDoesntHave('operasionalCabang')
                ->orWhere('id_cabang', $operasional->cabang_id);
        })
        ->orderBy('nama_cabang')
        ->get();

        return view('operasional.edit', compact(
            'operasional',
            'cabang'
        ));
    }

    public function update(Request $request, $id)
    {
        $operasional = OperasionalCabang::findOrFail($id);

        $request->validate([
            'cabang_id' => 'required|exists:cabang,id_cabang|unique:OperasionalCabang,cabang_id,' . $id . ',id_operasional',
            'total_booking' => 'required|integer|min:0',
            'total_transaksi' => 'required|integer|min:0',
            'pendapatan' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'laporan' => 'nullable|string|max:255',
        ]);

        $operasional->update([
            'cabang_id' => $request->cabang_id,
            'total_booking' => $request->total_booking,
            'total_transaksi' => $request->total_transaksi,
            'pendapatan' => $request->pendapatan,
            'stok' => $request->stok,
            'laporan' => $request->laporan,
        ]);

        return redirect('/operasional')
            ->with('success', 'Data operasional berhasil diubah.');
    }

    public function destroy($id)
    {
        $operasional = OperasionalCabang::findOrFail($id);

        $operasional->delete();

        return redirect('/operasional')
            ->with('success', 'Data operasional berhasil dihapus.');
    }
}