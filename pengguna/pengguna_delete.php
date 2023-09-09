<?php
include '../pengaturan/koneksi.php';
$id = $_GET['id'];
if (isset($id)) {
    $q = "delete from tb_user where id_user='$id'";
    $exe = mysqli_query($konek, $q);
    if ($exe) {
        echo "<script>alert('Data pengguna berhasil dihapus!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=pengguna'>";
    } else {
        echo "<script>alert('Data pengguna gagal dihapus!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=pengguna'>";
    }
}
