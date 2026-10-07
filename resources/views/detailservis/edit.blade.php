<!DOCTYPE html>
<html>
<head>
    <title>Edit Detail Servis</title>
</head>
<body>

    <h1>✏️ EDIT DETAIL SERVIS</h1>

    <hr>

    <form
        action="/detailservis/{{ $detail->id_detail }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>
                <strong>Booking Servis</strong>
            </label>
            <br>

            <select name="booking_id" required>

                @foreach ($booking as $item)

                    <option
                        value="{{ $item->id_booking }}"
                        {{ $detail->booking_id == $item->id_booking ? 'selected' : '' }}
                    >

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

                @foreach ($layanan as $item)

                    <option
                        value="{{ $item->id_layanan }}"
                        {{ $detail->layanan_id == $item->id_layanan ? 'selected' : '' }}
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
                <strong>Spare Part</strong>
            </label>
            <br>

            <select name="id_sparepart">

                <option value="">
                    -- Tidak Ada Spare Part --
                </option>

                @foreach ($sparepart as $item)

                    <option
                        value="{{ $item->id_sparepart }}"
                        {{ $detail->id_sparepart == $item->id_sparepart ? 'selected' : '' }}
                    >

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
                value="{{ $detail->harga }}"
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
            >{{ $detail->catatan }}</textarea>
        </p>

        <button type="submit">
            💾 Update
        </button>

    </form>

    <br>

    <a href="/detailservis">
        ← Kembali
    </a>

</body>
</html>