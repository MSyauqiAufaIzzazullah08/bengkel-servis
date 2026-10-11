@extends('layouts.app')

@section('title', 'Tambah Cabang')

@section('breadcrumb')
    <span>Manajemen Cabang</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/cabang">Cabang</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Cabang</h1>
            <p class="page-subtitle">Isi form berikut untuk menambah cabang baru</p>
        </div>
        <a href="/cabang" class="btn btn-secondary">
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
                <i class="fas fa-building" style="color:var(--color-accent);margin-right:6px"></i>
                Form Tambah Cabang
            </h3>
        </div>
        <div class="card-body">
            <form action="/cabang" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nama_cabang">Nama Cabang <span style="color:red">*</span></label>
                    <input type="text" id="nama_cabang" name="nama_cabang" class="form-control"
                           value="{{ old('nama_cabang') }}" required placeholder="Masukkan nama cabang">
                </div>

                <div class="form-group">
                    <label class="form-label" for="alamat">Alamat <span style="color:red">*</span></label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="3"
                              required placeholder="Masukkan alamat cabang">{{ old('alamat') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="jam_operasional">Jam Operasional <span style="color:red">*</span></label>
                    <input type="text" id="jam_operasional" name="jam_operasional" class="form-control"
                           value="{{ old('jam_operasional') }}" required placeholder="Contoh: 08:00 - 17:00">
                </div>

                <div class="form-group">
                    <label class="form-label" for="kontak">Kontak <span style="color:red">*</span></label>
                    <input type="text" id="kontak" name="kontak" class="form-control"
                           value="{{ old('kontak') }}" required placeholder="Nomor telepon cabang">
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/cabang" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
