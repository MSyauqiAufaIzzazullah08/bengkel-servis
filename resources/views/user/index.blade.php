<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>

    <h1>👤 DATA USER</h1>

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
        <a href="/user/create">
            ➕ Tambah User
        </a>
    </p>

    <hr>

    <h2>Jumlah User: {{ $user->count() }}</h2>

    @foreach ($user as $item)

        <hr>

        <h2>👤 User #{{ $item->id_user }}</h2>

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
            <strong>Status:</strong>
            {{ $item->status }}
        </p>

        <h3>🔐 Role</h3>

        @if ($item->role)
            <p>
                {{ $item->role->nama_role }}
            </p>
        @else
            <p>Role tidak tersedia.</p>
        @endif

        <h3>🏢 Cabang</h3>

        @if ($item->cabang)
            <p>
                {{ $item->cabang->nama_cabang }}
            </p>
        @else
            <p>Tidak terdaftar pada cabang.</p>
        @endif

        @if ($item->adminCabang)

            <h3>👨‍💼 Admin Cabang</h3>

            <p>
                Terdaftar sebagai Admin Cabang.
            </p>

        @endif

        @if ($item->teknisi)

            <h3>🔧 Teknisi</h3>

            <p>
                {{ $item->teknisi->nama }}
            </p>

        @endif

        @if ($item->montirLapangan)

            <h3>🧰 Montir Lapangan</h3>

            <p>
                {{ $item->montirLapangan->nama }}
            </p>

        @endif

        <p>
            <a href="/user/{{ $item->id_user }}/edit">
                ✏️ Edit
            </a>
        </p>

        <form
            action="/user/{{ $item->id_user }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus user ini?')"
            >
                🗑️ Hapus
            </button>
        </form>

    @endforeach

</body>
</html>