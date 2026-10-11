/**
 * data.js
 * ============================================================
 * PERHATIAN: Semua data dalam file ini adalah DATA DEMONSTRASI.
 * Data ini TIDAK berasal dari database asli.
 * File ini hanya digunakan untuk keperluan tampilan prototipe.
 * Setelah integrasi dengan Laravel, data ini digantikan dengan
 * data asli dari API/controller Laravel.
 * ============================================================
 */

const DEMO_DATA = {

  // --- Informasi Pengguna Login (Demo) ---
  currentUser: {
    name: 'Administrator',
    role: 'Super Admin',
    avatar: 'AD',
    cabang: 'Semua Cabang',
  },

  // --- Statistik Dashboard (Demo) ---
  stats: {
    totalPelanggan:  248,
    totalKendaraan:  312,
    bookingHariIni:  18,
    pendapatanBulan: 54750000,
    bookingMenunggu: 7,
    teknisiAktif:    14,
    sparepartStok:   156,
    ratingRataRata:  4.8,
  },

  // --- Data Pelanggan (Demo) ---
  pelanggan: [
    { id: 1, nama: 'Budi Santoso',    telepon: '08123456789', email: 'budi@email.com',   alamat: 'Jl. Sudirman No.12, Jakarta',     kendaraan: 2, terdaftar: '2024-01-15' },
    { id: 2, nama: 'Siti Rahayu',     telepon: '08234567890', email: 'siti@email.com',   alamat: 'Jl. Gatot Subroto No.5, Bandung', kendaraan: 1, terdaftar: '2024-02-20' },
    { id: 3, nama: 'Ahmad Fauzi',     telepon: '08345678901', email: 'ahmad@email.com',  alamat: 'Jl. Diponegoro No.3, Surabaya',   kendaraan: 3, terdaftar: '2024-03-08' },
    { id: 4, nama: 'Dewi Lestari',    telepon: '08456789012', email: 'dewi@email.com',   alamat: 'Jl. Veteran No.7, Yogyakarta',    kendaraan: 1, terdaftar: '2024-03-22' },
    { id: 5, nama: 'Eko Prasetyo',    telepon: '08567890123', email: 'eko@email.com',    alamat: 'Jl. Pemuda No.18, Semarang',      kendaraan: 2, terdaftar: '2024-04-05' },
  ],

  // --- Data Kendaraan (Demo) ---
  // pelangganId merujuk ke field id pada data pelanggan di atas.
  // Budi Santoso=1, Siti Rahayu=2, Ahmad Fauzi=3, Dewi Lestari=4, Eko Prasetyo=5
  kendaraan: [
    { id: 1, pelangganId: 1, pelanggan: 'Budi Santoso', merk: 'Toyota',   model: 'Avanza', tahun: 2020, plat: 'B 1234 ABC',  jenis: 'Mobil', warna: 'Putih'  },
    { id: 2, pelangganId: 2, pelanggan: 'Siti Rahayu',  merk: 'Honda',    model: 'Beat',   tahun: 2021, plat: 'D 5678 DEF',  jenis: 'Motor', warna: 'Merah'  },
    { id: 3, pelangganId: 3, pelanggan: 'Ahmad Fauzi',  merk: 'Suzuki',   model: 'Ertiga', tahun: 2019, plat: 'L 9012 GHI',  jenis: 'Mobil', warna: 'Silver' },
    { id: 4, pelangganId: 3, pelanggan: 'Ahmad Fauzi',  merk: 'Yamaha',   model: 'NMAX',   tahun: 2022, plat: 'L 3456 JKL',  jenis: 'Motor', warna: 'Hitam'  },
    { id: 5, pelangganId: 4, pelanggan: 'Dewi Lestari', merk: 'Daihatsu', model: 'Xenia',  tahun: 2021, plat: 'AB 7890 MNO', jenis: 'Mobil', warna: 'Biru'   },
    { id: 6, pelangganId: 1, pelanggan: 'Budi Santoso', merk: 'Honda',    model: 'Vario',  tahun: 2022, plat: 'B 9999 XYZ',  jenis: 'Motor', warna: 'Hitam'  },
    { id: 7, pelangganId: 5, pelanggan: 'Eko Prasetyo', merk: 'Honda',    model: 'Civic',  tahun: 2019, plat: 'F 2468 PQR',  jenis: 'Mobil', warna: 'Putih'  },
    { id: 8, pelangganId: 5, pelanggan: 'Eko Prasetyo', merk: 'Kawasaki', model: 'Ninja',  tahun: 2021, plat: 'F 1357 ABC',  jenis: 'Motor', warna: 'Hijau'  },
  ],

  // --- Data Booking (Demo) ---
  booking: [
    { id: 'BK-001', pelanggan: 'Budi Santoso', kendaraan: 'Toyota Avanza (B 1234 ABC)', layanan: 'Ganti Oli + Tune Up', tanggal: '2026-10-10', status: 'menunggu',   total: 350000 },
    { id: 'BK-002', pelanggan: 'Siti Rahayu',  kendaraan: 'Honda Beat (D 5678 DEF)',    layanan: 'Servis Rutin',        tanggal: '2026-10-10', status: 'proses',     total: 175000 },
    { id: 'BK-003', pelanggan: 'Ahmad Fauzi',  kendaraan: 'Suzuki Ertiga (L 9012 GHI)', layanan: 'Ganti Ban + Balancing', tanggal: '2026-10-09', status: 'selesai', total: 850000 },
    { id: 'BK-004', pelanggan: 'Dewi Lestari', kendaraan: 'Daihatsu Xenia (AB 7890 MNO)', layanan: 'Pemeriksaan AC',  tanggal: '2026-10-09', status: 'selesai',    total: 225000 },
    { id: 'BK-005', pelanggan: 'Eko Prasetyo', kendaraan: 'Honda Civic (F 2468 PQR)',   layanan: 'Tune Up Mesin',       tanggal: '2026-10-08', status: 'dibatalkan', total: 0      },
  ],

  // --- Data Teknisi (Demo) ---
  teknisi: [
    { id: 1, nama: 'Rudi Hermawan',  spesialisasi: 'Mesin & Transmisi', cabang: 'Cabang Utama', status: 'tersedia',  rating: 4.9 },
    { id: 2, nama: 'Teguh Widodo',   spesialisasi: 'Kelistrikan',       cabang: 'Cabang Utama', status: 'sibuk',     rating: 4.7 },
    { id: 3, nama: 'Hendra Kusuma',  spesialisasi: 'AC & Pendingin',    cabang: 'Cabang Barat', status: 'tersedia',  rating: 4.8 },
    { id: 4, nama: 'Bambang Supri',  spesialisasi: 'Kaki-kaki & Rem',   cabang: 'Cabang Timur', status: 'libur',     rating: 4.6 },
  ],

  // --- Data Spare Part (Demo) ---
  sparepart: [
    { id: 1, nama: 'Filter Oli Toyota',  kategori: 'Filter',  harga: 45000,  stok: 24, satuan: 'pcs' },
    { id: 2, nama: 'Kampas Rem Depan Honda', kategori: 'Rem', harga: 125000, stok: 12, satuan: 'set' },
    { id: 3, nama: 'Busi NGK Iridium',   kategori: 'Mesin',   harga: 85000,  stok: 36, satuan: 'pcs' },
    { id: 4, nama: 'Oli Mesin Shell 10W-40', kategori: 'Oli', harga: 120000, stok: 48, satuan: 'liter' },
    { id: 5, nama: 'Air Aki Aquabatt',   kategori: 'Baterai',  harga: 25000,  stok: 8,  satuan: 'botol' },
  ],

  // --- Status Booking (untuk badge warna) ---
  statusBooking: {
    'menunggu':    { label: 'Menunggu',    class: 'badge-warning' },
    'proses':      { label: 'Dalam Proses', class: 'badge-info'   },
    'selesai':     { label: 'Selesai',     class: 'badge-success' },
    'dibatalkan':  { label: 'Dibatalkan',  class: 'badge-danger'  },
    'konfirmasi':  { label: 'Konfirmasi',  class: 'badge-primary' },
  },

  // --- Cabang (Demo) ---
  cabang: [
    { id: 1, nama: 'Cabang Utama',  alamat: 'Jl. Merdeka No.1, Jakarta',   telp: '021-1234567', kepala: 'Ir. Suharto' },
    { id: 2, nama: 'Cabang Barat',  alamat: 'Jl. Barat Raya No.5, Bandung', telp: '022-7654321', kepala: 'Drs. Wijaya'  },
    { id: 3, nama: 'Cabang Timur',  alamat: 'Jl. Timur Indah No.3, Surabaya', telp: '031-8765432', kepala: 'Hj. Fatimah' },
  ],

};

// Fungsi pembantu untuk format angka ke format Rupiah
function formatRupiah(angka) {
  return 'Rp ' + angka.toLocaleString('id-ID');
}

// Fungsi pembantu untuk format tanggal ke bahasa Indonesia
function formatTanggal(tanggalStr) {
  const bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'];
  const d = new Date(tanggalStr);
  return d.getDate() + ' ' + bulan[d.getMonth()] + ' ' + d.getFullYear();
}

// ============================================================
// DATA TAMBAHAN UNTUK DASHBOARD (DEMONSTRASI)
// ============================================================

DEMO_DATA.bookingLengkap = [
  {
    id: 'BK-2026-001', pelanggan: 'Budi Santoso',   telepon: '08123456789',
    kendaraan: 'Toyota Avanza',  plat: 'B 1234 ABC',
    servis: 'Ganti Oli + Filter',  cabang: 'Cabang Utama',
    jadwal: '2026-10-10 08:00',   teknisi: 'Rudi Hermawan',
    status: 'menunggu',   total: 350000,
    catatan: 'Pelanggan minta ganti filter udara sekalian.'
  },
  {
    id: 'BK-2026-002', pelanggan: 'Siti Rahayu',    telepon: '08234567890',
    kendaraan: 'Honda Beat',     plat: 'D 5678 DEF',
    servis: 'Servis Rutin 3000km', cabang: 'Cabang Utama',
    jadwal: '2026-10-10 09:30',   teknisi: 'Teguh Widodo',
    status: 'dikonfirmasi', total: 175000,
    catatan: '-'
  },
  {
    id: 'BK-2026-003', pelanggan: 'Ahmad Fauzi',    telepon: '08345678901',
    kendaraan: 'Suzuki Ertiga',  plat: 'L 9012 GHI',
    servis: 'Ganti Ban + Balancing', cabang: 'Cabang Barat',
    jadwal: '2026-10-10 10:00',   teknisi: 'Hendra Kusuma',
    status: 'dikerjakan', total: 850000,
    catatan: 'Ban depan kiri dan kanan aus.'
  },
  {
    id: 'BK-2026-004', pelanggan: 'Dewi Lestari',   telepon: '08456789012',
    kendaraan: 'Daihatsu Xenia', plat: 'AB 7890 MNO',
    servis: 'Pemeriksaan AC',   cabang: 'Cabang Utama',
    jadwal: '2026-10-09 13:00',   teknisi: 'Hendra Kusuma',
    status: 'selesai',    total: 225000,
    catatan: 'AC kurang dingin, freon ditambah.'
  },
  {
    id: 'BK-2026-005', pelanggan: 'Eko Prasetyo',   telepon: '08567890123',
    kendaraan: 'Honda Civic',    plat: 'F 2468 PQR',
    servis: 'Tune Up Mesin',    cabang: 'Cabang Timur',
    jadwal: '2026-10-08 11:00',   teknisi: '-',
    status: 'dibatalkan', total: 0,
    catatan: 'Pelanggan membatalkan janji temu.'
  },
  {
    id: 'BK-2026-006', pelanggan: 'Fajar Nugroho',  telepon: '08678901234',
    kendaraan: 'Mitsubishi Xpander', plat: 'B 5555 STU',
    servis: 'Ganti Kampas Rem',  cabang: 'Cabang Utama',
    jadwal: '2026-10-11 08:30',   teknisi: 'Bambang Supri',
    status: 'menunggu',   total: 480000,
    catatan: '-'
  },
  {
    id: 'BK-2026-007', pelanggan: 'Rina Puspita',   telepon: '08789012345',
    kendaraan: 'Yamaha NMAX',    plat: 'B 9876 VWX',
    servis: 'Servis Rutin 5000km', cabang: 'Cabang Barat',
    jadwal: '2026-10-11 10:00',   teknisi: 'Teguh Widodo',
    status: 'dikonfirmasi', total: 135000,
    catatan: '-'
  },
  {
    id: 'BK-2026-008', pelanggan: 'Hadi Kurniawan', telepon: '08890123456',
    kendaraan: 'Kia Sportage',   plat: 'D 1122 YZA',
    servis: 'Tune Up + Ganti Oli', cabang: 'Cabang Timur',
    jadwal: '2026-10-09 14:00',   teknisi: 'Rudi Hermawan',
    status: 'selesai',    total: 520000,
    catatan: 'Busi diganti semua.'
  },
];

DEMO_DATA.aktivitasTerbaru = [
  { tipe: 'booking',  judul: 'Booking baru masuk',       deskripsi: 'BK-2026-006 — Fajar Nugroho (Ganti Kampas Rem)', waktu: '5 menit lalu'   },
  { tipe: 'selesai',  judul: 'Servis selesai',            deskripsi: 'BK-2026-004 — Dewi Lestari (Pemeriksaan AC)',    waktu: '1 jam lalu'     },
  { tipe: 'bayar',    judul: 'Pembayaran diterima',       deskripsi: 'BK-2026-004 — Rp 225.000 via Transfer Bank',     waktu: '1 jam lalu'     },
  { tipe: 'booking',  judul: 'Booking dikonfirmasi',      deskripsi: 'BK-2026-002 — Siti Rahayu (Servis Rutin)',       waktu: '2 jam lalu'     },
  { tipe: 'teknisi',  judul: 'Teknisi ditugaskan',        deskripsi: 'BK-2026-003 — Hendra Kusuma ditugaskan',         waktu: '3 jam lalu'     },
  { tipe: 'batal',    judul: 'Booking dibatalkan',        deskripsi: 'BK-2026-005 — Eko Prasetyo (Tune Up Mesin)',     waktu: '5 jam lalu'     },
  { tipe: 'selesai',  judul: 'Servis selesai',            deskripsi: 'BK-2026-008 — Hadi Kurniawan (Tune Up)',         waktu: 'Kemarin, 14:30' },
];

DEMO_DATA.statusServis = {
  menunggu:     { label: 'Menunggu',          jumlah: 12, warna: '#f59e0b' },
  dikonfirmasi: { label: 'Dikonfirmasi',      jumlah: 8,  warna: '#3b82f6' },
  dikerjakan:   { label: 'Sedang Dikerjakan', jumlah: 5,  warna: '#8b5cf6' },
  selesai:      { label: 'Selesai',           jumlah: 47, warna: '#22c55e' },
  dibatalkan:   { label: 'Dibatalkan',        jumlah: 3,  warna: '#ef4444' },
};

// ============================================================
// DATA KELOMPOK A: Layanan Servis, Teknisi, Cabang (DEMONSTRASI)
// ============================================================

DEMO_DATA.layananServis = [
  { id: 1, nama: 'Servis Rutin',            kategori: 'Perawatan',    harga: 150000,  estimasi: '1 jam',    deskripsi: 'Pemeriksaan dan perawatan berkala kendaraan.' },
  { id: 2, nama: 'Ganti Oli + Filter',      kategori: 'Perawatan',    harga: 120000,  estimasi: '30 menit', deskripsi: 'Penggantian oli mesin dan filter oli.' },
  { id: 3, nama: 'Tune Up Mesin',           kategori: 'Perawatan',    harga: 250000,  estimasi: '2 jam',    deskripsi: 'Penyetelan ulang mesin agar performa optimal.' },
  { id: 4, nama: 'Ganti Ban + Balancing',   kategori: 'Ban & Roda',   harga: 350000,  estimasi: '1.5 jam',  deskripsi: 'Penggantian ban dan penyeimbangan roda.' },
  { id: 5, nama: 'Pemeriksaan AC',          kategori: 'AC & Pendingin', harga: 200000, estimasi: '1 jam',   deskripsi: 'Pemeriksaan dan servis sistem pendingin udara.' },
  { id: 6, nama: 'Ganti Kampas Rem',        kategori: 'Rem & Kaki',   harga: 300000,  estimasi: '1.5 jam',  deskripsi: 'Penggantian kampas rem depan dan belakang.' },
  { id: 7, nama: 'Pemeriksaan Kelistrikan', kategori: 'Kelistrikan',  harga: 175000,  estimasi: '1 jam',    deskripsi: 'Diagnosa dan perbaikan sistem kelistrikan.' },
  { id: 8, nama: 'Servis Lengkap',          kategori: 'Perawatan',    harga: 500000,  estimasi: '3 jam',    deskripsi: 'Paket servis menyeluruh untuk kendaraan.' },
];

DEMO_DATA.teknisi = [
  { id: 1, nama: 'Rudi Hermawan',   spesialisasi: 'Mesin & Transmisi', cabang: 'Cabang Utama', telepon: '08111111111', status: 'tersedia', rating: 4.9 },
  { id: 2, nama: 'Teguh Widodo',    spesialisasi: 'Kelistrikan',       cabang: 'Cabang Utama', telepon: '08122222222', status: 'sibuk',    rating: 4.7 },
  { id: 3, nama: 'Hendra Kusuma',   spesialisasi: 'AC & Pendingin',    cabang: 'Cabang Barat', telepon: '08133333333', status: 'tersedia', rating: 4.8 },
  { id: 4, nama: 'Bambang Supri',   spesialisasi: 'Ban & Kaki-kaki',   cabang: 'Cabang Timur', telepon: '08144444444', status: 'libur',    rating: 4.6 },
  { id: 5, nama: 'Doni Prasetya',   spesialisasi: 'Mesin & Transmisi', cabang: 'Cabang Barat', telepon: '08155555555', status: 'tersedia', rating: 4.5 },
  { id: 6, nama: 'Wahyu Santoso',   spesialisasi: 'Rem & Kaki-kaki',   cabang: 'Cabang Utama', telepon: '08166666666', status: 'tersedia', rating: 4.8 },
];

DEMO_DATA.cabangList = [
  { id: 1, nama: 'Cabang Utama',  alamat: 'Jl. Merdeka No.1, Jakarta Pusat',   kontak: '021-1234567', jam: 'Sen–Sab 08.00–17.00', kepala: 'Ir. Suharto',   status: 'aktif' },
  { id: 2, nama: 'Cabang Barat',  alamat: 'Jl. Barat Raya No.5, Bandung',       kontak: '022-7654321', jam: 'Sen–Sab 08.00–17.00', kepala: 'Drs. Wijaya',   status: 'aktif' },
  { id: 3, nama: 'Cabang Timur',  alamat: 'Jl. Timur Indah No.3, Surabaya',     kontak: '031-8765432', jam: 'Sen–Sab 08.00–17.00', kepala: 'Hj. Fatimah',   status: 'aktif' },
  { id: 4, nama: 'Cabang Selatan',alamat: 'Jl. Ahmad Yani No.12, Yogyakarta',   kontak: '0274-111222', jam: 'Sen–Sab 08.00–16.00', kepala: 'Bpk. Hartono',  status: 'aktif' },
];

DEMO_DATA.statusTeknisi = {
  tersedia: { label: 'Tersedia',  kelas: 'badge-success' },
  sibuk:    { label: 'Sedang Bertugas', kelas: 'badge-warning' },
  libur:    { label: 'Libur',     kelas: 'badge-neutral'  },
};

DEMO_DATA.kategoriLayanan = [
  'Perawatan', 'Ban & Roda', 'AC & Pendingin', 'Rem & Kaki', 'Kelistrikan',
];

// ============================================================
// DATA KELOMPOK B: Kategori Spare Part, Spare Part, Pesanan (DEMONSTRASI)
// ============================================================

DEMO_DATA.kategoriSparePart = [
  { id: 1, nama: 'Filter',    deskripsi: 'Filter oli, udara, dan bahan bakar.' },
  { id: 2, nama: 'Rem',       deskripsi: 'Kampas rem, cakram, dan komponen sistem pengereman.' },
  { id: 3, nama: 'Mesin',     deskripsi: 'Busi, timing belt, dan komponen mesin.' },
  { id: 4, nama: 'Oli',       deskripsi: 'Oli mesin, transmisi, dan cairan kendaraan.' },
  { id: 5, nama: 'Baterai',   deskripsi: 'Aki dan cairan aki kendaraan.' },
  { id: 6, nama: 'Kelistrikan', deskripsi: 'Bohlam, sekring, kabel, dan aksesoris kelistrikan.' },
  { id: 7, nama: 'Suspensi',  deskripsi: 'Shockbreaker, per, dan komponen suspensi.' },
  { id: 8, nama: 'Pendingin', deskripsi: 'Freon, coolant, dan komponen sistem pendingin.' },
];

DEMO_DATA.sparePart = [
  { id: 1,  nama: 'Filter Oli Toyota',        kategoriId: 1, kategori: 'Filter',     harga: 45000,  stok: 24, satuan: 'pcs',   deskripsi: 'Filter oli mesin untuk kendaraan Toyota.'   },
  { id: 2,  nama: 'Kampas Rem Depan Honda',   kategoriId: 2, kategori: 'Rem',        harga: 125000, stok: 12, satuan: 'set',   deskripsi: 'Kampas rem depan untuk Honda Civic/Jazz.'   },
  { id: 3,  nama: 'Busi NGK Iridium',         kategoriId: 3, kategori: 'Mesin',      harga: 85000,  stok: 36, satuan: 'pcs',   deskripsi: 'Busi iridium performa tinggi.'              },
  { id: 4,  nama: 'Oli Shell Helix 10W-40',   kategoriId: 4, kategori: 'Oli',        harga: 120000, stok: 48, satuan: 'liter', deskripsi: 'Oli mesin sintetik untuk kendaraan modern.' },
  { id: 5,  nama: 'Air Aki Aquabatt',         kategoriId: 5, kategori: 'Baterai',    harga: 25000,  stok: 5,  satuan: 'botol', deskripsi: 'Air aki untuk pengisian ulang.'             },
  { id: 6,  nama: 'Bohlam LED H4',            kategoriId: 6, kategori: 'Kelistrikan',harga: 75000,  stok: 20, satuan: 'pcs',   deskripsi: 'Bohlam LED terang untuk lampu depan.'       },
  { id: 7,  nama: 'Shockbreaker Depan Xenia', kategoriId: 7, kategori: 'Suspensi',   harga: 350000, stok: 4,  satuan: 'pcs',   deskripsi: 'Shockbreaker depan untuk Daihatsu Xenia.'   },
  { id: 8,  nama: 'Freon AC R134a',           kategoriId: 8, kategori: 'Pendingin',  harga: 180000, stok: 8,  satuan: 'kaleng',deskripsi: 'Freon untuk sistem AC kendaraan.'           },
  { id: 9,  nama: 'Filter Udara Honda Beat',  kategoriId: 1, kategori: 'Filter',     harga: 35000,  stok: 3,  satuan: 'pcs',   deskripsi: 'Filter udara untuk Honda Beat.'             },
  { id: 10, nama: 'Kampas Rem Belakang Avanza',kategoriId: 2, kategori: 'Rem',       harga: 95000,  stok: 15, satuan: 'set',   deskripsi: 'Kampas rem belakang untuk Toyota Avanza.'   },
];

// Batas stok rendah — stok di bawah angka ini ditandai peringatan
DEMO_DATA.batasStokRendah = 6;

DEMO_DATA.statusPesanan = {
  menunggu:  { label: 'Menunggu',     kelas: 'badge-warning' },
  diproses:  { label: 'Diproses',     kelas: 'badge-info'    },
  dikirim:   { label: 'Dikirim',      kelas: 'badge-primary' },
  selesai:   { label: 'Selesai',      kelas: 'badge-success' },
  dibatalkan:{ label: 'Dibatalkan',   kelas: 'badge-danger'  },
};

DEMO_DATA.pesananSparePart = [
  {
    id: 'ORD-2026-001', pelanggan: 'Budi Santoso', telepon: '08123456789',
    tanggal: '2026-10-08', status: 'selesai',
    items: [
      { sparepartId: 1, nama: 'Filter Oli Toyota',       qty: 2, harga: 45000  },
      { sparepartId: 3, nama: 'Busi NGK Iridium',        qty: 4, harga: 85000  },
    ],
    total: 430000, catatan: '-',
  },
  {
    id: 'ORD-2026-002', pelanggan: 'Siti Rahayu',  telepon: '08234567890',
    tanggal: '2026-10-09', status: 'dikirim',
    items: [
      { sparepartId: 4, nama: 'Oli Shell Helix 10W-40',  qty: 3, harga: 120000 },
    ],
    total: 360000, catatan: 'Mohon dikirim pagi hari.',
  },
  {
    id: 'ORD-2026-003', pelanggan: 'Ahmad Fauzi',  telepon: '08345678901',
    tanggal: '2026-10-09', status: 'diproses',
    items: [
      { sparepartId: 2, nama: 'Kampas Rem Depan Honda',  qty: 1, harga: 125000 },
      { sparepartId: 6, nama: 'Bohlam LED H4',           qty: 2, harga: 75000  },
    ],
    total: 275000, catatan: '-',
  },
  {
    id: 'ORD-2026-004', pelanggan: 'Dewi Lestari', telepon: '08456789012',
    tanggal: '2026-10-10', status: 'menunggu',
    items: [
      { sparepartId: 8, nama: 'Freon AC R134a',          qty: 2, harga: 180000 },
    ],
    total: 360000, catatan: 'Tolong dicek dulu stoknya.',
  },
  {
    id: 'ORD-2026-005', pelanggan: 'Eko Prasetyo', telepon: '08567890123',
    tanggal: '2026-10-07', status: 'dibatalkan',
    items: [
      { sparepartId: 7, nama: 'Shockbreaker Depan Xenia',qty: 1, harga: 350000 },
    ],
    total: 350000, catatan: 'Pelanggan membatalkan pesanan.',
  },
];

// ============================================================
// DATA KELOMPOK C & D: Pembayaran, Promo, Rating, Pengguna, Role
// ============================================================

DEMO_DATA.metodePembayaran = ['Transfer Bank', 'Tunai', 'QRIS', 'Kartu Kredit', 'OVO', 'GoPay', 'Dana'];

DEMO_DATA.pembayaran = [
  { id:'PAY-001', bookingId:'BK-2026-004', pelanggan:'Dewi Lestari',  metode:'Transfer Bank', jumlah:225000, tanggal:'2026-10-09', status:'lunas',   catatan:'-' },
  { id:'PAY-002', bookingId:'BK-2026-008', pelanggan:'Hadi Kurniawan',metode:'Tunai',          jumlah:520000, tanggal:'2026-10-09', status:'lunas',   catatan:'-' },
  { id:'PAY-003', bookingId:'BK-2026-003', pelanggan:'Ahmad Fauzi',   metode:'QRIS',           jumlah:850000, tanggal:'2026-10-10', status:'lunas',   catatan:'-' },
  { id:'PAY-004', bookingId:'BK-2026-002', pelanggan:'Siti Rahayu',   metode:'Transfer Bank',  jumlah:175000, tanggal:'2026-10-10', status:'menunggu',catatan:'Menunggu konfirmasi transfer.' },
  { id:'PAY-005', bookingId:'BK-2026-001', pelanggan:'Budi Santoso',  metode:'Tunai',          jumlah:350000, tanggal:'2026-10-10', status:'menunggu',catatan:'-' },
];

DEMO_DATA.statusPembayaran = {
  lunas:    { label:'Lunas',    kelas:'badge-success' },
  menunggu: { label:'Menunggu', kelas:'badge-warning' },
  gagal:    { label:'Gagal',    kelas:'badge-danger'  },
};

DEMO_DATA.promo = [
  { id:1, kode:'SERVIS10',  nama:'Diskon Servis 10%',      jenis:'persen',  nilai:10,    minOrder:100000, aktif:true,  berlakuHingga:'2026-12-31', deskripsi:'Diskon 10% untuk semua jenis servis.' },
  { id:2, kode:'OLIFREE',   nama:'Gratis Oli Mesin',        jenis:'nominal', nilai:50000, minOrder:200000, aktif:true,  berlakuHingga:'2026-11-30', deskripsi:'Potongan harga oli mesin Rp 50.000.' },
  { id:3, kode:'NEWMEMBER', nama:'Diskon Member Baru',      jenis:'persen',  nilai:15,    minOrder:0,      aktif:true,  berlakuHingga:'2026-12-31', deskripsi:'Diskon 15% untuk pelanggan baru.' },
  { id:4, kode:'AKHIRTHN',  nama:'Promo Akhir Tahun',       jenis:'persen',  nilai:20,    minOrder:300000, aktif:false, berlakuHingga:'2026-12-25', deskripsi:'Diskon akhir tahun untuk servis lengkap.' },
  { id:5, kode:'SPAREPART5',nama:'Diskon Spare Part 5%',   jenis:'persen',  nilai:5,     minOrder:50000,  aktif:true,  berlakuHingga:'2026-11-01', deskripsi:'Diskon 5% pembelian spare part.' },
];

DEMO_DATA.rating = [
  { id:1, bookingId:'BK-2026-004', pelanggan:'Dewi Lestari',  teknisi:'Hendra Kusuma', layanan:'Pemeriksaan AC',     nilai:5, komentar:'Servis cepat dan memuaskan!',           tanggal:'2026-10-09' },
  { id:2, bookingId:'BK-2026-008', pelanggan:'Hadi Kurniawan',teknisi:'Rudi Hermawan',  layanan:'Tune Up + Ganti Oli',nilai:4, komentar:'Hasil bagus, teknisi ramah.',             tanggal:'2026-10-09' },
  { id:3, bookingId:'BK-2026-003', pelanggan:'Ahmad Fauzi',   teknisi:'Hendra Kusuma', layanan:'Ganti Ban + Balancing',nilai:5,komentar:'Ban terpasang dengan baik, rekomen!',     tanggal:'2026-10-10' },
  { id:4, bookingId:'BK-2026-001', pelanggan:'Budi Santoso',  teknisi:'-',              layanan:'Ganti Oli + Filter', nilai:4, komentar:'Pelayanan baik, bersih.',                 tanggal:'2026-10-08' },
  { id:5, bookingId:'BK-2026-002', pelanggan:'Siti Rahayu',   teknisi:'Teguh Widodo',   layanan:'Servis Rutin',       nilai:3, komentar:'Agak lama menunggu, tapi hasil oke.',     tanggal:'2026-10-07' },
];

DEMO_DATA.roleList = [
  { id:1, nama:'Super Admin',    deskripsi:'Akses penuh ke seluruh fitur sistem.',           jumlahUser:2  },
  { id:2, nama:'Admin Cabang',   deskripsi:'Mengelola operasional satu cabang bengkel.',     jumlahUser:4  },
  { id:3, nama:'Petugas Servis', deskripsi:'Mengelola booking, servis, dan pembayaran.',     jumlahUser:6  },
  { id:4, nama:'Teknisi',        deskripsi:'Melihat dan menyelesaikan tugas servis.',         jumlahUser:6  },
  { id:5, nama:'Montir Lapangan',deskripsi:'Menangani servis panggilan dan home service.',   jumlahUser:3  },
];

DEMO_DATA.pengguna = [
  { id:1, nama:'Administrator',    email:'admin@bengkel.id',    roleId:1, role:'Super Admin',    cabang:'Semua Cabang',  status:'aktif',    telepon:'08100000001' },
  { id:2, nama:'Benny Sulistyo',   email:'benny@bengkel.id',    roleId:2, role:'Admin Cabang',   cabang:'Cabang Utama', status:'aktif',    telepon:'08100000002' },
  { id:3, nama:'Citra Handayani',  email:'citra@bengkel.id',    roleId:2, role:'Admin Cabang',   cabang:'Cabang Barat', status:'aktif',    telepon:'08100000003' },
  { id:4, nama:'Dani Saputra',     email:'dani@bengkel.id',     roleId:3, role:'Petugas Servis', cabang:'Cabang Utama', status:'aktif',    telepon:'08100000004' },
  { id:5, nama:'Eka Putri',        email:'eka@bengkel.id',      roleId:3, role:'Petugas Servis', cabang:'Cabang Timur', status:'nonaktif', telepon:'08100000005' },
  { id:6, nama:'Rudi Hermawan',    email:'rudi@bengkel.id',     roleId:4, role:'Teknisi',        cabang:'Cabang Utama', status:'aktif',    telepon:'08111111111' },
  { id:7, nama:'Teguh Widodo',     email:'teguh@bengkel.id',    roleId:4, role:'Teknisi',        cabang:'Cabang Utama', status:'aktif',    telepon:'08122222222' },
  { id:8, nama:'Hendra Kusuma',    email:'hendra@bengkel.id',   roleId:4, role:'Teknisi',        cabang:'Cabang Barat', status:'aktif',    telepon:'08133333333' },
];

// ============================================================
// DATA MODUL TAMBAHAN: Home Servis, Metode Pembayaran, Pengiriman
// ============================================================
DEMO_DATA.homeServis = [
  { id:'HS-001', pelanggan:'Budi Santoso',  telepon:'08123456789', kendaraan:'Toyota Avanza (B 1234 ABC)', alamat:'Jl. Sudirman No.12, Jakarta', teknisi:'Rudi Hermawan', jadwal:'2026-10-12 09:00', layanan:'Ganti Oli + Filter', status:'dijadwalkan', catatan:'-' },
  { id:'HS-002', pelanggan:'Dewi Lestari',  telepon:'08456789012', kendaraan:'Daihatsu Xenia (AB 7890 MNO)', alamat:'Jl. Veteran No.7, Yogyakarta', teknisi:'Hendra Kusuma', jadwal:'2026-10-11 14:00', layanan:'Pemeriksaan AC', status:'sedang berlangsung', catatan:'Pelanggan minta teknisi datang siang.' },
  { id:'HS-003', pelanggan:'Eko Prasetyo', telepon:'08567890123', kendaraan:'Honda Civic (F 2468 PQR)', alamat:'Jl. Pemuda No.18, Semarang', teknisi:'-', jadwal:'2026-10-10 10:00', layanan:'Tune Up Mesin', status:'selesai', catatan:'-' },
];

DEMO_DATA.statusHomeServis = {
  dijadwalkan:        { label:'Dijadwalkan',        kelas:'badge-info'    },
  'sedang berlangsung':{ label:'Berlangsung',       kelas:'badge-warning' },
  selesai:            { label:'Selesai',            kelas:'badge-success' },
  dibatalkan:         { label:'Dibatalkan',         kelas:'badge-danger'  },
};

DEMO_DATA.metodePembayaranList = [
  { id:1, nama:'Transfer Bank', deskripsi:'Transfer via rekening bank.', aktif:true },
  { id:2, nama:'Tunai',         deskripsi:'Pembayaran langsung di kasir.', aktif:true },
  { id:3, nama:'QRIS',          deskripsi:'Scan QR Code via aplikasi e-wallet.', aktif:true },
  { id:4, nama:'Kartu Kredit',  deskripsi:'Pembayaran via kartu kredit/debit.', aktif:true },
  { id:5, nama:'OVO',           deskripsi:'Pembayaran via OVO.', aktif:false },
  { id:6, nama:'GoPay',         deskripsi:'Pembayaran via GoPay.', aktif:true },
];

DEMO_DATA.pengiriman = [
  { id:'SHP-001', pesananId:'ORD-2026-002', pelanggan:'Siti Rahayu',  alamat:'Jl. Gatot Subroto No.5, Bandung', ekspedisi:'JNE', nomorResi:'JNE123456789', tanggalKirim:'2026-10-09', estimasiTiba:'2026-10-11', status:'dikirim' },
  { id:'SHP-002', pesananId:'ORD-2026-001', pelanggan:'Budi Santoso', alamat:'Jl. Sudirman No.12, Jakarta',      ekspedisi:'SiCepat', nomorResi:'SCP987654321', tanggalKirim:'2026-10-08', estimasiTiba:'2026-10-09', status:'terkirim' },
  { id:'SHP-003', pesananId:'ORD-2026-003', pelanggan:'Ahmad Fauzi',  alamat:'Jl. Diponegoro No.3, Surabaya',   ekspedisi:'Anteraja', nomorResi:'-', tanggalKirim:'-', estimasiTiba:'-', status:'menunggu' },
];

DEMO_DATA.statusPengiriman = {
  menunggu: { label:'Menunggu',  kelas:'badge-warning' },
  dikirim:  { label:'Dikirim',   kelas:'badge-info'    },
  terkirim: { label:'Terkirim',  kelas:'badge-success' },
  gagal:    { label:'Gagal',     kelas:'badge-danger'  },
};
