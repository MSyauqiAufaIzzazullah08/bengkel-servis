<!DOCTYPE html>
<html>
<head>
    <title>Edit Metode Pembayaran</title>
</head>
<body>

    <h1>✏️ EDIT METODE PEMBAYARAN</h1>

    <hr>

    <form
        action="/metodepembayaran/{{ $metode->id_metode }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>
                <strong>Nama Metode</strong>
            </label>
            <br>

            <input
                type="text"
                name="nama_metode"
                value="{{ $metode->nama_metode }}"
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
            >{{ $metode->deskripsi }}</textarea>
        </p>

        <button type="submit">
            💾 Update
        </button>

    </form>

    <br>

    <a href="/metodepembayaran">
        ← Kembali
    </a>

</body>
</html>