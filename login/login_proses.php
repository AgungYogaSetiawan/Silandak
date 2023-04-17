<?php
session_start();
include '../pengaturan/koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$cek_login = mysqli_query($konek, "select * from pengguna where username='$username' and password='$password'");
if (mysqli_num_rows($cek_login) > 0) {
    $data = mysqli_fetch_array($cek_login);
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['peran'] = $data['peran'];
    $login_terakhir = date('Y-m-d h:i:s');
    mysqli_query($konek, "update pengguna set login_terakhir='$login_terakhir' where username='$username'");
    echo "<script>alert('Login Berhasil! Selamat datang=$username');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../index.php?page=beranda'>";
} else {
    echo "<script>alert('Username dan Password tidak cocok!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=login_view.php'>";
}
