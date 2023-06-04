<?php
$id = $_GET['id_penduduk'];
$q = mysqli_query($conn, "DELETE FROM tb_penduduk WHERE id_penduduk='$id'");
if($q){
  echo "<script>alert('Data Berhasil Dihapus');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=datakependudukan'>";
} else {
  echo "<script>alert('Data Gagal Dihapus');</script>";
}