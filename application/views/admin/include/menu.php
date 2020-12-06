<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin') ?>" class="brand-link">
        <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>ADMIN SAEBERKAH</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/beranda') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'beranda' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <!-- Menu Pelanggan -->
                <li class="nav-item <?php echo $this->uri->segment(2) == 'pelanggan' ? 'menu-is-opening menu-open' : '' ?>">
                    <a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'pelanggan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Menu Pelanggan
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pelanggan/pelanggan') ?>" class="nav-link <?php echo $this->uri->segment(3) == 'pelanggan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pelanggan/pesanan') ?>" class="nav-link <?php echo $this->uri->segment(3) == 'pesanan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pesanan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Menu Gudang -->
                <li class="nav-item <?php echo $this->uri->segment(2) == 'gudang' ? 'menu-is-opening menu-open' : '' ?>">
                    <a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'gudang' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Menu Gudang
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/gudang/kategori') ?>" class="nav-link <?php echo $this->uri->segment(3) == 'kategori' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/gudang/produk') ?>" class="nav-link <?php echo $this->uri->segment(3) == 'produk' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Menu Admin -->
                <li class="nav-item <?php echo $this->uri->segment(2) == 'menu_admin' ? 'menu-is-opening menu-open' : '' ?>">
                    <a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'menu_admin' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Menu Admin
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/menu_admin/admin') ?>" class="nav-link <?php echo $this->uri->segment(3) == 'admin' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/menu_admin/laporan') ?>" class="nav-link <?php echo $this->uri->segment(3) == 'laporan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>