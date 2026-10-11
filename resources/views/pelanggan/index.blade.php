@extends('layouts.app')

@section('title', 'Pelanggan')

@section('breadcrumb')
    <span>Data Master</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Pelanggan</span>
@endsection

@section('content')

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Pelanggan</h1>
            <p class="page-subtitle">Data pelanggan terdaftar dari database</p>
        </div>
        <a href="/pelanggan/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pelanggan
        </a>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success" style="margin-bottom:20px">
            <i class="fas fa-check-circle alert-icon"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    {{-- Pesan error validasi --}}
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

    {{-- Tabel Pelanggan --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Pelanggan
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $pelanggan->count() }} data
                </span>
            </h3>
            {{-- Pencarian sederhana --}}
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariPelanggan" class="search-input"
                       placeholder="Cari nama, email, no HP...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelPelanggan">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelanggan</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelanggan as $index => $item)
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
                                            ID: {{ $item->id_pelanggan }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="font-size:0.84rem;color:var(--color-text-secondary)">
                                {{ $item->email ?? '-' }}
                            </td>
                            <td style="font-size:0.84rem">{{ $item->no_hp ?? '-' }}</td>
                            <td style="font-size:0.8rem;max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"
                                title="{{ $item->alamat }}">
                                {{ $item->alamat ?? '-' }}
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->tanggal_daftar
                                    ? \Carbon\Carbon::parse($item->tanggal_daftar)->format('d M Y')
                                    : '-' }}
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/pelanggan/{{ $item->id_pelanggan }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/pelanggan/{{ $item->id_pelanggan }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus pelanggan {{ addslashes($item->nama) }}? Tindakan ini tidak dapat dibatalkan.')">
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
                                    <i class="fas fa-users"></i>
                                    <p>Belum ada data pelanggan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-between align-center">
            <span class="text-xs text-muted">
                Menampilkan {{ $pelanggan->count() }} pelanggan dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    // Pencarian live di sisi klien (filter baris tabel tanpa reload)
    var inputCari = document.getElementById('cariPelanggan');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelPelanggan tbody tr');
            baris.forEach(function (tr) {
                var teks = tr.textContent.toLowerCase();
                tr.style.display = teks.includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
