<?php
    include "../pengaturan/koneksi.php";
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = mysqli_query($konek, "UPDATE tb_user SET username = '$username', password = '$password' WHERE id_user=$id_user");
    if ($sql) {
        //jika  berhasil tampil ini
        echo "<script>alert('Data berhasil diubah!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=../index.php?page=users'>";
    } else {
        // jika gagal tampil ini
        echo "<script>alert('Data gagal diubah, mohon ulangi lagi!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=../index.php?page=users'>";
    }
?>