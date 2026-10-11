@extends('layouts.app')

@section('title', 'Edit Ekspedisi')

@section('breadcrumb')
    <span>Pengiriman</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/ekspedisi">Ekspedisi</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Ekspedisi</h1>
            <p class="page-subtitle">Ubah data ekspedisi: {{ $ekspedisi->nama_ekspedisi }}</p>
        </div>
        <a href="/ekspedisi" class="btn btn-secondary">
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
                <i class="fas fa-truck" style="color:var(--color-accent);margin-right:6px"></i>
                Form Edit Ekspedisi
            </h3>
        </div>
        <div class="card-body">
            <form action="/ekspedisi/{{ $ekspedisi->id_ekspedisi }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nama_ekspedisi">Nama Ekspedisi <span style="color:red">*</span></label>
                    <input type="text" id="nama_ekspedisi" name="nama_ekspedisi" class="form-control"
                           value="{{ old('nama_ekspedisi', $ekspedisi->nama_ekspedisi) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="kontak">Kontak</label>
                    <input type="text" id="kontak" name="kontak" class="form-control"
                           value="{{ old('kontak', $ekspedisi->kontak) }}">
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/ekspedisi" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
