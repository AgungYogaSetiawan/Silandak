<?php
include "../pengaturan/koneksi.php";
$id_user = $_POST['id_user'];
$username = htmlspecialchars($_POST['username']);
$password = mysqli_real_escape_string($konek, $_POST['password']);
$password = password_hash($password, PASSWORD_DEFAULT);
$kewarganegaraan = htmlspecialchars($_POST['kewarganegaraan']);
$nama = htmlspecialchars($_POST['nama']);
$level = htmlspecialchars($_POST['level']);
$nik = htmlspecialchars($_POST['nik']);
$no_hp = htmlspecialchars($_POST['no_hp']);
$pekerjaan = htmlspecialchars($_POST['pekerjaan']);
$tmpt_lahir = htmlspecialchars($_POST['tmpt_lahir']);
$tgl_lahir = $_POST['tgl_lahir'];
$jk = htmlspecialchars($_POST['jk']);
$status = htmlspecialchars($_POST['status']);
$agama = htmlspecialchars($_POST['agama']);
$kelurahan = htmlspecialchars($_POST['kelurahan']);
$kecamatan = htmlspecialchars($_POST['kecamatan']);
$rt = htmlspecialchars($_POST['rt']);
$rw = htmlspecialchars($_POST['rw']);
$alamat = htmlspecialchars($_POST['alamat']);
$kode_pos = htmlspecialchars($_POST['kode_pos']);
$fotoLama = htmlspecialchars($_POST['fotoLama']);
$namaFile = $_FILES['foto']['name'];
$ukuranFile = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];
$tmpName = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmpName, '../assets/' . $namaFile);
// cek apakah edit foto baru
if ($_FILES['foto']['error'] === 4) {
    $foto = $fotoLama;
} else {
    // cek apakah ada foto yang diupload
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensi)) {
        echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFile > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $foto = $namaFile;
}

$sql = mysqli_query($konek, "UPDATE tb_user SET username = '$username', password = '$password', kewarganegaraan = '$kewarganegaraan', nama = '$nama', level = '$level' , nik = '$nik', no_hp = '$no_hp', pekerjaan = '$pekerjaan', tmpt_lahir = '$tmpt_lahir', tgl_lahir = '$tgl_lahir', jk = '$jk', status = '$status', agama = '$agama', kelurahan = '$kelurahan', kecamatan = '$kecamatan', rt = '$rt', rw = '$rw', alamat = '$alamat', kode_pos = '$kode_pos', foto = '$foto' WHERE id_user=$id_user");
if ($sql) {
    //jika  berhasil tampil ini
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=users'>";
} else {
    // jika gagal tampil ini
    echo "<script>alert('Data gagal diubah, mohon ulangi lagi!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=users'>";
}
