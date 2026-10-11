@extends('layouts.app')

@section('title', 'Layanan Servis')

@section('breadcrumb')
    <span>Manajemen Servis</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Layanan Servis</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Layanan Servis</h1>
            <p class="page-subtitle">Data layanan servis yang tersedia</p>
        </div>
        <a href="/layanan/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Layanan
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
                <i class="fas fa-tools" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Layanan Servis
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $layanan->count() }} data
                </span>
            </h3>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Layanan</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Estimasi Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($layanan as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:600;font-size:0.875rem">{{ $item->nama_layanan }}</div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_layanan }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem">{{ $item->kategori ?? '-' }}</td>
                            <td style="font-size:0.84rem;font-weight:600">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </td>
                            <td style="font-size:0.84rem">{{ $item->estimasi_waktu ?? '-' }}</td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/layanan/{{ $item->id_layanan }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/layanan/{{ $item->id_layanan }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus layanan {{ addslashes($item->nama_layanan) }}? Tindakan ini tidak dapat dibatalkan.')">
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
                                    <i class="fas fa-tools"></i>
                                    <p>Belum ada data layanan servis.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $layanan->count() }} layanan dari database
            </span>
        </div>
    </div>

@endsection
