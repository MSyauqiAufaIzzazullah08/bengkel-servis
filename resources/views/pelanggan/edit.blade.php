<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
</head>
<body>

    <h1>✏️ EDIT PELANGGAN</h1>

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
        action="/pelanggan/{{ $pelanggan->id_pelanggan }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>Nama</label><br>
            <input
                type="text"
                name="nama"
                value="{{ old('nama', $pelanggan->nama) }}"
                required
            >
        </p>

        <p>
            <label>Email</label><br>
            <input
                type="email"
                name="email"
                value="{{ old('email', $pelanggan->email) }}"
                required
            >
        </p>

        <p>
            <label>No HP</label><br>
            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp', $pelanggan->no_hp) }}"
                required
            >
        </p>

        <p>
            <label>Alamat</label><br>
            <textarea
                name="alamat"
                required
            >{{ old('alamat', $pelanggan->alamat) }}</textarea>
        </p>

        <p>
            <label>Tanggal Daftar</label><br>
            <input
                type="date"
                name="tanggal_daftar"
                value="{{ old('tanggal_daftar', $pelanggan->tanggal_daftar) }}"
                required
            >
        </p>

        <button type="submit">
            💾 Update
        </button>

        <a href="/pelanggan">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>