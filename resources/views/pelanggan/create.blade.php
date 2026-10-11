@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('breadcrumb')
    <span>Data Master</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/pelanggan">Pelanggan</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Pelanggan</h1>
            <p class="page-subtitle">Isi form berikut untuk menambah pelanggan baru</p>
        </div>
        <a href="/pelanggan" class="btn btn-secondary">
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
                Form Tambah Pelanggan
            </h3>
        </div>
        <div class="card-body">
            <form action="/pelanggan" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nama">Nama Pelanggan <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama" class="form-control"
                           value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email <span style="color:red">*</span></label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email') }}" required placeholder="contoh@email.com">
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
                    <label class="form-label" for="tanggal_daftar">Tanggal Daftar <span style="color:red">*</span></label>
                    <input type="date" id="tanggal_daftar" name="tanggal_daftar" class="form-control"
                           value="{{ old('tanggal_daftar', date('Y-m-d')) }}" required>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/pelanggan" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
