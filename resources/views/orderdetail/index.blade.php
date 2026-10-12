@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('breadcrumb')
    <span>Inventaris</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Detail Pesanan Spare Part</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Detail Pesanan Spare Part</h1>
            <p class="page-subtitle">Rincian item dalam setiap pesanan spare part</p>
        </div>
        <a href="/orderdetail/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Detail
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
                <i class="fas fa-list-alt" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Detail Pesanan
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $orderDetails->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariOrderDetail" class="search-input"
                       placeholder="Cari pelanggan, spare part...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelOrderDetail">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order</th>
                        <th>Spare Part</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orderDetails as $index => $item)
                        <tr>
                            <td><span style="color:var(--color-text-muted);font-size:0.8rem">{{ $index + 1 }}</span></td>
                            <td style="font-size:0.84rem">
                                <div style="font-weight:600">{{ $item->orderSparePart->pelanggan->nama ?? '-' }}</div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">Order #{{ $item->id_order }}</div>
                            </td>
                            <td style="font-size:0.84rem">{{ $item->sparePart->nama ?? '-' }}</td>
                            <td style="font-size:0.84rem;text-align:center">{{ $item->jumlah }}</td>
                            <td style="font-size:0.84rem">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td style="font-size:0.85rem;font-weight:600">
                                Rp {{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/orderdetail/{{ $item->id_detail_order }}/edit"
                                       class="btn btn-accent btn-sm btn-icon" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/orderdetail/{{ $item->id_detail_order }}" method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus detail pesanan ini?')">
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
                            <td colspan="7">
                                <div class="table-empty">
                                    <i class="fas fa-list-alt"></i>
                                    <p>Belum ada data detail pesanan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-between align-center">
            <span class="text-xs text-muted">Menampilkan {{ $orderDetails->count() }} data detail pesanan</span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariOrderDetail');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            document.querySelectorAll('#tabelOrderDetail tbody tr').forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
