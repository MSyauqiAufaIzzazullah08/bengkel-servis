/**
 * components.js
 * File ini menghasilkan HTML untuk sidebar dan header
 * sehingga tidak perlu menulis ulang di setiap halaman.
 * Cukup panggil fungsi renderLayout() di setiap halaman.
 */

// ============================================================
// KONFIGURASI MENU NAVIGASI SIDEBAR
//
// CATATAN PATH:
// Semua halaman aplikasi berada di dalam folder pages/ atau
// subfolder pages/xxx/. Path di sini menggunakan path ABSOLUT
// dari root workspace (dimulai dari /pages/) sehingga konsisten
// dari semua lokasi halaman. resolveHref() di bawah akan
// mengubahnya menjadi path relatif yang benar saat runtime.
// ============================================================
// ============================================================
// KETERANGAN PROPERTI MENU:
//   href     : path halaman (string) — jika null, halaman belum tersedia
//   icon     : class Font Awesome
//   label    : teks menu
//   tooltip  : teks saat sidebar diperkecil
//   soon     : true → tandai "segera hadir", klik tampilkan toast
//   submenu  : array item anak
// ============================================================
const NAV_MENU = [
  {
    section: 'Menu Utama',
    items: [
      { href: '/pages/dashboard.html', icon: 'fas fa-th-large', label: 'Dashboard', tooltip: 'Dashboard' },
    ]
  },
  {
    section: 'Manajemen Cabang',
    items: [
      { href: '/pages/cabang/index.html', icon: 'fas fa-building', label: 'Cabang', tooltip: 'Cabang' },
    ]
  },
  {
    section: 'Data Master',
    items: [
      { href: '/pages/pelanggan/index.html', icon: 'fas fa-users',      label: 'Pelanggan',  tooltip: 'Pelanggan' },
      { href: '/pages/kendaraan/index.html', icon: 'fas fa-car',        label: 'Kendaraan',  tooltip: 'Kendaraan' },
    ]
  },
  {
    section: 'Manajemen Servis',
    items: [
      {
        icon: 'fas fa-calendar-check', label: 'Booking Servis', tooltip: 'Booking',
        submenu: [
          { href: '/pages/booking/index.html',  label: 'Daftar Booking' },
          { href: '/pages/booking/tambah.html', label: 'Booking Baru'   },
        ]
      },
      {
        icon: 'fas fa-tools', label: 'Layanan Servis', tooltip: 'Layanan',
        submenu: [
          { href: '/pages/layanan/index.html', label: 'Daftar Layanan' },
          { href: null, label: 'Detail Servis', soon: true },
        ]
      },
      { href: '/pages/teknisi/index.html', icon: 'fas fa-hard-hat', label: 'Teknisi', tooltip: 'Teknisi' },
      { href: '/pages/homeservice/index.html', icon: 'fas fa-motorcycle', label: 'Servis Panggilan', tooltip: 'Servis Panggilan' },
    ]
  },
  {
    section: 'Inventaris',
    items: [
      {
        icon: 'fas fa-boxes', label: 'Spare Part', tooltip: 'Spare Part',
        submenu: [
          { href: '/pages/sparepart/index.html',    label: 'Daftar Spare Part' },
          { href: '/pages/sparepart/kategori.html', label: 'Kategori'          },
        ]
      },
      {
        icon: 'fas fa-clipboard-list', label: 'Pesanan Spare Part', tooltip: 'Pesanan',
        submenu: [
          { href: '/pages/sparepart/pesanan.html',       label: 'Daftar Pesanan' },
          { href: null, label: 'Detail Pesanan', soon: true },
        ]
      },
    ]
  },
  {
    section: 'Keuangan',
    items: [
      {
        icon: 'fas fa-credit-card', label: 'Pembayaran', tooltip: 'Pembayaran',
        submenu: [
          { href: '/pages/pembayaran/index.html', label: 'Daftar Pembayaran' },
          { href: '/pages/pembayaran/metode.html', label: 'Metode Pembayaran' },
        ]
      },
      { href: '/pages/promo/index.html', icon: 'fas fa-tags', label: 'Promo', tooltip: 'Promo' },
    ]
  },
  {
    section: 'Pengiriman',
    items: [
      { href: '/pages/pengiriman/index.html', icon: 'fas fa-truck', label: 'Pengiriman', tooltip: 'Pengiriman' },
    ]
  },
  {
    section: 'Ulasan',
    items: [
      { href: '/pages/rating/index.html', icon: 'fas fa-star', label: 'Rating & Ulasan', tooltip: 'Ulasan' },
    ]
  },
  {
    section: 'Administrasi',
    items: [
      { href: '/pages/pengguna/index.html', icon: 'fas fa-user-circle', label: 'Pengguna',        tooltip: 'Pengguna' },
      { href: '/pages/role/index.html',     icon: 'fas fa-shield-alt',  label: 'Hak Akses (Role)', tooltip: 'Role'     },
    ]
  },
];

// ============================================================
// HELPER: KONVERSI PATH ABSOLUT KE RELATIF
//
// Masalah: halaman bisa berada di pages/ atau pages/booking/, dll.
// Solusi: hitung path relatif dari lokasi halaman saat ini ke
// path tujuan, sehingga link selalu benar tanpa peduli kedalaman.
// ============================================================
function resolveHref(absolutePath) {
  // absolutePath contoh: '/pages/pelanggan/index.html'
  // Gunakan Live Server atau buka langsung — keduanya untung dari
  // path relatif yang dihitung dari window.location

  const currentPath = window.location.pathname;

  // Hitung jumlah segmen dari lokasi saat ini
  // Contoh: /pages/booking/tambah.html → 3 segmen → naik 2 kali (../..)
  const segments = currentPath.split('/').filter(Boolean);

  // Jumlah direktori di atas (tidak termasuk nama file)
  const depth = segments.length - 1;

  // Bangun prefix "../" sebanyak kedalaman
  const prefix = depth > 0 ? '../'.repeat(depth) : '';

  // absolutePath dimulai dengan '/', hilangkan leading slash
  const relative = absolutePath.replace(/^\//, '');

  return prefix + relative;
}

// Cek apakah href aktif (cocokkan bagian akhir path)
function isActivePage(href) {
  const currentPath = window.location.pathname.replace(/\\/g, '/');
  const normalizedHref = href.replace(/^\//, '');
  // Cocokkan akhir URL
  return currentPath.endsWith(normalizedHref) ||
         currentPath.endsWith(normalizedHref.replace('index.html', ''));
}

// ============================================================
// RENDER SIDEBAR
// ============================================================
function renderSidebar(activePage) {
  // Gunakan isActivePage() otomatis jika activePage tidak diberikan
  let html = `
  <aside class="sidebar" id="sidebar">
    <!-- Logo -->
    <div class="sidebar-brand">
      <div class="sidebar-brand-icon">
        <i class="fas fa-wrench"></i>
      </div>
      <div class="sidebar-brand-text">
        <span class="sidebar-brand-title">BengkelServis</span>
        <span class="sidebar-brand-subtitle">Multi-Cabang</span>
      </div>
    </div>

    <!-- Menu Navigasi -->
    <nav class="sidebar-nav" id="sidebarNav">
  `;

  NAV_MENU.forEach(function (section) {
    html += `<div class="nav-section-title">${section.section}</div>`;

    section.items.forEach(function (item) {
      if (item.submenu) {
        // Cek apakah salah satu sub-item aktif
        const isParentActive = item.submenu.some(sub => sub.href && isActivePage(sub.href));

        html += `
        <div class="nav-item">
          <a href="#" class="nav-link has-submenu${isParentActive ? ' open' : ''}" data-tooltip="${item.tooltip || item.label}">
            <span class="nav-icon"><i class="${item.icon}"></i></span>
            <span class="nav-text">${item.label}</span>
            <i class="fas fa-chevron-right nav-arrow"></i>
          </a>
          <div class="nav-submenu${isParentActive ? ' open' : ''}">
        `;

        item.submenu.forEach(function (sub) {
          if (sub.soon || !sub.href) {
            // Halaman belum tersedia — tampilkan dengan badge "segera"
            html += `
              <div class="nav-item">
                <a href="#" class="nav-link nav-link-soon"
                   onclick="event.preventDefault();showToast('Halaman \\'${sub.label}\\' belum tersedia. Akan dibuat pada tahap berikutnya.','info')"
                   title="Belum tersedia">
                  <span class="nav-text">${sub.label}</span>
                  <span class="nav-soon-badge">Segera</span>
                </a>
              </div>
            `;
          } else {
            const isActive = isActivePage(sub.href);
            html += `
              <div class="nav-item">
                <a href="${resolveHref(sub.href)}" class="nav-link${isActive ? ' active' : ''}">
                  <span class="nav-text">${sub.label}</span>
                </a>
              </div>
            `;
          }
        });

        html += `</div></div>`;

      } else if (item.soon || !item.href) {
        // Item utama belum tersedia
        html += `
        <div class="nav-item">
          <a href="#" class="nav-link nav-link-soon"
             onclick="event.preventDefault();showToast('Halaman \\'${item.label}\\' belum tersedia. Akan dibuat pada tahap berikutnya.','info')"
             data-tooltip="${item.tooltip || item.label}" title="Belum tersedia">
            <span class="nav-icon"><i class="${item.icon}"></i></span>
            <span class="nav-text">${item.label}</span>
            <span class="nav-soon-badge">Segera</span>
          </a>
        </div>
        `;
      } else {
        const isActive = isActivePage(item.href);
        html += `
        <div class="nav-item">
          <a href="${resolveHref(item.href)}" class="nav-link${isActive ? ' active' : ''}" data-tooltip="${item.tooltip || item.label}">
            <span class="nav-icon"><i class="${item.icon}"></i></span>
            <span class="nav-text">${item.label}</span>
          </a>
        </div>
        `;
      }
    });
  });

  html += `
    </nav>

    <!-- Footer Sidebar -->
    <div class="sidebar-footer">
      <a href="${resolveHref('/index.html')}" class="nav-link" data-tooltip="Keluar">
        <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
        <span class="nav-text">Keluar</span>
      </a>
    </div>
  </aside>
  `;

  return html;
}

// ============================================================
// RENDER HEADER
// ============================================================
function renderHeader(pageTitle, breadcrumb) {
  const user = (typeof DEMO_DATA !== 'undefined') ? DEMO_DATA.currentUser : { name: 'Admin', role: 'Admin', avatar: 'AD' };

  return `
  <header class="app-header">
    <div class="header-left">
      <button class="btn-toggle-sidebar" id="btnToggleSidebar" title="Toggle Sidebar">
        <i class="fas fa-bars"></i>
      </button>
      <nav class="page-breadcrumb">
        <span>BengkelServis</span>
        <i class="fas fa-chevron-right" style="font-size:0.65rem"></i>
        ${breadcrumb ? `<span>${breadcrumb}</span><i class="fas fa-chevron-right" style="font-size:0.65rem"></i>` : ''}
        <span class="breadcrumb-current">${pageTitle}</span>
      </nav>
    </div>

    <div class="header-right">
      <!-- Tombol Notifikasi -->
      <button class="header-action-btn" title="Notifikasi" onclick="showToast('Belum ada notifikasi baru.', 'info')">
        <i class="fas fa-bell"></i>
        <span class="notif-dot"></span>
      </button>

      <!-- Divider -->
      <div class="header-divider"></div>

      <!-- User Menu -->
      <div class="dropdown">
        <div class="user-menu" data-dropdown="userDropdown">
          <div class="user-avatar">${user.avatar}</div>
          <div class="user-info">
            <span class="user-name">${user.name}</span>
            <span class="user-role">${user.role}</span>
          </div>
          <i class="fas fa-chevron-down" style="font-size:0.7rem;color:var(--color-text-muted);margin-left:4px"></i>
        </div>
        <div class="dropdown-menu" id="userDropdown">
          <a class="dropdown-item" href="#">
            <i class="fas fa-user-circle"></i> Profil Saya
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cog"></i> Pengaturan
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item danger" href="../index.html">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </div>
      </div>
    </div>
  </header>
  `;
}

// ============================================================
// RENDER LAYOUT LENGKAP (Sidebar + Header + Konten)
// ============================================================
function renderLayout(options) {
  /**
   * options = {
   *   pageTitle: string,   // judul halaman (header & tab browser)
   *   breadcrumb: string,  // teks breadcrumb opsional
   *   content: string,     // HTML konten halaman
   * }
   *
   * activePage tidak perlu diberikan — renderSidebar() sudah
   * mendeteksi halaman aktif otomatis dari window.location.
   */
  const app = document.getElementById('app');
  if (!app) return;

  // Tambahkan class app-wrapper agar layout flex bekerja
  app.classList.add('app-wrapper');

  app.innerHTML = `
    ${renderSidebar()}
    <div class="mobile-overlay" id="mobileOverlay"></div>
    <div class="main-content" id="mainContent">
      ${renderHeader(options.pageTitle || 'Halaman', options.breadcrumb || '')}
      <main class="page-content">
        ${options.content || ''}
      </main>
    </div>
    <div class="toast-container" id="toastContainer"></div>
  `;
}
