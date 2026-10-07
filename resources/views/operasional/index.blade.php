<!DOCTYPE html>
<html>
<head>
    <title>Data Operasional Cabang</title>
</head>
<body>

    <h1>📊 DATA OPERASIONAL CABANG</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if (session('error'))
        <p style="color: red;">
            {{ session('error') }}
        </p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>
        <a href="/operasional/create">
            ➕ Tambah Operasional
        </a>
    </p>

    <hr>

    <h2>Jumlah Data Operasional: {{ $operasional->count() }}</h2>

    @foreach ($operasional as $item)

        <hr>

        <h2>
            📊 Operasional #{{ $item->id_operasional }}
        </h2>

        <h3>🏢 Cabang</h3>

        @if ($item->cabang)

            <p>
                <strong>Nama Cabang:</strong>
                {{ $item->cabang->nama_cabang }}
            </p>

            <p>
                <strong>Alamat:</strong>
                {{ $item->cabang->alamat }}
            </p>

        @else

            <p>Cabang tidak tersedia.</p>

        @endif

        <h3>📈 Data Operasional</h3>

        <p>
            <strong>Total Booking:</strong>
            {{ $item->total_booking }}
        </p>

        <p>
            <strong>Total Transaksi:</strong>
            {{ $item->total_transaksi }}
        </p>

        <p>
            <strong>Pendapatan:</strong>
            Rp {{ number_format($item->pendapatan, 0, ',', '.') }}
        </p>

        <p>
            <strong>Stok:</strong>
            {{ $item->stok }}
        </p>

        <p>
            <strong>Laporan:</strong>
            {{ $item->laporan ?? '-' }}
        </p>

        <p>
            <a href="/operasional/{{ $item->id_operasional }}/edit">
                ✏️ Edit
            </a>
        </p>

        <form
            action="/operasional/{{ $item->id_operasional }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus data operasional ini?')"
            >
                🗑️ Hapus
            </button>
        </form>

    @endforeach

</body>
</html>