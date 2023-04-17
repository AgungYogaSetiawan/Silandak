<?php
include "../pengaturan/koneksi.php";
$op = $_GET['op'];
if ($op == "cari_pelanggan") {
    $nama = $_POST['nama'];
    $exe = mysqli_query($konek, "select * from pelanggan where nama_pelanggan='$nama'");
    $data = mysqli_fetch_array($exe);
    echo $data['id'] . "|" . $data['alamat'] . "|" . $data['no_telp'];
} else if ($op == "cari_barang") {
    $nama = $_POST['nama'];
    $exe = mysqli_query($konek, "select * from barang where nama_barang='$nama'");
    $data = mysqli_fetch_array($exe);
    echo $data['id'] . "|" . $data['harga'] . "|" . $data['stok'];
}
