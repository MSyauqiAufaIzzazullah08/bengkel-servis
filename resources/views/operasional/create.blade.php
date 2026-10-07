<!DOCTYPE html>
<html>
<head>
    <title>Tambah Operasional</title>
</head>
<body>

    <h1>➕ TAMBAH OPERASIONAL CABANG</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/operasional" method="POST">

        @csrf

        <p>
            <label>Cabang</label><br>

            <select name="cabang_id" required>

                <option value="">
                    -- Pilih Cabang --
                </option>

                @foreach ($cabang as $item)

                    <option
                        value="{{ $item->id_cabang }}"
                        {{ old('cabang_id') == $item->id_cabang ? 'selected' : '' }}
                    >
                        {{ $item->nama_cabang }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>Total Booking</label><br>

            <input
                type="number"
                name="total_booking"
                value="{{ old('total_booking', 0) }}"
                min="0"
                required
            >
        </p>

        <p>
            <label>Total Transaksi</label><br>

            <input
                type="number"
                name="total_transaksi"
                value="{{ old('total_transaksi', 0) }}"
                min="0"
                required
            >
        </p>

        <p>
            <label>Pendapatan</label><br>

            <input
                type="number"
                name="pendapatan"
                value="{{ old('pendapatan', 0) }}"
                min="0"
                step="0.01"
                required
            >
        </p>

        <p>
            <label>Stok</label><br>

            <input
                type="number"
                name="stok"
                value="{{ old('stok', 0) }}"
                min="0"
                required
            >
        </p>

        <p>
            <label>Laporan</label><br>

            <textarea
                name="laporan"
            >{{ old('laporan') }}</textarea>
        </p>

        <button type="submit">
            💾 Simpan
        </button>

        <a href="/operasional">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>