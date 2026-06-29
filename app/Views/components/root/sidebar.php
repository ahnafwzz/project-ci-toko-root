<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">System Control</li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'root/dashboard') ? '' : 'collapsed' ?>" href="<?= base_url('root/dashboard') ?>">
                <i class="bi bi-cpu-fill"></i>
                <span>Ops Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'root/users') ? '' : 'collapsed' ?>" href="<?= base_url('root/users') ?>">
                <i class="bi bi-people-fill"></i>
                <span>User Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'root/maintenance') ? '' : 'collapsed' ?>" href="<?= base_url('root/maintenance') ?>">
                <i class="bi bi-hdd-network-fill"></i>
                <span>Maintenance Mode</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'root/audit') ? '' : 'collapsed' ?>" href="<?= base_url('root/audit') ?>">
                <i class="bi bi-journal-code"></i>
                <span>Audit Logs</span>
            </a>
        </li>


        <li class="nav-heading">Administrative Access</li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'produk') ? '' : 'collapsed' ?>" href="<?= base_url('produk') ?>">
                <i class="bi bi-receipt"></i>
                <span>Manajemen Produk</span>
            </a>
        </li>


        <li class="nav-heading">General Workspace</li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == '') ? '' : 'collapsed' ?>" href="<?= base_url('/') ?>">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'keranjang') ? '' : 'collapsed' ?>" href="<?= base_url('keranjang') ?>">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'history') ? '' : 'collapsed' ?>" href="<?= base_url('history') ?>">
                <i class="bi bi-clock-history"></i>
                <span>History</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'profile') ? '' : 'collapsed' ?>" href="<?= base_url('profile') ?>">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'faq') ? '' : 'collapsed' ?>" href="<?= base_url('faq') ?>">
                <i class="bi bi-question-circle"></i>
                <span>FAQ</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'contact') ? '' : 'collapsed' ?>" href="<?= base_url('contact') ?>">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

    </ul>

</aside>```
