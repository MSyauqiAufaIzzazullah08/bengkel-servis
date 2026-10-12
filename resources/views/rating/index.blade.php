@extends('layouts.app')

@section('title', 'Rating & Ulasan')

@section('breadcrumb')
    <span>Ulasan</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Rating & Ulasan</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Rating & Ulasan</h1>
            <p class="page-subtitle">Penilaian pelanggan terhadap layanan servis</p>
        </div>
        <a href="/rating/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Rating
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
                <i class="fas fa-star" style="color:var(--color-accent);margin-right:6px"></i>
                Daftar Ulasan
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $rating->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariRating" class="search-input"
                       placeholder="Cari pelanggan, ulasan...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelRating">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Referensi</th>
                        <th>Nilai</th>
                        <th>Ulasan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rating as $index => $item)
                        <tr>
                            <td><span style="color:var(--color-text-muted);font-size:0.8rem">{{ $index + 1 }}</span></td>
                            <td style="font-size:0.84rem;font-weight:600">
                                {{ $item->pelanggan->nama ?? '-' }}
                            </td>
                            <td style="font-size:0.82rem">
                                @if ($item->id_booking)
                                    <span class="badge badge-primary">Booking #{{ $item->id_booking }}</span>
                                @elseif ($item->id_order)
                                    <span class="badge badge-secondary">Order #{{ $item->id_order }}</span>
                                @else
                                    <span style="color:var(--color-text-muted)">-</span>
                                @endif
                            </td>
                            <td>
                                <div style="display:flex;gap:2px;color:#f59e0b">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star" style="{{ $i <= $item->nilai ? 'opacity:1' : 'opacity:0.25' }}"></i>
                                    @endfor
                                    <span style="margin-left:6px;font-size:0.8rem;color:var(--color-text-secondary)">{{ $item->nilai }}/5</span>
                                </div>
                            </td>
                            <td style="font-size:0.82rem;max-width:220px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"
                                title="{{ $item->ulasan }}">
                                {{ $item->ulasan ?? '-' }}
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/rating/{{ $item->id_rating }}/edit"
                                       class="btn btn-accent btn-sm btn-icon" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/rating/{{ $item->id_rating }}" method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus ulasan ini?')">
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
                                    <i class="fas fa-star"></i>
                                    <p>Belum ada data ulasan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-between align-center">
            <span class="text-xs text-muted">Menampilkan {{ $rating->count() }} ulasan</span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariRating');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            document.querySelectorAll('#tabelRating tbody tr').forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
