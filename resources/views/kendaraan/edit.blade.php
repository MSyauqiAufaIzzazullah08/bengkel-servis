<!DOCTYPE html>
<html>
<head>
    <title>Edit Kendaraan</title>
</head>
<body>

    <h1>✏️ EDIT KENDARAAN</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="/kendaraan/{{ $kendaraan->id_kendaraan }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>Pelanggan</label><br>

            <select name="id_pelanggan" required>

                @foreach ($pelanggan as $item)

                    <option
                        value="{{ $item->id_pelanggan }}"
                        {{ old('id_pelanggan', $kendaraan->id_pelanggan) == $item->id_pelanggan ? 'selected' : '' }}
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
                value="{{ old('merk', $kendaraan->merk) }}"
                required
            >
        </p>

        <p>
            <label>Model</label><br>
            <input
                type="text"
                name="model"
                value="{{ old('model', $kendaraan->model) }}"
                required
            >
        </p>

        <p>
            <label>Tahun</label><br>
            <input
                type="number"
                name="tahun"
                value="{{ old('tahun', $kendaraan->tahun) }}"
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
                value="{{ old('nopol', $kendaraan->nopol) }}"
                required
            >
        </p>

        <button type="submit">
            💾 Update
        </button>

        <a href="/kendaraan">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>