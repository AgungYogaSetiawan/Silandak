<?php
if (isset($_POST['simpan'])) {
    $nama_layanan = $_POST['nama_layanan'];
    $biaya = $_POST['biaya'];
    $lama_pengerjaan = $_POST['lama_pengerjaan'];
    $q = "insert into layanan (nama_layanan, biaya, lama_pengerjaan) values ('$nama_layanan', '$biaya', '$lama_pengerjaan');";
    $exe = mysqli_query($konek, $q);
    if ($exe) {
        echo "<script>alert('Data layanan berhasil ditambahkan!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=layanan'>";
    } else {
        echo "<script>alert('Data layanan gagal ditambahkan!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?page=layanan'>";
    }
}
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
                            <h4>Tambah Data Layanan Service</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Nama Layanan</label>
                                    <input type="text" name="nama_layanan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Biaya Layanan</label>
                                    <input type="number" min=0 step=50000 name="biaya" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Lama Pengerjaan</label>
                                    <input type="number" min=0 step=1 name="lama_pengerjaan" class="form-control" required>
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