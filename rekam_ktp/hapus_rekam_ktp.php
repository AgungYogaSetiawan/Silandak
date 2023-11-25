<?php
$id = $_GET['id_ktp'];

$qry = mysqli_query($conn, "SELECT * FROM tb_rekam_ktp WHERE id_ktp='$id'");
$qry = mysqli_fetch_array($qry);
$file = $qry['file_kk'];
$file_path = "assets/$file";
if (file_exists($file_path)) {
  unlink($file_path);
}

$q = mysqli_query($conn, "DELETE FROM tb_rekam_ktp WHERE id_ktp='$id'");
if ($q) {
  echo "<script>alert('Data Berhasil Dihapus');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanrekamktp'>";
} else {
  echo "<script>alert('Data Gagal Dihapus');</script>";
}
