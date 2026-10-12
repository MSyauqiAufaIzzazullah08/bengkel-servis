@extends('layouts.app')

@section('title', 'Edit Promo')

@section('breadcrumb')
    <span>Manajemen Promo</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/promo">Promo</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Promo</h1>
            <p class="page-subtitle">Ubah data promo: {{ $promo->kode_promo }}</p>
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
                Form Edit Promo
            </h3>
        </div>
        <div class="card-body">
            <form action="/promo/{{ $promo->id_promo }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="kode_promo">Kode Promo <span style="color:red">*</span></label>
                    <input type="text" id="kode_promo" name="kode_promo" class="form-control"
                           value="{{ old('kode_promo', $promo->kode_promo) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="jenis_diskon">Jenis Diskon <span style="color:red">*</span></label>
                    <select id="jenis_diskon" name="jenis_diskon" class="form-control" required>
                        <option value="Persen"
                            {{ old('jenis_diskon', $promo->jenis_diskon) == 'Persen' ? 'selected' : '' }}>Persen</option>
                        <option value="Nominal"
                            {{ old('jenis_diskon', $promo->jenis_diskon) == 'Nominal' ? 'selected' : '' }}>Nominal</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="nilai_diskon">Nilai Diskon <span style="color:red">*</span></label>
                    <input type="number" id="nilai_diskon" name="nilai_diskon" class="form-control"
                           value="{{ old('nilai_diskon', $promo->nilai_diskon) }}" required min="0" step="0.01">
                </div>

                <div class="form-group">
                    <label class="form-label" for="minimal_transaksi">Minimal Transaksi (Rp) <span style="color:red">*</span></label>
                    <input type="number" id="minimal_transaksi" name="minimal_transaksi" class="form-control"
                           value="{{ old('minimal_transaksi', $promo->minimal_transaksi) }}" required min="0" step="0.01">
                </div>

                <div class="form-group">
                    <label class="form-label" for="periode_mulai">Periode Mulai <span style="color:red">*</span></label>
                    <input type="date" id="periode_mulai" name="periode_mulai" class="form-control"
                           value="{{ old('periode_mulai', $promo->periode_mulai) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="periode_selesai">Periode Selesai <span style="color:red">*</span></label>
                    <input type="date" id="periode_selesai" name="periode_selesai" class="form-control"
                           value="{{ old('periode_selesai', $promo->periode_selesai) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="kuota">Kuota <span style="color:red">*</span></label>
                    <input type="number" id="kuota" name="kuota" class="form-control"
                           value="{{ old('kuota', $promo->kuota) }}" required min="0">
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/promo" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
