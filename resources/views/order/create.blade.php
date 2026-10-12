@extends('layouts.app')

@section('title', 'Tambah Order Spare Part')

@section('breadcrumb')
    <span>Transaksi</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/order" style="color:inherit;text-decoration:none">Order Spare Part</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Order Spare Part</h1>
            <p class="page-subtitle">Isi form di bawah untuk menambah data order baru</p>
        </div>
        <a href="/order" class="btn btn-accent">
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
                <i class="fas fa-cart-plus" style="color:var(--color-accent);margin-right:6px"></i>
                Form Tambah Order
            </h3>
        </div>
        <div style="padding:24px">
            <form action="/order" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="id_pelanggan">Pelanggan <span style="color:red">*</span></label>
                    <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
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
                    <label class="form-label" for="tanggal_order">Tanggal Order <span style="color:red">*</span></label>
                    <input type="date" name="tanggal_order" id="tanggal_order" class="form-control"
                           value="{{ old('tanggal_order') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">Status <span style="color:red">*</span></label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (['menunggu', 'diproses', 'dikirim', 'selesai', 'dibatalkan'] as $s)
                            <option value="{{ $s }}" {{ old('status') == $s ? 'selected' : '' }}>
                                {{ ucfirst($s) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="total_harga">Total Harga <span style="color:red">*</span></label>
                    <input type="number" name="total_harga" id="total_harga" class="form-control"
                           value="{{ old('total_harga', 0) }}" min="0" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="alamat_pengiriman">Alamat Pengiriman <span style="color:red">*</span></label>
                    <textarea name="alamat_pengiriman" id="alamat_pengiriman" class="form-control" rows="3" required>{{ old('alamat_pengiriman') }}</textarea>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/order" class="btn btn-accent">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
