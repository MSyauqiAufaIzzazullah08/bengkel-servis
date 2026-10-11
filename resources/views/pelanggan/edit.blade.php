@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('breadcrumb')
    <span>Data Master</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/pelanggan">Pelanggan</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Pelanggan</h1>
            <p class="page-subtitle">Ubah data pelanggan: {{ $pelanggan->nama }}</p>
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
                <i class="fas fa-user-edit" style="color:var(--color-accent);margin-right:6px"></i>
                Form Edit Pelanggan
            </h3>
        </div>
        <div class="card-body">
            <form action="/pelanggan/{{ $pelanggan->id_pelanggan }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nama">Nama Pelanggan <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama" class="form-control"
                           value="{{ old('nama', $pelanggan->nama) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email <span style="color:red">*</span></label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email', $pelanggan->email) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="no_hp">No HP <span style="color:red">*</span></label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                           value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="alamat">Alamat <span style="color:red">*</span></label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="3"
                              required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="tanggal_daftar">Tanggal Daftar <span style="color:red">*</span></label>
                    <input type="date" id="tanggal_daftar" name="tanggal_daftar" class="form-control"
                           value="{{ old('tanggal_daftar', $pelanggan->tanggal_daftar) }}" required>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/pelanggan" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
