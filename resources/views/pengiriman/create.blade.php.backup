<h1>➕ Tambah Pengiriman</h1>

<form action="/pengiriman" method="POST">

    @csrf

    <p>
        <label>Order:</label><br>

        <select name="id_order" required>

            <option value="">
                -- Pilih Order --
            </option>

            @foreach ($orders as $order)

                <option value="{{ $order->id_order }}">
                    Order #{{ $order->id_order }}
                    -
                    {{ $order->pelanggan->nama ?? 'Tanpa Pelanggan' }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Ekspedisi:</label><br>

        <select name="id_ekspedisi" required>

            <option value="">
                -- Pilih Ekspedisi --
            </option>

            @foreach ($ekspedisi as $item)

                <option value="{{ $item->id_ekspedisi }}">
                    {{ $item->nama_ekspedisi }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Kurir:</label><br>

        <input
            type="text"
            name="kurir"
            required
        >
    </p>

    <p>
        <label>No. Resi:</label><br>

        <input
            type="text"
            name="no_resi"
            required
        >
    </p>

    <p>
        <label>Status:</label><br>

        <select name="status" required>

            <option value="">
                -- Pilih Status --
            </option>

            <option value="Pending">
                Pending
            </option>

            <option value="Shipped">
                Shipped
            </option>

            <option value="In Transit">
                In Transit
            </option>

            <option value="Delivered">
                Delivered
            </option>

            <option value="Cancelled">
                Cancelled
            </option>

        </select>
    </p>

    <p>
        <label>Estimasi Tiba:</label><br>

        <input
            type="date"
            name="estimasi_tiba"
        >
    </p>

    <p>
        <label>Tanggal Kirim:</label><br>

        <input
            type="datetime-local"
            name="tanggal_kirim"
        >
    </p>

    <button type="submit">
        💾 Simpan
    </button>

</form>

<br>

<a href="/pengiriman">
    ⬅️ Kembali
</a>