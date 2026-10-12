@extends('layouts.app')

@section('title', 'Home Servis')

@section('breadcrumb')
    <span>Transaksi</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Home Servis</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Home Servis</h1>
            <p class="page-subtitle">Data layanan servis ke rumah pelanggan</p>
        </div>
        <a href="/homeservice/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Home Servis
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
                <i class="fas fa-home" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Home Servis
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $homeServis->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariHomeServis" class="search-input"
                       placeholder="Cari pelanggan, montir...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelHomeServis">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Kendaraan</th>
                        <th>Montir</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($homeServis as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td style="font-size:0.875rem;font-weight:600">
                                {{ $item->pelanggan->nama ?? '-' }}
                            </td>
                            <td style="font-size:0.84rem">
                                {{ isset($item->kendaraan) ? $item->kendaraan->merk.' '.$item->kendaraan->model : '-' }}
                            </td>
                            <td style="font-size:0.84rem">
                                {{ $item->montirLapangan->nama ?? 'Belum ditugaskan' }}
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->tanggal
                                    ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y')
                                    : '-' }}
                            </td>
                            <td>
                                @php
                                    $statusClass = match($item->status) {
                                        'menunggu'         => 'badge-warning',
                                        'sedang dikerjakan'=> 'badge-info',
                                        'selesai'          => 'badge-success',
                                        default            => 'badge-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">
                                    {{ ucfirst($item->status ?? '-') }}
                                </span>
                            </td>
                            <td style="font-size:0.8rem;max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"
                                title="{{ $item->alamat }}">
                                {{ $item->alamat ?? '-' }}
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/homeservice/{{ $item->id_home_service }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/homeservice/{{ $item->id_home_service }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus data home servis ini? Tindakan ini tidak dapat dibatalkan.')">
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
                                    <i class="fas fa-home"></i>
                                    <p>Belum ada data home servis.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-between align-center">
            <span class="text-xs text-muted">
                Menampilkan {{ $homeServis->count() }} data dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariHomeServis');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelHomeServis tbody tr');
            baris.forEach(function (tr) {
                var teks = tr.textContent.toLowerCase();
                tr.style.display = teks.includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
