<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use App\Models\User;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisi = Teknisi::with([
            'user',
            'penugasanTeknisi.bookingServis'
        ])->get();

        return view('teknisi.index', compact('teknisi'));
    }

    public function create()
    {
        $users = User::where('role_id', 4)
            ->orderBy('nama')
            ->get();

        return view('teknisi.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:User,id_user|unique:Teknisi,user_id',
            'nama' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'keahlian' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        Teknisi::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'keahlian' => $request->keahlian,
            'status' => $request->status,
        ]);

        return redirect('/teknisi')
            ->with('success', 'Teknisi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $teknisi = Teknisi::findOrFail($id);

        $users = User::where('role_id', 4)
            ->orderBy('nama')
            ->get();

        return view('teknisi.edit', compact(
            'teknisi',
            'users'
        ));
    }

    public function update(Request $request, $id)
    {
        $teknisi = Teknisi::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:User,id_user|unique:Teknisi,user_id,' . $id . ',id_teknisi',
            'nama' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'keahlian' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $teknisi->update([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'keahlian' => $request->keahlian,
            'status' => $request->status,
        ]);

        return redirect('/teknisi')
            ->with('success', 'Data teknisi berhasil diubah.');
    }

    public function destroy($id)
    {
        $teknisi = Teknisi::findOrFail($id);

        if ($teknisi->penugasanTeknisi()->exists()) {
            return redirect('/teknisi')
                ->with(
                    'error',
                    'Teknisi tidak dapat dihapus karena masih memiliki penugasan.'
                );
        }

        $teknisi->delete();

        return redirect('/teknisi')
            ->with('success', 'Teknisi berhasil dihapus.');
    }
}