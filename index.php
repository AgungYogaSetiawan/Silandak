<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login/login_view.php");
    exit;
}
// include "pengaturan/koneksi.php";
include "pengaturan/fungsi.php";
include "template/header.php";
$page = $_GET['page'];
switch ($page) {
    case 'beranda':
        if($_SESSION["peran"] == "warga"){ 
            include "dashboard/dashboard_view.php";
            break;
    };
    case 'adminkecamatan':
        include "dashboard/dashboard_admin.php";
        break;
    case 'admindesa':
        include "dashboard/dashboard_admin_desa.php";
        break;
    case 'profile':
        include "profil/profil.php";
        break;
    case 'gantipassword':
        include "profil/ganti_password.php";
        break;
    case 'lupapassword':
        include "profil/lupa_password.php";
        break;
    case 'faq':
        include "profil/faq.php";
        break;
    case 'about':
        include "profil/about.php";
        break;
    case 'pesan':
        include "profil/messages.php";
        break;
    case 'users':
        include "pengguna/pengguna_read.php";
        break;
    case 'edituser':
        include "pengguna/pengguna_edit.php";
        break;
    case 'permohonankartukeluarga':
        include "kartu_keluarga/permohonan_kk.php";
        break;
    case 'dataBaruKartuKeluarga':
        include "kartu_keluarga/list_data_baru.php";
        break;
    case 'dataProgressKartuKeluarga':
        include "kartu_keluarga/list_data_progress.php";
        break;
    case 'dataSelesaiKartuKeluarga':
        include "kartu_keluarga/list_data_selesai.php";
        break;
    case 'viewVerifKartuKeluarga':
        include "kartu_keluarga/view_verifikasi.php";
        break;
    case 'datakependudukan':
        include "laporan/data_kependudukan.php";
        break;
    case 'lapor':
        include "laporan/lapor_view.php";
        break;
}

include "template/footer.php";
