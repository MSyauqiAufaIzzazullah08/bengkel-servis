@extends('layouts.app')

@section('title', 'Order Spare Part')

@section('breadcrumb')
    <span>Transaksi</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Order Spare Part</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Order Spare Part</h1>
            <p class="page-subtitle">Data order spare part dari database</p>
        </div>
        <a href="/order/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Order
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
                <i class="fas fa-shopping-cart" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Order Spare Part
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $order->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariOrder" class="search-input"
                       placeholder="Cari pelanggan, status...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelOrder">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Order</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Alamat Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td style="font-size:0.875rem;font-weight:600">
                                {{ $item->pelanggan->nama ?? '-' }}
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->tanggal_order
                                    ? \Carbon\Carbon::parse($item->tanggal_order)->format('d M Y')
                                    : '-' }}
                            </td>
                            <td>
                                @php
                                    $statusClass = match($item->status) {
                                        'menunggu'   => 'badge-warning',
                                        'diproses'   => 'badge-info',
                                        'dikirim'    => 'badge-primary',
                                        'selesai'    => 'badge-success',
                                        'dibatalkan' => 'badge-danger',
                                        default      => 'badge-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">
                                    {{ ucfirst($item->status ?? '-') }}
                                </span>
                            </td>
                            <td style="font-size:0.84rem;font-weight:600">
                                Rp {{ number_format($item->total_harga ?? 0, 0, ',', '.') }}
                            </td>
                            <td style="font-size:0.8rem;max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"
                                title="{{ $item->alamat_pengiriman }}">
                                {{ $item->alamat_pengiriman ?? '-' }}
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/order/{{ $item->id_order }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/order/{{ $item->id_order }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus order ini? Tindakan ini tidak dapat dibatalkan.')">
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
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Belum ada data order spare part.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-between align-center">
            <span class="text-xs text-muted">
                Menampilkan {{ $order->count() }} order dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariOrder');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelOrder tbody tr');
            baris.forEach(function (tr) {
                var teks = tr.textContent.toLowerCase();
                tr.style.display = teks.includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
