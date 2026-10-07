<?php

namespace App\Http\Controllers;

use App\Models\MontirLapangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MontirLapanganController extends Controller
{
    public function index()
    {
        $montir = MontirLapangan::with([
            'user',
            'homeServis'
        ])->get();

        return view('montirlapangan.index', compact('montir'));
    }

    public function create()
    {
        $users = User::with('role')->get();

        return view('montirlapangan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => [
                'required',
                Rule::unique('MontirLapangan', 'user_id')
            ],
            'nama' => 'required',
            'no_hp' => 'required',
            'area_tugas' => 'required',
            'status' => 'required',
        ]);

        MontirLapangan::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'area_tugas' => $request->area_tugas,
            'status' => $request->status,
        ]);

        return redirect('/montirlapangan');
    }

    public function edit($id)
    {
        $montir = MontirLapangan::findOrFail($id);

        $users = User::with('role')->get();

        return view(
            'montirlapangan.edit',
            compact('montir', 'users')
        );
    }

    public function update(Request $request, $id)
    {
        $montir = MontirLapangan::findOrFail($id);

        $request->validate([
            'user_id' => [
                'required',
                Rule::unique('MontirLapangan', 'user_id')
                    ->ignore($montir->id_montir, 'id_montir')
            ],
            'nama' => 'required',
            'no_hp' => 'required',
            'area_tugas' => 'required',
            'status' => 'required',
        ]);

        $montir->update([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'area_tugas' => $request->area_tugas,
            'status' => $request->status,
        ]);

        return redirect('/montirlapangan');
    }

    public function destroy($id)
    {
        $montir = MontirLapangan::findOrFail($id);

        $montir->delete();

        return redirect('/montirlapangan');
    }
}