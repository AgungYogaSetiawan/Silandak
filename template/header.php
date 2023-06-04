<?php include 'fungsi_notif.php'; ?>

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
        <a href="?page=beranda" class="navbar-brand sidebar-gone-hide"><img src="assets/img/logo_tabalong_mini.png" alt="logo" width="32"></a>
        <div class="navbar-nav">
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
            <ul class="navbar-nav">
                <!-- <li class="nav-item active h6 mt-2"><a href="?page=beranda" class="nav-link">Aplikasi Pelayanan Online Kecamatan Banua Lawas</a></li> -->
            </ul>
        </div>
        <form class="form-inline ml-auto"></form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!-- menampilkan foto profil dari database -->
            <?php
            if($_SESSION["peran"] == "warga") {
                $id = $_SESSION['id'];
                $sql = "SELECT foto FROM tb_user WHERE id_user='$id'";
                $result = mysqli_query($conn,$sql);
                $data = mysqli_fetch_array($result);
                if($data['foto']){
                    $data = $data['foto'];
                } else {
                    $data = "img/avatar/avatar-1.png";
                }
            } else {
                $data = "img/avatar/avatar-1.png";
            }
            
            ?>
            <!-- end kode menampilkan foto profil dari database-->
            <img alt="image" src="assets/<?php echo $data; ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <strong><?php echo $_SESSION['username'] ?></strong></div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Anda login sebagai <?php echo $_SESSION['peran'] ?></div>
                <?php if($_SESSION["peran"] == "warga"){ ?>
                <a href="?page=profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
                </a>
                <?php } ?>
                <?php if($_SESSION["peran"] == "admin kecamatan"){ ?>
                <a href="?page=pesan" class="dropdown-item has-icon">
                <i class="far fa-envelope"></i> Pesan
                </a>
                <?php } ?>
                <a href="?page=gantipassword" class="dropdown-item has-icon">
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
                    <a href="?page=beranda" class="nav-link"><i class="fas fa-home"></i><span class="font-weight-bold">Beranda</span></a>
                </li>
                <li class="nav-item">
                    <a href="?page=lapor" class="nav-link"><i class="fas fa-exclamation-circle"></i><span class="font-weight-bold">Pengaduan</span></a>
                </li>
                <li class="nav-item">
                    <a href="?page=faq" class="nav-link"><i class="fas fa-question-circle"></i><span class="font-weight-bold">FAQ</span></a>
                </li>

                <li class="nav-item">
                    <a href="?page=about" class="nav-link"><i class="fas fa-tags"></i><span class="font-weight-bold">Tentang</span></a>
                </li>
                <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-folder-open"></i><span class="font-weight-bold">Laporan</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="?page=datakependudukan" class="nav-link">Data Kependudukan</a></li>
                    </ul>
                </li>
                <?php } ?>


                <?php if($_SESSION['peran'] == "warga"){?>
                <li class="nav-item">
                    <a href="?page=beranda" class="nav-link"><i class="fas fa-home"></i><span class="font-weight-bold">Beranda</span></a>
                </li>
                <li class="nav-item">
                    <a href="?page=lapor" class="nav-link"><i class="fas fa-exclamation-circle"></i><span class="font-weight-bold">Pengaduan</span></a>
                </li>
                <li class="nav-item">
                    <a href="?page=faq" class="nav-link"><i class="fas fa-question-circle"></i><span class="font-weight-bold">FAQ</span></a>
                </li>

                <li class="nav-item">
                    <a href="?page=about" class="nav-link"><i class="fas fa-tags"></i><span class="font-weight-bold">Tentang</span></a>
                </li>

                <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-folder-open"></i><span class="font-weight-bold">Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="?page=datakependudukan" class="nav-link">Data Kependudukan</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-file"></i><span class="font-weight-bold">Permohonan <span class="badge-notif-new" data-badge-new="<?php echo $total_baru ?>"></span> <span class="badge-notif" data-badge="<?php echo $total_baru ?>"></span> <span class="badge-notif-done" data-badge-done="<?php echo $total_selesai; ?>"></span></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="?page=permohonankartukeluarga" class="nav-link text-dark">Kartu Keluarga <span class="badge badge-primary"><?php echo $status_baru ?></span> <span class="badge badge-warning"><?php echo $status_baru ?></span> <span class="badge badge-success"><?php echo $status_selesai ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=permohonanaktakelahiran" class="nav-link text-dark">Akta Lahir <span class="badge badge-primary"><?php echo $status_baru_lahir ?></span> <span class="badge badge-warning"><?php echo $status_baru_lahir ?></span> <span class="badge badge-success"><?php echo $status_selesai_lahir ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=permohonansuratpindah" class="nav-link text-dark">Surat Pindah <span class="badge badge-primary"><?php echo $status_baru_sp ?></span> <span class="badge badge-warning"><?php echo $status_baru_sp ?></span> <span class="badge badge-success"><?php echo $status_selesai_sp ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=permohonanaktakematian" class="nav-link text-dark">Akta Kematian <span class="badge badge-primary"><?php echo $status_baru_ak ?></span> <span class="badge badge-warning"><?php echo $status_baru_ak ?></span> <span class="badge badge-success"><?php echo $status_selesai_ak ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=permohonansuratpindahdatang" class="nav-link text-dark">Surat Pindah Datang <span class="badge badge-primary"><?php echo $status_baru_spd ?></span> <span class="badge badge-warning"><?php echo $status_baru_spd ?></span> <span class="badge badge-success"><?php echo $status_selesai_spd ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=permohonanbiodatawni" class="nav-link text-dark">Biodata WNI <span class="badge badge-primary"><?php echo $status_baru_wni ?></span> <span class="badge badge-warning"><?php echo $status_baru_wni ?></span> <span class="badge badge-success"><?php echo $status_selesai_wni ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=permohonanrekamktp" class="nav-link text-dark">Rekam KTP <span class="badge badge-primary"><?php echo $status_baru_ktp ?></span> <span class="badge badge-warning"><?php echo $status_baru_ktp ?></span> <span class="badge badge-success"><?php echo $status_selesai_ktp ?></span></a></li>
                    </ul>
                </li>
                <?php } ?>

                <?php if($_SESSION['peran'] == "admin kecamatan") {?>
                <li class="nav-item">
                    <a href="?page=beranda" class="nav-link"><i class="fas fa-home"></i><span class="font-weight-bold">Beranda</span></a>
                </li>
                <li class="nav-item">
                    <a href="?page=users" class="nav-link"><i class="fas fa-user"></i><span class="font-weight-bold">Data User</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-exclamation-circle"></i><span class="font-weight-bold">Pengaduan</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href='?page=aduan' class='nav-link text-dark'>Pengaduan</a></li>
                        <li class="dropdown-item"><a href="?page=aspirasi" class="nav-link text-dark">Aspirasi</a></li>
                        <li class="dropdown-item"><a href="?page=informasi" class="nav-link text-dark">Permintaan Informasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span class="font-weight-bold">Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="?page=datakependudukan" class="nav-link text-dark">Data Kependudukan</a></li>
                    </ul>
                </li>
                <!-- list data baru -->
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-folder-plus"></i><span class="font-weight-bold">Data Baru <span class="badge-notif-new" data-badge-new="<?= $total_baru_admin ?>"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href='?page=dataBaruKartuKeluarga' class='nav-link text-dark'>Kartu Keluarga <span class="badge badge-primary"><?= $status_baru_admin ?></span> <span class="badge badge-warning"><?= $status_baru_admin ?></span> <span class="badge badge-success"><?= $status_selesai_admin ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataBaruAktaKelahiran" class="nav-link text-dark">Akta Lahir <span class="badge badge-primary"><?= $status_baru_admin_lahir ?></span> <span class="badge badge-warning"><?= $status_baru_admin_lahir ?></span> <span class="badge badge-success"><?= $status_selesai_admin_lahir ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataBaruSuratPindah" class="nav-link text-dark">Surat Pindah <span class="badge badge-primary"><?= $status_baru_admin_sp ?></span> <span class="badge badge-warning"><?= $status_baru_admin_sp ?></span> <span class="badge badge-success"><?= $status_selesai_admin_sp ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataBaruAktaKematian" class="nav-link text-dark">Akta Kematian <span class="badge badge-primary"><?= $status_baru_admin_ak ?></span> <span class="badge badge-warning"><?= $status_baru_admin_ak ?></span> <span class="badge badge-success"><?= $status_selesai_admin_ak ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataBaruSuratPindahDatang" class="nav-link text-dark">Surat Pindah Datang <span class="badge badge-primary"><?= $status_baru_admin_spd ?></span> <span class="badge badge-warning"><?= $status_baru_admin_spd ?></span> <span class="badge badge-success"><?= $status_selesai_admin_spd ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataBaruBiodataWNI" class="nav-link text-dark">Biodata WNI <span class="badge badge-primary"><?= $status_baru_admin_wni ?></span> <span class="badge badge-warning"><?= $status_baru_admin_wni ?></span> <span class="badge badge-success"><?= $status_selesai_admin_wni ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataBaruRekamKTP" class="nav-link text-dark">Rekam KTP <span class="badge badge-primary"><?= $status_baru_admin_ktp ?></span> <span class="badge badge-warning"><?= $status_baru_admin_ktp ?></span> <span class="badge badge-success"><?= $status_selesai_admin_ktp ?></span></a></li>
                    </ul>
                </li>

                <!-- data in progress -->
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-tasks"></i><span class="font-weight-bold">In Progress <span class="badge-notif" data-badge="<?= $total_baru_admin ?>"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href='?page=dataProgressKartuKeluarga' class='nav-link text-dark'>Kartu Keluarga <span class='badge badge-primary'><?= $status_baru_admin ?></span> <span class='badge badge-warning'><?= $status_baru_admin ?></span> <span class='badge badge-success'><?= $status_selesai_admin ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataProgressAktaKelahiran" class="nav-link text-dark ">Akta Lahir <span class="badge badge-primary"><?= $status_baru_admin_lahir ?></span> <span class="badge badge-warning"><?= $status_baru_admin_lahir ?></span> <span class="badge badge-success"><?= $status_selesai_admin_lahir ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataProgressSuratPindah" class="nav-link text-dark ">Surat Pindah <span class="badge badge-primary"><?= $status_baru_admin_sp ?></span> <span class="badge badge-warning"><?= $status_baru_admin_sp ?></span> <span class="badge badge-success"><?= $status_selesai_admin_sp ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataProgressAktaKematian" class="nav-link text-dark ">Akta Kematian <span class="badge badge-primary"><?= $status_baru_admin_ak ?></span> <span class="badge badge-warning"><?= $status_baru_admin_ak ?></span> <span class="badge badge-success"><?= $status_selesai_admin_ak ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataProgressSuratPindahDatang" class="nav-link text-dark ">Surat Pindah Datang <span class="badge badge-primary"><?= $status_baru_admin_spd ?></span> <span class="badge badge-warning"><?= $status_baru_admin_spd ?></span> <span class="badge badge-success"><?= $status_selesai_admin_spd ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataProgressBiodataWNI" class="nav-link text-dark ">Biodata WNI <span class="badge badge-primary"><?= $status_baru_admin_wni ?></span> <span class="badge badge-warning"><?= $status_baru_admin_wni ?></span> <span class="badge badge-success"><?= $status_selesai_admin_wni ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataProgressRekamKTP" class="nav-link text-dark ">Rekam KTP <span class="badge badge-primary"><?= $status_baru_admin_ktp ?></span> <span class="badge badge-warning"><?= $status_baru_admin_ktp ?></span> <span class="badge badge-success"><?= $status_selesai_admin_ktp ?></span></a></li>
                    </ul>
                </li>

                <!-- data selesai -->
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-clipboard-check"></i><span class="font-weight-bold">Data Selesai <span class="badge-notif-done" data-badge-done="<?= $total_selesai_admin ?>"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href='?page=dataSelesaiKartuKeluarga' class='nav-link text-dark'>Kartu Keluarga <span class="badge badge-primary"><?= $status_baru_admin ?></span> <span class="badge badge-warning"><?= $status_baru_admin ?></span> <span class="badge badge-success"><?= $status_selesai_admin ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataSelesaiAktaKelahiran" class="nav-link text-dark">Akta Lahir <span class="badge badge-primary"><?= $status_baru_admin_lahir ?></span> <span class="badge badge-warning"><?= $status_baru_admin_lahir ?></span> <span class="badge badge-success"><?= $status_selesai_admin_lahir ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataSelesaiSuratPindah" class="nav-link text-dark">Surat Pindah <span class="badge badge-primary"><?= $status_baru_admin_sp ?></span> <span class="badge badge-warning"><?= $status_baru_admin_sp ?></span> <span class="badge badge-success"><?= $status_selesai_admin_sp ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataSelesaiAktaKematian" class="nav-link text-dark">Akta Kematian <span class="badge badge-primary"><?= $status_baru_admin_ak ?></span> <span class="badge badge-warning"><?= $status_baru_admin_ak ?></span> <span class="badge badge-success"><?= $status_selesai_admin_ak ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataSelesaiSuratPindahDatang" class="nav-link text-dark">Surat Pindah Datang <span class="badge badge-primary"><?= $status_baru_admin_spd ?></span> <span class="badge badge-warning"><?= $status_baru_admin_spd ?></span> <span class="badge badge-success"><?= $status_selesai_admin_spd ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataSelesaiBiodataWNI" class="nav-link text-dark">Biodata WNI <span class="badge badge-primary"><?= $status_baru_admin_wni ?></span> <span class="badge badge-warning"><?= $status_baru_admin_wni ?></span> <span class="badge badge-success"><?= $status_selesai_admin_wni ?></span></a></li>
                        <li class="dropdown-item"><a href="?page=dataSelesaiRekamKTP" class="nav-link text-dark">Rekam KTP <span class="badge badge-primary"><?= $status_baru_admin_ktp ?></span> <span class="badge badge-warning"><?= $status_baru_admin_ktp ?></span> <span class="badge badge-success"><?= $status_selesai_admin_ktp ?></span></a></li>
                    </ul>
                </li>
                
                <?php } ?>
            </ul>
        </div>
    </nav>