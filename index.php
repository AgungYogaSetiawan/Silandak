<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location:login/login_view.php");
}
include "pengaturan/koneksi.php";
include "template/header.php";
$page = $_GET['page'];
switch ($page) {
    case 'beranda':
        include "dashboard/dashboard_view.php";
        break;
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
