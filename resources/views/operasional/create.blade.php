@extends('layouts.app')

@section('title', 'Tambah Operasional Cabang')

@section('breadcrumb')
    <span>Laporan</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/operasional">Operasional Cabang</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Operasional Cabang</h1>
            <p class="page-subtitle">Isi form berikut untuk menambah data operasional cabang</p>
        </div>
        <a href="/operasional" class="btn btn-secondary">
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
                <i class="fas fa-chart-bar" style="color:var(--color-accent);margin-right:6px"></i>
                Form Tambah Operasional
            </h3>
        </div>
        <div class="card-body">
            <form action="/operasional" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="cabang_id">Cabang <span style="color:red">*</span></label>
                    <select id="cabang_id" name="cabang_id" class="form-control" required>
                        <option value="">-- Pilih Cabang --</option>
                        @foreach ($cabang as $item)
                            <option value="{{ $item->id_cabang }}"
                                {{ old('cabang_id') == $item->id_cabang ? 'selected' : '' }}>
                                {{ $item->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="total_booking">Total Booking <span style="color:red">*</span></label>
                    <input type="number" id="total_booking" name="total_booking" class="form-control"
                           value="{{ old('total_booking', 0) }}" required min="0" placeholder="0">
                </div>

                <div class="form-group">
                    <label class="form-label" for="total_transaksi">Total Transaksi <span style="color:red">*</span></label>
                    <input type="number" id="total_transaksi" name="total_transaksi" class="form-control"
                           value="{{ old('total_transaksi', 0) }}" required min="0" placeholder="0">
                </div>

                <div class="form-group">
                    <label class="form-label" for="pendapatan">Pendapatan (Rp) <span style="color:red">*</span></label>
                    <input type="number" id="pendapatan" name="pendapatan" class="form-control"
                           value="{{ old('pendapatan', 0) }}" required min="0" step="0.01" placeholder="0">
                </div>

                <div class="form-group">
                    <label class="form-label" for="stok">Stok <span style="color:red">*</span></label>
                    <input type="number" id="stok" name="stok" class="form-control"
                           value="{{ old('stok', 0) }}" required min="0" placeholder="0">
                </div>

                <div class="form-group">
                    <label class="form-label" for="laporan">Laporan</label>
                    <textarea id="laporan" name="laporan" class="form-control" rows="4"
                              placeholder="Catatan laporan operasional (opsional)">{{ old('laporan') }}</textarea>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/operasional" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
