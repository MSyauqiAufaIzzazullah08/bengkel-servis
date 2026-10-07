<!DOCTYPE html>
<html>
<head>
    <title>Tambah Cabang</title>
</head>
<body>

    <h1>➕ TAMBAH CABANG</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/cabang" method="POST">

        @csrf

        <p>
            <label>Nama Cabang</label><br>
            <input
                type="text"
                name="nama_cabang"
                value="{{ old('nama_cabang') }}"
                required
            >
        </p>

        <p>
            <label>Alamat</label><br>
            <textarea
                name="alamat"
                required
            >{{ old('alamat') }}</textarea>
        </p>

        <p>
            <label>Jam Operasional</label><br>
            <input
                type="text"
                name="jam_operasional"
                value="{{ old('jam_operasional') }}"
                placeholder="Contoh: 08:00 - 17:00"
                required
            >
        </p>

        <p>
            <label>Kontak</label><br>
            <input
                type="text"
                name="kontak"
                value="{{ old('kontak') }}"
                required
            >
        </p>

        <button type="submit">
            💾 Simpan
        </button>

        <a href="/cabang">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>