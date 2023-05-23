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
    // untuk kartu keluarga
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
    // end kartu keluarga

    // akta kelahiran
    case 'permohonanaktakelahiran':
        include "akta_kelahiran/permohonan_akta_kelahiran.php";
        break;
    case 'dataBaruAktaKelahiran':
        include "akta_kelahiran/list_data_baru.php";
        break;
    case 'dataProgressAktaKelahiran':
        include "akta_kelahiran/list_data_progress.php";
        break;
    case 'dataSelesaiAktaKelahiran':
        include "akta_kelahiran/list_data_selesai.php";
        break;
    case 'viewVerifAktaKelahiran':
        include "akta_kelahiran/view_verifikasi.php";
        break;
    // end akta kelahiran

    // surat pindah
    case 'permohonansuratpindah':
        include "surat_pindah/permohonan_sp.php";
        break;
    case 'dataBaruSuratPindah':
        include "surat_pindah/list_data_baru.php";
        break;
    case 'dataProgressSuratPindah':
        include "surat_pindah/list_data_progress.php";
        break;
    case 'dataSelesaiSuratPindah':
        include "surat_pindah/list_data_selesai.php";
        break;
    case 'viewVerifSuratPindah':
        include "surat_pindah/view_verifikasi.php";
        break;
    // end surat pindah

    // akta kematian
    case 'permohonanaktakematian':
        include "akta_kematian/permohonan_akta_kematian.php";
        break;
    case 'dataBaruAktaKematian':
        include "akta_kematian/list_data_baru.php";
        break;
    case 'dataProgressAktaKematian':
        include "akta_kematian/list_data_progress.php";
        break;
    case 'dataSelesaiAktaKematian':
        include "akta_kematian/list_data_selesai.php";
        break;
    case 'viewVerifAktaKematian':
        include "akta_kematian/view_verifikasi.php";
        break;
    // end akta kematian

    // surat pindah datang
    case 'permohonansuratpindahdatang':
        include "surat_pindah_datang/permohonan_spd.php";
        break;
    case 'dataBaruSuratPindahDatang':
        include "surat_pindah_datang/list_data_baru.php";
        break;
    case 'dataProgressSuratPindahDatang':
        include "surat_pindah_datang/list_data_progress.php";
        break;
    case 'dataSelesaiSuratPindahDatang':
        include "surat_pindah_datang/list_data_selesai.php";
        break;
    case 'viewVerifSuratPindahDatang':
        include "surat_pindah_datang/view_verifikasi.php";
        break;
    // end surat pindah datang

    // biodata wni
    case 'permohonanbiodatawni':
        include "biodata_wni/permohonan_wni.php";
        break;
    case 'dataBaruBiodataWNI':
        include "biodata_wni/list_data_baru.php";
        break;
    case 'dataProgressBiodataWNI':
        include "biodata_wni/list_data_progress.php";
        break;
    case 'dataSelesaiBiodataWNI':
        include "biodata_wni/list_data_selesai.php";
        break;
    case 'viewVerifBiodataWNI':
        include "biodata_wni/view_verifikasi.php";
        break;
    // end biodata wni

    // rekam ktp
    case 'permohonanrekamktp':
        include "rekam_ktp/permohonan_rekam_ktp.php";
        break;
    case 'dataBaruRekamKTP':
        include "rekam_ktp/list_data_baru.php";
        break;
    case 'dataProgressRekamKTP':
        include "rekam_ktp/list_data_progress.php";
        break;
    case 'dataSelesaiRekamKTP':
        include "rekam_ktp/list_data_selesai.php";
        break;
    case 'viewVerifRekamKTP':
        include "rekam_ktp/view_verifikasi.php";
        break;
    // end rekam ktp

    case 'datakependudukan':
        include "laporan/data_kependudukan.php";
        break;
    case 'lapor':
        include "pengaduan/lapor_view.php";
        break;
    case 'aduan':
        include "pengaduan/aduan.php";
        break;
    case 'aspirasi':
        include "pengaduan/aspirasi.php";
        break;
    case 'informasi':
        include "pengaduan/informasi.php";
        break;
}

include "template/footer.php";
