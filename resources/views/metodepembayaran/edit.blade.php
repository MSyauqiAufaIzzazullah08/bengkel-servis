@extends('layouts.app')

@section('title', 'Edit Metode Pembayaran')

@section('breadcrumb')
    <span>Keuangan</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/metodepembayaran">Metode Pembayaran</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Metode Pembayaran</h1>
            <p class="page-subtitle">Ubah data metode: {{ $metode->nama_metode }}</p>
        </div>
        <a href="/metodepembayaran" class="btn btn-secondary">
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
                <i class="fas fa-credit-card" style="color:var(--color-accent);margin-right:6px"></i>
                Form Edit Metode Pembayaran
            </h3>
        </div>
        <div class="card-body">
            <form action="/metodepembayaran/{{ $metode->id_metode }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nama_metode">Nama Metode <span style="color:red">*</span></label>
                    <input type="text" id="nama_metode" name="nama_metode" class="form-control"
                           value="{{ old('nama_metode', $metode->nama_metode) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $metode->deskripsi) }}</textarea>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/metodepembayaran" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
