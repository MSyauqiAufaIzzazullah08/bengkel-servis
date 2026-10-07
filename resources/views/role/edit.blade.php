<!DOCTYPE html>
<html>
<head>
    <title>Edit Role</title>
</head>
<body>

    <h1>✏️ EDIT ROLE</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="/role/{{ $role->id_role }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>Nama Role</label><br>

            <input
                type="text"
                name="nama_role"
                value="{{ old('nama_role', $role->nama_role) }}"
                required
            >
        </p>

        <p>
            <label>Deskripsi</label><br>

            <textarea
                name="deskripsi"
            >{{ old('deskripsi', $role->deskripsi) }}</textarea>
        </p>

        <button type="submit">
            💾 Update
        </button>

        <a href="/role">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>