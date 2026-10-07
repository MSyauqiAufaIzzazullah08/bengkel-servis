<!DOCTYPE html>
<html>
<head>
    <title>Tambah Admin Cabang</title>
</head>
<body>

    <h1>➕ TAMBAH ADMIN CABANG</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admincabang" method="POST">

        @csrf

        <p>
            <label>User Admin Cabang</label><br>

            <select name="user_id" required>

                <option value="">
                    -- Pilih User --
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
            <label>Cabang</label><br>

            <select name="cabang_id" required>

                <option value="">
                    -- Pilih Cabang --
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

        <button type="submit">
            💾 Simpan
        </button>

        <a href="/admincabang">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>