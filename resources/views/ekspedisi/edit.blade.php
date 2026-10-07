<h1>✏️ Edit Ekspedisi</h1>

<form
    action="/ekspedisi/{{ $ekspedisi->id_ekspedisi }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <p>
        <label>Nama Ekspedisi:</label><br>

        <input
            type="text"
            name="nama_ekspedisi"
            value="{{ $ekspedisi->nama_ekspedisi }}"
            required
        >
    </p>

    <p>
        <label>Kontak:</label><br>

        <input
            type="text"
            name="kontak"
            value="{{ $ekspedisi->kontak }}"
        >
    </p>

    <button type="submit">
        💾 Update
    </button>

</form>

<br>

<a href="/ekspedisi">
    ⬅️ Kembali
</a>