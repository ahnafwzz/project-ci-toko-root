<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="<?= base_url('root/dashboard') ?>" class="logo d-flex align-items-center text-decoration-none">
      <img src="<?= base_url() ?>NiceAdmin/assets/img/logo.png" alt="">
      <span class="d-none d-lg-block text-gold fw-bold tracking-wide">Toko</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn text-gold cursor-pointer transition-300"></i>
  </div>

  <!-- OMNIBOX SYSTEM (INTELLIGENT GLOBAL SEARCH & AUTOCOMPLETE) -->
  <div class="search-bar ms-4 position-relative">
    <form id="globalSearchForm" class="search-form d-flex align-items-center">
      <input type="text" id="globalSearchInput" placeholder="Ketik menu atau cari produk... (Ctrl+K)" autocomplete="off">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
    
    <!-- KOTAK SARAN AUTOCOMPLETE -->
    <ul id="searchSuggestionsBox" class="dropdown-menu w-100 mt-2 suggestion-box"></ul>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center mb-0">

      <!-- ICON NOTIFIKASI LONCENG -->
      <li class="nav-item dropdown me-2">
        <a class="nav-link nav-icon position-relative" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-warning text-dark position-absolute custom-badge border-dark-bg">4</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">You have 4 new notifications</li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-footer"><a href="#">Show all notifications</a></li>
        </ul>
      </li>

      <!-- ICON PESAN CHAT (Dengan Garis Pemisah Vertikal) -->
      <li class="nav-item dropdown divider-right pe-3 me-3">
        <a class="nav-link nav-icon position-relative" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success position-absolute custom-badge border-dark-bg">3</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">You have 3 new messages</li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-footer"><a href="#">Show all messages</a></li>
        </ul>
      </li>

      <!-- AREA PROFIL -->
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= base_url() ?>NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle profile-img-gold">
          <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize text-light fw-medium">
            <?= session()->get('username'); ?> (<?= session()->get('role'); ?>)
          </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header text-capitalize text-center">
            <h6 class="mb-1 text-gold fw-bold fs-5 letter-spacing-1"><?= session()->get('username'); ?></h6>
            <span class="text-muted-light fs-7 fw-medium"><?= session()->get('role'); ?> Master</span>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile') ?>">
              <i class="bi bi-person"></i><span>My Profile</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile/edit') ?>">
              <i class="bi bi-gear"></i><span>Account Settings</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('faq') ?>">
              <i class="bi bi-question-circle"></i><span>Need Help?</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout') ?>">
              <i class="bi bi-box-arrow-right text-danger"></i><span class="text-danger">Sign Out</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>

</header>

<!-- =========================================================
     STYLING VISUAL KHUSUS HEADER & OMNIBOX
     ========================================================= -->
<style>
  /* Utility Classes untuk meminimalisir inline CSS di HTML */
  .text-gold { color: #D4AF37 !important; }
  .text-muted-light { color: #94A3B8 !important; }
  .tracking-wide { letter-spacing: 1px; }
  .cursor-pointer { cursor: pointer; }
  .transition-300 { transition: 0.3s; }
  .fs-7 { font-size: 0.85rem; }
  
  /* Icon Navigation Utilities */
  .header-nav .nav-icon { color: #94A3B8 !important; font-size: 1.4rem; padding: 8px; }
  .custom-badge { top: 2px; right: -2px; font-size: 0.65rem; padding: 3px 5px; border-radius: 50%; font-weight: 800; }
  .border-dark-bg { border: 2px solid #111827; }
  .divider-right { border-right: 1px solid rgba(255, 255, 255, 0.1); }
  .profile-img-gold { border: 2px solid #D4AF37; box-shadow: 0 0 8px rgba(212,175,55,0.4); }

  /* Desain Glassmorphism Search Bar */
  .search-form { position: relative; }
  .search-form input {
    background-color: rgba(255, 255, 255, 0.05) !important;
    color: #E5E7EB !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    border-radius: 25px !important;
    padding: 8px 45px 8px 20px !important;
    font-size: 0.9rem !important;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
    width: 280px;
  }
  .search-form input:focus {
    background-color: rgba(255, 255, 255, 0.08) !important;
    border-color: #D4AF37 !important;
    box-shadow: 0 0 12px rgba(212, 175, 55, 0.3) !important;
    outline: none !important;
    width: 380px;
  }
  .search-form input::placeholder { color: rgba(255, 255, 255, 0.4) !important; }
  
  .search-form button {
    position: absolute; right: 10px; background: transparent !important; border: none !important; color: #D4AF37 !important; transition: transform 0.3s ease;
  }
  .search-form button:hover { transform: scale(1.1); }

  /* Desain Kotak Autocomplete */
  .suggestion-box {
    background: #1F2937 !important; 
    border: 1px solid rgba(212,175,55,0.3) !important; 
    box-shadow: 0 10px 25px rgba(0,0,0,0.5) !important; 
    display: none; 
    position: absolute; 
    top: 100%; 
    left: 0; 
    padding: 0 !important; 
    z-index: 1050; 
    border-radius: 12px !important; 
    overflow: hidden;
  }
  .suggestion-box li a {
    display: block; padding: 10px 15px; color: #E5E7EB; text-decoration: none; transition: 0.2s; border-bottom: 1px solid rgba(255,255,255,0.05);
  }
  .suggestion-box li a:hover {
    background-color: rgba(212, 175, 55, 0.15); color: #D4AF37;
  }
  .suggestion-box li:last-child a { border-bottom: none; }
</style>

<!-- =========================================================
     🚀 JAVASCRIPT OMNIBOX & LIVE SEARCH SYSTEM
     ========================================================= -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('globalSearchForm');
    const searchInput = document.getElementById('globalSearchInput');
    const suggestionBox = document.getElementById('searchSuggestionsBox');
    
    const userRole = '<?= session()->get('role') ?>';
    const baseUrl = '<?= base_url() ?>';
    let debounceTimer;

    // 1. Peta Navigasi Super Pintar (Smart Keyword Mapping)
    const smartRoutes = [
      { url: baseUrl + 'faq', keywords: ['faq', 'bantuan', 'help', 'tanya', 'mengapa', 'bagaimana', 'apa', 'cara'] },
      { url: baseUrl + 'profile', keywords: ['profile', 'profil', 'akun', 'password', 'nama', 'email', 'setting'] },
      { url: baseUrl + 'history', keywords: ['history', 'riwayat', 'transaksi', 'pesanan', 'beli', 'order'] },
      { url: baseUrl + 'keranjang', keywords: ['keranjang', 'cart', 'belanja'] },
      { url: baseUrl + 'root/users', keywords: ['user', 'pengguna', 'kasta', 'admin'] },
      { url: baseUrl + 'root/maintenance', keywords: ['maintenance', 'perbaikan', 'rusak', 'down'] },
      { url: baseUrl + 'root/audit', keywords: ['audit', 'log', 'aktivitas', 'rekam'] }
    ];

    // 2. Fitur Live Search (Autocomplete AJAX)
    searchInput.addEventListener('input', function() {
      clearTimeout(debounceTimer);
      let query = this.value.trim().toLowerCase();

      if (query.length < 2) {
        suggestionBox.style.display = 'none';
        return;
      }

      debounceTimer = setTimeout(() => {
        fetch(baseUrl + 'search/suggestions?q=' + encodeURIComponent(query))
          .then(response => response.json())
          .then(data => {
            suggestionBox.innerHTML = ''; 

            let menuSuggestions = '';
            for (let route of smartRoutes) {
              if (route.keywords.some(k => k.includes(query))) {
                if (route.url.includes('/root/') && userRole !== 'root') continue;
                menuSuggestions += `<li><a href="${route.url}"><i class="bi bi-link-45deg me-2 text-muted-light"></i> Buka menu: <span class="text-gold fw-bold">${route.keywords[0].toUpperCase()}</span></a></li>`;
              }
            }

            let dbSuggestions = '';
            if (data && data.length > 0) {
              data.forEach(item => {
                dbSuggestions += `<li><a href="${item.url}"><i class="bi ${item.icon} me-2 text-muted-light"></i> ${item.text}</a></li>`;
              });
            }

            if (menuSuggestions || dbSuggestions) {
              suggestionBox.innerHTML = menuSuggestions + dbSuggestions;
              suggestionBox.style.display = 'block';
            } else {
              suggestionBox.style.display = 'none';
            }
          })
          .catch(error => console.error('Error fetching suggestions:', error));
      }, 300);
    });

    // 3. Logika Eksekusi saat form disubmit (Tekan Enter)
    searchForm.addEventListener('submit', function(e) {
      e.preventDefault();
      let query = searchInput.value.trim().toLowerCase();
      if (!query) return;

      let targetUrl = null;
      for (let route of smartRoutes) {
        if (route.keywords.some(k => query.includes(k))) {
          targetUrl = route.url;
          break; 
        }
      }

      if (targetUrl) {
        if (targetUrl.includes('/root/') && userRole !== 'root') {
          alert('Akses Ditolak: Kasta Anda tidak diizinkan mengakses menu ini.');
          return;
        }
        window.location.href = targetUrl;
      } else {
        // Lempar ke Search Controller
        window.location.href = baseUrl + 'search?q=' + encodeURIComponent(query);
      }
    });

    // 4. Shortcut Global Ctrl + K
    document.addEventListener('keydown', function(event) {
      if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
        event.preventDefault();
        if (searchInput) searchInput.focus();
      }
    });

    // 5. Tutup saran jika user klik di luar area search
    document.addEventListener('click', function(e) {
      if (!searchForm.contains(e.target) && !suggestionBox.contains(e.target)) {
        suggestionBox.style.display = 'none';
      }
    });
  });
</script>