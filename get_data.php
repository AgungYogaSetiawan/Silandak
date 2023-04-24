<?php
  // Koneksi ke database
  $conn = mysqli_connect('localhost', 'root', '', 'silandak');

  // Ambil data dari database berdasarkan ID
  $id = $_GET['id_user'];
  $query = "SELECT * FROM tb_user WHERE id_user = $id";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);

  // Kembalikan data dalam format JSON
  header('Content-Type: application/json');
  echo json_encode($data);
?>
