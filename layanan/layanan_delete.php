<?php
$id = $_GET['id'];
if (isset($id)) {
    $q = "delete from layanan where id='$id'";
    $exe = mysqli_query($konek, $q);
    if ($exe) {
        echo "<script>alert('Data layanan berhasil dihapus!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=layanan'>";
    } else {
        echo "<script>alert('Data layanan gagal dihapus!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=layanan'>";
    }
}
