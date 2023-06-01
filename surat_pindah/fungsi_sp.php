<?php
session_start();
$data_temp = array();
include '../pengaturan/fungsi.php';
if(isset($_POST['kirim'])){
  date_default_timezone_set('Asia/Ujung_Pandang');
  $user_id = $_POST['user_id'];
  $status = "Baru";
  $tgl_waktu = date('d-M-Y');
  $ekstensi_diperbolehkan = array('pdf','png','jpg','jpeg');
  
  $file_kp = $_FILES['file_kp']['name'];
  $pdf_kp = explode('.', $file_kp);
  $ekstensi_kp = strtolower(end($pdf_kp));
  $ukuran_kp = $_FILES['file_kp']['size'];
  $file_tmp_kp = $_FILES['file_kp']['tmp_name'];

  $file_kk = $_FILES['file_kk']['name'];
  $pdf_kk = explode('.', $file_kk);
  $ekstensi_kk = strtolower(end($pdf_kk));
  $ukuran_kk = $_FILES['file_kk']['size'];
  $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
  
  $file_ktp = $_FILES['file_ktp']['name'];
  $pdf_ktp = explode('.', $file_ktp);
  $ekstensi_ktp = strtolower(end($pdf_ktp));
  $ukuran_ktp = $_FILES['file_ktp']['size'];
  $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];

  // koding cek upload file ket pindah
  if(in_array($ekstensi_kp, $ekstensi_diperbolehkan) === true){
    if($ukuran_kp < 1044070){ 
      move_uploaded_file($file_tmp_kp, '../assets/'.$file_kp);
    } else{
        echo 'UKURAN FILE TERLALU BESAR!';
    }
  } else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }

  // koding cek upload file ktp
  if(in_array($ekstensi_ktp, $ekstensi_diperbolehkan) === true){
    if($ukuran_ktp < 1044070){ 
      move_uploaded_file($file_tmp_ktp, '../assets/'.$file_ktp);
    } else{
        echo 'UKURAN FILE TERLALU BESAR!';
    }
  } else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }

  // koding cek upload file kk
  if(in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true){
    if($ukuran_kk < 1044070){ 
      move_uploaded_file($file_tmp_kk, '../assets/'.$file_kk);
    } else{
        echo 'UKURAN FILE TERLALU BESAR!';
    }
  } else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }

    //Query input menginput data kedalam tabel kk
    $sql = "INSERT INTO tb_surat_pindah (user_id,file_kp,file_kk,file_ktp,status_berkas,tgl) VALUES ('$user_id','$file_kp','$file_kk','$file_ktp','$status','$tgl_waktu')";

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
} else if(isset($_POST["simpan_sementara"])) {
    // $user_id = $_POST['user_id'];
    $ekstensi_diperbolehkan = array('pdf','png','jpg','jpeg');
    
    $file_kp = $_FILES['file_kp']['name'];
    $pdf_kp = explode('.', $file_kp);
    $ekstensi_kp = strtolower(end($pdf_kp));
    $ukuran_kp = $_FILES['file_kp']['size'];
    $file_tmp_kp = $_FILES['file_kp']['tmp_name'];
    move_uploaded_file($file_tmp_kp, '../assets/'.$file_kp);

    $file_kk = $_FILES['file_kk']['name'];
    $pdf_kk = explode('.', $file_kk);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
    move_uploaded_file($file_tmp_kk, '../assets/'.$file_kk);
    
    $file_ktp = $_FILES['file_ktp']['name'];
    $pdf_ktp = explode('.', $file_ktp);
    $ekstensi_ktp = strtolower(end($pdf_ktp));
    $ukuran_ktp = $_FILES['file_ktp']['size'];
    $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];
    move_uploaded_file($file_tmp_ktp, '../assets/'.$file_ktp);

    // simpan data ke array
    // $data_temp["user_id"] = $user_id;
    // $data_temp["file_kp"] = $file_kp;
    // $data_temp["file_ktp"] = $file_ktp;
    // $data_temp["file_kk"] = $file_kk;

    // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
    $_SESSION["file_kp"] = $file_kp;
    $_SESSION["file_kk"] = $file_kk;
    $_SESSION["file_ktp"] = $file_ktp;


    $_SESSION['message'] = "Data berhasil disimpan sementara";
    header("Location: ../index.php?page=beranda");
    
    
} 


$sql = "SELECT * FROM tb_surat_pindah a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);
$id = $data['id_sp'];
$baru = $data['status_berkas'];
if(isset($_POST['setuju']) and $baru === 'Baru') {
  $keterangan = htmlspecialchars($_POST['keterangan']);
  $status_berkas = "Selesai";
  
  $sql = "UPDATE tb_surat_pindah SET keterangan = '$keterangan', status_berkas = '$status_berkas' WHERE id_sp = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if($hasil) {
    echo "<script>alert('Data berhasil disetujui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiSuratPindah'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
  }
} else if(isset($_POST['setuju']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiSuratPindah'>";
}


// koding ubah data
$sql = "SELECT * FROM tb_surat_pindah a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_sp'];
if(isset($_POST['ubah']) and $baru === 'Baru') {
  // foto ket pindah
  $fotoLamaKP = htmlspecialchars($_POST['fotoLamaKP']);
  $namaFileKP = $_FILES['file_kp']['name'];
  $ukuranFileKP = $_FILES['file_kp']['size'];
  $errorKP = $_FILES['file_kp']['error'];
  $tmpNameKP = $_FILES['file_kp']['tmp_name'];

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
    if($ukuranFileKP > 1000000) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKP = $namaFileKP;
  }

  // foto KTP
  $fotoLamaKTP = htmlspecialchars($_POST['fotoLamaKTP']);
  $namaFileKTP = $_FILES['file_ktp']['name'];
  $ukuranFileKTP = $_FILES['file_ktp']['size'];
  $errorKTP = $_FILES['file_ktp']['error'];
  $tmpNameKTP = $_FILES['file_ktp']['tmp_name'];

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
    if($ukuranFileKTP > 1000000) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKTP = $namaFileKTP;
  }

  // foto KK
  $fotoLamaKK = htmlspecialchars($_POST['fotoLamaKK']);
  $namaFileKK = $_FILES['file_kk']['name'];
  $ukuranFileKK = $_FILES['file_kk']['size'];
  $errorKK = $_FILES['file_kk']['error'];
  $tmpNameKK = $_FILES['file_kk']['tmp_name'];

  move_uploaded_file($tmpNameKK, '../assets/' . $namaFileKK);
  // cek apakah edit foto baru
  if($_FILES['file_kk']['error'] === 4) {
    $fotoKK = $fotoLamaKK;
  } else {
    // cek apakah ada foto yang diupload
    if($errorKK === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKK = ['jpg','jpeg','png'];
    $ekstensiGambarKK = explode('.', $namaFileKK);
    $ekstensiGambarKK = strtolower(end($ekstensiGambarKK));
    if(!in_array($ekstensiGambarKK, $ekstensiKK)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if($ukuranFileKK > 1000000) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKK = $namaFileKK;
  }

  $sql = "UPDATE tb_surat_pindah SET file_kp = '$fotoKP', file_kk = '$fotoKK', file_ktp = '$fotoKTP' WHERE id_sp = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonansuratpindah'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonansuratpindah'>";
  }
} else if(isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonansuratpindah'>";
}