@extends('layouts.app')

@section('title', 'User')

@section('breadcrumb')
    <span>Manajemen Pengguna</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">User</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen User</h1>
            <p class="page-subtitle">Data pengguna sistem dari database</p>
        </div>
        <a href="/user/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" style="margin-bottom:20px">
            <i class="fas fa-check-circle alert-icon"></i>
            <div>{{ session('success') }}</div>
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
                <i class="fas fa-users-cog" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar User
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $user->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariUser" class="search-input"
                       placeholder="Cari nama, email, no HP...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelUser">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Role</th>
                        <th>Cabang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="display:flex;align-items:center;gap:10px">
                                    <div style="width:34px;height:34px;border-radius:50%;background:var(--color-primary);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:0.8rem;flex-shrink:0">
                                        {{ strtoupper(substr($item->nama, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight:600;font-size:0.875rem">{{ $item->nama }}</div>
                                        <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                            ID: {{ $item->id_user }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="font-size:0.84rem;color:var(--color-text-secondary)">
                                {{ $item->email ?? '-' }}
                            </td>
                            <td style="font-size:0.84rem">{{ $item->no_hp ?? '-' }}</td>
                            <td style="font-size:0.84rem">{{ $item->role->nama_role ?? '-' }}</td>
                            <td style="font-size:0.84rem">{{ $item->cabang->nama_cabang ?? 'Semua' }}</td>
                            <td>
                                @if (strtolower($item->status) === 'aktif')
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-danger">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/user/{{ $item->id_user }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/user/{{ $item->id_user }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus user {{ addslashes($item->nama) }}? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm btn-icon"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="table-empty">
                                    <i class="fas fa-users-cog"></i>
                                    <p>Belum ada data user.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $user->count() }} user dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariUser');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelUser tbody tr');
            baris.forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
