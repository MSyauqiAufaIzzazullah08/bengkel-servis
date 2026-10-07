<!DOCTYPE html>
<html>
<head>
    <title>Edit Layanan Servis</title>
</head>
<body>

    <h1>✏️ EDIT LAYANAN SERVIS</h1>

    <hr>

    <form
        action="/layanan/{{ $layanan->id_layanan }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>
                <strong>Nama Layanan</strong>
            </label>
            <br>

            <input
                type="text"
                name="nama_layanan"
                value="{{ $layanan->nama_layanan }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Kategori</strong>
            </label>
            <br>

            <input
                type="text"
                name="kategori"
                value="{{ $layanan->kategori }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Harga</strong>
            </label>
            <br>

            <input
                type="number"
                name="harga"
                value="{{ $layanan->harga }}"
                min="0"
                required
            >
        </p>

        <p>
            <label>
                <strong>Estimasi Waktu</strong>
            </label>
            <br>

            <input
                type="text"
                name="estimasi_waktu"
                value="{{ $layanan->estimasi_waktu }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Deskripsi</strong>
            </label>
            <br>

            <textarea
                name="deskripsi"
                rows="4"
                cols="50"
            >{{ $layanan->deskripsi }}</textarea>
        </p>

        <button type="submit">
            💾 Update
        </button>

    </form>

    <br>

    <a href="/layanan">
        ← Kembali
    </a>

</body>
</html>