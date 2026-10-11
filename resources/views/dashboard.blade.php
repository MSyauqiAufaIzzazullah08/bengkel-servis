<!DOCTYPE html>
{{--
    dashboard.blade.php
    Dashboard utama setelah login.
    Integrasi: desain dari frontend Kiro + data sesi Laravel.

    Pengguna yang login: session('user_nama'), session('role_id')
    Statistik & tabel: DATA DEMONSTRASI (belum diambil dari database)
    Sidebar: navigasi ke route Laravel yang sudah terdaftar
--}}
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — BengkelServis</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    {{-- Aset CSS dari folder public/assets (disalin dari frontend Kiro) --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>
<body>

{{-- ============================================================
     LAYOUT: app-wrapper membungkus sidebar + konten utama
     Kelas ini didefinisikan di components.css (.app-wrapper { display:flex })
     ============================================================ --}}
<div class="app-wrapper" id="app">

    {{-- ============================================================
         SIDEBAR
         Navigasi menuju route Laravel yang sudah terdaftar di web.php.
         URL logout menggunakan POST + @csrf sesuai LoginController.
         ============================================================ --}}
    <aside class="sidebar" id="sidebar">

        {{-- Logo / Brand --}}
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="sidebar-brand-text">
                <span class="sidebar-brand-title">BengkelServis</span>
                <span class="sidebar-brand-subtitle">Multi-Cabang</span>
            </div>
        </div>

        <nav class="sidebar-nav" id="sidebarNav">

            {{-- Menu Utama --}}
            <div class="nav-section-title">Menu Utama</div>
            <div class="nav-item">
                <a href="/dashboard" class="nav-link active" data-tooltip="Dashboard">
                    <span class="nav-icon"><i class="fas fa-th-large"></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </div>

            {{-- Manajemen Cabang --}}
            <div class="nav-section-title">Manajemen Cabang</div>
            <div class="nav-item">
                <a href="/cabang" class="nav-link" data-tooltip="Cabang">
                    <span class="nav-icon"><i class="fas fa-building"></i></span>
                    <span class="nav-text">Cabang</span>
                </a>
            </div>

            {{-- Data Master --}}
            <div class="nav-section-title">Data Master</div>
            <div class="nav-item">
                <a href="/pelanggan" class="nav-link" data-tooltip="Pelanggan">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    <span class="nav-text">Pelanggan</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="/kendaraan" class="nav-link" data-tooltip="Kendaraan">
                    <span class="nav-icon"><i class="fas fa-car"></i></span>
                    <span class="nav-text">Kendaraan</span>
                </a>
            </div>

            {{-- Manajemen Servis --}}
            <div class="nav-section-title">Manajemen Servis</div>
            <div class="nav-item">
                <a href="#" class="nav-link has-submenu" data-tooltip="Booking">
                    <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                    <span class="nav-text">Booking Servis</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </a>
                <div class="nav-submenu">
                    <div class="nav-item">
                        <a href="/booking" class="nav-link"><span class="nav-text">Daftar Booking</span></a>
                    </div>
                    <div class="nav-item">
                        <a href="/booking/create" class="nav-link"><span class="nav-text">Booking Baru</span></a>
                    </div>
                </div>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link has-submenu" data-tooltip="Layanan">
                    <span class="nav-icon"><i class="fas fa-tools"></i></span>
                    <span class="nav-text">Layanan Servis</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </a>
                <div class="nav-submenu">
                    <div class="nav-item">
                        <a href="/layanan" class="nav-link"><span class="nav-text">Daftar Layanan</span></a>
                    </div>
                    <div class="nav-item">
                        <a href="/detailservis" class="nav-link"><span class="nav-text">Detail Servis</span></a>
                    </div>
                </div>
            </div>
            <div class="nav-item">
                <a href="/teknisi" class="nav-link" data-tooltip="Teknisi">
                    <span class="nav-icon"><i class="fas fa-hard-hat"></i></span>
                    <span class="nav-text">Teknisi</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="/homeservice" class="nav-link" data-tooltip="Servis Panggilan">
                    <span class="nav-icon"><i class="fas fa-motorcycle"></i></span>
                    <span class="nav-text">Servis Panggilan</span>
                </a>
            </div>

            {{-- Inventaris --}}
            <div class="nav-section-title">Inventaris</div>
            <div class="nav-item">
                <a href="#" class="nav-link has-submenu" data-tooltip="Spare Part">
                    <span class="nav-icon"><i class="fas fa-boxes"></i></span>
                    <span class="nav-text">Spare Part</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </a>
                <div class="nav-submenu">
                    <div class="nav-item">
                        <a href="/sparepart" class="nav-link"><span class="nav-text">Daftar Spare Part</span></a>
                    </div>
                    <div class="nav-item">
                        <a href="/kategori-sparepart" class="nav-link"><span class="nav-text">Kategori</span></a>
                    </div>
                </div>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link has-submenu" data-tooltip="Pesanan">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    <span class="nav-text">Pesanan Spare Part</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </a>
                <div class="nav-submenu">
                    <div class="nav-item">
                        <a href="/order" class="nav-link"><span class="nav-text">Daftar Pesanan</span></a>
                    </div>
                    <div class="nav-item">
                        <a href="/orderdetail" class="nav-link"><span class="nav-text">Detail Pesanan</span></a>
                    </div>
                </div>
            </div>

            {{-- Keuangan --}}
            <div class="nav-section-title">Keuangan</div>
            <div class="nav-item">
                <a href="#" class="nav-link has-submenu" data-tooltip="Pembayaran">
                    <span class="nav-icon"><i class="fas fa-credit-card"></i></span>
                    <span class="nav-text">Pembayaran</span>
                    <i class="fas fa-chevron-right nav-arrow"></i>
                </a>
                <div class="nav-submenu">
                    <div class="nav-item">
                        <a href="/pembayaran" class="nav-link"><span class="nav-text">Daftar Pembayaran</span></a>
                    </div>
                    <div class="nav-item">
                        <a href="/metodepembayaran" class="nav-link"><span class="nav-text">Metode Pembayaran</span></a>
                    </div>
                </div>
            </div>
            <div class="nav-item">
                <a href="/promo" class="nav-link" data-tooltip="Promo">
                    <span class="nav-icon"><i class="fas fa-tags"></i></span>
                    <span class="nav-text">Promo</span>
                </a>
            </div>

            {{-- Pengiriman --}}
            <div class="nav-section-title">Pengiriman</div>
            <div class="nav-item">
                <a href="/pengiriman" class="nav-link" data-tooltip="Pengiriman">
                    <span class="nav-icon"><i class="fas fa-truck"></i></span>
                    <span class="nav-text">Pengiriman</span>
                </a>
            </div>

            {{-- Ulasan --}}
            <div class="nav-section-title">Ulasan</div>
            <div class="nav-item">
                <a href="/rating" class="nav-link" data-tooltip="Ulasan">
                    <span class="nav-icon"><i class="fas fa-star"></i></span>
                    <span class="nav-text">Rating & Ulasan</span>
                </a>
            </div>

            {{-- Administrasi --}}
            <div class="nav-section-title">Administrasi</div>
            <div class="nav-item">
                <a href="/user" class="nav-link" data-tooltip="Pengguna">
                    <span class="nav-icon"><i class="fas fa-user-circle"></i></span>
                    <span class="nav-text">Pengguna</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="/role" class="nav-link" data-tooltip="Role">
                    <span class="nav-icon"><i class="fas fa-shield-alt"></i></span>
                    <span class="nav-text">Hak Akses (Role)</span>
                </a>
            </div>

        </nav>

        {{-- Footer Sidebar: Logout --}}
        <div class="sidebar-footer">
            <form action="/logout" method="POST" style="margin:0">
                @csrf
                <button type="submit" class="nav-link w-100" data-tooltip="Keluar"
                        style="background:none;border:none;cursor:pointer;width:100%;text-align:left">
                    <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="nav-text">Keluar</span>
                </button>
            </form>
        </div>

    </aside>

    {{-- Overlay mobile --}}
    <div class="mobile-overlay" id="mobileOverlay"></div>

    {{-- ============================================================
         KONTEN UTAMA
         ============================================================ --}}
    <div class="main-content" id="mainContent">

        {{-- Header --}}
        <header class="app-header">
            <div class="header-left">
                <button class="btn-toggle-sidebar" id="btnToggleSidebar" title="Toggle Sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <nav class="page-breadcrumb">
                    <span>BengkelServis</span>
                    <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
                    <span class="breadcrumb-current">Dashboard</span>
                </nav>
            </div>

            <div class="header-right">
                {{-- Notifikasi --}}
                <button class="header-action-btn" title="Notifikasi" id="btnNotif">
                    <i class="fas fa-bell"></i>
                    <span class="notif-dot"></span>
                </button>

                <div class="header-divider"></div>

                {{-- Info pengguna dari sesi Laravel --}}
                @php
                    $namaUser  = session('user_nama', 'Pengguna');
                    $roleId    = session('role_id', 0);
                    // Pemetaan role_id ke nama role berdasarkan struktur middleware
                    $namaRole  = match((int) $roleId) {
                        1 => 'Super Admin',
                        2 => 'Admin Cabang',
                        3 => 'Petugas Servis',
                        4 => 'Teknisi',
                        5 => 'Montir Lapangan',
                        default => 'Pengguna'
                    };
                    // Buat inisial avatar dari nama (maks 2 kata)
                    $bagian    = explode(' ', trim($namaUser));
                    $inisial   = strtoupper(substr($bagian[0], 0, 1) . (isset($bagian[1]) ? substr($bagian[1], 0, 1) : ''));
                @endphp

                <div class="dropdown">
                    <div class="user-menu" data-dropdown="userDropdown">
                        <div class="user-avatar">{{ $inisial }}</div>
                        <div class="user-info">
                            <span class="user-name">{{ $namaUser }}</span>
                            <span class="user-role">{{ $namaRole }}</span>
                        </div>
                        <i class="fas fa-chevron-down" style="font-size:0.7rem;color:var(--color-text-muted);margin-left:4px"></i>
                    </div>
                    <div class="dropdown-menu" id="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user-circle"></i> Profil Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item danger" style="cursor:pointer"
                             onclick="document.getElementById('formLogoutDropdown').submit()">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </div>
                    </div>
                </div>

                {{-- Form logout tersembunyi untuk dropdown --}}
                <form id="formLogoutDropdown" action="/logout" method="POST" style="display:none">
                    @csrf
                </form>
            </div>
        </header>

        {{-- ============================================================
             KONTEN HALAMAN DASHBOARD
             ============================================================ --}}
        <main class="page-content">

            {{-- Banner Selamat Datang — nama dari sesi Laravel --}}
            <div class="welcome-banner">
                <div class="welcome-text">
                    <h2>Selamat Datang, {{ $namaUser }} 👋</h2>
                    <p>Berikut ringkasan operasional bengkel. Anda masuk sebagai <strong>{{ $namaRole }}</strong>.</p>
                    <span class="demo-tag">
                        <i class="fas fa-flask"></i>
                        Statistik di bawah ini adalah <strong>DATA DEMONSTRASI</strong> — belum diambil dari database
                    </span>
                </div>
                <div class="welcome-stats">
                    <div class="welcome-stat-item">
                        <div class="val" id="statBookingHariIni">—</div>
                        <div class="lbl">Booking Hari Ini</div>
                    </div>
                    <div class="welcome-stat-divider"></div>
                    <div class="welcome-stat-item">
                        <div class="val" id="statTeknisiAktif">—</div>
                        <div class="lbl">Teknisi Aktif</div>
                    </div>
                    <div class="welcome-stat-divider"></div>
                    <div class="welcome-stat-item">
                        <div class="val" id="statRating">—</div>
                        <div class="lbl">Rating Rata-rata</div>
                    </div>
                </div>
            </div>

            {{-- Kartu Statistik --}}
            <div class="stats-grid" style="margin-bottom:24px">

                <div class="stat-card stat-blue">
                    <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                    <div class="stat-info">
                        <div class="stat-value" id="statTotalBooking">—</div>
                        <div class="stat-label">Total Booking</div>
                        <div class="stat-change up"><i class="fas fa-info-circle"></i> Data demonstrasi</div>
                    </div>
                </div>

                <div class="stat-card stat-amber">
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                    <div class="stat-info">
                        <div class="stat-value" id="statMenunggu">—</div>
                        <div class="stat-label">Menunggu Konfirmasi</div>
                        <div class="stat-change up"><i class="fas fa-info-circle"></i> Data demonstrasi</div>
                    </div>
                </div>

                <div class="stat-card stat-info">
                    <div class="stat-icon"><i class="fas fa-wrench"></i></div>
                    <div class="stat-info">
                        <div class="stat-value" id="statDikerjakan">—</div>
                        <div class="stat-label">Sedang Dikerjakan</div>
                        <div class="stat-change up"><i class="fas fa-info-circle"></i> Data demonstrasi</div>
                    </div>
                </div>

                <div class="stat-card stat-green">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-info">
                        <div class="stat-value" id="statPelanggan">—</div>
                        <div class="stat-label">Total Pelanggan</div>
                        <div class="stat-change up"><i class="fas fa-info-circle"></i> Data demonstrasi</div>
                    </div>
                </div>

            </div>

            {{-- Aksi Cepat — URL menuju route Laravel --}}
            <div style="margin-bottom:24px">
                <div class="section-title"><i class="fas fa-bolt"></i> Aksi Cepat</div>
                <div class="quick-actions">

                    <a href="/booking/create" class="quick-action-card">
                        <div class="quick-action-icon" style="background:rgba(32,53,101,0.08);color:var(--color-primary)">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <span class="quick-action-label">Booking Baru</span>
                    </a>

                    <a href="/pelanggan/create" class="quick-action-card">
                        <div class="quick-action-icon" style="background:rgba(34,197,94,0.10);color:var(--color-success)">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="quick-action-label">Tambah Pelanggan</span>
                    </a>

                    <a href="/kendaraan" class="quick-action-card">
                        <div class="quick-action-icon" style="background:rgba(59,130,246,0.10);color:var(--color-info)">
                            <i class="fas fa-car"></i>
                        </div>
                        <span class="quick-action-label">Data Kendaraan</span>
                    </a>

                    <a href="/sparepart" class="quick-action-card">
                        <div class="quick-action-icon" style="background:rgba(197,162,140,0.15);color:#8b5e3c">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <span class="quick-action-label">Spare Part</span>
                    </a>

                    <a href="/pembayaran" class="quick-action-card">
                        <div class="quick-action-icon" style="background:rgba(245,158,11,0.10);color:var(--color-warning)">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <span class="quick-action-label">Pembayaran</span>
                    </a>

                    <a href="/rating" class="quick-action-card">
                        <div class="quick-action-icon" style="background:rgba(139,92,246,0.10);color:#7c3aed">
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="quick-action-label">Rating & Ulasan</span>
                    </a>

                </div>
            </div>

            {{-- Grid Utama: Tabel Booking (kiri) + Widget (kanan) --}}
            <div class="dashboard-grid">

                {{-- Kolom Kiri: Tabel Booking --}}
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-calendar-alt" style="color:var(--color-accent);margin-right:6px"></i>
                                Ringkasan Booking
                            </h3>
                            <a href="/booking" class="btn btn-ghost btn-sm">
                                Lihat Semua <i class="fas fa-arrow-right" style="margin-left:4px"></i>
                            </a>
                        </div>

                        {{-- Filter & Pencarian --}}
                        <div style="padding:14px 20px;border-bottom:1px solid var(--color-border-light)">
                            <div class="filter-bar" style="margin-bottom:10px" id="filterBarBooking">
                                <button class="filter-btn active" data-filter="semua">Semua</button>
                                <button class="filter-btn" data-filter="menunggu">Menunggu</button>
                                <button class="filter-btn" data-filter="dikonfirmasi">Dikonfirmasi</button>
                                <button class="filter-btn" data-filter="dikerjakan">Dikerjakan</button>
                                <button class="filter-btn" data-filter="selesai">Selesai</button>
                                <button class="filter-btn" data-filter="dibatalkan">Dibatalkan</button>
                            </div>
                            <div class="search-input-wrapper" style="max-width:380px">
                                <i class="fas fa-search"></i>
                                <input type="text" id="inputCariBooking" class="search-input"
                                       placeholder="Cari kode, nama, kendaraan, servis...">
                            </div>
                        </div>

                        {{-- Tabel --}}
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Booking</th>
                                        <th>Pelanggan</th>
                                        <th>Kendaraan</th>
                                        <th>Jenis Servis</th>
                                        <th>Cabang</th>
                                        <th>Jadwal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyBooking"></tbody>
                            </table>
                            <div id="emptyStateBooking" class="table-empty" style="display:none">
                                <i class="fas fa-search"></i>
                                <p>Tidak ada data yang cocok dengan pencarian atau filter.</p>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-between align-center flex-wrap gap-1">
                            <span class="text-xs text-muted" id="infoJumlah">
                                <i class="fas fa-spinner fa-spin"></i> Memuat...
                            </span>
                            <span class="text-xs text-muted">
                                <i class="fas fa-database"></i>
                                DATA DEMONSTRASI — belum diambil dari database
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Widget --}}
                <div style="display:flex;flex-direction:column;gap:20px">

                    {{-- Status Servis --}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie" style="color:var(--color-accent);margin-right:6px"></i>
                                Status Servis
                            </h3>
                            <span class="badge badge-neutral text-xs" id="badgeTotalServis">—</span>
                        </div>
                        <div class="card-body">
                            <div class="status-servis-list" id="statusServisList">
                                <div style="text-align:center;color:var(--color-text-muted);padding:12px 0;font-size:0.85rem">
                                    Memuat data demonstrasi...
                                </div>
                            </div>
                            <p class="text-xs text-muted mt-2">
                                <i class="fas fa-info-circle"></i> Data demonstrasi
                            </p>
                        </div>
                    </div>

                    {{-- Aktivitas Terbaru --}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-history" style="color:var(--color-accent);margin-right:6px"></i>
                                Aktivitas Terbaru
                            </h3>
                        </div>
                        <div class="card-body" style="padding-top:4px;padding-bottom:4px">
                            <div class="activity-list" id="listAktivitas"></div>
                        </div>
                        <div class="card-footer">
                            <p class="text-xs text-muted">
                                <i class="fas fa-info-circle"></i>
                                Data demonstrasi — bukan log sistem asli
                            </p>
                        </div>
                    </div>

                </div>
                {{-- /Kolom Kanan --}}

            </div>
            {{-- /Dashboard Grid --}}

        </main>
        {{-- /page-content --}}

    </div>
    {{-- /main-content --}}

</div>
{{-- /app-wrapper --}}

{{-- Toast Container --}}
<div class="toast-container" id="toastContainer"></div>

{{-- Modal Detail Booking --}}
<div class="modal-overlay" id="modalDetailBooking">
    <div class="modal" style="max-width:600px">
        <div class="modal-header">
            <h3 class="modal-title">
                <i class="fas fa-calendar-check" style="color:var(--color-accent);margin-right:8px"></i>
                Detail Booking
            </h3>
            <button class="modal-close" data-modal-close="modalDetailBooking">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="modalDetailContent"></div>
        <div class="modal-footer">
            <span class="text-xs text-muted" style="flex:1">
                <i class="fas fa-info-circle"></i> Data demonstrasi — bukan dari database asli.
            </span>
            <button class="btn btn-ghost" data-modal-close="modalDetailBooking">Tutup</button>
            <a href="/booking" class="btn btn-primary">
                <i class="fas fa-list"></i> Lihat Semua Booking
            </a>
        </div>
    </div>
</div>

{{-- ============================================================
     JAVASCRIPT
     Urutan: data.js → app.js → logika dashboard inline
     components.js TIDAK digunakan di Blade karena renderLayout()
     bergantung pada window.location.pathname yang tidak cocok
     dengan URL Laravel.
     ============================================================ --}}
<script src="{{ asset('assets/js/data.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
// ============================================================
// ISI ANGKA STATISTIK DARI DEMO_DATA
// Ditandai jelas sebagai demonstrasi di HTML di atas.
// ============================================================
(function() {
    var st = DEMO_DATA.stats;
    var ss = DEMO_DATA.statusServis;
    var total = Object.values(ss).reduce(function(s, d) { return s + d.jumlah; }, 0);

    // Banner
    document.getElementById('statBookingHariIni').textContent = st.bookingHariIni;
    document.getElementById('statTeknisiAktif').textContent   = st.teknisiAktif;
    document.getElementById('statRating').textContent         = st.ratingRataRata;

    // Kartu
    document.getElementById('statTotalBooking').textContent = total;
    document.getElementById('statMenunggu').textContent     = ss.menunggu.jumlah;
    document.getElementById('statDikerjakan').textContent   = ss.dikerjakan.jumlah;
    document.getElementById('statPelanggan').textContent    = st.totalPelanggan;

    // Badge total servis
    document.getElementById('badgeTotalServis').textContent = total + ' total';

    // Status Servis list
    var list = document.getElementById('statusServisList');
    if (list) {
        list.innerHTML = Object.entries(ss).map(function(entry) {
            var key = entry[0]; var val = entry[1];
            var persen = total > 0 ? Math.round((val.jumlah / total) * 100) : 0;
            return '<div class="status-servis-item">' +
                '<span class="status-servis-dot" style="background:' + val.warna + '"></span>' +
                '<span class="status-servis-label">' + val.label + '</span>' +
                '<span class="status-servis-count">' + val.jumlah + '</span>' +
            '</div>' +
            '<div class="status-servis-bar">' +
                '<div class="status-servis-bar-fill" style="width:0%;background:' + val.warna + '" id="bar-' + key + '"></div>' +
            '</div>';
        }).join('');
        // Animasi progress bar
        setTimeout(function() {
            Object.keys(ss).forEach(function(key) {
                var bar = document.getElementById('bar-' + key);
                if (bar) {
                    var p = total > 0 ? Math.round((ss[key].jumlah / total) * 100) : 0;
                    bar.style.width = p + '%';
                }
            });
        }, 150);
    }
})();

// ============================================================
// TABEL BOOKING DEMONSTRASI
// ============================================================
var STATUS_CONFIG = {
    menunggu:     { label: 'Menunggu',          kelas: 'badge-warning',  dot: '#f59e0b' },
    dikonfirmasi: { label: 'Dikonfirmasi',      kelas: 'badge-info',     dot: '#3b82f6' },
    dikerjakan:   { label: 'Sedang Dikerjakan', kelas: 'badge-primary',  dot: '#8b5cf6' },
    selesai:      { label: 'Selesai',           kelas: 'badge-success',  dot: '#22c55e' },
    dibatalkan:   { label: 'Dibatalkan',        kelas: 'badge-danger',   dot: '#ef4444' },
};

var filterAktif = 'semua';
var kataCari    = '';

function renderBarisTabel(item) {
    var st  = STATUS_CONFIG[item.status] || { label: item.status, kelas: 'badge-neutral', dot: '#94a3b8' };
    var tgl = formatTanggal(item.jadwal.split(' ')[0]);
    var jam = item.jadwal.split(' ')[1] || '';
    return '<tr>' +
        '<td><span style="font-family:var(--font-heading);font-weight:700;font-size:0.82rem;color:var(--color-primary)">' + item.id + '</span></td>' +
        '<td><div style="font-weight:600;font-size:0.875rem">' + item.pelanggan + '</div>' +
             '<div style="font-size:0.75rem;color:var(--color-text-muted)">' + item.telepon + '</div></td>' +
        '<td><div style="font-weight:500;font-size:0.84rem">' + item.kendaraan + '</div>' +
             '<div style="font-size:0.75rem;color:var(--color-text-muted)">' + item.plat + '</div></td>' +
        '<td style="font-size:0.84rem">' + item.servis + '</td>' +
        '<td><span style="font-size:0.78rem;background:rgba(32,53,101,0.07);padding:3px 8px;border-radius:6px;color:var(--color-primary);font-weight:500">' + item.cabang + '</span></td>' +
        '<td><div style="font-size:0.83rem;font-weight:500">' + tgl + '</div>' +
             '<div style="font-size:0.75rem;color:var(--color-text-muted)">' + jam + '</div></td>' +
        '<td><span class="badge ' + st.kelas + '"><span class="badge-dot" style="background:' + st.dot + '"></span>' + st.label + '</span></td>' +
        '<td><div class="actions-cell">' +
            '<button class="btn btn-outline btn-sm btn-icon" title="Lihat Detail" onclick="lihatDetailBooking(\'' + item.id + '\')">' +
                '<i class="fas fa-eye"></i>' +
            '</button>' +
            '<a href="/booking" class="btn btn-ghost btn-sm btn-icon" title="Kelola di backend">' +
                '<i class="fas fa-external-link-alt"></i>' +
            '</a>' +
        '</div></td>' +
    '</tr>';
}

function isiTabel(data) {
    var tbody = document.getElementById('tbodyBooking');
    var empty = document.getElementById('emptyStateBooking');
    var info  = document.getElementById('infoJumlah');
    if (!tbody) return;
    if (data.length === 0) {
        tbody.innerHTML = '';
        if (empty) empty.style.display = 'block';
    } else {
        tbody.innerHTML = data.map(renderBarisTabel).join('');
        if (empty) empty.style.display = 'none';
    }
    if (info) info.innerHTML =
        '<i class="fas fa-info-circle"></i> Menampilkan ' + data.length +
        ' dari ' + DEMO_DATA.bookingLengkap.length +
        ' data demonstrasi (belum dari database)';
}

function terapkanFilter() {
    var hasil = DEMO_DATA.bookingLengkap.slice();
    if (filterAktif !== 'semua') {
        hasil = hasil.filter(function(b) { return b.status === filterAktif; });
    }
    if (kataCari.trim() !== '') {
        var q = kataCari.toLowerCase();
        hasil = hasil.filter(function(b) {
            return b.id.toLowerCase().includes(q) ||
                   b.pelanggan.toLowerCase().includes(q) ||
                   b.kendaraan.toLowerCase().includes(q) ||
                   b.servis.toLowerCase().includes(q) ||
                   b.cabang.toLowerCase().includes(q);
        });
    }
    isiTabel(hasil);
}

document.querySelectorAll('.filter-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(function(b) { b.classList.remove('active'); });
        btn.classList.add('active');
        filterAktif = btn.getAttribute('data-filter');
        terapkanFilter();
    });
});

var inputCari = document.getElementById('inputCariBooking');
if (inputCari) {
    inputCari.addEventListener('input', function() {
        kataCari = this.value;
        terapkanFilter();
    });
}

isiTabel(DEMO_DATA.bookingLengkap);

// ============================================================
// MODAL DETAIL BOOKING
// ============================================================
function lihatDetailBooking(id) {
    var item = DEMO_DATA.bookingLengkap.find(function(b) { return b.id === id; });
    if (!item) { showToast('Data tidak ditemukan.', 'error'); return; }
    var st  = STATUS_CONFIG[item.status] || { label: item.status, kelas: 'badge-neutral', dot: '#94a3b8' };
    var tgl = formatTanggal(item.jadwal.split(' ')[0]);
    var jam = item.jadwal.split(' ')[1] || '-';
    var rows = [
        ['Pelanggan',   item.pelanggan],
        ['Telepon',     item.telepon],
        ['Kendaraan',   item.kendaraan + ' (' + item.plat + ')'],
        ['Jenis Servis',item.servis],
        ['Cabang',      item.cabang],
        ['Jadwal',      tgl + ' pukul ' + jam + ' WIB'],
        ['Teknisi',     item.teknisi],
        ['Total Biaya', item.total > 0 ? formatRupiah(item.total) : '-'],
        ['Catatan',     item.catatan || '-'],
    ];
    var html = '<div style="margin-bottom:16px;display:flex;align-items:center;gap:10px">' +
        '<span style="font-family:var(--font-heading);font-size:1.1rem;font-weight:800;color:var(--color-primary)">' + item.id + '</span>' +
        '<span class="badge ' + st.kelas + '"><span class="badge-dot" style="background:' + st.dot + '"></span>' + st.label + '</span>' +
        '</div>' +
        rows.map(function(r) {
            return '<div class="detail-row"><span class="detail-label">' + r[0] + '</span>' +
                '<span class="detail-value">' + r[1] + '</span></div>';
        }).join('');
    document.getElementById('modalDetailContent').innerHTML = html;
    openModal('modalDetailBooking');
}

// ============================================================
// AKTIVITAS TERBARU
// ============================================================
var AKTIVITAS_ICON = {
    booking: { kelas: 'booking', icon: 'fas fa-calendar-plus'  },
    selesai: { kelas: 'selesai', icon: 'fas fa-check-circle'   },
    bayar:   { kelas: 'bayar',   icon: 'fas fa-money-bill-wave' },
    batal:   { kelas: 'batal',   icon: 'fas fa-times-circle'   },
    teknisi: { kelas: 'teknisi', icon: 'fas fa-hard-hat'        },
};

(function() {
    var container = document.getElementById('listAktivitas');
    if (!container) return;
    container.innerHTML = DEMO_DATA.aktivitasTerbaru.map(function(ak) {
        var cfg = AKTIVITAS_ICON[ak.tipe] || { kelas: 'booking', icon: 'fas fa-circle' };
        return '<div class="activity-item">' +
            '<div class="activity-icon ' + cfg.kelas + '"><i class="' + cfg.icon + '"></i></div>' +
            '<div class="activity-body">' +
                '<div class="activity-title">' + ak.judul + '</div>' +
                '<div class="activity-desc">' + ak.deskripsi + '</div>' +
            '</div>' +
            '<div class="activity-time">' + ak.waktu + '</div>' +
        '</div>';
    }).join('');
})();

// Notifikasi bell
document.getElementById('btnNotif').addEventListener('click', function() {
    showToast('Belum ada notifikasi baru.', 'info');
});
</script>

</body>
</html>
