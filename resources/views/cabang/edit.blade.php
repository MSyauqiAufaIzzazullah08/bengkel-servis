<!DOCTYPE html>
<html>
<head>
    <title>Edit Cabang</title>
</head>
<body>

    <h1>✏️ EDIT CABANG</h1>

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
        action="/cabang/{{ $cabang->id_cabang }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>Nama Cabang</label><br>
            <input
                type="text"
                name="nama_cabang"
                value="{{ old('nama_cabang', $cabang->nama_cabang) }}"
                required
            >
        </p>

        <p>
            <label>Alamat</label><br>
            <textarea
                name="alamat"
                required
            >{{ old('alamat', $cabang->alamat) }}</textarea>
        </p>

        <p>
            <label>Jam Operasional</label><br>
            <input
                type="text"
                name="jam_operasional"
                value="{{ old('jam_operasional', $cabang->jam_operasional) }}"
                required
            >
        </p>

        <p>
            <label>Kontak</label><br>
            <input
                type="text"
                name="kontak"
                value="{{ old('kontak', $cabang->kontak) }}"
                required
            >
        </p>

        <button type="submit">
            💾 Update
        </button>

        <a href="/cabang">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>