<!DOCTYPE html>
<html>
<head>
    <title>Data Role</title>
</head>
<body>

    <h1>🔐 DATA ROLE</h1>

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
        <a href="/role/create">
            ➕ Tambah Role
        </a>
    </p>

    <hr>

    <h2>Jumlah Role: {{ $role->count() }}</h2>

    @foreach ($role as $item)

        <hr>

        <h2>
            🔐 Role #{{ $item->id_role }}
        </h2>

        <p>
            <strong>Nama Role:</strong>
            {{ $item->nama_role }}
        </p>

        <p>
            <strong>Deskripsi:</strong>
            {{ $item->deskripsi ?? '-' }}
        </p>

        <h3>👤 User</h3>

        <p>
            Jumlah User:
            {{ $item->users->count() }}
        </p>

        @if ($item->users->count() > 0)

            @foreach ($item->users as $user)

                <p>
                    {{ $user->nama }}
                    -
                    {{ $user->email }}
                </p>

            @endforeach

        @else

            <p>
                Belum ada user dengan role ini.
            </p>

        @endif

        <p>
            <a href="/role/{{ $item->id_role }}/edit">
                ✏️ Edit
            </a>
        </p>

        <form
            action="/role/{{ $item->id_role }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus role ini?')"
            >
                🗑️ Hapus
            </button>
        </form>

    @endforeach

</body>
</html>