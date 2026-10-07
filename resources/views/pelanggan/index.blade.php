<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
</head>
<body>

    <h1>👤 DATA PELANGGAN</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>
        <a href="/pelanggan/create">
            ➕ Tambah Pelanggan
        </a>
    </p>

    <hr>

    <h2>Jumlah Pelanggan: {{ $pelanggan->count() }}</h2>

    @foreach ($pelanggan as $item)

        <hr>

        <h2>
            👤 Pelanggan #{{ $item->id_pelanggan }}
        </h2>

        <p>
            <strong>Nama:</strong>
            {{ $item->nama }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $item->email }}
        </p>

        <p>
            <strong>No HP:</strong>
            {{ $item->no_hp }}
        </p>

        <p>
            <strong>Alamat:</strong>
            {{ $item->alamat }}
        </p>

        <p>
            <strong>Tanggal Daftar:</strong>
            {{ $item->tanggal_daftar }}
        </p>

        <p>
            <a href="/pelanggan/{{ $item->id_pelanggan }}/edit">
                ✏️ Edit
            </a>
        </p>

        <form
            action="/pelanggan/{{ $item->id_pelanggan }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus pelanggan ini?')"
            >
                🗑️ Hapus
            </button>
        </form>

    @endforeach

</body>
</html>