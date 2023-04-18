<?php
session_start();
require '../pengaturan/fungsi.php';
// Jika form ubah password disubmit
if (isset($_POST['ubah'])) {
  // Ambil password lama, password baru, dan konfirmasi password baru yang dimasukkan oleh user
  $old_pass = $_POST["old_pass"];
  $new_pass = $_POST["new_pass"];
  $re_pass = $_POST["re_pass"];

  // Cek apakah password lama yang dimasukkan oleh user sesuai dengan password yang tersimpan pada database
  $user_id = $_SESSION["id"];
  $sql = "SELECT password FROM tb_user WHERE id_user = $user_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_password = $row["password"];
    if (password_verify($old_pass, $stored_password)) {
      // Jika password lama sesuai, cek apakah password baru dan konfirmasi password baru sama
      if ($new_pass == $re_pass) {
        // Jika password baru dan konfirmasi password baru sama, hash password baru dan simpan ke database
        $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
        $sql = "UPDATE tb_user SET password = '$hashed_password' WHERE id_user = $user_id";
        if ($conn->query($sql) === TRUE) {
          // Tampilkan pesan berhasil jika password berhasil diubah
          echo "<script>alert('Password berhasil diubah!');</script>";
          echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
        } else {
          echo "<script>alert('Password gagal diubah!');</script>";
          echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
        }
      } else {
        // Tampilkan pesan kesalahan jika password baru dan konfirmasi password baru tidak sama
        echo "<script>alert('Konfirmasi password baru tidak sesuai, mohon ulangi lagi!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
      }
    }
  }
}




?>