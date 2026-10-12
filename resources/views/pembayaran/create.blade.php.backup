<h1>➕ Tambah Pembayaran</h1>

<form action="/pembayaran" method="POST">

    @csrf

    <p>
        <label>Booking Servis:</label><br>

        <select name="id_booking">

            <option value="">
                -- Tidak menggunakan Booking --
            </option>

            @foreach ($booking as $item)

                <option value="{{ $item->id_booking }}">
                    Booking #{{ $item->id_booking }}
                    -
                    {{ $item->pelanggan->nama ?? 'Tanpa Pelanggan' }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Order Spare Part:</label><br>

        <select name="id_order">

            <option value="">
                -- Tidak menggunakan Order --
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
        <label>Promo:</label><br>

        <select name="id_promo">

            <option value="">
                -- Tidak menggunakan Promo --
            </option>

            @foreach ($promo as $item)

                <option value="{{ $item->id_promo }}">
                    {{ $item->kode_promo }}
                    -
                    {{ $item->jenis_diskon }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Metode Pembayaran:</label><br>

        <select name="metode_pembayaran_id" required>

            <option value="">
                -- Pilih Metode --
            </option>

            @foreach ($metode as $item)

                <option value="{{ $item->id_metode }}">
                    {{ $item->nama_metode }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Jumlah:</label><br>

        <input
            type="number"
            name="jumlah"
            min="0"
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

            <option value="Paid">
                Paid
            </option>

            <option value="Failed">
                Failed
            </option>

            <option value="Cancelled">
                Cancelled
            </option>

        </select>
    </p>

    <p>
        <label>Tanggal Bayar:</label><br>

        <input
            type="datetime-local"
            name="tanggal_bayar"
        >
    </p>

    <p>
        <label>Bukti Pembayaran:</label><br>

        <input
            type="text"
            name="bukti_pembayaran"
            placeholder="contoh: transfer-001.jpg"
        >
    </p>

    <button type="submit">
        💾 Simpan
    </button>

</form>

<br>

<a href="/pembayaran">
    ⬅️ Kembali
</a>