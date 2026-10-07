<h1>✏️ Edit Spare Part</h1>

<form
    action="/sparepart/{{ $sparePart->id_sparepart }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <p>
        <label>Kategori:</label><br>

        <select name="kategori_id" required>

            @foreach ($kategori as $item)

                <option
                    value="{{ $item->id_kategori }}"
                    {{ $sparePart->kategori_id == $item->id_kategori ? 'selected' : '' }}
                >
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
            value="{{ $sparePart->nama }}"
            required
        >
    </p>

    <p>
        <label>Harga:</label><br>

        <input
            type="number"
            name="harga"
            value="{{ $sparePart->harga }}"
            required
        >
    </p>

    <p>
        <label>Stok:</label><br>

        <input
            type="number"
            name="stok"
            value="{{ $sparePart->stok }}"
            required
        >
    </p>

    <p>
        <label>Deskripsi:</label><br>

        <textarea name="deskripsi">{{ $sparePart->deskripsi }}</textarea>
    </p>

    <p>
        <label>Gambar:</label><br>

        <input
            type="text"
            name="gambar"
            value="{{ $sparePart->gambar }}"
        >
    </p>

    <button type="submit">
        💾 Update
    </button>

</form>

<br>

<a href="/sparepart">
    ⬅️ Kembali
</a>