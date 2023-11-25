<?php
$id = $_GET['id_bio'];

$qry = mysqli_query($conn, "SELECT * FROM tb_bio_wni WHERE id_bio='$id'");
$qry = mysqli_fetch_array($qry);
$file1 = $qry['file_kk'];
$file_path1 = "assets/$file1";
if (file_exists($file_path1)) {
  unlink($file_path1);
}

$q = mysqli_query($conn, "DELETE FROM tb_bio_wni WHERE id_bio='$id'");
if ($q) {
  echo "<script>alert('Data Berhasil Dihapus');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanbiodatawni'>";
} else {
  echo "<script>alert('Data Gagal Dihapus');</script>";
}
