<!DOCTYPE html>
<html>
<head>
    <title>Tambah Metode Pembayaran</title>
</head>
<body>

    <h1>➕ TAMBAH METODE PEMBAYARAN</h1>

    <hr>

    <form action="/metodepembayaran" method="POST">

        @csrf

        <p>
            <label>
                <strong>Nama Metode</strong>
            </label>
            <br>

            <input
                type="text"
                name="nama_metode"
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
            ></textarea>
        </p>

        <button type="submit">
            💾 Simpan
        </button>

    </form>

    <br>

    <a href="/metodepembayaran">
        ← Kembali
    </a>

</body>
</html>