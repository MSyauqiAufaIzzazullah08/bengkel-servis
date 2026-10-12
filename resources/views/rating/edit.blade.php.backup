<h1>✏️ Edit Rating</h1>

<form
    action="/rating/{{ $rating->id_rating }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <p>
        <label>Pelanggan:</label><br>

        <select name="id_pelanggan" required>

            @foreach ($pelanggan as $item)

                <option
                    value="{{ $item->id_pelanggan }}"
                    {{ $rating->id_pelanggan == $item->id_pelanggan ? 'selected' : '' }}
                >
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

                <option
                    value="{{ $item->id_booking }}"
                    {{ $rating->id_booking == $item->id_booking ? 'selected' : '' }}
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
                    {{ $rating->id_order == $order->id_order ? 'selected' : '' }}
                >
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

            <option
                value="1"
                {{ $rating->nilai == 1 ? 'selected' : '' }}
            >
                ⭐ 1
            </option>

            <option
                value="2"
                {{ $rating->nilai == 2 ? 'selected' : '' }}
            >
                ⭐⭐ 2
            </option>

            <option
                value="3"
                {{ $rating->nilai == 3 ? 'selected' : '' }}
            >
                ⭐⭐⭐ 3
            </option>

            <option
                value="4"
                {{ $rating->nilai == 4 ? 'selected' : '' }}
            >
                ⭐⭐⭐⭐ 4
            </option>

            <option
                value="5"
                {{ $rating->nilai == 5 ? 'selected' : '' }}
            >
                ⭐⭐⭐⭐⭐ 5
            </option>

        </select>
    </p>

    <p>
        <label>Ulasan:</label><br>

        <textarea name="ulasan">{{ $rating->ulasan }}</textarea>
    </p>

    <p>
        <label>Tanggal:</label><br>

        <input
            type="datetime-local"
            name="tanggal"
            value="{{ $rating->tanggal ? date('Y-m-d\TH:i', strtotime($rating->tanggal)) : '' }}"
        >
    </p>

    <button type="submit">
        💾 Update
    </button>

</form>

<br>

<a href="/rating">
    ⬅️ Kembali
</a>