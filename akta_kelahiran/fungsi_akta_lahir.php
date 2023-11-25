<?php
session_start();
$data_temp = array();
include '../pengaturan/fungsi.php';
if (isset($_POST['kirim'])) {
  date_default_timezone_set('Asia/Ujung_Pandang');
  $user_id = $_POST['user_id'];
  $status = "Baru";
  $nmr_urut = $_POST['nmr_urut'];
  $tgl_waktu = date('d-M-Y');
  $ekstensi_diperbolehkan = array('pdf', 'png', 'jpg', 'jpeg');

  if (isset($_SESSION["file_akta_lahir"]) && isset($_SESSION["file_ket_lahir"]) && isset($_SESSION["file_buku_nikah"]) && isset($_SESSION["file_kk"])) {
    $str = rand();
    $str1 = md5($str);
    $file_akta_lahir1 = $_SESSION["file_akta_lahir"];
    $pdf_akta_lahir = explode('.', $file_akta_lahir1);
    $ekstensi_akta_lahir = strtolower(end($pdf_akta_lahir));
    $ukuran_akta_lahir = $_FILES['file_akta_lahir']['size'];
    $file_tmp_akta_lahir = $_FILES['file_akta_lahir']['tmp_name'];
    $file_akta_lahir = date('ymdhis') . $str1 . '.' . $ekstensi_akta_lahir;

    $str = rand();
    $str2 = md5($str);
    $file_ket_lahir1 = $_SESSION["file_ket_lahir"];
    $pdf_ket_lahir = explode('.', $file_ket_lahir1);
    $ekstensi_ket_lahir = strtolower(end($pdf_ket_lahir));
    $ukuran_ket_lahir = $_FILES['file_ket_lahir']['size'];
    $file_tmp_ket_lahir = $_FILES['file_ket_lahir']['tmp_name'];
    $file_ket_lahir = date('ymdhis') . $str2 . '.' . $ekstensi_ket_lahir;

    $str = rand();
    $str3 = md5($str);
    $file_buku_nikah1 = $_SESSION["file_buku_nikah"];
    $pdf_buku_nikah = explode('.', $file_buku_nikah1);
    $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
    $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
    $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];
    $file_buku_nikah = date('ymdhis') . $str3 . '.' . $ekstensi_buku_nikah;

    $str = rand();
    $str4 = md5($str);
    $file_kk1 = $_SESSION["file_kk"];
    $pdf_kk = explode('.', $file_kk1);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
    $file_kk = date('ymdhis') . $str4 . '.' . $ekstensi_kk;

    // koding cek upload file akta_lahir
    if (in_array($ekstensi_akta_lahir, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_akta_lahir < 10485760) {
        move_uploaded_file($file_tmp_akta_lahir, '../assets/' . $file_akta_lahir);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    // koding cek upload file ket_lahir
    if (in_array($ekstensi_ket_lahir, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_ket_lahir < 10485760) {
        move_uploaded_file($file_tmp_ket_lahir, '../assets/' . $file_ket_lahir);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    // koding cek upload file buku_nikah
    if (in_array($ekstensi_buku_nikah, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_buku_nikah < 10485760) {
        move_uploaded_file($file_tmp_buku_nikah, '../assets/' . $file_buku_nikah);
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

    //Query input menginput data kedalam tabel akta lahir
    $sql = "INSERT INTO tb_akta_lahir (user_id,file_akta_lahir,file_ket_lahir,file_buku_nikah,file_kk,status_berkas,tgl,slug_ak,slug_sk,slug_bk,slug_kk,nmr_urut) VALUES ('$user_id','$_SESSION[file_akta_lahir]','$_SESSION[file_ket_lahir]','$_SESSION[file_buku_nikah]','$_SESSION[file_kk]','$status','$tgl_waktu','$_SESSION[slug_akta_lahir]','$_SESSION[slug_ket_lahir]','$_SESSION[slug_buku_nikah]','$_SESSION[slug_kk]','$nmr_urut')";
  } else {
    $str = rand();
    $str1 = md5($str);
    $file_akta_lahir1 = $_FILES['file_akta_lahir']['name'];
    $pdf_akta_lahir = explode('.', $file_akta_lahir1);
    $ekstensi_akta_lahir = strtolower(end($pdf_akta_lahir));
    $ukuran_akta_lahir = $_FILES['file_akta_lahir']['size'];
    $file_tmp_akta_lahir = $_FILES['file_akta_lahir']['tmp_name'];
    $file_akta_lahir = date('ymdhis') . $str1 . '.' . $ekstensi_akta_lahir;

    $str = rand();
    $str2 = md5($str);
    $file_ket_lahir1 = $_FILES['file_ket_lahir']['name'];
    $pdf_ket_lahir = explode('.', $file_ket_lahir1);
    $ekstensi_ket_lahir = strtolower(end($pdf_ket_lahir));
    $ukuran_ket_lahir = $_FILES['file_ket_lahir']['size'];
    $file_tmp_ket_lahir = $_FILES['file_ket_lahir']['tmp_name'];
    $file_ket_lahir = date('ymdhis') . $str2 . '.' . $ekstensi_ket_lahir;

    $str = rand();
    $str3 = md5($str);
    $file_buku_nikah1 = $_FILES['file_buku_nikah']['name'];
    $pdf_buku_nikah = explode('.', $file_buku_nikah1);
    $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
    $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
    $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];
    $file_buku_nikah = date('ymdhis') . $str3 . '.' . $ekstensi_buku_nikah;

    $str = rand();
    $str4 = md5($str);
    $file_kk1 = $_FILES['file_kk']['name'];
    $pdf_kk = explode('.', $file_kk1);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
    $file_kk = date('ymdhis') . $str4 . '.' . $ekstensi_kk;

    // koding cek upload file akta_lahir
    if (in_array($ekstensi_akta_lahir, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_akta_lahir < 10485760) {
        move_uploaded_file($file_tmp_akta_lahir, '../assets/' . $file_akta_lahir);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    // koding cek upload file ket_lahir
    if (in_array($ekstensi_ket_lahir, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_ket_lahir < 10485760) {
        move_uploaded_file($file_tmp_ket_lahir, '../assets/' . $file_ket_lahir);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    // koding cek upload file buku_nikah
    if (in_array($ekstensi_buku_nikah, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_buku_nikah < 10485760) {
        move_uploaded_file($file_tmp_buku_nikah, '../assets/' . $file_buku_nikah);
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

    //Query input menginput data kedalam tabel akta lahir
    $sql = "INSERT INTO tb_akta_lahir (user_id,file_akta_lahir,file_ket_lahir,file_buku_nikah,file_kk,status_berkas,tgl,slug_ak,slug_sk,slug_bk,slug_kk,nmr_urut) VALUES ('$user_id','$file_akta_lahir','$file_ket_lahir','$file_buku_nikah','$file_kk','$status','$tgl_waktu','$file_akta_lahir1','$file_ket_lahir1','$file_buku_nikah1','$file_kk1','$nmr_urut')";
  }


  //Mengeksekusi/menjalankan query diatas	
  $hasil = mysqli_query($conn, $sql);

  //Kondisi apakah berhasil atau tidak
  if ($hasil) {
    echo "<script>alert('Pendaftaran Anda Berhasil');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanaktakelahiran'>";
  } else {
    echo "<script>alert('Pendaftaran Anda Gagal, Mohon ulangi kembali);</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
  }
} else if (isset($_POST["simpan_sementara"])) {
  // $user_id = $_POST['user_id'];
  $ekstensi_diperbolehkan = array('pdf', 'png', 'jpg', 'jpeg');

  $str = rand();
  $str1 = md5($str);
  $file_akta_lahir1 = $_FILES['file_akta_lahir']['name'];
  $pdf_akta_lahir = explode('.', $file_akta_lahir1);
  $ekstensi_akta_lahir = strtolower(end($pdf_akta_lahir));
  $ukuran_akta_lahir = $_FILES['file_akta_lahir']['size'];
  $file_tmp_akta_lahir = $_FILES['file_akta_lahir']['tmp_name'];
  $file_akta_lahir = date('ymdhis') . $str1 . '.' . $ekstensi_akta_lahir;
  move_uploaded_file($file_tmp_akta_lahir, '../assets/' . $file_akta_lahir);

  $str = rand();
  $str2 = md5($str);
  $file_ket_lahir1 = $_FILES['file_ket_lahir']['name'];
  $pdf_ket_lahir = explode('.', $file_ket_lahir1);
  $ekstensi_ket_lahir = strtolower(end($pdf_ket_lahir));
  $ukuran_ket_lahir = $_FILES['file_ket_lahir']['size'];
  $file_tmp_ket_lahir = $_FILES['file_ket_lahir']['tmp_name'];
  $file_ket_lahir = date('ymdhis') . $str2 . '.' . $ekstensi_ket_lahir;
  move_uploaded_file($file_tmp_ket_lahir, '../assets/' . $file_ket_lahir);

  $str = rand();
  $str3 = md5($str);
  $file_buku_nikah1 = $_FILES['file_buku_nikah']['name'];
  $pdf_buku_nikah = explode('.', $file_buku_nikah1);
  $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
  $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
  $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];
  $file_buku_nikah = date('ymdhis') . $str3 . '.' . $ekstensi_buku_nikah;
  move_uploaded_file($file_tmp_buku_nikah, '../assets/' . $file_buku_nikah);

  $str = rand();
  $str4 = md5($str);
  $file_kk1 = $_FILES['file_kk']['name'];
  $pdf_kk = explode('.', $file_kk1);
  $ekstensi_kk = strtolower(end($pdf_kk));
  $ukuran_kk = $_FILES['file_kk']['size'];
  $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
  $file_kk = date('ymdhis') . $str4 . '.' . $ekstensi_kk;
  move_uploaded_file($file_tmp_kk, '../assets/' . $file_kk);

  // simpan data ke array
  // $data_temp["user_id"] = $user_id;
  // $data_temp["file_akta_lahir"] = $file_akta_lahir;
  // $data_temp["file_ket_lahir"] = $file_ket_lahir;
  // $data_temp["file_buku_nikah"] = $file_buku_nikah;
  // $data_temp["file_kk"] = $file_kk;

  // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
  $_SESSION["file_akta_lahir"] = $file_akta_lahir;
  $_SESSION["file_ket_lahir"] = $file_ket_lahir;
  $_SESSION["file_buku_nikah"] = $file_buku_nikah;
  $_SESSION["file_kk"] = $file_kk;
  $_SESSION["slug_akta_lahir"] = $file_akta_lahir1;
  $_SESSION["slug_ket_lahir"] = $file_ket_lahir1;
  $_SESSION["slug_buku_nikah"] = $file_buku_nikah1;
  $_SESSION["slug_kk"] = $file_kk1;


  echo "<script>alert('Data berhasil disimpan sementara');</script>";
  header("Location: ../index.php?page=beranda");
}


$sql = "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_lahir'];
if (isset($_POST['setuju']) and $baru === 'Baru') {
  $keterangan = htmlspecialchars($_POST['keterangan']);
  $status_berkas = "Selesai";

  $sql = "UPDATE tb_akta_lahir SET keterangan = '$keterangan', status_berkas = '$status_berkas' WHERE id_lahir = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil disetujui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiAktaKelahiran'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
  }
} else if (isset($_POST['setuju']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiAktaKelahiran'>";
}


// koding ubah data
$sql = "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_lahir'];
if (isset($_POST['ubah']) and $baru === 'Baru') {
  // foto akta lahir
  $fotoLamaAL = htmlspecialchars($_POST['fotoLamaAL']);
  $namaFileAL1 = $_FILES['file_akta_lahir']['name'];
  $ukuranFileAL = $_FILES['file_akta_lahir']['size'];
  $errorAL = $_FILES['file_akta_lahir']['error'];
  $tmpNameAL = $_FILES['file_akta_lahir']['tmp_name'];
  $pdf_AL = explode('.', $namaFileAL1);
  $ekstensi_AL = strtolower(end($pdf_AL));
  $namaFileAL = date('ymdhis') . '.' . $ekstensi_AL;

  move_uploaded_file($tmpNameAL, '../assets/' . $namaFileAL);
  // cek apakah edit foto baru
  if ($_FILES['file_akta_lahir']['error'] === 4) {
    $fotoAL = $fotoLamaAL;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorAL === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiAL = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarAL = explode('.', $namaFileAL);
    $ekstensiGambarAL = strtolower(end($ekstensiGambarAL));
    if (!in_array($ekstensiGambarAL, $ekstensiAL)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileAL > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoAL = $namaFileAL;
  }

  // foto ket lahir
  $fotoLamaKL = htmlspecialchars($_POST['fotoLamaKL']);
  $namaFileKL1 = $_FILES['file_ket_lahir']['name'];
  $ukuranFileKL = $_FILES['file_ket_lahir']['size'];
  $errorKL = $_FILES['file_ket_lahir']['error'];
  $tmpNameKL = $_FILES['file_ket_lahir']['tmp_name'];
  $pdf_KL = explode('.', $namaFileKL1);
  $ekstensi_KL = strtolower(end($pdf_KL));
  $namaFileKL = date('ymdhis') . '.' . $ekstensi_KL;

  move_uploaded_file($tmpNameKL, '../assets/' . $namaFileKL);
  // cek apakah edit foto baru
  if ($_FILES['file_ket_lahir']['error'] === 4) {
    $fotoKL = $fotoLamaKL;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorKL === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKL = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarKL = explode('.', $namaFileKL);
    $ekstensiGambarKL = strtolower(end($ekstensiGambarKL));
    if (!in_array($ekstensiGambarKL, $ekstensiKL)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileKL > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKL = $namaFileKL;
  }

  // foto buku nikah
  $fotoLamaBK = htmlspecialchars($_POST['fotoLamaBK']);
  $namaFileBK1 = $_FILES['file_buku_nikah']['name'];
  $ukuranFileBK = $_FILES['file_buku_nikah']['size'];
  $errorBK = $_FILES['file_buku_nikah']['error'];
  $tmpNameBK = $_FILES['file_buku_nikah']['tmp_name'];
  $pdf_BK = explode('.', $namaFileBK1);
  $ekstensi_BK = strtolower(end($pdf_BK));
  $namaFileBK = date('ymdhis') . '.' . $ekstensi_BK;

  move_uploaded_file($tmpNameBK, '../assets/' . $namaFileBK);
  // cek apakah edit foto baru
  if ($_FILES['file_buku_nikah']['error'] === 4) {
    $fotoBK = $fotoLamaBK;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorBK === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiBK = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarBK = explode('.', $namaFileBK);
    $ekstensiGambarBK = strtolower(end($ekstensiGambarBK));
    if (!in_array($ekstensiGambarBK, $ekstensiBK)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileBK > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoBK = $namaFileBK;
  }

  // foto kk
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

  $sql = "UPDATE tb_akta_lahir SET file_akta_lahir = '$fotoAL', file_ket_lahir = '$fotoKL', file_buku_nikah = '$fotoBK', file_kk = '$fotoKK', slug_ak = '$namaFileAL1' ,slug_sk = '$namaFileKL1', slug_bk = '$namaFileBK1', slug_kk = '$namaFileKK1' WHERE id_lahir = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanaktakelahiran'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanaktakelahiran'>";
  }
} else if (isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonanaktakelahiran'>";
}
