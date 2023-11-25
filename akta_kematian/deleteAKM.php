<?php
$id = $_GET['id_ak'];

$qry = mysqli_query($conn, "SELECT * FROM tb_kematian WHERE id_ak='$id'");
$qry = mysqli_fetch_array($qry);
$file1 = $qry['file_sk'];
$file2 = $qry['file_kk'];
$file_path1 = "assets/$file1";
$file_path2 = "assets/$file2";
if (file_exists($file_path1) && file_exists($file_path2)) {
  unlink($file_path1);
  unlink($file_path2);
}

$q = mysqli_query($conn, "DELETE FROM tb_kematian WHERE id_ak='$id'");
if ($q) {
  echo "<script>alert('Data Berhasil Dihapus');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanaktakematian'>";
} else {
  echo "<script>alert('Data Gagal Dihapus');</script>";
}
