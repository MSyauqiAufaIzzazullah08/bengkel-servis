@extends('layouts.app')

@section('title', 'Tambah Detail Pesanan')

@section('breadcrumb')
    <span>Inventaris</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/orderdetail">Detail Pesanan</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Detail Pesanan</h1>
            <p class="page-subtitle">Tambahkan item spare part ke pesanan</p>
        </div>
        <a href="/orderdetail" class="btn btn-secondary">
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
            <h3 class="card-title"><i class="fas fa-list-alt" style="color:var(--color-accent);margin-right:6px"></i> Form Detail Pesanan</h3>
        </div>
        <div class="card-body">
            <form action="/orderdetail" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Pesanan Spare Part <span style="color:red">*</span></label>
                        <select name="id_order" class="form-control" required>
                            <option value="">-- Pilih Pesanan --</option>
                            @foreach ($orders as $o)
                                <option value="{{ $o->id_order }}"
                                    {{ old('id_order') == $o->id_order ? 'selected' : '' }}>
                                    Order #{{ $o->id_order }} — {{ $o->pelanggan->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Spare Part <span style="color:red">*</span></label>
                        <select name="id_sparepart" class="form-control" required>
                            <option value="">-- Pilih Spare Part --</option>
                            @foreach ($spareParts as $s)
                                <option value="{{ $s->id_sparepart }}"
                                    {{ old('id_sparepart') == $s->id_sparepart ? 'selected' : '' }}>
                                    {{ $s->nama }} (Stok: {{ $s->stok }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Jumlah <span style="color:red">*</span></label>
                        <input type="number" name="jumlah" class="form-control"
                               value="{{ old('jumlah', 1) }}" min="1" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Harga Satuan (Rp) <span style="color:red">*</span></label>
                        <input type="number" name="harga" class="form-control"
                               value="{{ old('harga') }}" min="0" step="0.01"
                               placeholder="0" required>
                    </div>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/orderdetail" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection
