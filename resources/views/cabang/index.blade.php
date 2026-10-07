<!DOCTYPE html>
<html>
<head>
    <title>Data Cabang</title>
</head>
<body>

    <h1>🏢 DATA CABANG</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
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
        <a href="/cabang/create">
            ➕ Tambah Cabang
        </a>
    </p>

    <hr>

    <h2>Jumlah Cabang: {{ $cabang->count() }}</h2>

    @foreach ($cabang as $item)

        <hr>

        <h2>🏢 Cabang #{{ $item->id_cabang }}</h2>

        <p>
            <strong>Nama Cabang:</strong>
            {{ $item->nama_cabang }}
        </p>

        <p>
            <strong>Alamat:</strong>
            {{ $item->alamat }}
        </p>

        <p>
            <strong>Jam Operasional:</strong>
            {{ $item->jam_operasional }}
        </p>

        <p>
            <strong>Kontak:</strong>
            {{ $item->kontak }}
        </p>

        <h3>📅 Booking Servis</h3>

        <p>
            Jumlah Booking:
            {{ $item->bookingServis->count() }}
        </p>

        <h3>👤 Admin Cabang</h3>

        @if ($item->adminCabang->count())

            @foreach ($item->adminCabang as $admin)

                <p>
                    {{ $admin->user->nama ?? 'User tidak tersedia' }}
                </p>

            @endforeach

        @else

            <p>Belum ada admin cabang.</p>

        @endif

        <h3>📊 Operasional</h3>

        @if ($item->operasionalCabang->count())

            @foreach ($item->operasionalCabang as $operasional)

                <p>
                    <strong>Total Booking:</strong>
                    {{ $operasional->total_booking }}
                </p>

                <p>
                    <strong>Total Transaksi:</strong>
                    {{ $operasional->total_transaksi }}
                </p>

                <p>
                    <strong>Pendapatan:</strong>
                    Rp {{ number_format($operasional->pendapatan, 0, ',', '.') }}
                </p>

                <p>
                    <strong>Stok:</strong>
                    {{ $operasional->stok }}
                </p>

            @endforeach

        @else

            <p>Data operasional belum tersedia.</p>

        @endif

        <h3>🔧 Penugasan Teknisi</h3>

        <p>
            Jumlah Penugasan:
            {{ $item->penugasanTeknisi->count() }}
        </p>

        <h3>👥 User Cabang</h3>

        <p>
            Jumlah User:
            {{ $item->users->count() }}
        </p>

        <p>
            <a href="/cabang/{{ $item->id_cabang }}/edit">
                ✏️ Edit
            </a>
        </p>

        <form
            action="/cabang/{{ $item->id_cabang }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus cabang ini?')"
            >
                🗑️ Hapus
            </button>
        </form>

    @endforeach

</body>
</html>