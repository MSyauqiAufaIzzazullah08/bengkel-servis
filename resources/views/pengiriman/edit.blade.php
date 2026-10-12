@extends('layouts.app')

@section('title', 'Edit Pengiriman')

@section('breadcrumb')
    <span>Pengiriman</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/pengiriman">Daftar Pengiriman</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Pengiriman</h1>
            <p class="page-subtitle">Ubah data pengiriman #{{ $pengiriman->id_pengiriman }}</p>
        </div>
        <a href="/pengiriman" class="btn btn-secondary">
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
            <h3 class="card-title"><i class="fas fa-truck" style="color:var(--color-accent);margin-right:6px"></i> Form Edit Pengiriman</h3>
        </div>
        <div class="card-body">
            <form action="/pengiriman/{{ $pengiriman->id_pengiriman }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Order Spare Part <span style="color:red">*</span></label>
                        <select name="id_order" class="form-control" required>
                            <option value="">-- Pilih Order --</option>
                            @foreach ($orders as $order)
                                <option value="{{ $order->id_order }}"
                                    {{ old('id_order', $pengiriman->id_order) == $order->id_order ? 'selected' : '' }}>
                                    Order #{{ $order->id_order }} — {{ $order->pelanggan->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ekspedisi <span style="color:red">*</span></label>
                        <select name="id_ekspedisi" class="form-control" required>
                            <option value="">-- Pilih Ekspedisi --</option>
                            @foreach ($ekspedisi as $eks)
                                <option value="{{ $eks->id_ekspedisi }}"
                                    {{ old('id_ekspedisi', $pengiriman->id_ekspedisi) == $eks->id_ekspedisi ? 'selected' : '' }}>
                                    {{ $eks->nama_ekspedisi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Kurir <span style="color:red">*</span></label>
                        <input type="text" name="kurir" class="form-control"
                               value="{{ old('kurir', $pengiriman->kurir) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nomor Resi <span style="color:red">*</span></label>
                        <input type="text" name="no_resi" class="form-control"
                               value="{{ old('no_resi', $pengiriman->no_resi) }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Status <span style="color:red">*</span></label>
                        <select name="status" class="form-control" required>
                            @foreach (['pending','dikirim','tiba'] as $s)
                                <option value="{{ $s }}"
                                    {{ old('status', $pengiriman->status) == $s ? 'selected' : '' }}>
                                    {{ ucfirst($s) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Kirim</label>
                        <input type="date" name="tanggal_kirim" class="form-control"
                               value="{{ old('tanggal_kirim', $pengiriman->tanggal_kirim ? \Carbon\Carbon::parse($pengiriman->tanggal_kirim)->format('Y-m-d') : '') }}">
                    </div>
                </div>

                <div class="form-group" style="max-width:320px">
                    <label class="form-label">Estimasi Tiba</label>
                    <input type="date" name="estimasi_tiba" class="form-control"
                           value="{{ old('estimasi_tiba', $pengiriman->estimasi_tiba ? \Carbon\Carbon::parse($pengiriman->estimasi_tiba)->format('Y-m-d') : '') }}">
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="/pengiriman" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection
