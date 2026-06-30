<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="<?= base_url() ?>" class="logo d-flex align-items-center text-decoration-none">
      <img src="<?= base_url() ?>NiceAdmin/assets/img/logo.png" alt="">
      <span class="d-none d-lg-block fw-bold tracking-wide" style="color: #012970;">Toko</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn cursor-pointer transition-300" style="color: #012970;"></i>
  </div>

  <div class="search-bar ms-4 position-relative">
    <form id="globalSearchForm" class="modern-search-form d-flex align-items-center">
      <input type="text" id="globalSearchInput" placeholder="Ketik menu atau cari produk... (Ctrl+K)" autocomplete="off">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
    
    <ul id="searchSuggestionsBox" class="dropdown-menu w-100 mt-2 suggestion-box-light"></ul>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center mb-0">

      <li class="nav-item dropdown me-2">
        <a class="nav-link nav-icon position-relative" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary text-white position-absolute custom-badge border-light-bg">4</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">You have 4 new notifications</li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-footer"><a href="#">Show all notifications</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown divider-right pe-3 me-3">
        <a class="nav-link nav-icon position-relative" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success text-white position-absolute custom-badge border-light-bg">3</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">You have 3 new messages</li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-footer"><a href="#">Show all messages</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= base_url() ?>NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle profile-img-light">
          <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize fw-medium" style="color: #012970;">
            <?= session()->get('username'); ?> (<?= session()->get('role'); ?>)
          </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header text-capitalize text-center">
            <h6 class="mb-1 fw-bold fs-5 letter-spacing-1" style="color: #012970;"><?= session()->get('username'); ?></h6>
            <span class="text-muted fs-7 fw-medium"><?= session()->get('role'); ?></span>
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

<style>
  .tracking-wide { letter-spacing: 1px; }
  .cursor-pointer { cursor: pointer; }
  .transition-300 { transition: 0.3s; }
  .fs-7 { font-size: 0.85rem; }
  
  .header-nav .nav-icon { color: #899bbd !important; font-size: 1.4rem; padding: 8px; }
  .custom-badge { top: 2px; right: -2px; font-size: 0.65rem; padding: 3px 5px; border-radius: 50%; font-weight: 800; }
  .border-light-bg { border: 2px solid #ffffff; }
  .divider-right { border-right: 1px solid #ebeef4; }
  .profile-img-light { border: 2px solid #4154f1; box-shadow: 0 0 8px rgba(65, 84, 241, 0.2); }

  /* Desain Form Search Light Mode */
  .modern-search-form { position: relative; }
  .modern-search-form input {
    background-color: #f6f9ff !important;
    color: #012970 !important;
    border: 1px solid #e0e5f2 !important;
    border-radius: 25px !important;
    padding: 8px 45px 8px 20px !important;
    font-size: 0.9rem !important;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
    width: 280px;
  }
  .modern-search-form input:focus {
    background-color: #ffffff !important;
    border-color: #4154f1 !important;
    box-shadow: 0 0 12px rgba(65, 84, 241, 0.2) !important;
    outline: none !important;
    width: 380px;
  }
  .modern-search-form input::placeholder { color: #899bbd !important; }
  
  .modern-search-form button {
    position: absolute; right: 10px; background: transparent !important; border: none !important; color: #4154f1 !important; transition: transform 0.3s ease;
  }
  .modern-search-form button:hover { transform: scale(1.1); }

  /* Desain Kotak Autocomplete Light Mode */
  .suggestion-box-light {
    background: #ffffff !important; 
    border: 1px solid #e0e5f2 !important; 
    box-shadow: 0 10px 25px rgba(1, 41, 112, 0.1) !important; 
    display: none; 
    position: absolute; 
    top: 100%; 
    left: 0; 
    padding: 0 !important; 
    z-index: 1050; 
    border-radius: 12px !important; 
    overflow: hidden;
  }
  .suggestion-box-light li a {
    display: block; padding: 10px 15px; color: #444444; text-decoration: none; transition: 0.2s; border-bottom: 1px solid #f6f9ff;
  }
  .suggestion-box-light li a:hover {
    background-color: #f6f9ff; color: #4154f1;
  }
  .suggestion-box-light li:last-child a { border-bottom: none; }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('globalSearchForm');
    const searchInput = document.getElementById('globalSearchInput');
    const suggestionBox = document.getElementById('searchSuggestionsBox');
    
    const userRole = '<?= session()->get('role') ?>';
    const baseUrl = '<?= base_url() ?>';
    let debounceTimer;

    const smartRoutes = [
      { url: baseUrl + 'faq', keywords: ['faq', 'bantuan', 'help', 'tanya', 'mengapa', 'bagaimana', 'apa', 'cara'] },
      { url: baseUrl + 'profile', keywords: ['profile', 'profil', 'akun', 'password', 'nama', 'email', 'setting'] },
      { url: baseUrl + 'history', keywords: ['history', 'riwayat', 'transaksi', 'pesanan', 'beli', 'order'] },
      { url: baseUrl + 'keranjang', keywords: ['keranjang', 'cart', 'belanja'] },
      { url: baseUrl + 'root/users', keywords: ['user', 'pengguna', 'kasta', 'admin'] },
      { url: baseUrl + 'root/maintenance', keywords: ['maintenance', 'perbaikan', 'rusak', 'down'] },
      { url: baseUrl + 'root/audit', keywords: ['audit', 'log', 'aktivitas', 'rekam'] }
    ];

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
                menuSuggestions += `<li><a href="${route.url}"><i class="bi bi-link-45deg me-2" style="color: #899bbd;"></i> Buka menu: <span style="color: #4154f1; font-weight: bold;">${route.keywords[0].toUpperCase()}</span></a></li>`;
              }
            }

            let dbSuggestions = '';
            if (data && data.length > 0) {
              data.forEach(item => {
                dbSuggestions += `<li><a href="${item.url}"><i class="bi ${item.icon} me-2" style="color: #899bbd;"></i> ${item.text}</a></li>`;
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
        window.location.href = baseUrl + 'search?q=' + encodeURIComponent(query);
      }
    });

    document.addEventListener('keydown', function(event) {
      if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
        event.preventDefault();
        if (searchInput) searchInput.focus();
      }
    });

    document.addEventListener('click', function(e) {
      if (!searchForm.contains(e.target) && !suggestionBox.contains(e.target)) {
        suggestionBox.style.display = 'none';
      }
    });
  });
</script>