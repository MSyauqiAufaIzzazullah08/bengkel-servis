<?php

namespace App\Http\Controllers;

use App\Models\AdminCabang;
use App\Models\User;
use App\Models\Cabang;
use Illuminate\Http\Request;

class AdminCabangController extends Controller
{
    public function index()
    {
        $adminCabang = AdminCabang::with([
            'user.role',
            'cabang'
        ])->get();

        return view('admincabang.index', compact('adminCabang'));
    }

    public function create()
    {
        $users = User::where('role_id', 2)
            ->whereDoesntHave('adminCabang')
            ->orderBy('nama')
            ->get();

        $cabang = Cabang::whereDoesntHave('adminCabang')
            ->orderBy('nama_cabang')
            ->get();

        return view('admincabang.create', compact(
            'users',
            'cabang'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:User,id_user|unique:AdminCabang,user_id',
            'cabang_id' => 'required|exists:cabang,id_cabang|unique:AdminCabang,cabang_id',
        ]);

        AdminCabang::create([
            'user_id' => $request->user_id,
            'cabang_id' => $request->cabang_id,
        ]);

        return redirect('/admincabang')
            ->with('success', 'Admin cabang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $adminCabang = AdminCabang::findOrFail($id);

        $users = User::where('role_id', 2)
            ->where(function ($query) use ($adminCabang) {
                $query->whereDoesntHave('adminCabang')
                    ->orWhere('id_user', $adminCabang->user_id);
            })
            ->orderBy('nama')
            ->get();

        $cabang = Cabang::where(function ($query) use ($adminCabang) {
                $query->whereDoesntHave('adminCabang')
                    ->orWhere('id_cabang', $adminCabang->cabang_id);
            })
            ->orderBy('nama_cabang')
            ->get();

        return view('admincabang.edit', compact(
            'adminCabang',
            'users',
            'cabang'
        ));
    }

    public function update(Request $request, $id)
    {
        $adminCabang = AdminCabang::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:User,id_user|unique:AdminCabang,user_id,' . $id . ',id_admin',
            'cabang_id' => 'required|exists:cabang,id_cabang|unique:AdminCabang,cabang_id,' . $id . ',id_admin',
        ]);

        $adminCabang->update([
            'user_id' => $request->user_id,
            'cabang_id' => $request->cabang_id,
        ]);

        return redirect('/admincabang')
            ->with('success', 'Data admin cabang berhasil diubah.');
    }

    public function destroy($id)
    {
        $adminCabang = AdminCabang::findOrFail($id);

        $adminCabang->delete();

        return redirect('/admincabang')
            ->with('success', 'Admin cabang berhasil dihapus.');
    }
}