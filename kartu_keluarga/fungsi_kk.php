<?php
session_start();
$data_temp = array();
include '../pengaturan/fungsi.php';
if(isset($_POST['kirim'])){
  $user_id = $_POST['user_id'];
  $ekstensi_diperbolehkan = array('pdf','png','jpg','jpeg');
  
  $file_buku_nikah = $_FILES['file_buku_nikah']['name'];
  $pdf_buku_nikah = explode('.', $file_buku_nikah);
  $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
  $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
  $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];
  
  $file_ktp = $_FILES['file_ktp']['name'];
  $pdf_ktp = explode('.', $file_ktp);
  $ekstensi_ktp = strtolower(end($pdf_ktp));
  $ukuran_ktp = $_FILES['file_ktp']['size'];
  $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];

  $file_ijazah = $_FILES['file_ijazah']['name'];
  $pdf_ijazah = explode('.', $file_ijazah);
  $ekstensi_ijazah = strtolower(end($pdf_ijazah));
  $ukuran_ijazah = $_FILES['file_ijazah']['size'];
  $file_tmp_ijazah = $_FILES['file_ijazah']['tmp_name'];

  $file_kk = $_FILES['file_kk']['name'];
  $pdf_kk = explode('.', $file_kk);
  $ekstensi_kk = strtolower(end($pdf_kk));
  $ukuran_kk = $_FILES['file_kk']['size'];
  $file_tmp_kk = $_FILES['file_kk']['tmp_name'];

  // koding cek upload file buku_nikah
  if(in_array($ekstensi_buku_nikah, $ekstensi_diperbolehkan) === true){
    if($ukuran_buku_nikah < 1044070){ 
      move_uploaded_file($file_tmp_buku_nikah, '../assets/'.$file_buku_nikah);
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

  // koding cek upload file ijazah
  if(in_array($ekstensi_ijazah, $ekstensi_diperbolehkan) === true){
    if($ukuran_ijazah < 1044070){ 
      move_uploaded_file($file_tmp_ijazah, '../assets/'.$file_ijazah);
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
    $sql = "INSERT INTO tb_kk (user_id,file_buku_nikah,file_ktp,file_ijazah,file_kk) VALUES ('$user_id','$file_buku_nikah','$file_ktp','$file_ijazah','$file_kk')";

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
} else if($_POST["simpan_sementara"]) {
    $user_id = $_POST['user_id'];
    $ekstensi_diperbolehkan = array('pdf','png','jpg','jpeg');
    
    $file_buku_nikah = $_FILES['file_buku_nikah']['name'];
    $pdf_buku_nikah = explode('.', $file_buku_nikah);
    $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
    $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
    $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];
    
    $file_ktp = $_FILES['file_ktp']['name'];
    $pdf_ktp = explode('.', $file_ktp);
    $ekstensi_ktp = strtolower(end($pdf_ktp));
    $ukuran_ktp = $_FILES['file_ktp']['size'];
    $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];

    $file_ijazah = $_FILES['file_ijazah']['name'];
    $pdf_ijazah = explode('.', $file_ijazah);
    $ekstensi_ijazah = strtolower(end($pdf_ijazah));
    $ukuran_ijazah = $_FILES['file_ijazah']['size'];
    $file_tmp_ijazah = $_FILES['file_ijazah']['tmp_name'];

    $file_kk = $_FILES['file_kk']['name'];
    $pdf_kk = explode('.', $file_kk);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];

    // simpan data ke array
    $data_temp["user_id"] = $user_id;
    $data_temp["file_buku_nikah"] = $file_buku_nikah;
    $data_temp["file_ktp"] = $file_ktp;
    $data_temp["file_ijazah"] = $file_ijazah;
    $data_temp["file_kk"] = $file_kk;

    // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
    $_SESSION["data_temp"] = $data_temp;

    $_SESSION['message'] = "Data berhasil disimpan sementara";
    header("Location: ../index.php?page=beranda");
    exit;
    
    
}