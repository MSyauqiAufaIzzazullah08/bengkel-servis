<!DOCTYPE html>
<html>
<head>
    <title>Tambah Montir Lapangan</title>
</head>
<body>

    <h1>➕ TAMBAH MONTIR LAPANGAN</h1>

    <hr>

    <form action="/montirlapangan" method="POST">

        @csrf

        <p>
            <label>
                <strong>User</strong>
            </label>
            <br>

            <select name="user_id" required>

                <option value="">
                    -- Pilih User --
                </option>

                @foreach ($users as $user)

                    <option value="{{ $user->id_user }}">

                        {{ $user->nama }}

                        -
                        {{ $user->email }}

                        -
                        {{ $user->role->nama_role ?? '-' }}

                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Nama Montir</strong>
            </label>
            <br>

            <input
                type="text"
                name="nama"
                required
            >
        </p>

        <p>
            <label>
                <strong>No. HP</strong>
            </label>
            <br>

            <input
                type="text"
                name="no_hp"
                required
            >
        </p>

        <p>
            <label>
                <strong>Area Tugas</strong>
            </label>
            <br>

            <input
                type="text"
                name="area_tugas"
                required
            >
        </p>

        <p>
            <label>
                <strong>Status</strong>
            </label>
            <br>

            <select name="status" required>

                <option value="">
                    -- Pilih Status --
                </option>

                <option value="aktif">
                    Aktif
                </option>

                <option value="tidak aktif">
                    Tidak Aktif
                </option>

            </select>
        </p>

        <button type="submit">
            💾 Simpan
        </button>

    </form>

    <br>

    <a href="/montirlapangan">
        ← Kembali
    </a>

</body>
</html>