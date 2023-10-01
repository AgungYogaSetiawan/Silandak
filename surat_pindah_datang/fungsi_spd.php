<?php
session_start();
$data_temp = array();
include '../pengaturan/fungsi.php';

// kodind simpan data
if(isset($_POST['kirim'])){
  date_default_timezone_set('Asia/Ujung_Pandang');
  $user_id = $_POST['user_id'];
  $status = "Baru";
  $tgl_waktu = date('d-M-Y');
  $ekstensi_diperbolehkan = array('pdf','png','jpg','jpeg');
  
  $file_kp1 = $_FILES['file_kp']['name'];
  $pdf_kp = explode('.', $file_kp1);
  $ekstensi_kp = strtolower(end($pdf_kp));
  $ukuran_kp = $_FILES['file_kp']['size'];
  $file_tmp_kp = $_FILES['file_kp']['tmp_name'];
  $file_kp = date('ymdhis').'.'.$ekstensi_kp;
  
  $file_ktp1 = $_FILES['file_ktp']['name'];
  $pdf_ktp = explode('.', $file_ktp1);
  $ekstensi_ktp = strtolower(end($pdf_ktp));
  $ukuran_ktp = $_FILES['file_ktp']['size'];
  $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];
  $file_ktp = date('ymdhis').'.'.$ekstensi_ktp;

  // koding cek upload file keterangan pindah
  if(in_array($ekstensi_kp, $ekstensi_diperbolehkan) === true){
    if($ukuran_kp < 10485760){ 
      move_uploaded_file($file_tmp_kp, '../assets/'.$file_kp);
    } else{
        echo 'UKURAN FILE TERLALU BESAR!';
    }
  } else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }

  // koding cek upload file ktp
  if(in_array($ekstensi_ktp, $ekstensi_diperbolehkan) === true){
    if($ukuran_ktp < 10485760){ 
      move_uploaded_file($file_tmp_ktp, '../assets/'.$file_ktp);
    } else{
        echo 'UKURAN FILE TERLALU BESAR!';
    }
  } else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }

    //Query input menginput data kedalam tabel kk
    $sql = "INSERT INTO tb_pindah_datang (user_id,file_kp,file_ktp,status_berkas,tgl,slug_kp,slug_ktp) VALUES ('$user_id','$file_kp','$file_ktp','$status','$tgl_waktu','$file_kp1','$file_ktp1')";

    //Mengeksekusi/menjalankan query diatas	
    $hasil = mysqli_query($conn,$sql);

    //Kondisi apakah berhasil atau tidak
    if ($hasil) {
      echo "<script>alert('Pendaftaran Anda Berhasil');</script>";
      echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
    }
    else {
      echo "<script>alert('Pendaftaran Anda Gagal, Mohon ulangi kembali);</script>";
      echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
    }  
// koding simpan sementara
} else if(isset($_POST["simpan_sementara"])) {
    $user_id = $_POST['user_id'];
    $ekstensi_diperbolehkan = array('pdf','png','jpg','jpeg');
    
    $file_kp1 = $_FILES['file_kp']['name'];
    $pdf_kp = explode('.', $file_kp1);
    $ekstensi_kp = strtolower(end($pdf_kp));
    $ukuran_kp = $_FILES['file_kp']['size'];
    $file_tmp_kp = $_FILES['file_kp']['tmp_name'];
    $file_kp = date('ymdhis').'.'.$ekstensi_kp;
    move_uploaded_file($file_tmp_kp, '../assets/'.$file_kp);
    
    $file_ktp1 = $_FILES['file_ktp']['name'];
    $pdf_ktp = explode('.', $file_ktp1);
    $ekstensi_ktp = strtolower(end($pdf_ktp));
    $ukuran_ktp = $_FILES['file_ktp']['size'];
    $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];
    $file_ktp = date('ymdhis').'.'.$ekstensi_ktp;
    move_uploaded_file($file_tmp_ktp, '../assets/'.$file_ktp);

    // simpan data ke array
    // $data_temp["user_id"] = $user_id;
    // $data_temp["file_kp"] = $file_kp;
    // $data_temp["file_ktp"] = $file_ktp;

    // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
    $_SESSION["file_kp"] = $file_kp;
    $_SESSION["file_ktp"] = $file_ktp;


    $_SESSION['message'] = "Data berhasil disimpan sementara";
    header("Location: ../index.php?page=beranda");
    
    
} 

// koding jika disetujui
$sql = "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_pd'];
if(isset($_POST['setuju']) and $baru === 'Baru') {
  $keterangan = htmlspecialchars($_POST['keterangan']);
  $status_berkas = "Selesai";
  
  $sql = "UPDATE tb_pindah_datang SET keterangan = '$keterangan', status_berkas = '$status_berkas' WHERE id_pd = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if($hasil) {
    echo "<script>alert('Data berhasil disetujui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiSuratPindahDatang'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
  }
} else if(isset($_POST['setuju']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiSuratPindahDatang'>";
}




// koding ubah data
$sql = "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_pd'];
if(isset($_POST['ubah']) and $baru === 'Baru') {
  // foto keterangan pindah
  $fotoLamaKP = htmlspecialchars($_POST['fotoLamaKP']);
  $namaFileKP1 = $_FILES['file_kp']['name'];
  $ukuranFileKP = $_FILES['file_kp']['size'];
  $errorKP = $_FILES['file_kp']['error'];
  $tmpNameKP = $_FILES['file_kp']['tmp_name'];
  $pdf_KP = explode('.', $namaFileKP1);
  $ekstensi_KP = strtolower(end($pdf_KP));
  $namaFileKP = date('ymdhis').'.'.$ekstensi_KP;

  move_uploaded_file($tmpNameKP, '../assets/' . $namaFileKP);
  // cek apakah edit foto baru
  if($_FILES['file_kp']['error'] === 4) {
    $fotoKP = $fotoLamaKP;
  } else {
    // cek apakah ada foto yang diupload
    if($errorKP === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKP = ['jpg','jpeg','png'];
    $ekstensiGambarKP = explode('.', $namaFileKP);
    $ekstensiGambarKP = strtolower(end($ekstensiGambarKP));
    if(!in_array($ekstensiGambarKP, $ekstensiKP)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if($ukuranFileKP > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKP = $namaFileKP;
  }

  // foto KTP
  $fotoLamaKTP = htmlspecialchars($_POST['fotoLamaKTP']);
  $namaFileKTP1 = $_FILES['file_ktp']['name'];
  $ukuranFileKTP = $_FILES['file_ktp']['size'];
  $errorKTP = $_FILES['file_ktp']['error'];
  $tmpNameKTP = $_FILES['file_ktp']['tmp_name'];
  $pdf_KTP = explode('.', $namaFileKTP1);
  $ekstensi_KTP = strtolower(end($pdf_KTP));
  $namaFileKTP = date('ymdhis').'.'.$ekstensi_KTP;

  move_uploaded_file($tmpNameKTP, '../assets/' . $namaFileKTP);
  // cek apakah edit foto baru
  if($_FILES['file_ktp']['error'] === 4) {
    $fotoKTP = $fotoLamaKTP;
  } else {
    // cek apakah ada foto yang diupload
    if($errorKTP === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKTP = ['jpg','jpeg','png'];
    $ekstensiGambarKTP = explode('.', $namaFileKTP);
    $ekstensiGambarKTP = strtolower(end($ekstensiGambarKTP));
    if(!in_array($ekstensiGambarKTP, $ekstensiKTP)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if($ukuranFileKTP > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKTP = $namaFileKTP;
  }

  $sql = "UPDATE tb_pindah_datang SET file_kp= '$fotoKP', file_ktp = '$fotoKTP', slug_kp = '$namaFileKP1', slug_ktp = '$namaFileKTP1' WHERE id_pd = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonansuratpindahdatang'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonansuratpindahdatang'>";
  }
} else if(isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonansuratpindahdatang'>";
}