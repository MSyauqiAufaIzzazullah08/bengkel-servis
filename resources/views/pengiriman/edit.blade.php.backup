<h1>✏️ Edit Pengiriman</h1>

<form
    action="/pengiriman/{{ $pengiriman->id_pengiriman }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <p>
        <label>Order:</label><br>

        <select name="id_order" required>

            @foreach ($orders as $order)

                <option
                    value="{{ $order->id_order }}"
                    {{ $pengiriman->id_order == $order->id_order ? 'selected' : '' }}
                >
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

            @foreach ($ekspedisi as $item)

                <option
                    value="{{ $item->id_ekspedisi }}"
                    {{ $pengiriman->id_ekspedisi == $item->id_ekspedisi ? 'selected' : '' }}
                >
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
            value="{{ $pengiriman->kurir }}"
            required
        >
    </p>

    <p>
        <label>No. Resi:</label><br>

        <input
            type="text"
            name="no_resi"
            value="{{ $pengiriman->no_resi }}"
            required
        >
    </p>

    <p>
        <label>Status:</label><br>

        <select name="status" required>

            <option
                value="Pending"
                {{ $pengiriman->status == 'Pending' ? 'selected' : '' }}
            >
                Pending
            </option>

            <option
                value="Shipped"
                {{ $pengiriman->status == 'Shipped' ? 'selected' : '' }}
            >
                Shipped
            </option>

            <option
                value="In Transit"
                {{ $pengiriman->status == 'In Transit' ? 'selected' : '' }}
            >
                In Transit
            </option>

            <option
                value="Delivered"
                {{ $pengiriman->status == 'Delivered' ? 'selected' : '' }}
            >
                Delivered
            </option>

            <option
                value="Cancelled"
                {{ $pengiriman->status == 'Cancelled' ? 'selected' : '' }}
            >
                Cancelled
            </option>

        </select>
    </p>

    <p>
        <label>Estimasi Tiba:</label><br>

        <input
            type="date"
            name="estimasi_tiba"
            value="{{ $pengiriman->estimasi_tiba }}"
        >
    </p>

    <p>
        <label>Tanggal Kirim:</label><br>

        <input
            type="datetime-local"
            name="tanggal_kirim"
            value="{{ $pengiriman->tanggal_kirim ? date('Y-m-d\TH:i', strtotime($pengiriman->tanggal_kirim)) : '' }}"
        >
    </p>

    <button type="submit">
        💾 Update
    </button>

</form>

<br>

<a href="/pengiriman">
    ⬅️ Kembali
</a>