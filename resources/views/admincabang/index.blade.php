@extends('layouts.app')

@section('title', 'Admin Cabang')

@section('breadcrumb')
    <span>Manajemen Cabang</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Admin Cabang</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Admin Cabang</h1>
            <p class="page-subtitle">Data admin per cabang dari database</p>
        </div>
        <a href="/admincabang/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Admin Cabang
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
                <i class="fas fa-user-tie" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Admin Cabang
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $adminCabang->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariAdminCabang" class="search-input"
                       placeholder="Cari nama, cabang...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelAdminCabang">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Cabang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($adminCabang as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:600;font-size:0.875rem">
                                    {{ $item->user->nama ?? '-' }}
                                </div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_admin }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem;color:var(--color-text-secondary)">
                                {{ $item->user->email ?? '-' }}
                            </td>
                            <td style="font-size:0.84rem">
                                {{ $item->cabang->nama_cabang ?? '-' }}
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/admincabang/{{ $item->id_admin }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/admincabang/{{ $item->id_admin }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus admin cabang ini? Tindakan ini tidak dapat dibatalkan.')">
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
                            <td colspan="5">
                                <div class="table-empty">
                                    <i class="fas fa-user-tie"></i>
                                    <p>Belum ada data admin cabang.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $adminCabang->count() }} admin cabang dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariAdminCabang');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelAdminCabang tbody tr');
            baris.forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
