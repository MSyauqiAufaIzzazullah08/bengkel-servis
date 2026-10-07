<h1>➕ Tambah Rating</h1>

<form action="/rating" method="POST">

    @csrf

    <p>
        <label>Pelanggan:</label><br>

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
        <label>Nilai Rating:</label><br>

        <select name="nilai" required>

            <option value="">
                -- Pilih Nilai --
            </option>

            <option value="1">⭐ 1</option>
            <option value="2">⭐⭐ 2</option>
            <option value="3">⭐⭐⭐ 3</option>
            <option value="4">⭐⭐⭐⭐ 4</option>
            <option value="5">⭐⭐⭐⭐⭐ 5</option>

        </select>
    </p>

    <p>
        <label>Ulasan:</label><br>

        <textarea name="ulasan"></textarea>
    </p>

    <p>
        <label>Tanggal:</label><br>

        <input
            type="datetime-local"
            name="tanggal"
        >
    </p>

    <button type="submit">
        💾 Simpan
    </button>

</form>

<br>

<a href="/rating">
    ⬅️ Kembali
</a>