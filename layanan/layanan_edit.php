<?php
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
    $nama_layanan = $_POST['nama_layanan'];
    $biaya = $_POST['biaya'];
    $lama_pengerjaan = $_POST['lama_pengerjaan'];
    $q = "update layanan set nama_layanan='$nama_layanan', biaya='$biaya', lama_pengerjaan='$lama_pengerjaan' where id='$id'";
    $exe = mysqli_query($konek, $q);
    if ($exe) {
        echo "<script>alert('Data layanan berhasil diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=layanan'>";
    } else {
        echo "<script>alert('Data layanan gagal diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=layanan'>";
    }
}
$exe = mysqli_query($konek, "select * from layanan where id='$id'");
$data = mysqli_fetch_array($exe);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Layanan Service</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Perbaharui Data Layanan Service</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Nama Layanan Service</label>
                                    <input type="text" value="<?= $data['nama_layanan'] ?>" name="nama_layanan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Biaya Layanan Service</label>
                                    <input type="number" value="<?= $data['biaya'] ?>" min=0 step=50000 name="biaya" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Lama Pengerjaan</label>
                                    <input type="number" value="<?= $data['lama_pengerjaan'] ?>" min=0 step=1 name="lama_pengerjaan" class="form-control" required>
                                </div>
                                <a href="?page=layanan" class="btn btn-danger float-right">Batal</a>
                                <button type="submit" class="btn btn-success float-right mr-1" name="simpan"><i class="fa fa-check"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>