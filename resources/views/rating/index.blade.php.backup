<h1>⭐ DATA RATING</h1>

<a href="/rating/create">
    ➕ Tambah Rating
</a>

<hr>

<h2>Jumlah Data Rating: {{ $rating->count() }}</h2>

@foreach ($rating as $item)

    <hr>

    <h2>
        ⭐ Rating #{{ $item->id_rating }}
    </h2>

    <h3>👤 Pelanggan</h3>

    <p>
        <strong>Nama:</strong>
        {{ $item->pelanggan->nama ?? '-' }}
    </p>

    <h3>📋 Sumber Rating</h3>

    @if ($item->id_booking)

        <p>
            <strong>Jenis:</strong>
            Booking Servis
        </p>

        <p>
            <strong>ID Booking:</strong>
            {{ $item->id_booking }}
        </p>

    @elseif ($item->id_order)

        <p>
            <strong>Jenis:</strong>
            Order Spare Part
        </p>

        <p>
            <strong>ID Order:</strong>
            {{ $item->id_order }}
        </p>

    @else

        <p>
            <strong>Jenis:</strong>
            Tidak ada transaksi
        </p>

    @endif

    <h3>⭐ Penilaian</h3>

    <p>
        <strong>Nilai:</strong>
        {{ $item->nilai }} / 5
    </p>

    <p>
        <strong>Ulasan:</strong>
        {{ $item->ulasan ?? '-' }}
    </p>

    <p>
        <strong>Tanggal:</strong>
        {{ $item->tanggal ?? '-' }}
    </p>

    <br>

    <a href="/rating/{{ $item->id_rating }}/edit">
        ✏️ Edit
    </a>

    <form
        action="/rating/{{ $item->id_rating }}"
        method="POST"
        style="display:inline;"
    >
        @csrf
        @method('DELETE')

        <button type="submit">
            🗑️ Hapus
        </button>
    </form>

@endforeach