@extends('layouts.app')

@section('title', 'Tambah Booking Servis')

@section('breadcrumb')
    <span>Transaksi</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/booking" style="color:inherit;text-decoration:none">Booking Servis</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Tambah</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Tambah Booking Servis</h1>
            <p class="page-subtitle">Isi form di bawah untuk menambah data booking baru</p>
        </div>
        <a href="/booking" class="btn btn-accent">
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
                <i class="fas fa-calendar-plus" style="color:var(--color-accent);margin-right:6px"></i>
                Form Tambah Booking
            </h3>
        </div>
        <div style="padding:24px">
            <form action="/booking" method="POST">
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
                    <label class="form-label" for="id_kendaraan">Kendaraan <span style="color:red">*</span></label>
                    <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        @foreach ($kendaraan as $item)
                            <option value="{{ $item->id_kendaraan }}"
                                {{ old('id_kendaraan') == $item->id_kendaraan ? 'selected' : '' }}>
                                {{ $item->merk }} {{ $item->model }} - {{ $item->nopol }}
                                ({{ $item->pelanggan->nama ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="id_cabang">Cabang <span style="color:red">*</span></label>
                    <select name="id_cabang" id="id_cabang" class="form-control" required>
                        <option value="">-- Pilih Cabang --</option>
                        @foreach ($cabang as $item)
                            <option value="{{ $item->id_cabang }}"
                                {{ old('id_cabang') == $item->id_cabang ? 'selected' : '' }}>
                                {{ $item->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="layanan_id">Layanan Servis <span style="color:red">*</span></label>
                    <select name="layanan_id" id="layanan_id" class="form-control" required>
                        <option value="">-- Pilih Layanan --</option>
                        @foreach ($layanan as $item)
                            <option value="{{ $item->id_layanan }}"
                                {{ old('layanan_id') == $item->id_layanan ? 'selected' : '' }}>
                                {{ $item->nama_layanan }} - Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="tanggal_booking">Tanggal Booking <span style="color:red">*</span></label>
                    <input type="date" name="tanggal_booking" id="tanggal_booking" class="form-control"
                           value="{{ old('tanggal_booking') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="waktu_booking">Waktu Booking <span style="color:red">*</span></label>
                    <input type="time" name="waktu_booking" id="waktu_booking" class="form-control"
                           value="{{ old('waktu_booking') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">Status <span style="color:red">*</span></label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        @foreach (['menunggu', 'diproses', 'selesai', 'dibatalkan'] as $s)
                            <option value="{{ $s }}" {{ old('status') == $s ? 'selected' : '' }}>
                                {{ ucfirst($s) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control" rows="3">{{ old('catatan') }}</textarea>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="/booking" class="btn btn-accent">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
