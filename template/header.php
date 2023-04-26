<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Aplikasi Pelayanan Online Kecamatan Banua Lawas</title>

<!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo_tabalong_mini.png">
<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- icon -->
<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


<!-- data tables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/components.css">
</head>

<body class="layout-3">
<div id="app">
<div class="main-wrapper container">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar container">
        <a href="beranda" class="navbar-brand sidebar-gone-hide"><img src="assets/img/logo_tabalong_mini.png" alt="logo" width="32"></a>
        <div class="navbar-nav">
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active h6 mt-2"><a href="beranda" class="nav-link">Aplikasi Pelayanan Online Kecamatan Banua Lawas</a></li>
            </ul>
        </div>
        <form class="form-inline ml-auto"></form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <strong><?php echo $_SESSION['username'] ?></strong></div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Anda login sebagai <?php echo $_SESSION['peran'] ?></div>
                <?php if($_SESSION["peran"] == "warga"){ ?>
                <a href="profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
                </a>
                <?php } ?>
                <?php if($_SESSION["peran"] == "admin kecamatan"){ ?>
                <a href="pesan" class="dropdown-item has-icon">
                <i class="far fa-envelope"></i> Pesan
                </a>
                <?php } ?>
                <a href="gantipassword" class="dropdown-item has-icon">
                <i class="fas fa-exchange-alt"></i> Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="login/logout.php" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </div>
            </li>
        </ul>
    </nav>

    
    <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
            <ul class="navbar-nav">
                <?php if($_SESSION['peran'] == 'admin desa') {?>
                <li class="nav-item">
                    <a href="beranda" class="nav-link"><i class="fas fa-home"></i><span class="font-weight-bold">Beranda</span></a>
                </li>
                <li class="nav-item">
                    <a href="lapor" class="nav-link"><i class="fas fa-exclamation-circle"></i><span class="font-weight-bold">Pengaduan</span></a>
                </li>
                <li class="nav-item">
                    <a href="faq" class="nav-link"><i class="fas fa-question-circle"></i><span class="font-weight-bold">FAQ</span></a>
                </li>

                <li class="nav-item">
                    <a href="about" class="nav-link"><i class="fas fa-tags"></i><span class="font-weight-bold">Tentang</span></a>
                </li>
                <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-folder-open"></i><span class="font-weight-bold">Laporan</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="datakependudukan" class="nav-link">Data Kependudukan</a></li>
                    </ul>
                </li>
                <?php } ?>


                <?php if($_SESSION['peran'] == "warga"){?>
                <li class="nav-item">
                    <a href="beranda" class="nav-link"><i class="fas fa-home"></i><span class="font-weight-bold">Beranda</span></a>
                </li>
                <li class="nav-item">
                    <a href="lapor" class="nav-link"><i class="fas fa-exclamation-circle"></i><span class="font-weight-bold">Pengaduan</span></a>
                </li>
                <li class="nav-item">
                    <a href="faq" class="nav-link"><i class="fas fa-question-circle"></i><span class="font-weight-bold">FAQ</span></a>
                </li>

                <li class="nav-item">
                    <a href="about" class="nav-link"><i class="fas fa-tags"></i><span class="font-weight-bold">Tentang</span></a>
                </li>

                <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-folder-open"></i><span class="font-weight-bold">Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="datakependudukan" class="nav-link">Data Kependudukan</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-file"></i><span class="font-weight-bold">Permohonan <span class="badge-notif" data-badge="20"></span> <span class="badge-notif-done" data-badge-done="20"></span> <span class="badge-notif-new" data-badge-new="20"></span></span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="permohonankartukeluarga" class="nav-link">Kartu Keluarga <span class="badge badge-success">4</span></a></li>
                        <li class="nav-item"><a href="datakependudukan" class="nav-link">Akta Lahir <span class="badge badge-success">4</span></a></li>
                        <li class="nav-item"><a href="datakependudukan" class="nav-link">Surat Pindah <span class="badge badge-success">4</span></a></li>
                        <li class="nav-item"><a href="datakependudukan" class="nav-link">Akta Kematian <span class="badge badge-success">4</span></a></li>
                        <li class="nav-item"><a href="datakependudukan" class="nav-link">Surat Pindah Datang <span class="badge badge-success">4</span></a></li>
                        <li class="nav-item"><a href="datakependudukan" class="nav-link">Biodata WNI <span class="badge badge-success">4</span></a></li>
                        <li class="nav-item"><a href="datakependudukan" class="nav-link">Rekam KTP <span class="badge badge-success">4</span></a></li>
                    </ul>
                </li>
                <?php } ?>

                <?php if($_SESSION['peran'] == "admin kecamatan") {?>
                <li class="nav-item">
                    <a href="beranda" class="nav-link"><i class="fas fa-home"></i><span class="font-weight-bold">Beranda</span></a>
                </li>
                <li class="nav-item">
                    <a href="users" class="nav-link"><i class="fas fa-user"></i><span class="font-weight-bold">Data User</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-exclamation-circle"></i><span class="font-weight-bold">Pengaduan</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href='aduan' class='nav-link text-dark'>Pengaduan</a></li>
                        <li class="dropdown-item"><a href="aspirasi" class="nav-link text-dark">Aspirasi</a></li>
                        <li class="dropdown-item"><a href="informasi" class="nav-link text-dark">Permintaan Informasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span class="font-weight-bold">Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Data Kependudukan <span class='badge badge-success'>4</span></a></li>
                    </ul>
                </li>
                <!-- list data baru -->
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-folder-plus"></i><span class="font-weight-bold">Data Baru <span class="badge-notif-new" data-badge-new="20"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href='dataBaruKartuKeluarga' class='nav-link text-dark'><span class="badge-notif" data-badge="20">Kartu Keluarga</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Akta Lahir <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Surat Pindah <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Akta Kematian <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark"> <span class="badge-notif" data-badge="20">Surat Pindah Datang</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Biodata WNI <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Rekam KTP <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                    </ul>
                </li>

                <!-- data in progress -->
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-tasks"></i><span class="font-weight-bold">In Progress <span class="badge-notif" data-badge="20"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href='dataProgressKartuKeluarga' class='nav-link text-dark'>Kartu Keluarga <span class='badge badge-success'>4</span> <span class='badge badge-success'>4</span> <span class='badge badge-success'>4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark ">Akta Lahir <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark ">Surat Pindah <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark ">Akta Kematian <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark ">Surat Pindah Datang <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark ">Biodata WNI <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark ">Rekam KTP <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                    </ul>
                </li>

                <!-- data selesai -->
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-clipboard-check"></i><span class="font-weight-bold">Data Selesai <span class="badge-notif-done" data-badge-done="20"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href='dataSelesaiKartuKeluarga' class='nav-link text-dark'>Kartu Keluarga <span class='badge badge-success'>4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Akta Lahir <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Surat Pindah <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Akta Kematian <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Surat Pindah Datang <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Biodata WNI <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                        <li class="dropdown-item"><a href="datakependudukan" class="nav-link text-dark">Rekam KTP <span class="badge badge-success">4</span> <span class="badge badge-success">4</span> <span class="badge badge-success">4</span></a></li>
                    </ul>
                </li>
                
                <?php } ?>
            </ul>
        </div>
    </nav>