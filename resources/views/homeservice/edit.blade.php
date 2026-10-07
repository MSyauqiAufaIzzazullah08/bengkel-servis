# ✏️ EDIT HOME SERVIS

<form action="/homeservice/{{ $homeServis->id_home_service }}" method="POST">

    @csrf
    @method('PUT')

    <p>
        <label>Pelanggan</label><br>

        <select name="id_pelanggan" required>

            @foreach ($pelanggan as $item)

                <option
                    value="{{ $item->id_pelanggan }}"
                    {{ $homeServis->id_pelanggan == $item->id_pelanggan ? 'selected' : '' }}
                >
                    {{ $item->nama }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Kendaraan</label><br>

        <select name="id_kendaraan" required>

            @foreach ($kendaraan as $item)

                <option
                    value="{{ $item->id_kendaraan }}"
                    {{ $homeServis->id_kendaraan == $item->id_kendaraan ? 'selected' : '' }}
                >
                    {{ $item->merk }}
                    {{ $item->model }}
                    - {{ $item->nopol }}
                    ({{ $item->pelanggan->nama ?? '-' }})
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Montir Lapangan</label><br>

        <select name="id_montir">

            <option value="">
                -- Belum Ditentukan --
            </option>

            @foreach ($montir as $item)

                <option
                    value="{{ $item->id_montir }}"
                    {{ $homeServis->id_montir == $item->id_montir ? 'selected' : '' }}
                >
                    {{ $item->nama }}
                    - {{ $item->area_tugas }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Alamat</label><br>

        <textarea
            name="alamat"
            rows="3"
            required
        >{{ $homeServis->alamat }}</textarea>
    </p>

    <p>
        <label>Tanggal</label><br>

        <input
            type="date"
            name="tanggal"
            value="{{ $homeServis->tanggal }}"
            required
        >
    </p>

    <p>
        <label>Status</label><br>

        <select name="status" required>

            <option
                value="Pending"
                {{ $homeServis->status == 'Pending' ? 'selected' : '' }}
            >
                Pending
            </option>

            <option
                value="Scheduled"
                {{ $homeServis->status == 'Scheduled' ? 'selected' : '' }}
            >
                Scheduled
            </option>

            <option
                value="On Progress"
                {{ $homeServis->status == 'On Progress' ? 'selected' : '' }}
            >
                On Progress
            </option>

            <option
                value="Completed"
                {{ $homeServis->status == 'Completed' ? 'selected' : '' }}
            >
                Completed
            </option>

            <option
                value="Cancelled"
                {{ $homeServis->status == 'Cancelled' ? 'selected' : '' }}
            >
                Cancelled
            </option>

        </select>
    </p>

    <p>
        <label>Catatan</label><br>

        <textarea
            name="catatan"
            rows="3"
        >{{ $homeServis->catatan }}</textarea>
    </p>

    <button type="submit">
        💾 Update
    </button>

</form>

<br>

<a href="/homeservice">
    ← Kembali
</a>