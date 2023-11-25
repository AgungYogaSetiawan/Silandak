<?php
$id = $_GET['id_sp'];

$qry = mysqli_query($conn, "SELECT * FROM tb_surat_pindah WHERE id_sp='$id'");
$qry = mysqli_fetch_array($qry);
$file1 = $qry['file_akta_lahir'];
$file2 = $qry['file_ket_lahir'];
$file3 = $qry['file_buku_nikah'];
$file_path1 = "assets/$file1";
$file_path2 = "assets/$file2";
$file_path3 = "assets/$file3";
if (file_exists($file_path1) && file_exists($file_path2) && file_exists($file_path3)) {
  unlink($file_path1);
  unlink($file_path2);
  unlink($file_path3);
}

$q = mysqli_query($conn, "DELETE FROM tb_surat_pindah WHERE id_sp='$id'");
if ($q) {
  echo "<script>alert('Data Berhasil Dihapus');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonansuratpindah'>";
} else {
  echo "<script>alert('Data Gagal Dihapus');</script>";
}
