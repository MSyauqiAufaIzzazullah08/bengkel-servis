@extends('layouts.app')

@section('title', 'Edit Spare Part')

@section('breadcrumb')
    <span>Data Master</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/sparepart">Spare Part</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Spare Part</h1>
            <p class="page-subtitle">Ubah data spare part: {{ $sparePart->nama }}</p>
        </div>
        <a href="/sparepart" class="btn btn-secondary">
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
                <i class="fas fa-cogs" style="color:var(--color-accent);margin-right:6px"></i>
                Form Edit Spare Part
            </h3>
        </div>
        <div class="card-body">
            <form action="/sparepart/{{ $sparePart->id_sparepart }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="kategori_id">Kategori <span style="color:red">*</span></label>
                    <select id="kategori_id" name="kategori_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}"
                                {{ old('kategori_id', $sparePart->kategori_id) == $item->id_kategori ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="nama">Nama Spare Part <span style="color:red">*</span></label>
                    <input type="text" id="nama" name="nama" class="form-control"
                           value="{{ old('nama', $sparePart->nama) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="harga">Harga (Rp) <span style="color:red">*</span></label>
                    <input type="number" id="harga" name="harga" class="form-control"
                           value="{{ old('harga', $sparePart->harga) }}" required min="0">
                </div>

                <div class="form-group">
                    <label class="form-label" for="stok">Stok <span style="color:red">*</span></label>
                    <input type="number" id="stok" name="stok" class="form-control"
                           value="{{ old('stok', $sparePart->stok) }}" required min="0">
                </div>

                <div class="form-group">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $sparePart->deskripsi) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="gambar">Gambar</label>
                    <input type="text" id="gambar" name="gambar" class="form-control"
                           value="{{ old('gambar', $sparePart->gambar) }}" placeholder="Contoh: oli.jpg">
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/sparepart" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
