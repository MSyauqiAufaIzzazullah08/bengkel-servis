<!DOCTYPE html>
<html>
<head>
    <title>Edit Montir Lapangan</title>
</head>
<body>

    <h1>✏️ EDIT MONTIR LAPANGAN</h1>

    <hr>

    <form
        action="/montirlapangan/{{ $montir->id_montir }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>
                <strong>User</strong>
            </label>
            <br>

            <select name="user_id" required>

                @foreach ($users as $user)

                    <option
                        value="{{ $user->id_user }}"
                        {{ $montir->user_id == $user->id_user ? 'selected' : '' }}
                    >

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
                value="{{ $montir->nama }}"
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
                value="{{ $montir->no_hp }}"
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
                value="{{ $montir->area_tugas }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Status</strong>
            </label>
            <br>

            <select name="status" required>

                <option
                    value="aktif"
                    {{ $montir->status == 'aktif' ? 'selected' : '' }}
                >
                    Aktif
                </option>

                <option
                    value="tidak aktif"
                    {{ $montir->status == 'tidak aktif' ? 'selected' : '' }}
                >
                    Tidak Aktif
                </option>

            </select>
        </p>

        <button type="submit">
            💾 Update
        </button>

    </form>

    <br>

    <a href="/montirlapangan">
        ← Kembali
    </a>

</body>
</html>