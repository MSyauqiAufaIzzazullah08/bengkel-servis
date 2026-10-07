<!DOCTYPE html>
<html>
<head>
    <title>Edit Promo</title>
</head>
<body>

    <h1>✏️ EDIT PROMO</h1>

    <hr>

    <form
        action="/promo/{{ $promo->id_promo }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>
                <strong>Kode Promo</strong>
            </label>
            <br>

            <input
                type="text"
                name="kode_promo"
                value="{{ $promo->kode_promo }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Jenis Diskon</strong>
            </label>
            <br>

            <select name="jenis_diskon" required>

                <option
                    value="Persen"
                    {{ $promo->jenis_diskon == 'Persen' ? 'selected' : '' }}
                >
                    Persen
                </option>

                <option
                    value="Nominal"
                    {{ $promo->jenis_diskon == 'Nominal' ? 'selected' : '' }}
                >
                    Nominal
                </option>

            </select>
        </p>

        <p>
            <label>
                <strong>Nilai Diskon</strong>
            </label>
            <br>

            <input
                type="number"
                name="nilai_diskon"
                value="{{ $promo->nilai_diskon }}"
                min="0"
                step="0.01"
                required
            >
        </p>

        <p>
            <label>
                <strong>Minimal Transaksi</strong>
            </label>
            <br>

            <input
                type="number"
                name="minimal_transaksi"
                value="{{ $promo->minimal_transaksi }}"
                min="0"
                step="0.01"
                required
            >
        </p>

        <p>
            <label>
                <strong>Periode Mulai</strong>
            </label>
            <br>

            <input
                type="date"
                name="periode_mulai"
                value="{{ $promo->periode_mulai }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Periode Selesai</strong>
            </label>
            <br>

            <input
                type="date"
                name="periode_selesai"
                value="{{ $promo->periode_selesai }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Kuota</strong>
            </label>
            <br>

            <input
                type="number"
                name="kuota"
                value="{{ $promo->kuota }}"
                min="0"
                required
            >
        </p>

        <button type="submit">
            💾 Update
        </button>

    </form>

    <br>

    <a href="/promo">
        ← Kembali
    </a>

</body>
</html>