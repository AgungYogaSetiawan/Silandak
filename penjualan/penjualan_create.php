<script>
    function tampil_keranjang() {
        var id_penjualan = $("#id_penjualan").val();
        $.ajax({
            url: 'penjualan/proses_penjualan.php?op=tampil_barang',
            type: 'post',
            data: 'id_penjualan=' + id_penjualan,
            success: function(msg) {
                $("#data").html(msg);
            }
        })
    }

    function hapus(id) {
        $.ajax({
            url: 'penjualan/proses_penjualan.php?op=hapus_barang',
            data: "id=" + id,
            success: function(html) {
                tampil_keranjang();
            }
        });
    }
</script>

<body onload="tampil_keranjang()">
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
                                            <input type="number" placeholder="Jumlah Beli" min=1 name="qty" id="qty" class="form-control">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-info" id="tambah_barang"><i class="fa fa-plus-circle"></i> Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Keranjang Belanja</h4>
                                </div>
                                <div class="card-body">
                                    <div id="data"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    <datalist id="pelanggan">
        <?php
        $exe = mysqli_query($konek, "select nama_pelanggan from pelanggan");
        while ($data = mysqli_fetch_array($exe)) {
            echo "<option value='" . $data['nama_pelanggan'] . "'>";
        }
        ?>
    </datalist>

    <datalist id="barang">
        <?php
        $exe = mysqli_query($konek, "select nama_barang from barang");
        while ($data = mysqli_fetch_array($exe)) {
            echo "<option value='" . $data['nama_barang'] . "'>";
        }
        ?>
    </datalist>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</body>
<script>
    $(function() {

        $(":input").click(function() {
            $(this).select();
        });

        $("#nama_pelanggan").change(function() {
            var nama_p = $(this).val();
            $.ajax({
                url: 'penjualan/proses_penjualan.php?op=cari_pelanggan',
                type: 'post',
                data: 'nama=' + nama_p,
                success: function(msg) {
                    var data_pelanggan = msg.split("|");
                    $("#id_pelanggan").val(data_pelanggan[0]);
                    $("#alamat").val(data_pelanggan[1]);
                    $("#no_telp").val(data_pelanggan[2]);
                }
            })
        });

        $("#nama_barang").change(function() {
            var nama_p = $(this).val();
            $.ajax({
                url: 'penjualan/proses_penjualan.php?op=cari_barang',
                type: 'post',
                data: 'nama=' + nama_p,
                success: function(msg) {
                    var data_barang = msg.split("|");
                    $("#id_barang").val(data_barang[0]);
                    $("#harga_barang").val(data_barang[1]);
                    $("#stok").val(data_barang[2]);
                }
            })
        });

        $("#tambah_barang").click(function() {
            var id_barang = $("#id_barang").val();
            var id_penjualan = $("#id_penjualan").val();
            var harga = $("#harga_barang").val();
            var stok = $("#stok").val();
            var qty = $("#qty").val();
            if (id_barang.length <= 0) {
                alert('Nama barang belum dipilih');
            } else if (qty.length <= 0) {
                alert('Jumlah beli belum diisi');
            } else if (qty > stok) {
                alert('Stok tidak mencukupi');
            } else {
                $.ajax({
                    url: 'penjualan/proses_penjualan.php?op=tambah_barang',
                    type: 'get',
                    data: 'id_penjualan=' + id_penjualan + "&id_barang=" + id_barang + "&harga=" + harga + "&qty=" + qty,
                    success: function(msg) {
                        if (msg == "sukses") {
                            tampil_keranjang();
                            $("#harga_barang").val('');
                            $("#id_barang").val('');
                            $("#nama_barang").val('');
                            $("#stok").val('');
                            $("#qty").val('');
                        }
                    }
                })
            }
        });
    });
</script>