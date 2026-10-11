@extends('layouts.app')

@section('title', 'Hak Akses (Role)')

@section('breadcrumb')
    <span>Administrasi</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Hak Akses (Role)</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Hak Akses (Role)</h1>
            <p class="page-subtitle">Data role pengguna sistem</p>
        </div>
        <a href="/role/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Role
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" style="margin-bottom:20px">
            <i class="fas fa-check-circle alert-icon"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" style="margin-bottom:20px">
            <i class="fas fa-times-circle alert-icon"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

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
                Daftar Role
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $role->count() }} data
                </span>
            </h3>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Role</th>
                        <th>Deskripsi</th>
                        <th>Jumlah User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($role as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:600;font-size:0.875rem">{{ $item->nama_role }}</div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_role }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem;max-width:220px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"
                                title="{{ $item->deskripsi }}">
                                {{ $item->deskripsi ?? '-' }}
                            </td>
                            <td style="font-size:0.84rem">
                                <span class="badge badge-primary">{{ $item->users->count() }}</span>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/role/{{ $item->id_role }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/role/{{ $item->id_role }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus role {{ addslashes($item->nama_role) }}? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm btn-icon"
                                                title="Hapus"
                                                @if($item->users->count() > 0) disabled title="Tidak dapat dihapus karena masih ada user" @endif>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="table-empty">
                                    <i class="fas fa-shield-alt"></i>
                                    <p>Belum ada data role.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $role->count() }} role dari database
            </span>
        </div>
    </div>

@endsection
