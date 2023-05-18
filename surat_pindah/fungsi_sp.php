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
    $user_id = $_POST['user_id'];
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

    // simpan data ke array
    $data_temp["user_id"] = $user_id;
    $data_temp["file_kp"] = $file_kp;
    $data_temp["file_ktp"] = $file_ktp;
    $data_temp["file_kk"] = $file_kk;

    // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
    $_SESSION["data_temp"] = $data_temp;

    $_SESSION['message'] = "Data berhasil disimpan sementara";
    header("Location: ../index.php?page=beranda");
    
    
} 

if(isset($_POST['setuju'])) {
  $sql = "SELECT * FROM tb_surat_pindah a INNER JOIN tb_user b ON a.user_id = b.id_user";
  $result = mysqli_query($conn,$sql);
  $data = mysqli_fetch_array($result);
  $id = $data['id_sp'];
  $keterangan = htmlspecialchars($_POST['keterangan']);
  $status_berkas = "Selesai";
  
  $sql = "UPDATE tb_surat_pindah SET keterangan = '$keterangan', status_berkas = '$status_berkas' WHERE id_kk = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if($hasil) {
    echo "<script>alert('Data berhasil disetujui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataBaruKartuKeluarga'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
  }
}