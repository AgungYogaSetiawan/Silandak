<?php 
// koneksi ke database
$conn = mysqli_connect("localhost","root","","silandak");


// fungsi registrasi
function registrasi($data){
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $level = "warga";

  // cek username sudah ada atau belum
  $cek = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");
  if(mysqli_fetch_assoc($cek)){
    echo "<script>alert('username sudah terdaftar!');</script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan user ke database
  mysqli_query($conn, "INSERT INTO tb_user VALUES('','$username','$password','$level')");

  return mysqli_affected_rows($conn);
}