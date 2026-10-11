/**
 * crud.js
 * ============================================================
 * Modul CRUD Simulasi untuk prototipe frontend.
 *
 * PENTING: Semua perubahan data (tambah, edit, hapus) hanya
 * tersimpan di memori browser (variabel JavaScript).
 * Data TIDAK dikirim ke database atau backend Laravel.
 * Jika halaman di-refresh, data kembali ke kondisi semula.
 *
 * Setelah integrasi Laravel (Tahap 5), fungsi-fungsi ini
 * digantikan dengan pemanggilan API menggunakan fetch().
 * ============================================================
 */

// ============================================================
// STORE: Salinan data yang bisa diubah selama sesi browser
// ============================================================
var STORE = {
  pelanggan: [],
  kendaraan: [],
  booking: [],
  _idCounter: { pelanggan: 100, kendaraan: 100, booking: 100 },
};

// Inisialisasi: salin dari DEMO_DATA agar data asli tidak berubah
function inisialisasiStore() {
  // Deep copy sederhana menggunakan JSON
  STORE.pelanggan = JSON.parse(JSON.stringify(DEMO_DATA.pelanggan));
  STORE.kendaraan = JSON.parse(JSON.stringify(DEMO_DATA.kendaraan));
  STORE.booking   = JSON.parse(JSON.stringify(DEMO_DATA.bookingLengkap));

  // Pastikan setiap kendaraan punya pelangganId yang valid.
  // Jika data kendaraan tidak memiliki pelangganId (misal data lama),
  // cari berdasarkan nama pelanggan sebagai fallback.
  STORE.kendaraan.forEach(function(k) {
    if (!k.pelangganId) {
      var pel = STORE.pelanggan.find(function(p) { return p.nama === k.pelanggan; });
      k.pelangganId = pel ? pel.id : null;
    }
  });

  // Set counter ID mulai dari angka terakhir data demo
  STORE._idCounter.pelanggan = Math.max.apply(null, STORE.pelanggan.map(function(p) { return p.id; })) + 1;
  STORE._idCounter.kendaraan = Math.max.apply(null, STORE.kendaraan.map(function(k) { return k.id; })) + 1;
  STORE._idCounter.booking   = 9; // Booking terakhir BK-2026-008
}

// ============================================================
// PELANGGAN — CRUD
// ============================================================
var CRUDPelanggan = {

  getAll: function() {
    return STORE.pelanggan.slice();
  },

  getById: function(id) {
    return STORE.pelanggan.find(function(p) { return p.id === id; }) || null;
  },

  tambah: function(data) {
    var id = STORE._idCounter.pelanggan++;
    var item = {
      id:         id,
      nama:       data.nama.trim(),
      telepon:    data.telepon.trim(),
      email:      (data.email || '').trim(),
      alamat:     (data.alamat || '').trim(),
      kendaraan:  0,
      terdaftar:  new Date().toISOString().split('T')[0],
    };
    STORE.pelanggan.push(item);
    return item;
  },

  update: function(id, data) {
    var idx = STORE.pelanggan.findIndex(function(p) { return p.id === id; });
    if (idx === -1) return null;
    STORE.pelanggan[idx].nama     = data.nama.trim();
    STORE.pelanggan[idx].telepon  = data.telepon.trim();
    STORE.pelanggan[idx].email    = (data.email || '').trim();
    STORE.pelanggan[idx].alamat   = (data.alamat || '').trim();
    return STORE.pelanggan[idx];
  },

  hapus: function(id) {
    var idx = STORE.pelanggan.findIndex(function(p) { return p.id === id; });
    if (idx === -1) return false;
    STORE.pelanggan.splice(idx, 1);
    return true;
  },
};

// ============================================================
// KENDARAAN — CRUD
// ============================================================
var CRUDKendaraan = {

  getAll: function() {
    return STORE.kendaraan.slice();
  },

  getById: function(id) {
    return STORE.kendaraan.find(function(k) { return k.id === id; }) || null;
  },

  tambah: function(data) {
    var id = STORE._idCounter.kendaraan++;
    var item = {
      id:           id,
      pelangganId:  data.pelangganId,
      pelanggan:    data.pelanggan.trim(),
      merk:         data.merk.trim(),
      model:        data.model.trim(),
      tahun:        parseInt(data.tahun, 10),
      plat:         data.plat.trim().toUpperCase(),
      jenis:        data.jenis,
      warna:        (data.warna || '').trim(),
    };
    STORE.kendaraan.push(item);
    // Tambah hitungan kendaraan ke pelanggan
    var pel = STORE.pelanggan.find(function(p) { return p.id === data.pelangganId; });
    if (pel) pel.kendaraan = (pel.kendaraan || 0) + 1;
    return item;
  },

  update: function(id, data) {
    var idx = STORE.kendaraan.findIndex(function(k) { return k.id === id; });
    if (idx === -1) return null;
    var lama = STORE.kendaraan[idx];

    // Jika pemilik berubah, sesuaikan hitungan
    if (lama.pelangganId !== data.pelangganId) {
      var pelLama = STORE.pelanggan.find(function(p) { return p.id === lama.pelangganId; });
      if (pelLama && pelLama.kendaraan > 0) pelLama.kendaraan--;
      var pelBaru = STORE.pelanggan.find(function(p) { return p.id === data.pelangganId; });
      if (pelBaru) pelBaru.kendaraan = (pelBaru.kendaraan || 0) + 1;
    }

    STORE.kendaraan[idx].pelangganId = data.pelangganId;
    STORE.kendaraan[idx].pelanggan   = data.pelanggan.trim();
    STORE.kendaraan[idx].merk        = data.merk.trim();
    STORE.kendaraan[idx].model       = data.model.trim();
    STORE.kendaraan[idx].tahun       = parseInt(data.tahun, 10);
    STORE.kendaraan[idx].plat        = data.plat.trim().toUpperCase();
    STORE.kendaraan[idx].jenis       = data.jenis;
    STORE.kendaraan[idx].warna       = (data.warna || '').trim();
    return STORE.kendaraan[idx];
  },

  hapus: function(id) {
    var idx = STORE.kendaraan.findIndex(function(k) { return k.id === id; });
    if (idx === -1) return false;
    var item = STORE.kendaraan[idx];
    var pel = STORE.pelanggan.find(function(p) { return p.id === item.pelangganId; });
    if (pel && pel.kendaraan > 0) pel.kendaraan--;
    STORE.kendaraan.splice(idx, 1);
    return true;
  },
};

// ============================================================
// BOOKING — CRUD
// ============================================================
var CRUDBooking = {

  getAll: function() {
    return STORE.booking.slice();
  },

  getById: function(id) {
    return STORE.booking.find(function(b) { return b.id === id; }) || null;
  },

  buatId: function() {
    STORE._idCounter.booking++;
    var n = String(STORE._idCounter.booking).padStart(3, '0');
    return 'BK-2026-0' + n;
  },

  tambah: function(data) {
    var item = {
      id:           'BK-2026-' + String(STORE._idCounter.booking + 1).padStart(3, '0'),
      pelanggan:    data.pelanggan.trim(),
      telepon:      data.telepon.trim(),
      kendaraan:    data.kendaraan.trim(),
      plat:         data.plat.trim().toUpperCase(),
      servis:       data.servis.trim(),
      cabang:       data.cabang,
      jadwal:       data.jadwal,
      teknisi:      data.teknisi || '-',
      status:       'menunggu',
      total:        0,
      catatan:      (data.catatan || '').trim(),
    };
    STORE._idCounter.booking++;
    STORE.booking.unshift(item); // Tambah di depan
    return item;
  },

  update: function(id, data) {
    var idx = STORE.booking.findIndex(function(b) { return b.id === id; });
    if (idx === -1) return null;
    var b = STORE.booking[idx];
    b.pelanggan = data.pelanggan.trim();
    b.telepon   = data.telepon.trim();
    b.kendaraan = data.kendaraan.trim();
    b.plat      = data.plat.trim().toUpperCase();
    b.servis    = data.servis.trim();
    b.cabang    = data.cabang;
    b.jadwal    = data.jadwal;
    b.catatan   = (data.catatan || '').trim();
    if (data.status) b.status = data.status;
    return b;
  },

  batalkan: function(id) {
    var idx = STORE.booking.findIndex(function(b) { return b.id === id; });
    if (idx === -1) return false;
    if (STORE.booking[idx].status === 'selesai') return false;
    STORE.booking[idx].status = 'dibatalkan';
    return true;
  },

  hapus: function(id) {
    var idx = STORE.booking.findIndex(function(b) { return b.id === id; });
    if (idx === -1) return false;
    STORE.booking.splice(idx, 1);
    return true;
  },
};

// ============================================================
// VALIDASI FORM GENERIC
// ============================================================
function validasiForm(formEl) {
  var valid = true;
  var fields = formEl.querySelectorAll('[required]');
  fields.forEach(function(field) {
    var errEl = field.closest('.form-group') && field.closest('.form-group').querySelector('.form-error');
    var val = field.value.trim();
    if (!val) {
      field.classList.add('is-invalid');
      if (errEl) { errEl.innerHTML = '<i class="fas fa-exclamation-circle"></i> Kolom ini wajib diisi.'; errEl.style.display = 'flex'; }
      valid = false;
    } else {
      field.classList.remove('is-invalid');
      if (errEl) errEl.style.display = 'none';
    }
  });
  // Fokus ke field pertama yang salah
  if (!valid) {
    var pertama = formEl.querySelector('.is-invalid');
    if (pertama) pertama.focus();
  }
  return valid;
}

// Reset validasi saat mengetik
function pasangResetValidasi(formEl) {
  formEl.querySelectorAll('.form-control').forEach(function(field) {
    field.addEventListener('input', function() {
      field.classList.remove('is-invalid');
      var errEl = field.closest('.form-group') && field.closest('.form-group').querySelector('.form-error');
      if (errEl) errEl.style.display = 'none';
    });
  });
}

// ============================================================
// HELPER: Buat pilihan <option> pelanggan untuk <select>
// ============================================================
function opsiPelanggan(selectedId) {
  return STORE.pelanggan.map(function(p) {
    var sel = p.id === selectedId ? ' selected' : '';
    return '<option value="' + p.id + '"' + sel + '>' + p.nama + '</option>';
  }).join('');
}

// Helper: Buat pilihan kendaraan berdasarkan pelangganId
function opsiKendaraan(pelangganId, selectedPlat) {
  var list = STORE.kendaraan.filter(function(k) {
    return !pelangganId || k.pelangganId === pelangganId || k.pelanggan === pelangganId;
  });
  if (list.length === 0) {
    return '<option value="">-- Tidak ada kendaraan --</option>';
  }
  return '<option value="">-- Pilih Kendaraan --</option>' +
    list.map(function(k) {
      var label = k.merk + ' ' + k.model + ' (' + k.plat + ')';
      var sel   = k.plat === selectedPlat ? ' selected' : '';
      return '<option value="' + k.plat + '" data-model="' + k.merk + ' ' + k.model + '"' + sel + '>' + label + '</option>';
    }).join('');
}

// ============================================================
// Jalankan inisialisasi saat file dimuat
// ============================================================
inisialisasiStore();

// ============================================================
// STORE KELOMPOK A: Layanan, Teknisi, Cabang
// ============================================================
var CRUDLayanan = {
  _init: function() {
    if (!STORE.layanan) {
      STORE.layanan = JSON.parse(JSON.stringify(DEMO_DATA.layananServis));
      STORE._idCounter.layanan = Math.max.apply(null, STORE.layanan.map(function(l) { return l.id; })) + 1;
    }
  },
  getAll: function() { this._init(); return STORE.layanan.slice(); },
  getById: function(id) { this._init(); return STORE.layanan.find(function(l) { return l.id === id; }) || null; },
  tambah: function(data) {
    this._init();
    var item = { id: STORE._idCounter.layanan++, nama: data.nama.trim(), kategori: data.kategori, harga: parseInt(data.harga, 10) || 0, estimasi: (data.estimasi || '').trim(), deskripsi: (data.deskripsi || '').trim() };
    STORE.layanan.push(item);
    return item;
  },
  update: function(id, data) {
    this._init();
    var idx = STORE.layanan.findIndex(function(l) { return l.id === id; });
    if (idx === -1) return null;
    STORE.layanan[idx] = { id: id, nama: data.nama.trim(), kategori: data.kategori, harga: parseInt(data.harga, 10) || 0, estimasi: (data.estimasi || '').trim(), deskripsi: (data.deskripsi || '').trim() };
    return STORE.layanan[idx];
  },
  hapus: function(id) {
    this._init();
    var idx = STORE.layanan.findIndex(function(l) { return l.id === id; });
    if (idx === -1) return false;
    STORE.layanan.splice(idx, 1);
    return true;
  },
};

var CRUDTeknisi = {
  _init: function() {
    if (!STORE.teknisi) {
      STORE.teknisi = JSON.parse(JSON.stringify(DEMO_DATA.teknisi));
      STORE._idCounter.teknisi = Math.max.apply(null, STORE.teknisi.map(function(t) { return t.id; })) + 1;
    }
  },
  getAll: function() { this._init(); return STORE.teknisi.slice(); },
  getById: function(id) { this._init(); return STORE.teknisi.find(function(t) { return t.id === id; }) || null; },
  tambah: function(data) {
    this._init();
    var item = { id: STORE._idCounter.teknisi++, nama: data.nama.trim(), spesialisasi: data.spesialisasi.trim(), cabang: data.cabang, telepon: (data.telepon || '').trim(), status: data.status || 'tersedia', rating: 0 };
    STORE.teknisi.push(item);
    return item;
  },
  update: function(id, data) {
    this._init();
    var idx = STORE.teknisi.findIndex(function(t) { return t.id === id; });
    if (idx === -1) return null;
    STORE.teknisi[idx].nama         = data.nama.trim();
    STORE.teknisi[idx].spesialisasi = data.spesialisasi.trim();
    STORE.teknisi[idx].cabang       = data.cabang;
    STORE.teknisi[idx].telepon      = (data.telepon || '').trim();
    STORE.teknisi[idx].status       = data.status || 'tersedia';
    return STORE.teknisi[idx];
  },
  hapus: function(id) {
    this._init();
    var idx = STORE.teknisi.findIndex(function(t) { return t.id === id; });
    if (idx === -1) return false;
    STORE.teknisi.splice(idx, 1);
    return true;
  },
};

var CRUDCabang = {
  _init: function() {
    if (!STORE.cabang) {
      STORE.cabang = JSON.parse(JSON.stringify(DEMO_DATA.cabangList));
      STORE._idCounter.cabang = Math.max.apply(null, STORE.cabang.map(function(c) { return c.id; })) + 1;
    }
  },
  getAll: function() { this._init(); return STORE.cabang.slice(); },
  getById: function(id) { this._init(); return STORE.cabang.find(function(c) { return c.id === id; }) || null; },
  tambah: function(data) {
    this._init();
    var item = { id: STORE._idCounter.cabang++, nama: data.nama.trim(), alamat: (data.alamat || '').trim(), kontak: (data.kontak || '').trim(), jam: (data.jam || '').trim(), kepala: (data.kepala || '').trim(), status: data.status || 'aktif' };
    STORE.cabang.push(item);
    return item;
  },
  update: function(id, data) {
    this._init();
    var idx = STORE.cabang.findIndex(function(c) { return c.id === id; });
    if (idx === -1) return null;
    STORE.cabang[idx].nama   = data.nama.trim();
    STORE.cabang[idx].alamat = (data.alamat || '').trim();
    STORE.cabang[idx].kontak = (data.kontak || '').trim();
    STORE.cabang[idx].jam    = (data.jam || '').trim();
    STORE.cabang[idx].kepala = (data.kepala || '').trim();
    STORE.cabang[idx].status = data.status || 'aktif';
    return STORE.cabang[idx];
  },
  hapus: function(id) {
    this._init();
    var idx = STORE.cabang.findIndex(function(c) { return c.id === id; });
    if (idx === -1) return false;
    STORE.cabang.splice(idx, 1);
    return true;
  },
};

// ============================================================
// STORE KELOMPOK B: Kategori Spare Part, Spare Part, Pesanan
// ============================================================
var CRUDKategoriSP = {
  _init: function() {
    if (!STORE.kategoriSP) {
      STORE.kategoriSP = JSON.parse(JSON.stringify(DEMO_DATA.kategoriSparePart));
      STORE._idCounter.kategoriSP = Math.max.apply(null, STORE.kategoriSP.map(function(k) { return k.id; })) + 1;
    }
  },
  getAll: function() {
    this._init();
    // Hitung jumlah spare part per kategori dari STORE.sparePart
    var sp = STORE.sparePart || DEMO_DATA.sparePart;
    return this._addCount(STORE.kategoriSP.slice(), sp);
  },
  _addCount: function(list, sp) {
    return list.map(function(k) {
      var jumlah = sp.filter(function(s) { return s.kategoriId === k.id; }).length;
      return Object.assign({}, k, { jumlahItem: jumlah });
    });
  },
  getById: function(id) {
    this._init();
    return STORE.kategoriSP.find(function(k) { return k.id === id; }) || null;
  },
  tambah: function(data) {
    this._init();
    var item = {
      id: STORE._idCounter.kategoriSP++,
      nama: data.nama.trim(),
      deskripsi: (data.deskripsi || '').trim(),
    };
    STORE.kategoriSP.push(item);
    return item;
  },
  update: function(id, data) {
    this._init();
    var idx = STORE.kategoriSP.findIndex(function(k) { return k.id === id; });
    if (idx === -1) return null;
    STORE.kategoriSP[idx].nama      = data.nama.trim();
    STORE.kategoriSP[idx].deskripsi = (data.deskripsi || '').trim();
    return STORE.kategoriSP[idx];
  },
  hapus: function(id) {
    this._init();
    var idx = STORE.kategoriSP.findIndex(function(k) { return k.id === id; });
    if (idx === -1) return false;
    STORE.kategoriSP.splice(idx, 1);
    return true;
  },
};

var CRUDSparePart = {
  _init: function() {
    if (!STORE.sparePart) {
      STORE.sparePart = JSON.parse(JSON.stringify(DEMO_DATA.sparePart));
      STORE._idCounter.sparePart = Math.max.apply(null, STORE.sparePart.map(function(s) { return s.id; })) + 1;
    }
  },
  getAll: function() { this._init(); return STORE.sparePart.slice(); },
  getById: function(id) { this._init(); return STORE.sparePart.find(function(s) { return s.id === id; }) || null; },
  tambah: function(data) {
    this._init();
    // Ambil nama kategori dari store
    var kat = (STORE.kategoriSP || []).find(function(k) { return k.id === parseInt(data.kategoriId); });
    var item = {
      id:         STORE._idCounter.sparePart++,
      nama:       data.nama.trim(),
      kategoriId: parseInt(data.kategoriId) || 0,
      kategori:   kat ? kat.nama : (data.kategori || '').trim(),
      harga:      parseInt(data.harga, 10) || 0,
      stok:       parseInt(data.stok, 10)  || 0,
      satuan:     (data.satuan || 'pcs').trim(),
      deskripsi:  (data.deskripsi || '').trim(),
    };
    STORE.sparePart.push(item);
    return item;
  },
  update: function(id, data) {
    this._init();
    var idx = STORE.sparePart.findIndex(function(s) { return s.id === id; });
    if (idx === -1) return null;
    var kat = (STORE.kategoriSP || []).find(function(k) { return k.id === parseInt(data.kategoriId); });
    STORE.sparePart[idx].nama       = data.nama.trim();
    STORE.sparePart[idx].kategoriId = parseInt(data.kategoriId) || 0;
    STORE.sparePart[idx].kategori   = kat ? kat.nama : (data.kategori || '').trim();
    STORE.sparePart[idx].harga      = parseInt(data.harga, 10) || 0;
    STORE.sparePart[idx].stok       = parseInt(data.stok, 10)  || 0;
    STORE.sparePart[idx].satuan     = (data.satuan || 'pcs').trim();
    STORE.sparePart[idx].deskripsi  = (data.deskripsi || '').trim();
    return STORE.sparePart[idx];
  },
  hapus: function(id) {
    this._init();
    var idx = STORE.sparePart.findIndex(function(s) { return s.id === id; });
    if (idx === -1) return false;
    STORE.sparePart.splice(idx, 1);
    return true;
  },
};

var CRUDPesananSP = {
  _init: function() {
    if (!STORE.pesananSP) {
      STORE.pesananSP = JSON.parse(JSON.stringify(DEMO_DATA.pesananSparePart));
      STORE._idCounter.pesananSP = 5; // terakhir ORD-2026-005
    }
  },
  getAll: function() { this._init(); return STORE.pesananSP.slice(); },
  getById: function(id) { this._init(); return STORE.pesananSP.find(function(p) { return p.id === id; }) || null; },
  _buatId: function() {
    STORE._idCounter.pesananSP++;
    return 'ORD-2026-' + String(STORE._idCounter.pesananSP).padStart(3, '0');
  },
  tambah: function(data) {
    this._init();
    var total = (data.items || []).reduce(function(s, it) { return s + (it.qty * it.harga); }, 0);
    var item = {
      id:         this._buatId(),
      pelanggan:  data.pelanggan.trim(),
      telepon:    (data.telepon || '').trim(),
      tanggal:    data.tanggal,
      status:     'menunggu',
      items:      data.items || [],
      total:      total,
      catatan:    (data.catatan || '').trim(),
    };
    STORE.pesananSP.unshift(item);
    return item;
  },
  ubahStatus: function(id, statusBaru) {
    this._init();
    var idx = STORE.pesananSP.findIndex(function(p) { return p.id === id; });
    if (idx === -1) return false;
    if (STORE.pesananSP[idx].status === 'selesai') return false;
    STORE.pesananSP[idx].status = statusBaru;
    return true;
  },
  hapus: function(id) {
    this._init();
    var idx = STORE.pesananSP.findIndex(function(p) { return p.id === id; });
    if (idx === -1) return false;
    STORE.pesananSP.splice(idx, 1);
    return true;
  },
};

// ============================================================
// STORE KELOMPOK C & D
// ============================================================
var CRUDPembayaran = {
  _init: function() {
    if (!STORE.pembayaran) {
      STORE.pembayaran = JSON.parse(JSON.stringify(DEMO_DATA.pembayaran));
      STORE._idCounter.pembayaran = 5;
    }
  },
  getAll:   function() { this._init(); return STORE.pembayaran.slice(); },
  getById:  function(id) { this._init(); return STORE.pembayaran.find(function(p){return p.id===id;})||null; },
  tambah:   function(data) {
    this._init(); STORE._idCounter.pembayaran++;
    var item = { id:'PAY-'+String(STORE._idCounter.pembayaran).padStart(3,'0'), bookingId:(data.bookingId||'').trim(), pelanggan:data.pelanggan.trim(), metode:data.metode, jumlah:parseInt(data.jumlah)||0, tanggal:data.tanggal, status:'menunggu', catatan:(data.catatan||'').trim() };
    STORE.pembayaran.unshift(item); return item;
  },
  ubahStatus: function(id, st) { this._init(); var i=STORE.pembayaran.findIndex(function(p){return p.id===id;}); if(i===-1)return false; STORE.pembayaran[i].status=st; return true; },
  hapus:    function(id) { this._init(); var i=STORE.pembayaran.findIndex(function(p){return p.id===id;}); if(i===-1)return false; STORE.pembayaran.splice(i,1); return true; },
};

var CRUDPromo = {
  _init: function() {
    if (!STORE.promo) {
      STORE.promo = JSON.parse(JSON.stringify(DEMO_DATA.promo));
      STORE._idCounter.promo = Math.max.apply(null, STORE.promo.map(function(p){return p.id;})) + 1;
    }
  },
  getAll:  function() { this._init(); return STORE.promo.slice(); },
  getById: function(id) { this._init(); return STORE.promo.find(function(p){return p.id===id;})||null; },
  tambah:  function(data) {
    this._init();
    var item = { id:STORE._idCounter.promo++, kode:data.kode.trim().toUpperCase(), nama:data.nama.trim(), jenis:data.jenis, nilai:parseFloat(data.nilai)||0, minOrder:parseInt(data.minOrder)||0, aktif:(data.aktif===true||data.aktif==='true'), berlakuHingga:data.berlakuHingga, deskripsi:(data.deskripsi||'').trim() };
    STORE.promo.push(item); return item;
  },
  update:  function(id,data) {
    this._init(); var i=STORE.promo.findIndex(function(p){return p.id===id;}); if(i===-1)return null;
    var p=STORE.promo[i]; p.kode=data.kode.trim().toUpperCase(); p.nama=data.nama.trim(); p.jenis=data.jenis; p.nilai=parseFloat(data.nilai)||0; p.minOrder=parseInt(data.minOrder)||0; p.aktif=(data.aktif===true||data.aktif==='true'); p.berlakuHingga=data.berlakuHingga; p.deskripsi=(data.deskripsi||'').trim(); return p;
  },
  hapus:   function(id) { this._init(); var i=STORE.promo.findIndex(function(p){return p.id===id;}); if(i===-1)return false; STORE.promo.splice(i,1); return true; },
};

var CRUDRating = {
  _init: function() {
    if (!STORE.rating) {
      STORE.rating = JSON.parse(JSON.stringify(DEMO_DATA.rating));
      STORE._idCounter.rating = Math.max.apply(null, STORE.rating.map(function(r){return r.id;})) + 1;
    }
  },
  getAll:  function() { this._init(); return STORE.rating.slice(); },
  getById: function(id) { this._init(); return STORE.rating.find(function(r){return r.id===id;})||null; },
  hapus:   function(id) { this._init(); var i=STORE.rating.findIndex(function(r){return r.id===id;}); if(i===-1)return false; STORE.rating.splice(i,1); return true; },
};

var CRUDRole = {
  _init: function() {
    if (!STORE.role) {
      STORE.role = JSON.parse(JSON.stringify(DEMO_DATA.roleList));
      STORE._idCounter.role = Math.max.apply(null, STORE.role.map(function(r){return r.id;})) + 1;
    }
  },
  getAll:  function() { this._init(); return STORE.role.slice(); },
  getById: function(id) { this._init(); return STORE.role.find(function(r){return r.id===id;})||null; },
  tambah:  function(data) { this._init(); var item={id:STORE._idCounter.role++,nama:data.nama.trim(),deskripsi:(data.deskripsi||'').trim(),jumlahUser:0}; STORE.role.push(item); return item; },
  update:  function(id,data) { this._init(); var i=STORE.role.findIndex(function(r){return r.id===id;}); if(i===-1)return null; STORE.role[i].nama=data.nama.trim(); STORE.role[i].deskripsi=(data.deskripsi||'').trim(); return STORE.role[i]; },
  hapus:   function(id) { this._init(); var i=STORE.role.findIndex(function(r){return r.id===id;}); if(i===-1)return false; STORE.role.splice(i,1); return true; },
};

var CRUDPengguna = {
  _init: function() {
    if (!STORE.pengguna) {
      STORE.pengguna = JSON.parse(JSON.stringify(DEMO_DATA.pengguna));
      STORE._idCounter.pengguna = Math.max.apply(null, STORE.pengguna.map(function(u){return u.id;})) + 1;
    }
  },
  getAll:  function() { this._init(); return STORE.pengguna.slice(); },
  getById: function(id) { this._init(); return STORE.pengguna.find(function(u){return u.id===id;})||null; },
  tambah:  function(data) {
    this._init();
    var item={id:STORE._idCounter.pengguna++,nama:data.nama.trim(),email:data.email.trim(),roleId:parseInt(data.roleId),role:data.role,cabang:data.cabang,status:data.status||'aktif',telepon:(data.telepon||'').trim()};
    STORE.pengguna.push(item); return item;
  },
  update:  function(id,data) {
    this._init(); var i=STORE.pengguna.findIndex(function(u){return u.id===id;}); if(i===-1)return null;
    var u=STORE.pengguna[i]; u.nama=data.nama.trim(); u.email=data.email.trim(); u.roleId=parseInt(data.roleId); u.role=data.role; u.cabang=data.cabang; u.status=data.status||'aktif'; u.telepon=(data.telepon||'').trim(); return u;
  },
  hapus:   function(id) { this._init(); var i=STORE.pengguna.findIndex(function(u){return u.id===id;}); if(i===-1)return false; STORE.pengguna.splice(i,1); return true; },
};

// ============================================================
// STORE MODUL TAMBAHAN
// ============================================================
var CRUDHomeServis = {
  _init: function() { if(!STORE.homeServis){STORE.homeServis=JSON.parse(JSON.stringify(DEMO_DATA.homeServis));STORE._idCounter.homeServis=3;} },
  getAll: function(){this._init();return STORE.homeServis.slice();},
  getById: function(id){this._init();return STORE.homeServis.find(function(h){return h.id===id;})||null;},
  tambah: function(data){this._init();STORE._idCounter.homeServis++;var item={id:'HS-'+String(STORE._idCounter.homeServis).padStart(3,'0'),pelanggan:data.pelanggan.trim(),telepon:(data.telepon||'').trim(),kendaraan:(data.kendaraan||'').trim(),alamat:(data.alamat||'').trim(),teknisi:(data.teknisi||'-').trim(),jadwal:data.jadwal,layanan:(data.layanan||'').trim(),status:'dijadwalkan',catatan:(data.catatan||'').trim()};STORE.homeServis.unshift(item);return item;},
  ubahStatus: function(id,st){this._init();var i=STORE.homeServis.findIndex(function(h){return h.id===id;});if(i===-1)return false;STORE.homeServis[i].status=st;return true;},
  hapus: function(id){this._init();var i=STORE.homeServis.findIndex(function(h){return h.id===id;});if(i===-1)return false;STORE.homeServis.splice(i,1);return true;},
};

var CRUDMetodePembayaran = {
  _init: function(){if(!STORE.metodePembayaran){STORE.metodePembayaran=JSON.parse(JSON.stringify(DEMO_DATA.metodePembayaranList));STORE._idCounter.metodePembayaran=Math.max.apply(null,STORE.metodePembayaran.map(function(m){return m.id;}))+1;}},
  getAll: function(){this._init();return STORE.metodePembayaran.slice();},
  tambah: function(data){this._init();var item={id:STORE._idCounter.metodePembayaran++,nama:data.nama.trim(),deskripsi:(data.deskripsi||'').trim(),aktif:(data.aktif===true||data.aktif==='true')};STORE.metodePembayaran.push(item);return item;},
  update: function(id,data){this._init();var i=STORE.metodePembayaran.findIndex(function(m){return m.id===id;});if(i===-1)return null;STORE.metodePembayaran[i].nama=data.nama.trim();STORE.metodePembayaran[i].deskripsi=(data.deskripsi||'').trim();STORE.metodePembayaran[i].aktif=(data.aktif===true||data.aktif==='true');return STORE.metodePembayaran[i];},
  hapus: function(id){this._init();var i=STORE.metodePembayaran.findIndex(function(m){return m.id===id;});if(i===-1)return false;STORE.metodePembayaran.splice(i,1);return true;},
};

var CRUDPengiriman = {
  _init: function(){if(!STORE.pengiriman){STORE.pengiriman=JSON.parse(JSON.stringify(DEMO_DATA.pengiriman));STORE._idCounter.pengiriman=3;}},
  getAll: function(){this._init();return STORE.pengiriman.slice();},
  getById: function(id){this._init();return STORE.pengiriman.find(function(p){return p.id===id;})||null;},
  ubahStatus: function(id,st,resi){this._init();var i=STORE.pengiriman.findIndex(function(p){return p.id===id;});if(i===-1)return false;STORE.pengiriman[i].status=st;if(resi)STORE.pengiriman[i].nomorResi=resi;if(st==='dikirim'&&!STORE.pengiriman[i].tanggalKirim)STORE.pengiriman[i].tanggalKirim=new Date().toISOString().split('T')[0];return true;},
};
