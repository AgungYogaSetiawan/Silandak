<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pelanggan</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Riwayat Transaksi Pelanggan</h4>
              <div class="card-header-action">
                <a href='?page=pelanggan' class='btn btn-success btn-sm'><i class='fa fa-arrow-left'></i>Kembali</a>
              </div>
            </div>
            <div class="card-body">
              <?php
              $idpelanggan = $_GET['id'];
              $q = mysqli_query($konek, "select * from pelanggan where id='$idpelanggan'");
              $datapelanggan = mysqli_fetch_array($q);
              ?>
              <p>ID Pelanggan : <b> <?= $datapelanggan[0]; ?> </b></p>
              <p>Nama Pelanggan : <b> <?= $datapelanggan[1]; ?> </b></p>

              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Transaksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $query = mysqli_query($konek, "SELECT * from penjualan where pelanggan_id='$idpelanggan'");
                  while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row[1] . "</td>                                        
                    <td> Rp." . number_format($row[3], 0, ",", ".") . "</td>
                    <td>
                     <button type='button' class='btn btn-primary btnhistory' data-toggle='modal' data-target='#exampleModal' data-id='" . $row[0] . "'><i class='fa fa-eye'></i></button>
                     </td>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodydetail">
        
      </div>
      <div class="modal-footer">
        <form action="pelanggan/nota_pelanggan.php" method="post" target="_blank">
          <input type="hidden" name="idpenjualan" id="idpen">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
  $(function() {
    $(".btnhistory").click(function() {
      var id = $(this).data('id');
      $("#idpen").val(id);
      $.ajax({
        url: 'pelanggan/pelanggan_ajax.php?op=ambil_detail',
        data: 'idpenjualan=' + id,
        success: function(msg) {
          $("#bodydetail").html(msg);
        }
      });
    });
  });
</script>