@extends('layouts.app')

@section('title', 'Edit Layanan Servis')

@section('breadcrumb')
    <span>Manajemen Servis</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/layanan">Layanan Servis</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Layanan Servis</h1>
            <p class="page-subtitle">Ubah data layanan: {{ $layanan->nama_layanan }}</p>
        </div>
        <a href="/layanan" class="btn btn-secondary">
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
                <i class="fas fa-tools" style="color:var(--color-accent);margin-right:6px"></i>
                Form Edit Layanan Servis
            </h3>
        </div>
        <div class="card-body">
            <form action="/layanan/{{ $layanan->id_layanan }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nama_layanan">Nama Layanan <span style="color:red">*</span></label>
                    <input type="text" id="nama_layanan" name="nama_layanan" class="form-control"
                           value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="kategori">Kategori <span style="color:red">*</span></label>
                    <input type="text" id="kategori" name="kategori" class="form-control"
                           value="{{ old('kategori', $layanan->kategori) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="harga">Harga <span style="color:red">*</span></label>
                    <input type="number" id="harga" name="harga" class="form-control"
                           value="{{ old('harga', $layanan->harga) }}" required min="0">
                </div>

                <div class="form-group">
                    <label class="form-label" for="estimasi_waktu">Estimasi Waktu <span style="color:red">*</span></label>
                    <input type="text" id="estimasi_waktu" name="estimasi_waktu" class="form-control"
                           value="{{ old('estimasi_waktu', $layanan->estimasi_waktu) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/layanan" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
