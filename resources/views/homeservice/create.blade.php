# ➕ TAMBAH HOME SERVIS

<form action="/homeservice" method="POST">

    @csrf

    <p>
        <label>Pelanggan</label><br>

        <select name="id_pelanggan" required>

            <option value="">-- Pilih Pelanggan --</option>

            @foreach ($pelanggan as $item)

                <option value="{{ $item->id_pelanggan }}">
                    {{ $item->nama }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Kendaraan</label><br>

        <select name="id_kendaraan" required>

            <option value="">-- Pilih Kendaraan --</option>

            @foreach ($kendaraan as $item)

                <option value="{{ $item->id_kendaraan }}">
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

            <option value="">-- Belum Ditentukan --</option>

            @foreach ($montir as $item)

                <option value="{{ $item->id_montir }}">
                    {{ $item->nama }}
                    - {{ $item->area_tugas }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Alamat</label><br>

        <textarea name="alamat" rows="3" required></textarea>
    </p>

    <p>
        <label>Tanggal</label><br>

        <input
            type="date"
            name="tanggal"
            required
        >
    </p>

    <p>
        <label>Status</label><br>

        <select name="status" required>

            <option value="">-- Pilih Status --</option>
            <option value="Pending">Pending</option>
            <option value="Scheduled">Scheduled</option>
            <option value="On Progress">On Progress</option>
            <option value="Completed">Completed</option>
            <option value="Cancelled">Cancelled</option>

        </select>
    </p>

    <p>
        <label>Catatan</label><br>

        <textarea name="catatan" rows="3"></textarea>
    </p>

    <button type="submit">
        💾 Simpan
    </button>

</form>

<br>

<a href="/homeservice">
    ← Kembali
</a>