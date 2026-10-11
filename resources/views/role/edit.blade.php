@extends('layouts.app')

@section('title', 'Edit Role')

@section('breadcrumb')
    <span>Administrasi</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/role">Hak Akses (Role)</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Role</h1>
            <p class="page-subtitle">Ubah data role: {{ $role->nama_role }}</p>
        </div>
        <a href="/role" class="btn btn-secondary">
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
                <i class="fas fa-shield-alt" style="color:var(--color-accent);margin-right:6px"></i>
                Form Edit Role
            </h3>
        </div>
        <div class="card-body">
            <form action="/role/{{ $role->id_role }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="nama_role">Nama Role <span style="color:red">*</span></label>
                    <input type="text" id="nama_role" name="nama_role" class="form-control"
                           value="{{ old('nama_role', $role->nama_role) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $role->deskripsi) }}</textarea>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/role" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
