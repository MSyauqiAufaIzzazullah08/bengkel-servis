@extends('layouts.app')

@section('title', 'Promo')

@section('breadcrumb')
    <span>Manajemen Promo</span>
    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
    <span class="breadcrumb-current">Promo</span>
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Promo</h1>
            <p class="page-subtitle">Data promo dan diskon dari database</p>
        </div>
        <a href="/promo/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Promo
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
                Daftar Promo
                <span class="badge badge-primary" style="margin-left:8px;font-size:0.75rem">
                    {{ $promo->count() }} data
                </span>
            </h3>
            <div class="search-input-wrapper" style="max-width:280px">
                <i class="fas fa-search"></i>
                <input type="text" id="cariPromo" class="search-input"
                       placeholder="Cari kode promo...">
            </div>
        </div>

        <div class="table-container">
            <table class="table" id="tabelPromo">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Promo</th>
                        <th>Jenis Diskon</th>
                        <th>Nilai Diskon</th>
                        <th>Minimal Transaksi</th>
                        <th>Periode</th>
                        <th>Kuota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($promo as $index => $item)
                        <tr>
                            <td>
                                <span style="color:var(--color-text-muted);font-size:0.8rem">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight:700;font-size:0.875rem;letter-spacing:0.5px">
                                    {{ $item->kode_promo }}
                                </div>
                                <div style="font-size:0.72rem;color:var(--color-text-muted)">
                                    ID: {{ $item->id_promo }}
                                </div>
                            </td>
                            <td style="font-size:0.84rem">{{ $item->jenis_diskon }}</td>
                            <td style="font-size:0.84rem">
                                @if ($item->jenis_diskon == 'Persen')
                                    {{ $item->nilai_diskon }}%
                                @else
                                    Rp {{ number_format($item->nilai_diskon, 0, ',', '.') }}
                                @endif
                            </td>
                            <td style="font-size:0.84rem">
                                Rp {{ number_format($item->minimal_transaksi, 0, ',', '.') }}
                            </td>
                            <td style="font-size:0.8rem;color:var(--color-text-muted)">
                                {{ $item->periode_mulai }} s.d. {{ $item->periode_selesai }}
                            </td>
                            <td style="font-size:0.84rem">{{ $item->kuota }}</td>
                            <td>
                                <div class="actions-cell">
                                    <a href="/promo/{{ $item->id_promo }}/edit"
                                       class="btn btn-accent btn-sm btn-icon"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/promo/{{ $item->id_promo }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Hapus promo {{ addslashes($item->kode_promo) }}? Tindakan ini tidak dapat dibatalkan.')">
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
                                    <i class="fas fa-tags"></i>
                                    <p>Belum ada data promo.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <span class="text-xs text-muted">
                Menampilkan {{ $promo->count() }} promo dari database
            </span>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputCari = document.getElementById('cariPromo');
    if (inputCari) {
        inputCari.addEventListener('input', function () {
            var q = this.value.toLowerCase();
            var baris = document.querySelectorAll('#tabelPromo tbody tr');
            baris.forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
@endsection
