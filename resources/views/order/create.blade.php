<!DOCTYPE html>
<html>
<head>
    <title>Tambah Order Spare Part</title>
</head>
<body>

    <h1>➕ TAMBAH ORDER SPARE PART</h1>

    <hr>

    <form action="/order" method="POST">

        @csrf

        <p>
            <label>
                <strong>Pelanggan</strong>
            </label>
            <br>

            <select name="id_pelanggan" required>

                <option value="">
                    -- Pilih Pelanggan --
                </option>

                @foreach ($pelanggan as $item)

                    <option value="{{ $item->id_pelanggan }}">
                        {{ $item->nama }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Tanggal Order</strong>
            </label>
            <br>

            <input
                type="datetime-local"
                name="tanggal_order"
                required
            >
        </p>

        <p>
            <label>
                <strong>Status</strong>
            </label>
            <br>

            <input
                type="text"
                name="status"
                value="Pending"
                required
            >
        </p>

        <p>
            <label>
                <strong>Total Harga</strong>
            </label>
            <br>

            <input
                type="number"
                name="total_harga"
                min="0"
                required
            >
        </p>

        <p>
            <label>
                <strong>Alamat Pengiriman</strong>
            </label>
            <br>

            <textarea
                name="alamat_pengiriman"
                rows="4"
                cols="50"
                required
            ></textarea>
        </p>

        <button type="submit">
            💾 Simpan
        </button>

    </form>

    <br>

    <a href="/order">
        ← Kembali
    </a>

</body>
</html>