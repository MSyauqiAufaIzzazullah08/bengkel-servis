<h1>✏️ Edit Pembayaran</h1>

<form
    action="/pembayaran/{{ $pembayaran->id_pembayaran }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <p>
        <label>Booking Servis:</label><br>

        <select name="id_booking">

            <option value="">
                -- Tidak menggunakan Booking --
            </option>

            @foreach ($booking as $item)

                <option
                    value="{{ $item->id_booking }}"
                    {{ $pembayaran->id_booking == $item->id_booking ? 'selected' : '' }}
                >
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

                <option
                    value="{{ $order->id_order }}"
                    {{ $pembayaran->id_order == $order->id_order ? 'selected' : '' }}
                >
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

                <option
                    value="{{ $item->id_promo }}"
                    {{ $pembayaran->id_promo == $item->id_promo ? 'selected' : '' }}
                >
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

            @foreach ($metode as $item)

                <option
                    value="{{ $item->id_metode }}"
                    {{ $pembayaran->metode_pembayaran_id == $item->id_metode ? 'selected' : '' }}
                >
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
            value="{{ $pembayaran->jumlah }}"
            required
        >
    </p>

    <p>
        <label>Status:</label><br>

        <select name="status" required>

            <option
                value="Pending"
                {{ $pembayaran->status == 'Pending' ? 'selected' : '' }}
            >
                Pending
            </option>

            <option
                value="Paid"
                {{ $pembayaran->status == 'Paid' ? 'selected' : '' }}
            >
                Paid
            </option>

            <option
                value="Failed"
                {{ $pembayaran->status == 'Failed' ? 'selected' : '' }}
            >
                Failed
            </option>

            <option
                value="Cancelled"
                {{ $pembayaran->status == 'Cancelled' ? 'selected' : '' }}
            >
                Cancelled
            </option>

        </select>
    </p>

    <p>
        <label>Tanggal Bayar:</label><br>

        <input
            type="datetime-local"
            name="tanggal_bayar"
            value="{{ $pembayaran->tanggal_bayar ? date('Y-m-d\TH:i', strtotime($pembayaran->tanggal_bayar)) : '' }}"
        >
    </p>

    <p>
        <label>Bukti Pembayaran:</label><br>

        <input
            type="text"
            name="bukti_pembayaran"
            value="{{ $pembayaran->bukti_pembayaran }}"
        >
    </p>

    <button type="submit">
        💾 Update
    </button>

</form>

<br>

<a href="/pembayaran">
    ⬅️ Kembali
</a>