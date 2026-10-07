<!DOCTYPE html>
<html>
<head>
    <title>Tambah Booking Servis</title>
</head>
<body>

    <h1>➕ TAMBAH BOOKING SERVIS</h1>

    <hr>

    <form action="/booking" method="POST">

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
                <strong>Kendaraan</strong>
            </label>
            <br>

            <select name="id_kendaraan" required>

                <option value="">
                    -- Pilih Kendaraan --
                </option>

                @foreach ($kendaraan as $item)

                    <option value="{{ $item->id_kendaraan }}">
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

                <option value="">
                    -- Pilih Cabang --
                </option>

                @foreach ($cabang as $item)

                    <option value="{{ $item->id_cabang }}">
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

                <option value="">
                    -- Pilih Layanan --
                </option>

                @foreach ($layanan as $item)

                    <option value="{{ $item->id_layanan }}">
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
                <strong>Catatan</strong>
            </label>
            <br>

            <textarea
                name="catatan"
                rows="4"
                cols="50"
            ></textarea>
        </p>

        <button type="submit">
            💾 Simpan
        </button>

    </form>

    <br>

    <a href="/booking">
        ← Kembali
    </a>

</body>
</html>