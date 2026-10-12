@extends('layouts.app')

@section('title', 'Tambah Kendaraan')

@section('breadcrumb')
    <span>Data Master</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/kendaraan">Kendaraan</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Kendaraan</h1>
            <p class="page-subtitle">Isi form berikut untuk menambah kendaraan baru</p>
        </div>
        <a href="/kendaraan" class="btn btn-secondary">
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
                <i class="fas fa-car" style="color:var(--color-accent);margin-right:6px"></i>
                Form Tambah Kendaraan
            </h3>
        </div>
        <div class="card-body">
            <form action="/kendaraan" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="id_pelanggan">Pelanggan <span style="color:red">*</span></label>
                    <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach ($pelanggan as $item)
                            <option value="{{ $item->id_pelanggan }}"
                                {{ old('id_pelanggan') == $item->id_pelanggan ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="merk">Merk <span style="color:red">*</span></label>
                    <input type="text" id="merk" name="merk" class="form-control"
                           value="{{ old('merk') }}" required placeholder="Contoh: Honda, Toyota">
                </div>

                <div class="form-group">
                    <label class="form-label" for="model">Model <span style="color:red">*</span></label>
                    <input type="text" id="model" name="model" class="form-control"
                           value="{{ old('model') }}" required placeholder="Contoh: Civic, Avanza">
                </div>

                <div class="form-group">
                    <label class="form-label" for="tahun">Tahun <span style="color:red">*</span></label>
                    <input type="number" id="tahun" name="tahun" class="form-control"
                           value="{{ old('tahun') }}" required min="1900" max="2100"
                           placeholder="Contoh: 2022">
                </div>

                <div class="form-group">
                    <label class="form-label" for="nopol">No Polisi <span style="color:red">*</span></label>
                    <input type="text" id="nopol" name="nopol" class="form-control"
                           value="{{ old('nopol') }}" required placeholder="Contoh: B 1234 ABC">
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/kendaraan" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
