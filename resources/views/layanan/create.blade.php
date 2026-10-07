<!DOCTYPE html>
<html>
<head>
    <title>Tambah Layanan Servis</title>
</head>
<body>

    <h1>➕ TAMBAH LAYANAN SERVIS</h1>

    <hr>

    <form action="/layanan" method="POST">

        @csrf

        <p>
            <label>
                <strong>Nama Layanan</strong>
            </label>
            <br>

            <input
                type="text"
                name="nama_layanan"
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
                placeholder="Contoh: 1 Jam"
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

    <a href="/layanan">
        ← Kembali
    </a>

</body>
</html>