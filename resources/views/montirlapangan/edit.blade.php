@extends('layouts.app')

@section('title', 'Edit Montir Lapangan')

@section('breadcrumb')
    <span>Manajemen SDM</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/montirlapangan">Montir Lapangan</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Montir Lapangan</h1>
            <p class="page-subtitle">Ubah data montir: {{ $montir->nama }}</p>
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
                Form Edit Montir Lapangan
            </h3>
        </div>
        <div class="card-body">
            <form action="/montirlapangan/{{ $montir->id_montir }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="user_id">User Akun <span style="color:red">*</span></label>
                    <select id="user_id" name="user_id" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id_user }}"
                                {{ old('user_id', $montir->user_id) == $user->id_user ? 'selected' : '' }}>
                                {{ $user->nama }} ({{ $user->role->nama_role ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="nama">Nama Montir <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama" class="form-control"
                           value="{{ old('nama', $montir->nama) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="no_hp">No HP <span style="color:red">*</span></label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                           value="{{ old('no_hp', $montir->no_hp) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="area_tugas">Area Tugas <span style="color:red">*</span></label>
                    <input type="text" id="area_tugas" name="area_tugas" class="form-control"
                           value="{{ old('area_tugas', $montir->area_tugas) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">Status <span style="color:red">*</span></label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="aktif"
                            {{ old('status', $montir->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif"
                            {{ old('status', $montir->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/montirlapangan" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
