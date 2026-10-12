@extends('layouts.app')

@section('title', 'Spare Part')

@section('breadcrumb')
    <span>Data Master</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Spare Part</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Spare Part</h1>
            <p class="page-subtitle">Data spare part dari database</p>
        </div>
        <a href="/sparepart/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Spare Part
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
                <i class="fas fa-cogs" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Spare Part
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $spareParts->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariSparepart" class="search-input"
                       placeholder="Cari nama, kategori...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelSparepart">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($spareParts as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:600;font-size:0.875rem">{{ $item->nama }}</div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_sparepart }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td style="font-size:0.84rem">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </td>
                            <td style="font-size:0.84rem">
                                <span class="{{ $item->stok <= 5 ? 'badge badge-danger' : 'badge badge-primary' }}">
                                    {{ $item->stok }}
                                </span>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/sparepart/{{ $item->id_sparepart }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/sparepart/{{ $item->id_sparepart }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus spare part {{ addslashes($item->nama) }}? Tindakan ini tidak dapat dibatalkan.')">
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
                            <td colspan="6">
                                <div class="table-empty">
                                    <i class="fas fa-cogs"></i>
                                    <p>Belum ada data spare part.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $spareParts->count() }} spare part dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariSparepart');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelSparepart tbody tr');
            baris.forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
