<?php
$id = $_GET['id_penduduk'];
$q = mysqli_query($conn, "DELETE FROM tb_penduduk WHERE id_penduduk='$id'");
$_SESSION["sukses"] = 'Data Berhasil Dihapus';
header('Location: data_kependudukan.php?page=datakependudukan');