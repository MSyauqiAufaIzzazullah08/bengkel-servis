<!DOCTYPE html>
<html>
<head>
    <title>Edit Admin Cabang</title>
</head>
<body>

    <h1>✏️ EDIT ADMIN CABANG</h1>

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
        action="/admincabang/{{ $adminCabang->id_admin }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>User Admin Cabang</label><br>

            <select name="user_id" required>

                @foreach ($users as $user)

                    <option
                        value="{{ $user->id_user }}"
                        {{ old('user_id', $adminCabang->user_id) == $user->id_user ? 'selected' : '' }}
                    >
                        {{ $user->nama }} - {{ $user->email }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>Cabang</label><br>

            <select name="cabang_id" required>

                @foreach ($cabang as $item)

                    <option
                        value="{{ $item->id_cabang }}"
                        {{ old('cabang_id', $adminCabang->cabang_id) == $item->id_cabang ? 'selected' : '' }}
                    >
                        {{ $item->nama_cabang }}
                    </option>

                @endforeach

            </select>
        </p>

        <button type="submit">
            💾 Update
        </button>

        <a href="/admincabang">
            ↩️ Kembali
        </a>

    </form>

</body>
</html>