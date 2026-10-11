@extends('layouts.app')

@section('title', 'Edit Cabang')

@section('breadcrumb')
    <span>Manajemen Cabang</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/cabang">Cabang</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Cabang</h1>
            <p class="page-subtitle">Ubah data cabang: {{ $cabang->nama_cabang }}</p>
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
                Form Edit Cabang
            </h3>
        </div>
        <div class="card-body">
            <form action="/cabang/{{ $cabang->id_cabang }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nama_cabang">Nama Cabang <span style="color:red">*</span></label>
                    <input type="text" id="nama_cabang" name="nama_cabang" class="form-control"
                           value="{{ old('nama_cabang', $cabang->nama_cabang) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="alamat">Alamat <span style="color:red">*</span></label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="3"
                              required>{{ old('alamat', $cabang->alamat) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="jam_operasional">Jam Operasional <span style="color:red">*</span></label>
                    <input type="text" id="jam_operasional" name="jam_operasional" class="form-control"
                           value="{{ old('jam_operasional', $cabang->jam_operasional) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="kontak">Kontak <span style="color:red">*</span></label>
                    <input type="text" id="kontak" name="kontak" class="form-control"
                           value="{{ old('kontak', $cabang->kontak) }}" required>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/cabang" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
