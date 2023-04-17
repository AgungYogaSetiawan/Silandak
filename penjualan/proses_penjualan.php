<?php
include '../pengaturan/koneksi.php';
$op = $_GET['op'];
if ($op == "cari_pelanggan") {
    $nama =  $_POST['nama'];
    $exe = mysqli_query($konek, "select * from pelanggan where nama_pelanggan='$nama'");
    $data = mysqli_fetch_array($exe);
    echo $data['id'] . "|" . $data['alamat'] . "|" . $data['no_telp'];
} else if ($op == "cari_barang") {
    $nama =  $_POST['nama'];
    $exe = mysqli_query($konek, "select * from barang where nama_barang='$nama'");
    $data = mysqli_fetch_array($exe);
    echo $data['id'] . "|" . $data['harga'] . "|" . $data['stok'];
} else if ($op == "tambah_barang") {
    $id_penjualan = $_GET['id_penjualan'];
    $id_barang = $_GET['id_barang'];
    $harga = $_GET['harga'];
    $qty = $_GET['qty'];
    $exe = mysqli_query($konek, "insert into penjualan_detail values (null, '$id_penjualan', '$id_barang', '$harga', '$qty', '0')");
    if ($exe) {
        echo "sukses";
    }
} else if ($op == "tampil_barang") {
    $id_penjualan = $_POST['id_penjualan'];
    $exe = mysqli_query($konek, "select penjualan_detail.*, barang.nama_barang from penjualan_detail inner join barang on penjualan_detail.barang_id = barang.id where penjualan_id = '$id_penjualan'");
    echo "<table class='table table-hover'>
        <thead><tr><th>ID Barang</th><th>Nama Barang</th><th>Harga Barang</th><th>Qty</th><th>Subtotal</th><th>Aksi</th></tr></thead>
        <tbody>";
    while ($data = mysqli_fetch_array($exe)) {
        $tombol_hapus = "<p class='btn btn-danger btn-sm' onClick=hapus(" . $data['id'] . ")>Hapus</p>";
        echo "<tr><td>" . $data['barang_id'] . "</td>
        <td>" . $data['nama_barang'] . "</td>
        <td>" . $data['harga'] . "</td>
        <td>" . $data['qty'] . "</td>
        <td>" . $data['harga'] * $data['qty'] . "</td>
        <td>" . $tombol_hapus . "</td></tr>";
    }
    echo "</tbody></table>";
} else if ($op == "hapus_barang") {
    $id = $_GET['id'];
    $exe = mysqli_query($konek, "delete from penjualan_detail where id='$id'");
}
