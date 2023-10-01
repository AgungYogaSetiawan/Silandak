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

  $file_kk1 = $_FILES['file_kk']['name'];
  $pdf_kk = explode('.', $file_kk1);
  $ekstensi_kk = strtolower(end($pdf_kk));
  $nama_kk = date('ymdhis').'.'.$ekstensi_kk;
  $ukuran_kk = $_FILES['file_kk']['size'];
  $file_tmp_kk = $_FILES['file_kk']['tmp_name'];

  // koding cek upload file kk
  if(in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true){
    if($ukuran_kk < 10485760){ 
      move_uploaded_file($file_tmp_kk, '../assets/'.$nama_kk);
    } else{
        echo 'UKURAN FILE TERLALU BESAR!';
    }
  } else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }

    //Query input menginput data kedalam tabel kk
    $sql = "INSERT INTO tb_rekam_ktp (user_id,file_kk,status_berkas,tgl,slug_kk) VALUES ('$user_id','$nama_kk','$status','$tgl_waktu','$file_kk1')";

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
    // $user_id = $_POST['user_id'];
    $ekstensi_diperbolehkan = array('pdf','png','jpg','jpeg');

    $file_kk1 = $_FILES['file_kk']['name'];
    $pdf_kk = explode('.', $file_kk1);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $nama_kk = date('ymdhis').'.'.$ekstensi_kk;
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
    move_uploaded_file($file_tmp_kk, '../assets/'.$nama_kk);

    // simpan data ke array
    // $data_temp["user_id"] = $user_id;
    // $data_temp["file_kk"] = $file_kk;

    // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
    $_SESSION["file_name"] = $nama_kk;

    $_SESSION['message'] = "Data berhasil disimpan sementara";
    header("Location: ../index.php?page=beranda");
    
    
} 






// koding ubah data
$sql = "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_ktp'];
if(isset($_POST['ubah']) and $baru === 'Baru') {

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
    if($ukuranFileKK > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKK = $namaFileKK;
  }

  $sql = "UPDATE tb_rekam_ktp SET file_kk = '$fotoKK' WHERE id_ktp = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanrekamktp'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanrekamktp'>";
  }
} else if(isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanrekamktp'>";
}