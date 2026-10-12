@extends('layouts.app')

@section('title', 'Tambah User')

@section('breadcrumb')
    <span>Manajemen Pengguna</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/user">User</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah User</h1>
            <p class="page-subtitle">Isi form berikut untuk menambah user baru</p>
        </div>
        <a href="/user" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom:20px">
            <i class="fas fa-times-circle alert-icon"></i>
            <div>
                <div class="alert-title">Terjadi kesalahan:</div>
                <ul style="margin:4px 0 0 16px;padding:0">
                    @foreach ($errors->all() as $error)
                        <li style="font-size:0.875rem">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-user-plus" style="color:var(--color-accent);margin-right:6px"></i>
                Form Tambah User
            </h3>
        </div>
        <div class="card-body">
            <form action="/user" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nama">Nama <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama" class="form-control"
                           value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email <span style="color:red">*</span></label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email') }}" required placeholder="contoh@email.com">
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password <span style="color:red">*</span></label>
                    <input type="password" id="password" name="password" class="form-control"
                           required placeholder="Minimal 6 karakter">
                </div>

                <div class="form-group">
                    <label class="form-label" for="no_hp">No HP <span style="color:red">*</span></label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                           value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxx">
                </div>

                <div class="form-group">
                    <label class="form-label" for="alamat">Alamat <span style="color:red">*</span></label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="3"
                              required placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="role_id">Role <span style="color:red">*</span></label>
                    <select id="role_id" name="role_id" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id_role }}"
                                {{ old('role_id') == $role->id_role ? 'selected' : '' }}>
                                {{ $role->nama_role }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="cabang_id">Cabang</label>
                    <select id="cabang_id" name="cabang_id" class="form-control">
                        <option value="">-- Semua Cabang --</option>
                        @foreach ($cabang as $item)
                            <option value="{{ $item->id_cabang }}"
                                {{ old('cabang_id') == $item->id_cabang ? 'selected' : '' }}>
                                {{ $item->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">Status <span style="color:red">*</span></label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/user" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
