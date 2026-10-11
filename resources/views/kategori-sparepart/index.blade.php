@extends('layouts.app')

@section('title', 'Kategori Spare Part')

@section('breadcrumb')
    <span>Inventaris</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Kategori Spare Part</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Kategori Spare Part</h1>
            <p class="page-subtitle">Data kategori spare part yang terdaftar</p>
        </div>
        <a href="/kategori-sparepart/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kategori
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
                <i class="fas fa-tags" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Kategori Spare Part
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $kategori->count() }} data
                </span>
            </h3>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Spare Part</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:600;font-size:0.875rem">{{ $item->nama_kategori }}</div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_kategori }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem;max-width:220px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"
                                title="{{ $item->deskripsi }}">
                                {{ $item->deskripsi ?? '-' }}
                            </td>
                            <td style="font-size:0.84rem">
                                <span class="badge badge-primary">{{ $item->sparePart->count() }}</span>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/kategori-sparepart/{{ $item->id_kategori }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/kategori-sparepart/{{ $item->id_kategori }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus kategori {{ addslashes($item->nama_kategori) }}? Tindakan ini tidak dapat dibatalkan.')">
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
                                    <i class="fas fa-tags"></i>
                                    <p>Belum ada data kategori spare part.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $kategori->count() }} kategori dari database
            </span>
        </div>
    </div>

@endsection
