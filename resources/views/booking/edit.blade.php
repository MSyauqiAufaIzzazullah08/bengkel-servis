<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking Servis</title>
</head>
<body>

    <h1>✏️ EDIT BOOKING SERVIS</h1>

    <hr>

    <form
        action="/booking/{{ $booking->id_booking }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>
                <strong>Pelanggan</strong>
            </label>
            <br>

            <select name="id_pelanggan" required>

                @foreach ($pelanggan as $item)

                    <option
                        value="{{ $item->id_pelanggan }}"
                        {{ $booking->id_pelanggan == $item->id_pelanggan ? 'selected' : '' }}
                    >
                        {{ $item->nama }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Kendaraan</strong>
            </label>
            <br>

            <select name="id_kendaraan" required>

                @foreach ($kendaraan as $item)

                    <option
                        value="{{ $item->id_kendaraan }}"
                        {{ $booking->id_kendaraan == $item->id_kendaraan ? 'selected' : '' }}
                    >
                        {{ $item->merk }}
                        {{ $item->model }}
                        -
                        {{ $item->nopol }}
                        -
                        {{ $item->pelanggan->nama ?? '-' }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Cabang</strong>
            </label>
            <br>

            <select name="id_cabang" required>

                @foreach ($cabang as $item)

                    <option
                        value="{{ $item->id_cabang }}"
                        {{ $booking->id_cabang == $item->id_cabang ? 'selected' : '' }}
                    >
                        {{ $item->nama_cabang }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Layanan Servis</strong>
            </label>
            <br>

            <select name="layanan_id" required>

                @foreach ($layanan as $item)

                    <option
                        value="{{ $item->id_layanan }}"
                        {{ $booking->layanan_id == $item->id_layanan ? 'selected' : '' }}
                    >
                        {{ $item->nama_layanan }}
                        -
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Tanggal Booking</strong>
            </label>
            <br>

            <input
                type="date"
                name="tanggal_booking"
                value="{{ $booking->tanggal_booking }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Waktu Booking</strong>
            </label>
            <br>

            <input
                type="time"
                name="waktu_booking"
                value="{{ $booking->waktu_booking }}"
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
                value="{{ $booking->status }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Catatan</strong>
            </label>
            <br>

            <textarea
                name="catatan"
                rows="4"
                cols="50"
            >{{ $booking->catatan }}</textarea>
        </p>

        <button type="submit">
            💾 Update
        </button>

    </form>

    <br>

    <a href="/booking">
        ← Kembali
    </a>

</body>
</html>