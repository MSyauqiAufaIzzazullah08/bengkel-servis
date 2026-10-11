/**
 * app.js
 * File ini berisi logika JavaScript utama:
 * - Toggle sidebar (buka/tutup)
 * - Sub-menu navigasi
 * - Dropdown user menu
 * - Modal (buka/tutup)
 * - Toast/notifikasi
 * - Tandai menu aktif berdasarkan URL halaman
 */

document.addEventListener('DOMContentLoaded', function () {

  // ============================================================
  // SIDEBAR TOGGLE
  // ============================================================
  const sidebar      = document.getElementById('sidebar');
  const mainContent  = document.getElementById('mainContent');
  const btnToggle    = document.getElementById('btnToggleSidebar');
  const mobileOverlay= document.getElementById('mobileOverlay');

  if (btnToggle && sidebar && mainContent) {
    btnToggle.addEventListener('click', function () {
      const isMobile = window.innerWidth <= 768;

      if (isMobile) {
        // Di layar kecil: geser sidebar keluar/masuk
        sidebar.classList.toggle('mobile-open');
        if (mobileOverlay) {
          mobileOverlay.classList.toggle('visible', sidebar.classList.contains('mobile-open'));
        }
      } else {
        // Di desktop: perkecil/perbesar sidebar
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
        // Simpan preferensi pengguna
        const isCollapsed = sidebar.classList.contains('collapsed');
        localStorage.setItem('sidebarCollapsed', isCollapsed);
      }
    });
  }

  // Tutup sidebar mobile saat klik overlay
  if (mobileOverlay) {
    mobileOverlay.addEventListener('click', function () {
      if (sidebar) sidebar.classList.remove('mobile-open');
      mobileOverlay.classList.remove('visible');
    });
  }

  // Terapkan preferensi sidebar dari localStorage
  const savedCollapsed = localStorage.getItem('sidebarCollapsed');
  if (savedCollapsed === 'true' && sidebar && mainContent && window.innerWidth > 768) {
    sidebar.classList.add('collapsed');
    mainContent.classList.add('expanded');
  }

  // ============================================================
  // SUBMENU NAVIGASI
  // ============================================================
  const submenuLinks = document.querySelectorAll('.nav-link.has-submenu');

  submenuLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const parent  = link.closest('.nav-item');
      const submenu = parent ? parent.querySelector('.nav-submenu') : null;
      if (!submenu) return;

      // Tutup submenu lain
      document.querySelectorAll('.nav-submenu.open').forEach(function (el) {
        if (el !== submenu) {
          el.classList.remove('open');
          const parentLink = el.closest('.nav-item')?.querySelector('.nav-link.has-submenu');
          if (parentLink) parentLink.classList.remove('open');
        }
      });

      submenu.classList.toggle('open');
      link.classList.toggle('open');
    });
  });

  // ============================================================
  // TANDAI MENU AKTIF
  // ============================================================
  function setActiveNavLink() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link[href], .nav-submenu .nav-link[href]');

    navLinks.forEach(function (link) {
      const href = link.getAttribute('href');
      if (!href || href === '#') return;

      // Cek apakah path URL cocok
      if (currentPath.endsWith(href) || currentPath.includes(href.replace('.html', ''))) {
        link.classList.add('active');

        // Buka submenu induk jika link ada di dalamnya
        const submenu = link.closest('.nav-submenu');
        if (submenu) {
          submenu.classList.add('open');
          const parentLink = submenu.closest('.nav-item')?.querySelector('.nav-link.has-submenu');
          if (parentLink) parentLink.classList.add('open');
        }
      }
    });
  }

  setActiveNavLink();

  // ============================================================
  // DROPDOWN (User Menu, dll)
  // ============================================================
  document.addEventListener('click', function (e) {
    const dropdownTriggers = document.querySelectorAll('[data-dropdown]');

    dropdownTriggers.forEach(function (trigger) {
      const targetId = trigger.getAttribute('data-dropdown');
      const target   = document.getElementById(targetId);
      if (!target) return;

      const wrapper = trigger.closest('.dropdown');

      if (trigger.contains(e.target)) {
        // Toggle dropdown yang diklik
        if (wrapper) wrapper.classList.toggle('open');
      } else if (!target.contains(e.target)) {
        // Tutup dropdown jika klik di luar
        if (wrapper) wrapper.classList.remove('open');
      }
    });
  });

  // ============================================================
  // MODAL
  // ============================================================
  window.openModal = function (modalId) {
    const overlay = document.getElementById(modalId);
    if (overlay) {
      overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
  };

  window.closeModal = function (modalId) {
    const overlay = document.getElementById(modalId);
    if (overlay) {
      overlay.classList.remove('open');
      document.body.style.overflow = '';
    }
  };

  // Tutup modal saat klik overlay
  document.querySelectorAll('.modal-overlay').forEach(function (overlay) {
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) {
        overlay.classList.remove('open');
        document.body.style.overflow = '';
      }
    });
  });

  // Tombol close modal
  document.querySelectorAll('[data-modal-close]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const modalId = btn.getAttribute('data-modal-close');
      window.closeModal(modalId);
    });
  });

  // Tombol open modal
  document.querySelectorAll('[data-modal-open]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const modalId = btn.getAttribute('data-modal-open');
      window.openModal(modalId);
    });
  });

  // ============================================================
  // TOAST / NOTIFIKASI
  // ============================================================
  window.showToast = function (message, type = 'info', duration = 3500) {
    const container = document.getElementById('toastContainer');
    if (!container) return;

    const icons = {
      success: '<i class="fas fa-check-circle" style="color:var(--color-success)"></i>',
      warning: '<i class="fas fa-exclamation-triangle" style="color:var(--color-warning)"></i>',
      error:   '<i class="fas fa-times-circle" style="color:var(--color-danger)"></i>',
      info:    '<i class="fas fa-info-circle" style="color:var(--color-info)"></i>',
    };

    const toast = document.createElement('div');
    toast.className = 'toast toast-' + type;
    toast.innerHTML = `
      ${icons[type] || icons.info}
      <span class="toast-message">${message}</span>
      <button class="toast-close" onclick="this.parentElement.remove()">
        <i class="fas fa-times"></i>
      </button>
    `;

    container.appendChild(toast);

    // Hapus otomatis setelah durasi
    setTimeout(function () {
      toast.style.opacity = '0';
      toast.style.transition = 'opacity 0.3s ease';
      setTimeout(function () { toast.remove(); }, 300);
    }, duration);
  };

  // ============================================================
  // KONFIRMASI HAPUS
  // ============================================================
  document.querySelectorAll('[data-confirm-delete]').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      const itemName = btn.getAttribute('data-confirm-delete') || 'data ini';
      const confirmed = confirm('Apakah Anda yakin ingin menghapus ' + itemName + '?\nTindakan ini tidak dapat dibatalkan.');
      if (!confirmed) {
        e.preventDefault();
        e.stopPropagation();
      }
    });
  });

  // ============================================================
  // VALIDASI FORM DASAR
  // ============================================================
  window.validateForm = function (formId) {
    const form = document.getElementById(formId);
    if (!form) return false;

    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');

    requiredFields.forEach(function (field) {
      const errorEl = field.closest('.form-group')?.querySelector('.form-error');
      if (!field.value.trim()) {
        field.classList.add('is-invalid');
        if (errorEl) {
          errorEl.innerHTML = '<i class="fas fa-exclamation-circle"></i> Kolom ini wajib diisi.';
          errorEl.style.display = 'flex';
        }
        isValid = false;
      } else {
        field.classList.remove('is-invalid');
        if (errorEl) errorEl.style.display = 'none';
      }
    });

    return isValid;
  };

  // Reset validasi saat mengetik
  document.querySelectorAll('.form-control[required]').forEach(function (field) {
    field.addEventListener('input', function () {
      field.classList.remove('is-invalid');
      const errorEl = field.closest('.form-group')?.querySelector('.form-error');
      if (errorEl) errorEl.style.display = 'none';
    });
  });

  // ============================================================
  // RESIZE HANDLER
  // ============================================================
  window.addEventListener('resize', function () {
    if (window.innerWidth > 768 && sidebar) {
      sidebar.classList.remove('mobile-open');
      if (mobileOverlay) mobileOverlay.classList.remove('visible');
    }
  });

});
