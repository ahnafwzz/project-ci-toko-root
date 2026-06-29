<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="<?= base_url('root/dashboard') ?>" class="logo d-flex align-items-center text-decoration-none">
      <img src="<?= base_url() ?>NiceAdmin/assets/img/logo.png" alt="">
      <span class="d-none d-lg-block" style="color: #D4AF37; font-weight: 700;">Toko</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn" style="color: #D4AF37;"></i>
  </div>

  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword" style="background: rgba(255,255,255,0.05); color: #E5E7EB; border: 1px solid rgba(212, 175, 55, 0.3);">
      <button type="submit" title="Search"><i class="bi bi-search" style="color: #D4AF37;"></i></button>
    </form>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search" style="color: #D4AF37;"></i>
        </a>
      </li>

      <li class="nav-item dropdown me-3">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" style="color: #94A3B8;">
          <i class="bi bi-bell"></i>
          <span class="badge bg-warning badge-number text-dark">4</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            You have 4 new notifications
            <a href="#"><span class="badge rounded-pill bg-warning text-dark p-2 ms-2">View all</span></a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <h4>Lorem Ipsum</h4>
              <p>Quae dolorem earum veritatis oditseno</p>
              <p>30 min. ago</p>
            </div>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-footer">
            <a href="#">Show all notifications</a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown" style="border-right: 1px solid rgba(255,255,255,0.1); padding-right: 15px; margin-right: 15px;">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" style="color: #94A3B8;">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">3</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">
            You have 3 new messages
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          </li>
          <li><hr class="dropdown-divider"></li>
          
          <li class="message-item">
            <a href="#">
              <img src="<?= base_url() ?>NiceAdmin/assets/img/messages-1.jpg" alt="" class="rounded-circle">
              <div>
                <h4>Maria Hudson</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>4 hrs. ago</p>
              </div>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-footer">
            <a href="#">Show all messages</a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= base_url() ?>NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" style="border: 2px solid #D4AF37;">
          <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize" style="color: #E5E7EB;"><?= session()->get('username'); ?> (<?= session()->get('role'); ?>)</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          
          <li class="dropdown-header text-capitalize text-center">
            <h6 class="mb-1" style="color: #D4AF37; font-weight: 700; font-size: 1.15rem; letter-spacing: 0.5px;"><?= session()->get('username'); ?></h6>
            <span style="color: #94A3B8; font-size: 0.85rem; font-weight: 500;"><?= session()->get('role'); ?> Master</span>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile') ?>">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile/edit') ?>">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('faq') ?>">
              <i class="bi bi-question-circle"></i>
              <span>Need Help?</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout') ?>">
              <i class="bi bi-box-arrow-right text-danger"></i>
              <span class="text-danger">Sign Out</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>

</header>