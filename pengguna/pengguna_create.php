<?php
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $peran = $_POST['peran'];
    $cek_username = mysqli_query($konek, "select * from pengguna where username='$username'");
    if (mysqli_num_rows($cek_username) > 0) {
        echo "<script>alert('Username sudah terdaftar di sistem!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=pengguna'>";
    } else {
        $q = "insert into pengguna (username, password, peran) values ('$username', '$password', '$peran');";
        $exe = mysqli_query($konek, $q);
        if ($exe) {
            echo "<script>alert('Data pengguna berhasil ditambahkan!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php?page=pengguna'>";
        } else {
            echo "<script>alert('Data pengguna gagal ditambahkan!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php?page=pengguna'>";
        }
    }
}
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Akun Pengguna</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data Akun Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Peran</label>
                                    <select name="peran" required class="form-control">
                                        <option value="">Pilih Peran Pengguna</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                        <option value="teknisi">Teknisi</option>
                                    </select>
                                </div>
                                <a href="?page=pengguna" class="btn btn-danger float-right">Batal</a>
                                <button type="submit" class="btn btn-success float-right mr-1" name="simpan"><i class="fa fa-check"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>