<h1>➕ Tambah Ekspedisi</h1>

<form action="/ekspedisi" method="POST">

    @csrf

    <p>
        <label>Nama Ekspedisi:</label><br>

        <input
            type="text"
            name="nama_ekspedisi"
            required
        >
    </p>

    <p>
        <label>Kontak:</label><br>

        <input
            type="text"
            name="kontak"
        >
    </p>

    <button type="submit">
        💾 Simpan
    </button>

</form>

<br>

<a href="/ekspedisi">
    ⬅️ Kembali
</a>