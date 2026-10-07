<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kendaraan</title>
</head>
<body>

    <h1>➕ TAMBAH KENDARAAN</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/kendaraan" method="POST">

        @csrf

        <p>
            <label>Pelanggan</label><br>

            <select name="id_pelanggan" required>

                <option value="">
                    -- Pilih Pelanggan --
                </option>

                @foreach ($pelanggan as $item)

                    <option
                        value="{{ $item->id_pelanggan }}"
                        {{ old('id_pelanggan') == $item->id_pelanggan ? 'selected' : '' }}
                    >
                        {{ $item->nama }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>Merk</label><br>
            <input
                type="text"
                name="merk"
                value="{{ old('merk') }}"
                required
            >
        </p>

        <p>
            <label>Model</label><br>
            <input
                type="text"
                name="model"
                value="{{ old('model') }}"
                required
            >
        </p>

        <p>
            <label>Tahun</label><br>
            <input
                type="number"
                name="tahun"
                value="{{ old('tahun') }}"
                min="1900"
                max="2100"
                required
            >
        </p>

        <p>
            <label>No Polisi</label><br>
            <input
                type="text"
                name="nopol"
                value="{{ old('nopol') }}"
                required
            >
        </p>

        <button type="submit">
            💾 Simpan
        </button>

        <a href="/kendaraan">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>