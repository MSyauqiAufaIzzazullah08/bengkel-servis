<!DOCTYPE html>
<html>
<head>
    <title>Data Teknisi</title>
</head>
<body>

    <h1>🔧 DATA TEKNISI</h1>

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
        <a href="/teknisi/create">
            ➕ Tambah Teknisi
        </a>
    </p>

    <hr>

    <h2>Jumlah Teknisi: {{ $teknisi->count() }}</h2>

    @foreach ($teknisi as $item)

        <hr>

        <h2>
            🔧 Teknisi #{{ $item->id_teknisi }}
        </h2>

        <p>
            <strong>Nama:</strong>
            {{ $item->nama }}
        </p>

        <p>
            <strong>No HP:</strong>
            {{ $item->no_hp }}
        </p>

        <p>
            <strong>Keahlian:</strong>
            {{ $item->keahlian }}
        </p>

        <p>
            <strong>Status:</strong>
            {{ $item->status }}
        </p>

        <h3>👤 User</h3>

        @if ($item->user)

            <p>
                <strong>Nama User:</strong>
                {{ $item->user->nama }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $item->user->email }}
            </p>

        @else

            <p>User tidak tersedia.</p>

        @endif

        <h3>📋 Penugasan</h3>

        <p>
            Jumlah Penugasan:
            {{ $item->penugasanTeknisi->count() }}
        </p>

        @if ($item->penugasanTeknisi->count() > 0)

            @foreach ($item->penugasanTeknisi as $penugasan)

                <p>
                    <strong>ID Penugasan:</strong>
                    {{ $penugasan->id_penugasan }}
                </p>

                @if ($penugasan->bookingServis)

                    <p>
                        <strong>ID Booking:</strong>
                        {{ $penugasan->bookingServis->id_booking }}
                    </p>

                    <p>
                        <strong>Status Booking:</strong>
                        {{ $penugasan->bookingServis->status }}
                    </p>

                @endif

            @endforeach

        @else

            <p>Belum ada penugasan.</p>

        @endif

        <p>
            <a href="/teknisi/{{ $item->id_teknisi }}/edit">
                ✏️ Edit
            </a>
        </p>

        <form
            action="/teknisi/{{ $item->id_teknisi }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus teknisi ini?')"
            >
                🗑️ Hapus
            </button>
        </form>

    @endforeach

</body>
</html>