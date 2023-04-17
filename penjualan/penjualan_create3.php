<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Penjualan</h1>
            <div class="section-header-breadcrumb">
                <?php
                $exe = mysqli_query($konek, "select id from penjualan order by id desc");
                if (mysqli_num_rows($exe) > 0) {
                    $penjualan = mysqli_fetch_array($exe);
                    $id_penjualan = $penjualan[0] + 1;
                } else {
                    $id_penjualan = 1;
                }
                ?>
                <input type="text" readonly name="id_penjualan" value="<?= $id_penjualan ?>" id="id_penjualan" class="form-control">
            </div>
        </div>

        <div class="section-body">
            <div class="row" style="margin-top: -20px;">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">ID Pelanggan</label>
                                    <input type="text" readonly id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                                </div>
                                <div class="form-group" style="margin-top: -20px;">
                                    <label for="">Nama Pelanggan</label>
                                    <!-- <div class="float-right mb-2">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-success"><i class="fa fa-search"></i> Pilih Pelanggan</a>
                                    </div> -->
                                    <input list="pelanggan" id="nama_pelanggan" autocomplete="off" name="nama_pelanggan" class="form-control" required>
                                </div>
                                <div class="form-group" style="margin-top: -20px;">
                                    <label for="">Alamat</label>
                                    <input type="text" readonly id="alamat" name="alamat" class="form-control" required>
                                </div>
                                <div class="form-group" style="margin-top: -20px;">
                                    <label for="">No Telp</label>
                                    <input type="text" readonly id="no_telp" name="no_telp" class="form-control" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pilih Barang</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <input type="text" placeholder="ID Barang" readonly name="id_barang" id="id_barang" class="form-control">
                                    </div>
                                    <div class="col-md">
                                        <input list="barang" placeholder="Nama Barang" name="nama_barang" id="nama_barang" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: -10px;">
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Harga Barang" readonly name="harga_barang" id="harga_barang" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Stok" readonly name="stok" id="stok" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" placeholder="Jumlah Beli" name="qty" id="qty" class="form-control">
                                    </div>
                                    <button type="button" class="btn btn-sm btn-info" id="pilih_barang"><i class="fa fa-plus-circle"></i> Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<datalist id="pelanggan">
    <?php
    $query = "SELECT nama_pelanggan from pelanggan";
    $exe = mysqli_query($konek, $query);
    while ($data = mysqli_fetch_array($exe)) :
        echo "<option value='" . $data['nama_pelanggan'] . "'>";
    endwhile;
    ?>
</datalist>

<datalist id="barang">
    <?php
    $query = "SELECT * from barang";
    $exe = mysqli_query($konek, $query);
    while ($data = mysqli_fetch_array($exe)) :
        echo "<option value='" . $data['nama_barang'] . "'>";
    endwhile;
    ?>
</datalist>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $(function() {

        $(":input").click(function() {
            $(this).select();
        });
        $("#nama_pelanggan").change(function() {
            var nama_pelanggan = $(this).val();
            $.ajax({
                url: 'penjualan/proses.php?op=cari_pelanggan',
                type: 'post',
                data: 'nama=' + nama_pelanggan,
                success: function(msg) {
                    var data = msg.split("|");
                    $("#id_pelanggan").val(data[0]);
                    $("#alamat").val(data[1]);
                    $("#no_telp").val(data[2]);
                    hitung();
                }
            })
        });

        $("#nama_barang").change(function() {
            var nama_barang = $(this).val();
            $.ajax({
                url: 'penjualan/proses.php?op=cari_barang',
                type: 'post',
                data: 'nama=' + nama_barang,
                success: function(msg) {
                    var data = msg.split("|");
                    $("#id_barang").val(data[0]);
                    $("#harga_barang").val(data[1]);
                    $("#stok").val(data[2]);
                }
            })
        });
    });
</script>