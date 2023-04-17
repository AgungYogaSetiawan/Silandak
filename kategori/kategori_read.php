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
                            <h4>Data Kategori Barang</h4>
                            <div class="card-header-action">
                                <a href="?page=kategori_create" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                                <a href="kategori/kategori_print.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = "SELECT * from kategori_barang";
                                    $exe = mysqli_query($konek, $query);
                                    while ($data = mysqli_fetch_array($exe)) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama_kategori']; ?></td>
                                            <td>
                                                <a href="?page=kategori_edit&id=<?= $data['id'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>Edit</a>
                                                <a href="?page=kategori_delete&id=<?= $data['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Ingin hapus data ini?');"><i class="fa fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>