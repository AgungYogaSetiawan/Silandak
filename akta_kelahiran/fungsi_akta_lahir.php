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
  
  $file_akta_lahir = $_FILES['file_akta_lahir']['name'];
  $pdf_akta_lahir = explode('.', $file_akta_lahir);
  $ekstensi_akta_lahir = strtolower(end($pdf_akta_lahir));
  $ukuran_akta_lahir = $_FILES['file_akta_lahir']['size'];
  $file_tmp_akta_lahir = $_FILES['file_akta_lahir']['tmp_name'];
  
  $file_ket_lahir = $_FILES['file_ket_lahir']['name'];
  $pdf_ket_lahir = explode('.', $file_ket_lahir);
  $ekstensi_ket_lahir = strtolower(end($pdf_ket_lahir));
  $ukuran_ket_lahir = $_FILES['file_ket_lahir']['size'];
  $file_tmp_ket_lahir = $_FILES['file_ket_lahir']['tmp_name'];

  $file_buku_nikah = $_FILES['file_buku_nikah']['name'];
  $pdf_buku_nikah = explode('.', $file_buku_nikah);
  $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
  $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
  $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];

  $file_kk = $_FILES['file_kk']['name'];
  $pdf_kk = explode('.', $file_kk);
  $ekstensi_kk = strtolower(end($pdf_kk));
  $ukuran_kk = $_FILES['file_kk']['size'];
  $file_tmp_kk = $_FILES['file_kk']['tmp_name'];

  // koding cek upload file akta_lahir
  if(in_array($ekstensi_akta_lahir, $ekstensi_diperbolehkan) === true){
    if($ukuran_akta_lahir < 1044070){ 
      move_uploaded_file($file_tmp_akta_lahir, '../assets/'.$file_akta_lahir);
    } else{
        echo 'UKURAN FILE TERLALU BESAR!';
    }
  } else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }

  // koding cek upload file ket_lahir
  if(in_array($ekstensi_ket_lahir, $ekstensi_diperbolehkan) === true){
    if($ukuran_ket_lahir < 1044070){ 
      move_uploaded_file($file_tmp_ket_lahir, '../assets/'.$file_ket_lahir);
    } else{
        echo 'UKURAN FILE TERLALU BESAR!';
    }
  } else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }

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

    //Query input menginput data kedalam tabel akta lahir
    $sql = "INSERT INTO tb_akta_lahir (user_id,file_akta_lahir,file_ket_lahir,file_buku_nikah,file_kk,status_berkas,tgl) VALUES ('$user_id','$file_akta_lahir','$file_ket_lahir','$file_buku_nikah','$file_kk','$status','$tgl_waktu')";

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
    
    $file_akta_lahir = $_FILES['file_akta_lahir']['name'];
    $pdf_akta_lahir = explode('.', $file_akta_lahir);
    $ekstensi_akta_lahir = strtolower(end($pdf_akta_lahir));
    $ukuran_akta_lahir = $_FILES['file_akta_lahir']['size'];
    $file_tmp_akta_lahir = $_FILES['file_akta_lahir']['tmp_name'];
    
    $file_ket_lahir = $_FILES['file_ket_lahir']['name'];
    $pdf_ket_lahir = explode('.', $file_ket_lahir);
    $ekstensi_ket_lahir = strtolower(end($pdf_ket_lahir));
    $ukuran_ket_lahir = $_FILES['file_ket_lahir']['size'];
    $file_tmp_ket_lahir = $_FILES['file_ket_lahir']['tmp_name'];

    $file_buku_nikah = $_FILES['file_buku_nikah']['name'];
    $pdf_buku_nikah = explode('.', $file_buku_nikah);
    $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
    $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
    $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];

    $file_kk = $_FILES['file_kk']['name'];
    $pdf_kk = explode('.', $file_kk);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];

    // simpan data ke array
    $data_temp["user_id"] = $user_id;
    $data_temp["file_akta_lahir"] = $file_akta_lahir;
    $data_temp["file_ket_lahir"] = $file_ket_lahir;
    $data_temp["file_buku_nikah"] = $file_buku_nikah;
    $data_temp["file_kk"] = $file_kk;

    // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
    $_SESSION["data_temp"] = $data_temp;

    $_SESSION['message'] = "Data berhasil disimpan sementara";
    header("Location: ../index.php?page=beranda");
    
    
} 

if(isset($_POST['setuju'])) {
  $sql = "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user";
  $result = mysqli_query($conn,$sql);
  $data = mysqli_fetch_array($result);
  $id = $data['id_lahir'];
  $keterangan = htmlspecialchars($_POST['keterangan']);
  $status_berkas = "Selesai";
  
  $sql = "UPDATE tb_akta lahir SET keterangan = '$keterangan', status_berkas = '$status_berkas' WHERE id_lahir = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if($hasil) {
    echo "<script>alert('Data berhasil disetujui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataBaruKartuKeluarga'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
  }
}