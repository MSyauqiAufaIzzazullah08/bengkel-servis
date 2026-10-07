<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penugasan Teknisi</title>
</head>
<body>

    <h1>➕ TAMBAH PENUGASAN TEKNISI</h1>

    <hr>

    <form action="/penugasan" method="POST">

        @csrf

        <p>
            <label>
                <strong>Booking Servis</strong>
            </label>
            <br>

            <select name="id_booking" required>

                <option value="">
                    -- Pilih Booking --
                </option>

                @foreach ($booking as $item)

                    <option value="{{ $item->id_booking }}">

                        Booking #{{ $item->id_booking }}

                        -
                        {{ $item->pelanggan->nama ?? '-' }}

                        -

                        {{ $item->kendaraan->merk ?? '-' }}
                        {{ $item->kendaraan->model ?? '' }}

                        -
                        {{ $item->kendaraan->nopol ?? '-' }}

                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Teknisi</strong>
            </label>
            <br>

            <select name="id_teknisi" required>

                <option value="">
                    -- Pilih Teknisi --
                </option>

                @foreach ($teknisi as $item)

                    <option value="{{ $item->id_teknisi }}">

                        {{ $item->nama }}

                        -
                        {{ $item->keahlian }}

                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Tanggal</strong>
            </label>
            <br>

            <input
                type="date"
                name="tanggal"
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
                value="Assigned"
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

    <a href="/penugasan">
        ← Kembali
    </a>

</body>
</html>