<?php
session_start();
$data_temp = array();
include '../pengaturan/fungsi.php';

// kodind simpan data
if (isset($_POST['kirim'])) {
  date_default_timezone_set('Asia/Ujung_Pandang');
  $user_id = $_POST['user_id'];
  $status = "Baru";
  $tgl_waktu = date('d-M-Y');
  $nmr_urut = $_POST['nmr_urut'];
  $ekstensi_diperbolehkan = array('pdf', 'png', 'jpg', 'jpeg');

  if (isset($_SESSION['file_sk']) && isset($_SESSION['file_kk'])) {
    $str = rand();
    $str1 = md5($str);
    $file_sk1 = $_SESSION['file_sk'];
    $pdf_sk = explode('.', $file_sk1);
    $ekstensi_sk = strtolower(end($pdf_sk));
    $ukuran_sk = $_FILES['file_sk']['size'];
    $file_tmp_sk = $_FILES['file_sk']['tmp_name'];
    $file_sk = date('ymdhis') . $str1 . '.' . $ekstensi_sk;

    $str = rand();
    $str2 = md5($str);
    $file_kk1 = $_SESSION['file_kk'];
    $pdf_kk = explode('.', $file_kk1);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
    $file_kk = date('ymdhis') . $str2 . '.' . $ekstensi_kk;

    // koding cek upload file sk rs kepala desa
    if (in_array($ekstensi_sk, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_sk < 10485760) {
        move_uploaded_file($file_tmp_sk, '../assets/' . $file_sk);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    // koding cek upload file kk
    if (in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_kk < 10485760) {
        move_uploaded_file($file_tmp_kk, '../assets/' . $file_kk);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    //Query input menginput data kedalam tabel akta kematian
    $sql = "INSERT INTO tb_kematian (user_id,file_sk,file_kk,status_berkas,tgl,slug_sk,slug_kk,nmr_urut) VALUES ('$user_id','$_SESSION[file_sk]','$_SESSION[file_kk]','$status','$tgl_waktu','$_SESSION[slug_sk]','$_SESSION[slug_sk]','$nmr_urut')";
  } else {
    $str = rand();
    $str1 = md5($str);
    $file_sk1 = $_FILES['file_sk']['name'];
    $pdf_sk = explode('.', $file_sk1);
    $ekstensi_sk = strtolower(end($pdf_sk));
    $ukuran_sk = $_FILES['file_sk']['size'];
    $file_tmp_sk = $_FILES['file_sk']['tmp_name'];
    $file_sk = date('ymdhis') . $str1 . '.' . $ekstensi_sk;

    $str = rand();
    $str2 = md5($str);
    $file_kk1 = $_FILES['file_kk']['name'];
    $pdf_kk = explode('.', $file_kk1);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
    $file_kk = date('ymdhis') . $str2 . '.' . $ekstensi_kk;

    // koding cek upload file sk rs kepala desa
    if (in_array($ekstensi_sk, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_sk < 10485760) {
        move_uploaded_file($file_tmp_sk, '../assets/' . $file_sk);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    // koding cek upload file kk
    if (in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_kk < 10485760) {
        move_uploaded_file($file_tmp_kk, '../assets/' . $file_kk);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    //Query input menginput data kedalam tabel akta kematian
    $sql = "INSERT INTO tb_kematian (user_id,file_sk,file_kk,status_berkas,tgl,slug_sk,slug_kk,nmr_urut) VALUES ('$user_id','$file_sk','$file_kk','$status','$tgl_waktu','$file_sk1','$file_kk1','$nmr_urut')";
  }


  //Mengeksekusi/menjalankan query diatas	
  $hasil = mysqli_query($conn, $sql);

  //Kondisi apakah berhasil atau tidak
  if ($hasil) {
    echo "<script>alert('Pendaftaran Anda Berhasil');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanaktakematian'>";
  } else {
    echo "<script>alert('Pendaftaran Anda Gagal, Mohon ulangi kembali);</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
  }


  // koding simpan sementara
} else if (isset($_POST["simpan_sementara"])) {
  $user_id = $_POST['user_id'];
  $ekstensi_diperbolehkan = array('pdf', 'png', 'jpg', 'jpeg');

  $str = rand();
  $str1 = md5($str);
  $file_sk1 = $_FILES['file_sk']['name'];
  $pdf_sk = explode('.', $file_sk1);
  $ekstensi_sk = strtolower(end($pdf_sk));
  $ukuran_sk = $_FILES['file_sk']['size'];
  $file_tmp_sk = $_FILES['file_sk']['tmp_name'];
  $file_sk = date('ymdhis') . $str1 . '.' . $ekstensi_sk;
  move_uploaded_file($file_tmp_sk, '../assets/' . $file_sk);

  $str = rand();
  $str2 = md5($str);
  $file_kk1 = $_FILES['file_kk']['name'];
  $pdf_kk = explode('.', $file_kk1);
  $ekstensi_kk = strtolower(end($pdf_kk));
  $ukuran_kk = $_FILES['file_kk']['size'];
  $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
  $file_kk = date('ymdhis') . $str2 . '.' . $ekstensi_kk;
  move_uploaded_file($file_tmp_kk, '../assets/' . $file_kk);

  // simpan data ke array
  // $data_temp["user_id"] = $user_id;
  // $data_temp["file_sk"] = $file_sk;
  // $data_temp["file_kk"] = $file_kk;

  // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
  $_SESSION["file_sk"] = $file_sk;
  $_SESSION["file_kk"] = $file_kk;
  $_SESSION["slug_sk"] = $file_sk1;
  $_SESSION["slug_kk"] = $file_kk1;

  $_SESSION['message'] = "Data berhasil disimpan sementara";
  header("Location: ../index.php?page=beranda");
}

// koding jika disetujui
$sql = "SELECT * FROM tb_kematian a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_ak'];
if (isset($_POST['setuju']) and $baru === 'Baru') {
  $keterangan = htmlspecialchars($_POST['keterangan']);
  $status_berkas = "Selesai";

  $sql = "UPDATE tb_kematian SET keterangan = '$keterangan', status_berkas = '$status_berkas' WHERE id_ak = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil disetujui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiAktaKematian'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
  }
} else if (isset($_POST['setuju']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiAktaKematian'>";
}




// koding ubah data
$sql = "SELECT * FROM tb_kematian a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_ak'];
if (isset($_POST['ubah']) and $baru === 'Baru') {
  // foto sk rs kepala desa
  $fotoLamaSK = htmlspecialchars($_POST['fotoLamaSK']);
  $namaFileSK1 = $_FILES['file_sk']['name'];
  $ukuranFileSK = $_FILES['file_sk']['size'];
  $errorSK = $_FILES['file_sk']['error'];
  $tmpNameSK = $_FILES['file_sk']['tmp_name'];
  $pdf_SK = explode('.', $namaFileSK1);
  $ekstensi_SK = strtolower(end($pdf_SK));
  $namaFileSK = date('ymdhis') . '.' . $ekstensi_SK;

  move_uploaded_file($tmpNameSK, '../assets/' . $namaFileSK);
  // cek apakah edit foto baru
  if ($_FILES['file_sk']['error'] === 4) {
    $fotoAK = $fotoLamaSK;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorSK === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiSK = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarSK = explode('.', $namaFileSK);
    $ekstensiGambarSK = strtolower(end($ekstensiGambarSK));
    if (!in_array($ekstensiGambarSK, $ekstensiSK)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileSK > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoSK = $namaFileSK;
  }

  // foto KK
  $fotoLamaKK = htmlspecialchars($_POST['fotoLamaKK']);
  $namaFileKK1 = $_FILES['file_kk']['name'];
  $ukuranFileKK = $_FILES['file_kk']['size'];
  $errorKK = $_FILES['file_kk']['error'];
  $tmpNameKK = $_FILES['file_kk']['tmp_name'];
  $pdf_KK = explode('.', $namaFileKK1);
  $ekstensi_KK = strtolower(end($pdf_KK));
  $namaFileKK = date('ymdhis') . '.' . $ekstensi_KK;

  move_uploaded_file($tmpNameKK, '../assets/' . $namaFileKK);
  // cek apakah edit foto baru
  if ($_FILES['file_kk']['error'] === 4) {
    $fotoKK = $fotoLamaKK;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorKK === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKK = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarKK = explode('.', $namaFileKK);
    $ekstensiGambarKK = strtolower(end($ekstensiGambarKK));
    if (!in_array($ekstensiGambarKK, $ekstensiKK)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileKK > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKK = $namaFileKK;
  }

  $sql = "UPDATE tb_kematian SET file_sk = '$fotoSK', file_kk = '$fotoKK', slug_sk = '$namaFileSK1', slug_kk = '$namaFileKK1' WHERE id_ak = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanaktakematian'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanaktakematian'>";
  }
} else if (isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanaktakematian'>";
}
