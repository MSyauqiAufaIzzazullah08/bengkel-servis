<!DOCTYPE html>
<html>
<head>
    <title>Tambah Promo</title>
</head>
<body>

    <h1>➕ TAMBAH PROMO</h1>

    <hr>

    <form action="/promo" method="POST">

        @csrf

        <p>
            <label>
                <strong>Kode Promo</strong>
            </label>
            <br>

            <input
                type="text"
                name="kode_promo"
                required
            >
        </p>

        <p>
            <label>
                <strong>Jenis Diskon</strong>
            </label>
            <br>

            <select name="jenis_diskon" required>

                <option value="">
                    -- Pilih Jenis Diskon --
                </option>

                <option value="Persen">
                    Persen
                </option>

                <option value="Nominal">
                    Nominal
                </option>

            </select>
        </p>

        <p>
            <label>
                <strong>Nilai Diskon</strong>
            </label>
            <br>

            <input
                type="number"
                name="nilai_diskon"
                min="0"
                step="0.01"
                required
            >
        </p>

        <p>
            <label>
                <strong>Minimal Transaksi</strong>
            </label>
            <br>

            <input
                type="number"
                name="minimal_transaksi"
                min="0"
                step="0.01"
                required
            >
        </p>

        <p>
            <label>
                <strong>Periode Mulai</strong>
            </label>
            <br>

            <input
                type="date"
                name="periode_mulai"
                required
            >
        </p>

        <p>
            <label>
                <strong>Periode Selesai</strong>
            </label>
            <br>

            <input
                type="date"
                name="periode_selesai"
                required
            >
        </p>

        <p>
            <label>
                <strong>Kuota</strong>
            </label>
            <br>

            <input
                type="number"
                name="kuota"
                min="0"
                required
            >
        </p>

        <button type="submit">
            💾 Simpan
        </button>

    </form>

    <br>

    <a href="/promo">
        ← Kembali
    </a>

</body>
</html>