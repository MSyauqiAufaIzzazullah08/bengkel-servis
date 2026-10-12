@extends('layouts.app')

@section('title', 'Operasional Cabang')

@section('breadcrumb')
    <span>Laporan</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Operasional Cabang</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Operasional Cabang</h1>
            <p class="page-subtitle">Data operasional per cabang dari database</p>
        </div>
        <a href="/operasional/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data Operasional
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
                <i class="fas fa-chart-bar" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Operasional Cabang
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $operasional->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariOperasional" class="search-input"
                       placeholder="Cari cabang...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelOperasional">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cabang</th>
                        <th>Total Booking</th>
                        <th>Total Transaksi</th>
                        <th>Pendapatan</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($operasional as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:600;font-size:0.875rem">
                                    {{ $item->cabang->nama_cabang ?? '-' }}
                                </div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_operasional }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem">{{ $item->total_booking }}</td>
                            <td style="font-size:0.84rem">{{ $item->total_transaksi }}</td>
                            <td style="font-size:0.84rem;font-weight:600">
                                Rp {{ number_format($item->pendapatan, 0, ',', '.') }}
                            </td>
                            <td style="font-size:0.84rem">{{ $item->stok }}</td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/operasional/{{ $item->id_operasional }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/operasional/{{ $item->id_operasional }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus data operasional ini? Tindakan ini tidak dapat dibatalkan.')">
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
                                    <i class="fas fa-chart-bar"></i>
                                    <p>Belum ada data operasional cabang.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $operasional->count() }} data operasional dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariOperasional');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelOperasional tbody tr');
            baris.forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
