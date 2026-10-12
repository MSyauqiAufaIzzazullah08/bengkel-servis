@extends('layouts.app')

@section('title', 'Booking Servis')

@section('breadcrumb')
    <span>Transaksi</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Booking Servis</span>
@endsection

@section('content')

    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Booking Servis</h1>
            <p class="page-subtitle">Data booking servis dari database</p>
        </div>
        <a href="/booking/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Booking
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

    {{-- Tabel Booking --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-calendar-check" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Booking Servis
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $booking->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariBooking" class="search-input"
                       placeholder="Cari pelanggan, kendaraan...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelBooking">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Kendaraan</th>
                        <th>Cabang</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($booking as $index => $item)
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
                                {{ $item->cabang->nama_cabang ?? '-' }}
                            </td>
                            <td style="font-size:0.84rem">
                                {{ $item->layananServis->nama_layanan ?? '-' }}
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->tanggal_booking
                                    ? \Carbon\Carbon::parse($item->tanggal_booking)->format('d M Y')
                                    : '-' }}
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->waktu_booking ?? '-' }}
                            </td>
                            <td>
                                @php
                                    $statusClass = match($item->status) {
                                        'menunggu'   => 'badge-warning',
                                        'diproses'   => 'badge-info',
                                        'selesai'    => 'badge-success',
                                        'dibatalkan' => 'badge-danger',
                                        default      => 'badge-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">
                                    {{ ucfirst($item->status ?? '-') }}
                                </span>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/booking/{{ $item->id_booking }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/booking/{{ $item->id_booking }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus booking ini? Tindakan ini tidak dapat dibatalkan.')">
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
                            <td colspan="9">
                                <div class="table-empty">
                                    <i class="fas fa-calendar-check"></i>
                                    <p>Belum ada data booking servis.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-between align-center">
            <span class="text-xs text-muted">
                Menampilkan {{ $booking->count() }} booking dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariBooking');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelBooking tbody tr');
            baris.forEach(function (tr) {
                var teks = tr.textContent.toLowerCase();
                tr.style.display = teks.includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
