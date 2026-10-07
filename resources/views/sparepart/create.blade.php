<h1>➕ Tambah Spare Part</h1>

<form action="/sparepart" method="POST">

    @csrf

    <p>
        <label>Kategori:</label><br>

        <select name="kategori_id" required>

            <option value="">
                -- Pilih Kategori --
            </option>

            @foreach ($kategori as $item)

                <option value="{{ $item->id_kategori }}">
                    {{ $item->nama_kategori }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Nama Spare Part:</label><br>

        <input
            type="text"
            name="nama"
            required
        >
    </p>

    <p>
        <label>Harga:</label><br>

        <input
            type="number"
            name="harga"
            required
        >
    </p>

    <p>
        <label>Stok:</label><br>

        <input
            type="number"
            name="stok"
            required
        >
    </p>

    <p>
        <label>Deskripsi:</label><br>

        <textarea name="deskripsi"></textarea>
    </p>

    <p>
        <label>Gambar:</label><br>

        <input
            type="text"
            name="gambar"
            placeholder="contoh: oli.jpg"
        >
    </p>

    <button type="submit">
        💾 Simpan
    </button>

</form>

<br>

<a href="/sparepart">
    ⬅️ Kembali
</a>