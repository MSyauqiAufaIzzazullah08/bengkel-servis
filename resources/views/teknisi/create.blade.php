<!DOCTYPE html>
<html>
<head>
    <title>Tambah Teknisi</title>
</head>
<body>

    <h1>➕ TAMBAH TEKNISI</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/teknisi" method="POST">

        @csrf

        <p>
            <label>User Teknisi</label><br>

            <select name="user_id" required>

                <option value="">
                    -- Pilih User Teknisi --
                </option>

                @foreach ($users as $user)

                    <option
                        value="{{ $user->id_user }}"
                        {{ old('user_id') == $user->id_user ? 'selected' : '' }}
                    >
                        {{ $user->nama }} - {{ $user->email }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>Nama Teknisi</label><br>

            <input
                type="text"
                name="nama"
                value="{{ old('nama') }}"
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
            <label>Keahlian</label><br>

            <input
                type="text"
                name="keahlian"
                value="{{ old('keahlian') }}"
                placeholder="Contoh: Mesin dan Tune Up"
                required
            >
        </p>

        <p>
            <label>Status</label><br>

            <select name="status" required>

                <option value="aktif"
                    {{ old('status') == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="nonaktif"
                    {{ old('status') == 'nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>

            </select>
        </p>

        <button type="submit">
            💾 Simpan
        </button>

        <a href="/teknisi">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>