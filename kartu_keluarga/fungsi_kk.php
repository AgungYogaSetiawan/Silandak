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

  if (isset($_SESSION["file_buku_nikah"]) && isset($_SESSION["file_ijazah"]) && isset($_SESSION["file_ktp"]) && isset($_SESSION["file_kk"])) {
    $str = rand();
    $str1 = md5($str);
    $file_buku_nikah1 = $_SESSION["file_buku_nikah"];
    $pdf_buku_nikah = explode('.', $file_buku_nikah1);
    $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
    $file_buku_nikah = date('ymdhis') . $str1 . '.' . $ekstensi_buku_nikah;
    $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
    $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];

    $str = rand();
    $str2 = md5($str);
    $file_ktp1 = $_SESSION["file_ktp"];
    $pdf_ktp = explode('.', $file_ktp1);
    $ekstensi_ktp = strtolower(end($pdf_ktp));
    $file_ktp = date('ymdhis') . $str2 . '.' . $ekstensi_ktp;
    $ukuran_ktp = $_FILES['file_ktp']['size'];
    $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];

    $str = rand();
    $str3 = md5($str);
    $file_ijazah1 = $_SESSION["file_ijazah"];
    $pdf_ijazah = explode('.', $file_ijazah1);
    $ekstensi_ijazah = strtolower(end($pdf_ijazah));
    $file_ijazah = date('ymdhis') . $str3 . '.' . $ekstensi_ijazah;
    $ukuran_ijazah = $_FILES['file_ijazah']['size'];
    $file_tmp_ijazah = $_FILES['file_ijazah']['tmp_name'];

    $str = rand();
    $str4 = md5($str);
    $file_kk1 = $_SESSION["file_kk"];
    $pdf_kk = explode('.', $file_kk1);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $file_kk = date('ymdhis') . $str4 . '.' . $ekstensi_kk;
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];

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

    // koding cek upload file ktp
    if (in_array($ekstensi_ktp, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_ktp < 10485760) {
        move_uploaded_file($file_tmp_ktp, '../assets/' . $file_ktp);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    // koding cek upload file ijazah
    if (in_array($ekstensi_ijazah, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_ijazah < 10485760) {
        move_uploaded_file($file_tmp_ijazah, '../assets/' . $file_ijazah);
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

    //Query input menginput data kedalam tabel kk
    $sql = "INSERT INTO tb_kk (user_id,file_buku_nikah,file_ktp,file_ijazah,file_kk,status_berkas,tgl,slug_bk,slug_ktp,slug_ijazah,slug_kk,nmr_urut) VALUES ('$user_id','$_SESSION[file_buku_nikah]','$_SESSION[file_ktp]','$_SESSION[file_ijazah]','$_SESSION[file_kk]','$status','$tgl_waktu','$_SESSION[slug_buku_nikah]','$_SESSION[slug_ktp]','$_SESSION[slug_ijazah]','$_SESSION[slug_kk]','$nmr_urut')";
  } else {
    $str = rand();
    $str1 = md5($str);
    $file_buku_nikah1 = $_FILES['file_buku_nikah']['name'];
    $pdf_buku_nikah = explode('.', $file_buku_nikah1);
    $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
    $file_buku_nikah = date('ymdhis') . $str1 . '.' . $ekstensi_buku_nikah;
    $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
    $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];

    $str = rand();
    $str2 = md5($str);
    $file_ktp1 = $_FILES['file_ktp']['name'];
    $pdf_ktp = explode('.', $file_ktp1);
    $ekstensi_ktp = strtolower(end($pdf_ktp));
    $file_ktp = date('ymdhis') . $str2 . '.' . $ekstensi_ktp;
    $ukuran_ktp = $_FILES['file_ktp']['size'];
    $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];

    $str = rand();
    $str3 = md5($str);
    $file_ijazah1 = $_FILES['file_ijazah']['name'];
    $pdf_ijazah = explode('.', $file_ijazah1);
    $ekstensi_ijazah = strtolower(end($pdf_ijazah));
    $file_ijazah = date('ymdhis') . $str3 . '.' . $ekstensi_ijazah;
    $ukuran_ijazah = $_FILES['file_ijazah']['size'];
    $file_tmp_ijazah = $_FILES['file_ijazah']['tmp_name'];

    $str = rand();
    $str4 = md5($str);
    $file_kk1 = $_FILES['file_kk']['name'];
    $pdf_kk = explode('.', $file_kk1);
    $ekstensi_kk = strtolower(end($pdf_kk));
    $file_kk = date('ymdhis') . $str4 . '.' . $ekstensi_kk;
    $ukuran_kk = $_FILES['file_kk']['size'];
    $file_tmp_kk = $_FILES['file_kk']['tmp_name'];

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

    // koding cek upload file ktp
    if (in_array($ekstensi_ktp, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_ktp < 10485760) {
        move_uploaded_file($file_tmp_ktp, '../assets/' . $file_ktp);
      } else {
        echo 'UKURAN FILE TERLALU BESAR!';
      }
    } else {
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    // koding cek upload file ijazah
    if (in_array($ekstensi_ijazah, $ekstensi_diperbolehkan) === true) {
      if ($ukuran_ijazah < 10485760) {
        move_uploaded_file($file_tmp_ijazah, '../assets/' . $file_ijazah);
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

    //Query input menginput data kedalam tabel kk
    $sql = "INSERT INTO tb_kk (user_id,file_buku_nikah,file_ktp,file_ijazah,file_kk,status_berkas,tgl,slug_bk,slug_ktp,slug_ijazah,slug_kk,nmr_urut) VALUES ('$user_id','$file_buku_nikah','$file_ktp','$file_ijazah','$file_kk','$status','$tgl_waktu','$file_buku_nikah1','$file_ktp1','$file_ijazah1','$file_kk1','$nmr_urut')";
  }


  //Mengeksekusi/menjalankan query diatas	
  $hasil = mysqli_query($conn, $sql);

  //Kondisi apakah berhasil atau tidak
  if ($hasil) {
    echo "<script>alert('Pendaftaran Anda Berhasil');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonankartukeluarga'>";
  } else {
    echo "<script>alert('Pendaftaran Anda Gagal, Mohon ulangi kembali);</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
  }
  // koding simpan sementara
} else if (isset($_POST["simpan_sementara"])) {
  // $user_id = $_POST['user_id'];
  $ekstensi_diperbolehkan = array('pdf', 'png', 'jpg', 'jpeg');

  $str = rand();
  $str1 = md5($str);
  $file_buku_nikah1 = $_FILES['file_buku_nikah']['name'];
  $pdf_buku_nikah = explode('.', $file_buku_nikah1);
  $ekstensi_buku_nikah = strtolower(end($pdf_buku_nikah));
  $file_buku_nikah = date('ymdhis') . $str1 . '.' . $ekstensi_buku_nikah;
  $ukuran_buku_nikah = $_FILES['file_buku_nikah']['size'];
  $file_tmp_buku_nikah = $_FILES['file_buku_nikah']['tmp_name'];
  move_uploaded_file($file_tmp_buku_nikah, '../assets/' . $file_buku_nikah);

  $str = rand();
  $str2 = md5($str);
  $file_ktp1 = $_FILES['file_ktp']['name'];
  $pdf_ktp = explode('.', $file_ktp1);
  $ekstensi_ktp = strtolower(end($pdf_ktp));
  $file_ktp = date('ymdhis') . $str2 . '.' . $ekstensi_ktp;
  $ukuran_ktp = $_FILES['file_ktp']['size'];
  $file_tmp_ktp = $_FILES['file_ktp']['tmp_name'];
  move_uploaded_file($file_tmp_ktp, '../assets/' . $file_ktp);

  $str = rand();
  $str3 = md5($str);
  $file_ijazah1 = $_FILES['file_ijazah']['name'];
  $pdf_ijazah = explode('.', $file_ijazah1);
  $ekstensi_ijazah = strtolower(end($pdf_ijazah));
  $file_ijazah = date('ymdhis') . $str3 . '.' . $ekstensi_ijazah;
  $ukuran_ijazah = $_FILES['file_ijazah']['size'];
  $file_tmp_ijazah = $_FILES['file_ijazah']['tmp_name'];
  move_uploaded_file($file_tmp_ijazah, '../assets/' . $file_ijazah);

  $str = rand();
  $str4 = md5($str);
  $file_kk1 = $_FILES['file_kk']['name'];
  $pdf_kk = explode('.', $file_kk1);
  $ekstensi_kk = strtolower(end($pdf_kk));
  $file_kk = date('ymdhis') . $str4 . '.' . $ekstensi_kk;
  $ukuran_kk = $_FILES['file_kk']['size'];
  $file_tmp_kk = $_FILES['file_kk']['tmp_name'];
  move_uploaded_file($file_tmp_kk, '../assets/' . $file_kk);

  // simpan data ke array
  // $data_temp["user_id"] = $user_id;
  // $data_temp["file_buku_nikah"] = $file_buku_nikah;
  // $data_temp["file_ktp"] = $file_ktp;
  // $data_temp["file_ijazah"] = $file_ijazah;
  // $data_temp["file_kk"] = $file_kk;

  // Simpan variabel array $data ke dalam session menggunakan fungsi $_SESSION.
  $_SESSION["file_buku_nikah"] = $file_buku_nikah;
  $_SESSION["file_ktp"] = $file_ktp;
  $_SESSION["file_ijazah"] = $file_ijazah;
  $_SESSION["file_kk"] = $file_kk;
  $_SESSION["slug_buku_nikah"] = $file_buku_nikah1;
  $_SESSION["slug_ktp"] = $file_ktp1;
  $_SESSION["slug_ijazah"] = $file_ijazah1;
  $_SESSION["slug_kk"] = $file_kk1;


  $_SESSION['message'] = "Data berhasil disimpan sementara";
  header("Location: ../index.php?page=beranda");
}

// koding jika disetujui
$sql = "SELECT * FROM tb_kk a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_kk'];
if (isset($_POST['setuju']) and $baru === 'Baru') {
  $keterangan = htmlspecialchars($_POST['keterangan']);
  $status_berkas = "Selesai";

  $sql = "UPDATE tb_kk SET keterangan = '$keterangan', status_berkas = '$status_berkas' WHERE id_kk = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil disetujui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiKartuKeluarga'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
  }
} else if (isset($_POST['setuju']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=dataSelesaiKartuKeluarga'>";
}




// koding ubah data
$sql = "SELECT * FROM tb_kk a INNER JOIN tb_user b ON a.user_id = b.id_user";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_kk'];
if (isset($_POST['ubah']) and $baru === 'Baru') {
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

  // foto IJAZAH
  $fotoLamaIJ = htmlspecialchars($_POST['fotoLamaIJ']);
  $namaFileIJ1 = $_FILES['file_ijazah']['name'];
  $ukuranFileIJ = $_FILES['file_ijazah']['size'];
  $errorIJ = $_FILES['file_ijazah']['error'];
  $tmpNameIJ = $_FILES['file_ijazah']['tmp_name'];
  $pdf_IJ = explode('.', $namaFileIJ1);
  $ekstensi_IJ = strtolower(end($pdf_IJ));
  $namaFileIJ = date('ymdhis') . '.' . $ekstensi_IJ;

  move_uploaded_file($tmpNameIJ, '../assets/' . $namaFileIJ);
  // cek apakah edit foto baru
  if ($_FILES['file_ijazah']['error'] === 4) {
    $fotoIJ = $fotoLamaIJ;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorIJ === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiIJ = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarIJ = explode('.', $namaFileIJ);
    $ekstensiGambarIJ = strtolower(end($ekstensiGambarIJ));
    if (!in_array($ekstensiGambarIJ, $ekstensiIJ)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileIJ > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoIJ = $namaFileIJ;
  }

  // foto KTP
  $fotoLamaKTP = htmlspecialchars($_POST['fotoLamaKTP']);
  $namaFileKTP1 = $_FILES['file_ktp']['name'];
  $ukuranFileKTP = $_FILES['file_ktp']['size'];
  $errorKTP = $_FILES['file_ktp']['error'];
  $tmpNameKTP = $_FILES['file_ktp']['tmp_name'];
  $pdf_KTP = explode('.', $namaFileKTP1);
  $ekstensi_KTP = strtolower(end($pdf_KTP));
  $namaFileKTP = date('ymdhis') . '.' . $ekstensi_KTP;

  move_uploaded_file($tmpNameKTP, '../assets/' . $namaFileKTP);
  // cek apakah edit foto baru
  if ($_FILES['file_ktp']['error'] === 4) {
    $fotoKTP = $fotoLamaKTP;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorKTP === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKTP = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarKTP = explode('.', $namaFileKTP);
    $ekstensiGambarKTP = strtolower(end($ekstensiGambarKTP));
    if (!in_array($ekstensiGambarKTP, $ekstensiKTP)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileKTP > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKTP = $namaFileKTP;
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

  $sql = "UPDATE tb_kk SET file_buku_nikah = '$fotoBK', file_ijazah = '$fotoIJ', file_ktp = '$fotoKTP', file_kk = '$fotoKK', slug_bk = '$namaFileBK1' ,slug_ktp = '$namaFileKTP1', slug_ijazah = '$namaFileIJ1', slug_kk = '$namaFileKK1' WHERE id_kk = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonankartukeluarga'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonankartukeluarga'>";
  }
} else if (isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=../index.php?page=permohonankartukeluarga'>";
}
