@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('breadcrumb')
    <span>Keuangan</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/pembayaran">Daftar Pembayaran</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Pembayaran</h1>
            <p class="page-subtitle">Ubah data pembayaran #{{ $pembayaran->id_pembayaran }}</p>
        </div>
        <a href="/pembayaran" class="btn btn-secondary">
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
            <h3 class="card-title"><i class="fas fa-credit-card" style="color:var(--color-accent);margin-right:6px"></i> Form Edit Pembayaran</h3>
        </div>
        <div class="card-body">
            <form action="/pembayaran/{{ $pembayaran->id_pembayaran }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Booking Servis <small style="color:var(--color-text-muted)">(opsional)</small></label>
                        <select name="id_booking" class="form-control">
                            <option value="">-- Pilih Booking (jika ada) --</option>
                            @foreach ($booking as $b)
                                <option value="{{ $b->id_booking }}"
                                    {{ old('id_booking', $pembayaran->id_booking) == $b->id_booking ? 'selected' : '' }}>
                                    #{{ $b->id_booking }} — {{ $b->pelanggan->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order Spare Part <small style="color:var(--color-text-muted)">(opsional)</small></label>
                        <select name="id_order" class="form-control">
                            <option value="">-- Pilih Order (jika ada) --</option>
                            @foreach ($orders as $o)
                                <option value="{{ $o->id_order }}"
                                    {{ old('id_order', $pembayaran->id_order) == $o->id_order ? 'selected' : '' }}>
                                    #{{ $o->id_order }} — {{ $o->pelanggan->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Metode Pembayaran <span style="color:red">*</span></label>
                        <select name="metode_pembayaran_id" class="form-control" required>
                            <option value="">-- Pilih Metode --</option>
                            @foreach ($metode as $m)
                                <option value="{{ $m->id_metode }}"
                                    {{ old('metode_pembayaran_id', $pembayaran->metode_pembayaran_id) == $m->id_metode ? 'selected' : '' }}>
                                    {{ $m->nama_metode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Promo <small style="color:var(--color-text-muted)">(opsional)</small></label>
                        <select name="id_promo" class="form-control">
                            <option value="">-- Tanpa Promo --</option>
                            @foreach ($promo as $p)
                                <option value="{{ $p->id_promo }}"
                                    {{ old('id_promo', $pembayaran->id_promo) == $p->id_promo ? 'selected' : '' }}>
                                    {{ $p->kode_promo }} — {{ $p->nama_promo ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Jumlah Bayar (Rp) <span style="color:red">*</span></label>
                        <input type="number" name="jumlah" class="form-control"
                               value="{{ old('jumlah', $pembayaran->jumlah) }}" min="0" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status <span style="color:red">*</span></label>
                        <select name="status" class="form-control" required>
                            @foreach (['menunggu','lunas','gagal'] as $s)
                                <option value="{{ $s }}"
                                    {{ old('status', $pembayaran->status) == $s ? 'selected' : '' }}>
                                    {{ ucfirst($s) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Tanggal Bayar</label>
                        <input type="date" name="tanggal_bayar" class="form-control"
                               value="{{ old('tanggal_bayar', $pembayaran->tanggal_bayar ? \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('Y-m-d') : '') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bukti Pembayaran</label>
                        <input type="text" name="bukti_pembayaran" class="form-control"
                               value="{{ old('bukti_pembayaran', $pembayaran->bukti_pembayaran) }}">
                    </div>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="/pembayaran" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection
