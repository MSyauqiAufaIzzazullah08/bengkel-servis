<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::with('users')->get();

        return view('role.index', compact('role'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        Role::create([
            'nama_role' => $request->nama_role,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/role')
            ->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_role' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'nama_role' => $request->nama_role,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/role')
            ->with('success', 'Data role berhasil diubah.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->users()->exists()) {
            return redirect('/role')
                ->with('error', 'Role tidak dapat dihapus karena masih digunakan oleh user.');
        }

        $role->delete();

        return redirect('/role')
            ->with('success', 'Role berhasil dihapus.');
    }
}