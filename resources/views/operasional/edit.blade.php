<!DOCTYPE html>
<html>
<head>
    <title>Edit Operasional</title>
</head>
<body>

    <h1>✏️ EDIT OPERASIONAL CABANG</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="/operasional/{{ $operasional->id_operasional }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>Cabang</label><br>

            <select name="cabang_id" required>

                @foreach ($cabang as $item)

                    <option
                        value="{{ $item->id_cabang }}"
                        {{ old('cabang_id', $operasional->cabang_id) == $item->id_cabang ? 'selected' : '' }}
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
                value="{{ old('total_booking', $operasional->total_booking) }}"
                min="0"
                required
            >
        </p>

        <p>
            <label>Total Transaksi</label><br>

            <input
                type="number"
                name="total_transaksi"
                value="{{ old('total_transaksi', $operasional->total_transaksi) }}"
                min="0"
                required
            >
        </p>

        <p>
            <label>Pendapatan</label><br>

            <input
                type="number"
                name="pendapatan"
                value="{{ old('pendapatan', $operasional->pendapatan) }}"
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
                value="{{ old('stok', $operasional->stok) }}"
                min="0"
                required
            >
        </p>

        <p>
            <label>Laporan</label><br>

            <textarea
                name="laporan"
            >{{ old('laporan', $operasional->laporan) }}</textarea>
        </p>

        <button type="submit">
            💾 Update
        </button>

        <a href="/operasional">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>