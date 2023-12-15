      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= BASEURL; ?>/home" class="text-nowrap logo-img">
              <img src="<?= BASEURL; ?>/images/logos/dark-logo.svg" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/home" aria-expanded="false">
                  <span>
                    <i class="ti ti-home"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <!-- Master User - Only for Owner -->
              <!-- // if (isset($_SESSION['role']) && $_SESSION['role'] == 'Owner') {
              //   echo ' -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Master User</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?=BASEURL?>/user" aria-expanded="false">
                  <span>
                    <i class="ti ti-user-plus"></i>
                  </span>
                  <span class="hide-menu">User</span>
                </a>
              </li>
              <!-- // '; } -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Master Data</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/obat" aria-expanded="false">
                  <span>
                    <i class="ti ti-medicine-syrup"></i>
                  </span>
                  <span class="hide-menu">Obat</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/kategori" aria-expanded="false">
                  <span>
                    <i class="ti ti-category"></i>
                  </span>
                  <span class="hide-menu">Kategori</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/satuan" aria-expanded="false">
                  <span>
                    <i class="ti ti-list-details"></i>
                  </span>
                  <span class="hide-menu">Satuan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/supplier" aria-expanded="false">
                  <span>
                    <i class="ti ti-building-factory-2"></i>
                  </span>
                  <span class="hide-menu">Supplier</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Stok</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/opname" aria-expanded="false">
                  <span>
                    <i class="ti ti-clipboard-list"></i>
                  </span>
                  <span class="hide-menu">Opname</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/expire" aria-expanded="false">
                  <span>
                    <i class="ti ti-alarm"></i>
                  </span>
                  <span class="hide-menu">Expire</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Transaksi</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/pembelian" aria-expanded="false">
                  <span>
                    <i class="ti ti-shopping-cart"></i>
                  </span>
                  <span class="hide-menu">Pembelian</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/penjualan" aria-expanded="false">
                  <span>
                    <i class="ti ti-receipt"></i>
                  </span>
                  <span class="hide-menu">Penjualan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/hutang" aria-expanded="false">
                  <span>
                    <i class="ti ti-building-bank"></i>
                  </span>
                  <span class="hide-menu">Hutang</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/pembayaran" aria-expanded="false">
                  <span>
                    <i class="ti ti-credit-card"></i>
                  </span>
                  <span class="hide-menu">Pembayaran</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Laporan</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/laporan_obat" aria-expanded="false">
                  <span>
                    <i class="ti ti-pill"></i>
                  </span>
                  <span class="hide-menu">Laporan Obat</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/laporan_keuangan" aria-expanded="false">
                  <span>
                    <i class="ti ti-report-money"></i>
                  </span>
                  <span class="hide-menu">Laporan Keuangan</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Extra</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                  <span>
                    <i class="ti ti-help"></i>
                  </span>
                  <span class="hide-menu">FAQ</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                  <span>
                    <i class="ti ti-info-circle"></i>
                  </span>
                  <span class="hide-menu">About</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->