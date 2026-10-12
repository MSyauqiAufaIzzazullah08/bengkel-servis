@extends('layouts.app')

@section('title', 'Pengiriman')

@section('breadcrumb')
    <span>Pengiriman</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Daftar Pengiriman</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Pengiriman</h1>
            <p class="page-subtitle">Data pengiriman spare part dari database</p>
        </div>
        <a href="/pengiriman/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pengiriman
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
                <i class="fas fa-truck" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Pengiriman
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $pengiriman->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariPengiriman" class="search-input"
                       placeholder="Cari no resi, kurir, status...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelPengiriman">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Ekspedisi</th>
                        <th>Kurir</th>
                        <th>No. Resi</th>
                        <th>Status</th>
                        <th>Tgl Kirim</th>
                        <th>Est. Tiba</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengiriman as $index => $item)
                        <tr>
                            <td><span style="color:var(--color-text-muted);font-size:0.8rem">{{ $index + 1 }}</span></td>
                            <td style="font-size:0.84rem">
                                {{ $item->orderSparePart->pelanggan->nama ?? '-' }}
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">Order #{{ $item->id_order }}</div>
                            </td>
                            <td style="font-size:0.84rem">{{ $item->ekspedisi->nama_ekspedisi ?? '-' }}</td>
                            <td style="font-size:0.84rem">{{ $item->kurir }}</td>
                            <td>
                                <span style="font-family:monospace;font-size:0.82rem;background:var(--color-bg-secondary);padding:2px 6px;border-radius:4px">
                                    {{ $item->no_resi }}
                                </span>
                            </td>
                            <td>
                                @php
                                    $statusColor = match($item->status) {
                                        'dikirim' => 'badge-primary',
                                        'tiba' => 'badge-success',
                                        'pending' => 'badge-warning',
                                        default => 'badge-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $statusColor }}">{{ ucfirst($item->status) }}</span>
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->tanggal_kirim ? \Carbon\Carbon::parse($item->tanggal_kirim)->format('d M Y') : '-' }}
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->estimasi_tiba ? \Carbon\Carbon::parse($item->estimasi_tiba)->format('d M Y') : '-' }}
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/pengiriman/{{ $item->id_pengiriman }}/edit"
                                       class="btn btn-accent btn-sm btn-icon" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/pengiriman/{{ $item->id_pengiriman }}" method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus data pengiriman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-icon" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="table-empty">
                                    <i class="fas fa-truck"></i>
                                    <p>Belum ada data pengiriman.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-between align-center">
            <span class="text-xs text-muted">Menampilkan {{ $pengiriman->count() }} data pengiriman</span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariPengiriman');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            document.querySelectorAll('#tabelPengiriman tbody tr').forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
