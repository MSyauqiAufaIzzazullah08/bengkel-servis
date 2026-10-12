@extends('layouts.app')

@section('title', 'Tambah Montir Lapangan')

@section('breadcrumb')
    <span>Manajemen SDM</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/montirlapangan">Montir Lapangan</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Montir Lapangan</h1>
            <p class="page-subtitle">Isi form berikut untuk menambah montir lapangan baru</p>
        </div>
        <a href="/montirlapangan" class="btn btn-secondary">
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
                <i class="fas fa-motorcycle" style="color:var(--color-accent);margin-right:6px"></i>
                Form Tambah Montir Lapangan
            </h3>
        </div>
        <div class="card-body">
            <form action="/montirlapangan" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="user_id">User Akun <span style="color:red">*</span></label>
                    <select id="user_id" name="user_id" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id_user }}"
                                {{ old('user_id') == $user->id_user ? 'selected' : '' }}>
                                {{ $user->nama }} ({{ $user->role->nama_role ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="nama">Nama Montir <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama" class="form-control"
                           value="{{ old('nama') }}" required placeholder="Masukkan nama montir">
                </div>

                <div class="form-group">
                    <label class="form-label" for="no_hp">No HP <span style="color:red">*</span></label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                           value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxx">
                </div>

                <div class="form-group">
                    <label class="form-label" for="area_tugas">Area Tugas <span style="color:red">*</span></label>
                    <input type="text" id="area_tugas" name="area_tugas" class="form-control"
                           value="{{ old('area_tugas') }}" required
                           placeholder="Contoh: Jakarta Selatan">
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">Status <span style="color:red">*</span></label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/montirlapangan" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
