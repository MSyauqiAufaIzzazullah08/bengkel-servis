@extends('layouts.app')

@section('title', 'Edit Admin Cabang')

@section('breadcrumb')
    <span>Manajemen Cabang</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <a href="/admincabang">Admin Cabang</a>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Edit</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Admin Cabang</h1>
            <p class="page-subtitle">Ubah data admin cabang #{{ $adminCabang->id_admin }}</p>
        </div>
        <a href="/admincabang" class="btn btn-secondary">
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
                <i class="fas fa-user-tie" style="color:var(--color-accent);margin-right:6px"></i>
                Form Edit Admin Cabang
            </h3>
        </div>
        <div class="card-body">
            <form action="/admincabang/{{ $adminCabang->id_admin }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="user_id">User <span style="color:red">*</span></label>
                    <select id="user_id" name="user_id" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id_user }}"
                                {{ old('user_id', $adminCabang->user_id) == $user->id_user ? 'selected' : '' }}>
                                {{ $user->nama }} - {{ $user->email }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="cabang_id">Cabang <span style="color:red">*</span></label>
                    <select id="cabang_id" name="cabang_id" class="form-control" required>
                        <option value="">-- Pilih Cabang --</option>
                        @foreach ($cabang as $item)
                            <option value="{{ $item->id_cabang }}"
                                {{ old('cabang_id', $adminCabang->cabang_id) == $item->id_cabang ? 'selected' : '' }}>
                                {{ $item->nama_cabang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="/admincabang" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
