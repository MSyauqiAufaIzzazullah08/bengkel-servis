<!DOCTYPE html>
<html>
<head>
    <title>Tambah Role</title>
</head>
<body>

    <h1>➕ TAMBAH ROLE</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/role" method="POST">

        @csrf

        <p>
            <label>Nama Role</label><br>

            <input
                type="text"
                name="nama_role"
                value="{{ old('nama_role') }}"
                required
            >
        </p>

        <p>
            <label>Deskripsi</label><br>

            <textarea
                name="deskripsi"
            >{{ old('deskripsi') }}</textarea>
        </p>

        <button type="submit">
            💾 Simpan
        </button>

        <a href="/role">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>