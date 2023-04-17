<?php
include "../pengaturan/koneksi.php";
$ope = $_GET['op'];
if ($ope == "ambil_detail") {
    $idpenjualan = $_GET['idpenjualan'];
    $q = mysqli_query($konek, "SELECT pd.*, b.nama_barang FROM penjualan_detail AS pd INNER JOIN barang AS b ON pd.barang_id = b.id WHERE pd.penjualan_id='$idpenjualan'");
    $data = "<table class='table table-hover'>
        <thead><tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Qty</th>
                <th>Subtotal</th></tr></thead>
                <tbody>";
    $no = 1;
    while ($row = mysqli_fetch_array($q)) {
        $data = $data . "<tr><td>" . $no++ . "</td>
                <td>" . $row['nama_barang'] . "</td>
                <td> Rp." . number_format($row['harga'], 0, ",", ".") . "</td>
                <td>" . $row['qty'] . "</td>
                <td>Rp." . number_format($row['harga'] * $row['qty'], 0, ",", ".") . "</td></tr>";
    }
    $data = $data . "</tbody></table>";
    echo $data;
}
