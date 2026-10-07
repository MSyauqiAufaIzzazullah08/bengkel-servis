<!DOCTYPE html>
<html>
<head>
    <title>Edit Penugasan Teknisi</title>
</head>
<body>

    <h1>✏️ EDIT PENUGASAN TEKNISI</h1>

    <hr>

    <form
        action="/penugasan/{{ $penugasan->id_penugasan }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>
                <strong>Booking Servis</strong>
            </label>
            <br>

            <select name="id_booking" required>

                @foreach ($booking as $item)

                    <option
                        value="{{ $item->id_booking }}"
                        {{ $penugasan->id_booking == $item->id_booking ? 'selected' : '' }}
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
                <strong>Teknisi</strong>
            </label>
            <br>

            <select name="id_teknisi" required>

                @foreach ($teknisi as $item)

                    <option
                        value="{{ $item->id_teknisi }}"
                        {{ $penugasan->id_teknisi == $item->id_teknisi ? 'selected' : '' }}
                    >

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
                value="{{ $penugasan->tanggal }}"
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
                value="{{ $penugasan->status }}"
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
            >{{ $penugasan->catatan }}</textarea>
        </p>

        <button type="submit">
            💾 Update
        </button>

    </form>

    <br>

    <a href="/penugasan">
        ← Kembali
    </a>

</body>
</html>