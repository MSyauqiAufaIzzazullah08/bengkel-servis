<!DOCTYPE html>
<html>
<head>
    <title>Tambah Detail Servis</title>
</head>
<body>

    <h1>➕ TAMBAH DETAIL SERVIS</h1>

    <hr>

    <form action="/detailservis" method="POST">

        @csrf

        <p>
            <label>
                <strong>Booking Servis</strong>
            </label>
            <br>

            <select name="booking_id" required>

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
                <strong>Spare Part</strong>
            </label>
            <br>

            <select name="id_sparepart">

                <option value="">
                    -- Tidak Ada Spare Part --
                </option>

                @foreach ($sparepart as $item)

                    <option value="{{ $item->id_sparepart }}">

                        {{ $item->nama }}

                        -
                        Rp {{ number_format($item->harga, 0, ',', '.') }}

                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Harga</strong>
            </label>
            <br>

            <input
                type="number"
                name="harga"
                min="0"
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

    <a href="/detailservis">
        ← Kembali
    </a>

</body>
</html>