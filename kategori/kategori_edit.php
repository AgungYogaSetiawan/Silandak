<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $q = "update kategori_barang set nama_kategori='$nama_kategori' where id='$id'";
    $exe = mysqli_query($konek, $q);
    if ($exe) {
        echo "<script>alert('Data kategori berhasil diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=kategori'>";
    } else {
        echo "<script>alert('Data kategori gagal diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=kategori'>";
    }
}
$exe = mysqli_query($konek, "select * from kategori_barang where id='$id'");
$data = mysqli_fetch_array($exe);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori Barang</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Perbaharui Data Kategori Barang</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" value="<?= $data['nama_kategori'] ?>" name="nama_kategori" class="form-control" required>
                                </div>
                                <a href="?page=kategori" class="btn btn-danger float-right">Batal</a>
                                <button type="submit" class="btn btn-success float-right mr-1" name="simpan"><i class="fa fa-check"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>