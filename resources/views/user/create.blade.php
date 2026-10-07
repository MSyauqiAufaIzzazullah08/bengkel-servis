<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>

    <h1>➕ TAMBAH USER</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/user" method="POST">

        @csrf

        <p>
            <label>Nama</label><br>
            <input
                type="text"
                name="nama"
                value="{{ old('nama') }}"
                required
            >
        </p>

        <p>
            <label>Email</label><br>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </p>

        <p>
            <label>Password</label><br>
            <input
                type="password"
                name="password"
                required
            >
        </p>

        <p>
            <label>No HP</label><br>
            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp') }}"
                required
            >
        </p>

        <p>
            <label>Alamat</label><br>
            <textarea
                name="alamat"
                required
            >{{ old('alamat') }}</textarea>
        </p>

        <p>
            <label>Role</label><br>

            <select name="role_id" required>

                <option value="">
                    -- Pilih Role --
                </option>

                @foreach ($roles as $role)

                    <option
                        value="{{ $role->id_role }}"
                        {{ old('role_id') == $role->id_role ? 'selected' : '' }}
                    >
                        {{ $role->nama_role }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>Cabang</label><br>

            <select name="cabang_id">

                <option value="">
                    -- Tidak Ada Cabang --
                </option>

                @foreach ($cabang as $item)

                    <option
                        value="{{ $item->id_cabang }}"
                        {{ old('cabang_id') == $item->id_cabang ? 'selected' : '' }}
                    >
                        {{ $item->nama_cabang }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>Status</label><br>

            <select name="status" required>

                <option value="Aktif"
                    {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="Nonaktif"
                    {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>

            </select>
        </p>

        <button type="submit">
            💾 Simpan
        </button>

        <a href="/user">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>