<!DOCTYPE html>
<html>
<head>
    <title>Data Admin Cabang</title>
</head>
<body>

    <h1>👨‍💼 DATA ADMIN CABANG</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if (session('error'))
        <p style="color: red;">
            {{ session('error') }}
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
        <a href="/admincabang/create">
            ➕ Tambah Admin Cabang
        </a>
    </p>

    <hr>

    <h2>Jumlah Admin Cabang: {{ $adminCabang->count() }}</h2>

    @foreach ($adminCabang as $item)

        <hr>

        <h2>
            👨‍💼 Admin Cabang #{{ $item->id_admin }}
        </h2>

        <h3>👤 User</h3>

        @if ($item->user)

            <p>
                <strong>Nama:</strong>
                {{ $item->user->nama }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $item->user->email }}
            </p>

            <p>
                <strong>Role:</strong>
                {{ $item->user->role->nama_role ?? '-' }}
            </p>

        @else

            <p>User tidak tersedia.</p>

        @endif

        <h3>🏢 Cabang</h3>

        @if ($item->cabang)

            <p>
                <strong>Nama Cabang:</strong>
                {{ $item->cabang->nama_cabang }}
            </p>

            <p>
                <strong>Alamat:</strong>
                {{ $item->cabang->alamat }}
            </p>

            <p>
                <strong>Kontak:</strong>
                {{ $item->cabang->kontak }}
            </p>

        @else

            <p>Cabang tidak tersedia.</p>

        @endif

        <p>
            <a href="/admincabang/{{ $item->id_admin }}/edit">
                ✏️ Edit
            </a>
        </p>

        <form
            action="/admincabang/{{ $item->id_admin }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus admin cabang ini?')"
            >
                🗑️ Hapus
            </button>
        </form>

    @endforeach

</body>
</html>