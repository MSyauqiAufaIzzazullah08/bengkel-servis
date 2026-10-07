<!DOCTYPE html>
<html>
<head>
    <title>Edit Teknisi</title>
</head>
<body>

    <h1>✏️ EDIT TEKNISI</h1>

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
        action="/teknisi/{{ $teknisi->id_teknisi }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>User Teknisi</label><br>

            <select name="user_id" required>

                @foreach ($users as $user)

                    <option
                        value="{{ $user->id_user }}"
                        {{ old('user_id', $teknisi->user_id) == $user->id_user ? 'selected' : '' }}
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
                value="{{ old('nama', $teknisi->nama) }}"
                required
            >
        </p>

        <p>
            <label>No HP</label><br>

            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp', $teknisi->no_hp) }}"
                required
            >
        </p>

        <p>
            <label>Keahlian</label><br>

            <input
                type="text"
                name="keahlian"
                value="{{ old('keahlian', $teknisi->keahlian) }}"
                required
            >
        </p>

        <p>
            <label>Status</label><br>

            <select name="status" required>

                <option value="aktif"
                    {{ old('status', $teknisi->status) == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="nonaktif"
                    {{ old('status', $teknisi->status) == 'nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>

            </select>
        </p>

        <button type="submit">
            💾 Update
        </button>

        <a href="/teknisi">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>