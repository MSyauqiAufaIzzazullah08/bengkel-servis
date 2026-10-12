@extends('layouts.app')

@section('title', 'Teknisi')

@section('breadcrumb')
    <span>Manajemen SDM</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Teknisi</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Teknisi</h1>
            <p class="page-subtitle">Data teknisi bengkel dari database</p>
        </div>
        <a href="/teknisi/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Teknisi
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
                <i class="fas fa-tools" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Teknisi
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $teknisi->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariTeknisi" class="search-input"
                       placeholder="Cari nama, keahlian...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelTeknisi">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Keahlian</th>
                        <th>User Akun</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teknisi as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:600;font-size:0.875rem">{{ $item->nama }}</div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_teknisi }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem">{{ $item->no_hp ?? '-' }}</td>
                            <td style="font-size:0.84rem">{{ $item->keahlian ?? '-' }}</td>
                            <td style="font-size:0.84rem">{{ $item->user->nama ?? '-' }}</td>
                            <td>
                                @if ($item->status === 'aktif')
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/teknisi/{{ $item->id_teknisi }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/teknisi/{{ $item->id_teknisi }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus teknisi {{ addslashes($item->nama) }}? Tindakan ini tidak dapat dibatalkan.')">
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
                            <td colspan="7">
                                <div class="table-empty">
                                    <i class="fas fa-tools"></i>
                                    <p>Belum ada data teknisi.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $teknisi->count() }} teknisi dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariTeknisi');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelTeknisi tbody tr');
            baris.forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
