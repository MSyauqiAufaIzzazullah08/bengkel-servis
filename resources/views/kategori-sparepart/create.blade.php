<h1>➕ Tambah Kategori Spare Part</h1>

<form action="/kategori-sparepart" method="POST">

    @csrf

    <p>
        <label>Nama Kategori:</label><br>

        <input
            type="text"
            name="nama_kategori"
            required
        >
    </p>

    <p>
        <label>Deskripsi:</label><br>

        <textarea name="deskripsi"></textarea>
    </p>

    <button type="submit">
        💾 Simpan
    </button>

</form>

<br>

<a href="/kategori-sparepart">
    ⬅️ Kembali
</a>