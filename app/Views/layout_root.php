<?php
if (!isset($hlm)) {
  $hlm = "Operations Dashboard";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Root System - <?= $hlm ?></title>
  
  <link href="<?= base_url() ?>NiceAdmin/assets/img/favicon.png" rel="icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="<?= base_url() ?>NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>NiceAdmin/assets/css/style.css" rel="stylesheet">

  <style>
    /* =========================================================
       1. CSS TEMA DARK GOLD (BASE)
       ========================================================= */
    body, #main { background-color: #0B0F19; color: #E5E7EB; }
    .header, .sidebar { background-color: #111827; border-color: rgba(255,255,255,0.05); box-shadow: none; }
    .header { border-bottom: 1px solid rgba(255,255,255,0.05); }
    .sidebar { border-right: 1px solid rgba(255,255,255,0.05); }
    .logo span { color: #D4AF37 !important; font-weight: 700; letter-spacing: 1px;}
    .header .toggle-sidebar-btn { color: #D4AF37; }
    .card { background-color: #1F2937; border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.4); }
    .card-title { color: #D4AF37; font-family: "Poppins", sans-serif; }
    .card-title span { color: #94A3B8; }
    h1, h2, h3, h4, h5, h6, .pagetitle h1 { color: #E5E7EB; }
    .text-muted, .breadcrumb-item, .nav-heading { color: #94A3B8 !important; }
    .breadcrumb-item.active { color: #D4AF37 !important; }
    .breadcrumb-item a { color: #E5E7EB; transition: 0.3s; }
    .breadcrumb-item a:hover { color: #D4AF37; }
    
    /* =========================================================
       2. SIDEBAR & MENU DROPDOWN
       ========================================================= */
    .sidebar-nav .nav-link { background-color: rgba(212, 175, 55, 0.1); color: #D4AF37; border-radius: 8px; transition: all 0.3s ease; }
    .sidebar-nav .nav-link.collapsed { color: #94A3B8; background: transparent; }
    .sidebar-nav .nav-link:hover { color: #D4AF37; background-color: rgba(212, 175, 55, 0.15); }
    .sidebar-nav .nav-link i { color: #D4AF37; }
    .sidebar-nav .nav-link.collapsed i { color: #94A3B8; }
    
    .dropdown-menu { background-color: #1F2937; border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
    .dropdown-menu .dropdown-item, .dropdown-menu .dropdown-header, .dropdown-menu h4, .dropdown-menu p { color: #E5E7EB !important; }
    .dropdown-menu .dropdown-item:hover, .message-item:hover { background-color: rgba(212, 175, 55, 0.15); border-radius: 6px; }
    .dropdown-divider { border-top-color: rgba(255,255,255,0.05); }

    /* =========================================================
       3. KOMPONEN UMUM (BADGE, TAB, ACCORDION)
       ========================================================= */
    .badge.bg-success { background-color: rgba(46, 202, 106, 0.15) !important; color: #4ade80; border: 1px solid rgba(46, 202, 106, 0.3);}
    .badge.bg-danger { background-color: rgba(220, 53, 69, 0.15) !important; color: #f87171; border: 1px solid rgba(220, 53, 69, 0.3);}
    
    .nav-tabs { border-bottom-color: rgba(255,255,255,0.05); }
    .nav-tabs .nav-link { color: #94A3B8; background: transparent; border: none; transition: 0.3s; }
    .nav-tabs .nav-link:hover { color: #D4AF37; }
    .nav-tabs .nav-link.active { background-color: transparent !important; color: #D4AF37 !important; border-bottom: 2px solid #D4AF37 !important; }

    .accordion-item { background-color: transparent !important; border: 1px solid rgba(255,255,255,0.05) !important; border-radius: 8px; overflow: hidden; }
    .accordion-button { background-color: #1F2937 !important; color: #E5E7EB !important; box-shadow: none !important; }
    .accordion-button:not(.collapsed) { background-color: rgba(212, 175, 55, 0.1) !important; color: #D4AF37 !important; }
    .accordion-body { color: #E5E7EB !important; background-color: #1F2937 !important; }
    .accordion-button::after { filter: invert(1) grayscale(100%) brightness(200%); }

    /* =========================================================
       4. ULTIMATE OVERRIDE: DATATABLES & BOOTSTRAP TABLE
       ========================================================= */
    .table thead th, .dataTable-table thead th, .dataTable-table > thead > tr > th {
        background-color: #111827 !important; color: #D4AF37 !important; border-bottom: 2px solid rgba(212, 175, 55, 0.3) !important;
    }
    .dataTable-table > thead > tr > th a { color: #D4AF37 !important; }
    .table tbody tr td, .table tbody tr th, .dataTable-table > tbody > tr > td, .dataTable-table > tbody > tr > th {
        background-color: transparent !important; border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important; color: #E5E7EB !important;
    }
    .dataTable-search input, .dataTable-selector {
        background-color: #111827 !important; color: #E5E7EB !important; border: 1px solid rgba(255, 255, 255, 0.2) !important; border-radius: 6px;
    }
    .dataTable-search input:focus, .dataTable-selector:focus {
        border-color: #D4AF37 !important; outline: none !important; box-shadow: 0 0 5px rgba(212, 175, 55, 0.5) !important;
    }
    .dataTable-info { color: #94A3B8 !important; }
    .dataTable-pagination a { color: #94A3B8 !important; border: none !important; border-radius: 6px; }
    .dataTable-pagination a:hover { background-color: rgba(212, 175, 55, 0.1) !important; color: #D4AF37 !important; }
    .dataTable-pagination .active a { background-color: rgba(212, 175, 55, 0.2) !important; color: #D4AF37 !important; font-weight: bold; }

    /* =========================================================
       5. 🚀 SUPER FIX: FORM & MODAL (POP-UP) DARK MODE
       ========================================================= */
    .modal-content { background-color: #1F2937 !important; color: #E5E7EB !important; border: 1px solid rgba(212,175,55,0.3); border-radius: 16px; box-shadow: 0 15px 35px rgba(0,0,0,0.6); }
    .modal-header, .modal-footer { border-color: rgba(255,255,255,0.08) !important; }
    .modal-title { color: #D4AF37 !important; font-weight: 600; }
    .form-label { color: #94A3B8 !important; font-weight: 500; font-size: 0.9rem; }
    
    .form-control, .form-select { 
        background-color: #111827 !important; 
        color: #E5E7EB !important; 
        border: 1px solid rgba(255,255,255,0.15) !important; 
        border-radius: 8px; 
        transition: all 0.3s ease; 
    }
    .form-control:focus, .form-select:focus { 
        border-color: #D4AF37 !important; 
        box-shadow: 0 0 0 0.25rem rgba(212,175,55,0.2) !important; 
    }
    .form-control:read-only { background-color: rgba(17,24,39,0.6) !important; color: #94A3B8 !important; }
    .btn-close { filter: invert(1) grayscale(100%) brightness(200%); }

    /* =========================================================
       6. 🚀 SUPER FIX: SELECT2 (DROPDOWN KELURAHAN & LAYANAN)
       ========================================================= */
    .select2-container--default .select2-selection--single { 
        background-color: #111827 !important; 
        border: 1px solid rgba(255,255,255,0.15) !important; 
        border-radius: 8px !important; 
        height: 40px; 
        display: flex; 
        align-items: center; 
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered { 
        color: #E5E7EB !important; 
        padding-left: 14px; 
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow { height: 38px; right: 8px; }
    
    .select2-dropdown { 
        background-color: #1F2937 !important; 
        border: 1px solid rgba(212,175,55,0.3) !important; 
        border-radius: 8px !important; 
        overflow: hidden; 
        box-shadow: 0 8px 16px rgba(0,0,0,0.5); 
    }
    .select2-search--dropdown .select2-search__field { 
        background-color: #111827 !important; 
        color: #E5E7EB !important; 
        border: 1px solid rgba(255,255,255,0.15) !important; 
        border-radius: 6px; 
    }
    .select2-container--default .select2-results__option { color: #94A3B8 !important; padding: 10px 14px; }
    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable { 
        background-color: rgba(212,175,55,0.15) !important; 
        color: #D4AF37 !important; 
    }
    /* =========================================================
       7. FIX: SEGITIGA PANAH DROPDOWN PROFIL
       ========================================================= */
    .dropdown-menu-arrow::before {
        background-color: #1F2937 !important; 
        border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-left: 1px solid rgba(255, 255, 255, 0.1) !important;
    }
    /* =========================================================
       8. FINAL FIX: EFEK HOVER PUTIH & TEKS REDUP SELECT2
       ========================================================= */
       
    /* 1. Mencegah background putih saat hover di Dropdown Profil */
    .dropdown-menu .dropdown-item:hover,
    .dropdown-menu .dropdown-item:focus {
        background-color: rgba(212, 175, 55, 0.15) !important;
        color: #D4AF37 !important;
        border-radius: 6px;
    }

    /* 2. Menerangkan warna teks dasar pada pilihan Kelurahan/Layanan */
    .select2-container--default .select2-results__option {
        color: #E5E7EB !important; 
    }

    /* 3. Memberi efek sorot (hover) keemasan pada pilihan Select2 */
    .select2-container--default .select2-results__option--highlighted,
    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable,
    .select2-container--default .select2-results__option[aria-selected="true"] {
        background-color: rgba(212, 175, 55, 0.2) !important;
        color: #D4AF37 !important;
    }
  </style>
</head>

<body>

  <?= $this->include('components/root/header') ?>
  
  <?= $this->include('components/root/sidebar') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1><?= $hlm; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('root/dashboard') ?>">System</a></li>
          <?php if ($hlm != "Operations Dashboard") : ?>
            <li class="breadcrumb-item active"><?= $hlm; ?></li>
          <?php endif; ?>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <?= $this->renderSection('content') ?>
    </section>
  </main>

  <?= $this->include('components/root/footer') ?>

  <script src="<?= base_url() ?>NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>NiceAdmin/assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

  <?= $this->renderSection('script') ?>
</body>
</html>