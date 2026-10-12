@extends('layouts.app')

@section('title', 'Edit Rating')

@section('breadcrumb')
    <span>Ulasan</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/rating">Rating & Ulasan</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Rating & Ulasan</h1>
            <p class="page-subtitle">Ubah data ulasan #{{ $rating->id_rating }}</p>
        </div>
        <a href="/rating" class="btn btn-secondary">
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
            <h3 class="card-title"><i class="fas fa-star" style="color:var(--color-accent);margin-right:6px"></i> Form Edit Rating</h3>
        </div>
        <div class="card-body">
            <form action="/rating/{{ $rating->id_rating }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Pelanggan <span style="color:red">*</span></label>
                        <select name="id_pelanggan" class="form-control" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach ($pelanggan as $p)
                                <option value="{{ $p->id_pelanggan }}"
                                    {{ old('id_pelanggan', $rating->id_pelanggan) == $p->id_pelanggan ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nilai (1-5) <span style="color:red">*</span></label>
                        <select name="nilai" class="form-control" required>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}"
                                    {{ old('nilai', $rating->nilai) == $i ? 'selected' : '' }}>
                                    {{ $i }} Bintang
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Booking Servis <small style="color:var(--color-text-muted)">(opsional)</small></label>
                        <select name="id_booking" class="form-control">
                            <option value="">-- Pilih Booking --</option>
                            @foreach ($booking as $b)
                                <option value="{{ $b->id_booking }}"
                                    {{ old('id_booking', $rating->id_booking) == $b->id_booking ? 'selected' : '' }}>
                                    #{{ $b->id_booking }} — {{ $b->pelanggan->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order Spare Part <small style="color:var(--color-text-muted)">(opsional)</small></label>
                        <select name="id_order" class="form-control">
                            <option value="">-- Pilih Order --</option>
                            @foreach ($orders as $o)
                                <option value="{{ $o->id_order }}"
                                    {{ old('id_order', $rating->id_order) == $o->id_order ? 'selected' : '' }}>
                                    #{{ $o->id_order }} — {{ $o->pelanggan->nama ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Ulasan</label>
                    <textarea name="ulasan" class="form-control" rows="4">{{ old('ulasan', $rating->ulasan) }}</textarea>
                </div>

                <div class="form-group" style="max-width:320px">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"
                           value="{{ old('tanggal', $rating->tanggal ? \Carbon\Carbon::parse($rating->tanggal)->format('Y-m-d') : '') }}">
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="/rating" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection
