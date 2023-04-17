<?php
$id = $_GET['id'];
if (isset($id)) {
    $q = "delete from kategori_barang where id='$id'";
    $exe = mysqli_query($konek, $q);
    if ($exe) {
        echo "<script>alert('Data kategori berhasil dihapus!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=kategori'>";
    } else {
        echo "<script>alert('Data kategori gagal dihapus!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=kategori'>";
    }
}
