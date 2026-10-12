@extends('layouts.app')

@section('title', 'Kendaraan')

@section('breadcrumb')
    <span>Data Master</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Kendaraan</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Kendaraan</h1>
            <p class="page-subtitle">Data kendaraan pelanggan dari database</p>
        </div>
        <a href="/kendaraan/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kendaraan
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
                <i class="fas fa-car" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Kendaraan
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $kendaraan->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariKendaraan" class="search-input"
                       placeholder="Cari merk, model, no polisi...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelKendaraan">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pemilik</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Tahun</th>
                        <th>No Polisi</th>
                        <th>Booking</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kendaraan as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:600;font-size:0.875rem">
                                    {{ $item->pelanggan->nama ?? '-' }}
                                </div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_kendaraan }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem">{{ $item->merk }}</td>
                            <td style="font-size:0.84rem">{{ $item->model }}</td>
                            <td style="font-size:0.84rem">{{ $item->tahun }}</td>
                            <td style="font-size:0.84rem;font-weight:600">{{ $item->nopol }}</td>
                            <td style="font-size:0.84rem">{{ $item->bookingServis->count() }}</td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/kendaraan/{{ $item->id_kendaraan }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/kendaraan/{{ $item->id_kendaraan }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus kendaraan {{ addslashes($item->nopol) }}? Tindakan ini tidak dapat dibatalkan.')">
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
                                    <i class="fas fa-car"></i>
                                    <p>Belum ada data kendaraan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $kendaraan->count() }} kendaraan dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariKendaraan');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelKendaraan tbody tr');
            baris.forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
