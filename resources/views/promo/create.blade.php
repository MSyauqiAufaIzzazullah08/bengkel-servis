@extends('layouts.app')

@section('title', 'Tambah Promo')

@section('breadcrumb')
    <span>Manajemen Promo</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/promo">Promo</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Promo</h1>
            <p class="page-subtitle">Isi form berikut untuk menambah promo baru</p>
        </div>
        <a href="/promo" class="btn btn-secondary">
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
                Form Tambah Promo
            </h3>
        </div>
        <div class="card-body">
            <form action="/promo" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="kode_promo">Kode Promo <span style="color:red">*</span></label>
                    <input type="text" id="kode_promo" name="kode_promo" class="form-control"
                           value="{{ old('kode_promo') }}" required
                           placeholder="Contoh: DISKON20">
                </div>

                <div class="form-group">
                    <label class="form-label" for="jenis_diskon">Jenis Diskon <span style="color:red">*</span></label>
                    <select id="jenis_diskon" name="jenis_diskon" class="form-control" required>
                        <option value="">-- Pilih Jenis Diskon --</option>
                        <option value="Persen" {{ old('jenis_diskon') == 'Persen' ? 'selected' : '' }}>Persen</option>
                        <option value="Nominal" {{ old('jenis_diskon') == 'Nominal' ? 'selected' : '' }}>Nominal</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="nilai_diskon">Nilai Diskon <span style="color:red">*</span></label>
                    <input type="number" id="nilai_diskon" name="nilai_diskon" class="form-control"
                           value="{{ old('nilai_diskon') }}" required min="0" step="0.01"
                           placeholder="Contoh: 20 (untuk persen) atau 50000 (untuk nominal)">
                </div>

                <div class="form-group">
                    <label class="form-label" for="minimal_transaksi">Minimal Transaksi (Rp) <span style="color:red">*</span></label>
                    <input type="number" id="minimal_transaksi" name="minimal_transaksi" class="form-control"
                           value="{{ old('minimal_transaksi') }}" required min="0" step="0.01"
                           placeholder="Contoh: 100000">
                </div>

                <div class="form-group">
                    <label class="form-label" for="periode_mulai">Periode Mulai <span style="color:red">*</span></label>
                    <input type="date" id="periode_mulai" name="periode_mulai" class="form-control"
                           value="{{ old('periode_mulai') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="periode_selesai">Periode Selesai <span style="color:red">*</span></label>
                    <input type="date" id="periode_selesai" name="periode_selesai" class="form-control"
                           value="{{ old('periode_selesai') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="kuota">Kuota <span style="color:red">*</span></label>
                    <input type="number" id="kuota" name="kuota" class="form-control"
                           value="{{ old('kuota') }}" required min="0"
                           placeholder="Jumlah maksimal penggunaan promo">
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/promo" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
