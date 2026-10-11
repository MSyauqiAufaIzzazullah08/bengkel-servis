@extends('layouts.app')

@section('title', 'Tambah Kategori Spare Part')

@section('breadcrumb')
    <span>Inventaris</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/kategori-sparepart">Kategori Spare Part</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Kategori Spare Part</h1>
            <p class="page-subtitle">Isi form berikut untuk menambah kategori spare part baru</p>
        </div>
        <a href="/kategori-sparepart" class="btn btn-secondary">
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
                <i class="fas fa-tags" style="color:var(--color-accent);margin-right:6px"></i>
                Form Tambah Kategori Spare Part
            </h3>
        </div>
        <div class="card-body">
            <form action="/kategori-sparepart" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="nama_kategori">Nama Kategori <span style="color:red">*</span></label>
                    <input type="text" id="nama_kategori" name="nama_kategori" class="form-control"
                           value="{{ old('nama_kategori') }}" required placeholder="Masukkan nama kategori">
                </div>

                <div class="form-group">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"
                              placeholder="Deskripsi kategori (opsional)">{{ old('deskripsi') }}</textarea>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/kategori-sparepart" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
