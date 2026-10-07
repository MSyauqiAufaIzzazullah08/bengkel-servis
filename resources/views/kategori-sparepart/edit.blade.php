<h1>✏️ Edit Kategori Spare Part</h1>

<form
    action="/kategori-sparepart/{{ $kategori->id_kategori }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <p>
        <label>Nama Kategori:</label><br>

        <input
            type="text"
            name="nama_kategori"
            value="{{ $kategori->nama_kategori }}"
            required
        >
    </p>

    <p>
        <label>Deskripsi:</label><br>

        <textarea name="deskripsi">{{ $kategori->deskripsi }}</textarea>
    </p>

    <button type="submit">
        💾 Update
    </button>

</form>

<br>

<a href="/kategori-sparepart">
    ⬅️ Kembali
</a>