<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with([
            'role',
            'cabang',
            'adminCabang',
            'teknisi',
            'montirLapangan'
        ])->get();

        return view('user.index', compact('user'));
    }

    public function create()
    {
        $roles = Role::orderBy('id_role')->get();
        $cabang = Cabang::orderBy('nama_cabang')->get();

        return view('user.create', compact(
            'roles',
            'cabang'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:User,email',
            'password' => 'required|string|min:6',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'role_id' => 'required|exists:Role,id_role',
            'cabang_id' => 'nullable|exists:cabang,id_cabang',
            'status' => 'required|string|max:50',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'role_id' => $request->role_id,
            'cabang_id' => $request->cabang_id ?: null,
            'status' => $request->status,
        ]);

        return redirect('/user')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::orderBy('id_role')->get();
        $cabang = Cabang::orderBy('nama_cabang')->get();

        return view('user.edit', compact(
            'user',
            'roles',
            'cabang'
        ));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:User,email,' . $id . ',id_user',
            'password' => 'nullable|string|min:6',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'role_id' => 'required|exists:Role,id_role',
            'cabang_id' => 'nullable|exists:cabang,id_cabang',
            'status' => 'required|string|max:50',
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->role_id = $request->role_id;
        $user->cabang_id = $request->cabang_id ?: null;
        $user->status = $request->status;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/user')
            ->with('success', 'Data user berhasil diubah.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/user')
            ->with('success', 'User berhasil dihapus.');
    }
}