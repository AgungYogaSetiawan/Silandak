<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">SIPENTRAL APP</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.php">SA</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown">
        <a href="?page=dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Master Data</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="?page=barang">Barang</a></li>
          <li><a class="nav-link" href="?page=pengguna">Pengguna</a></li>
          <li><a class="nav-link" href="?page=kategori">Kategori</a></li>
          <li><a class="nav-link" href="?page=layanan">Layanan</a></li>
          <li><a class="nav-link" href="?page=pelanggan">Pelanggan</a></li>
        </ul>
      </li>
      <li class="menu-header">Transaksi</li>
      <?php
      if($_SESSION['peran'] == "admin" || $_SESSION['peran'] == "kasir") { ?>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fa fa-shopping-cart"></i> <span>Penjualan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="?page=data_penjualan">Data Penjualan</a></li>
          <li><a class="nav-link" href="?page=penjualan_create">Transaksi Penjualan</a></li>
        </ul>
      </li>
      <?php } ?>
    </ul>
  </aside>
</div>