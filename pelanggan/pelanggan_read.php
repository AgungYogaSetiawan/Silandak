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
              <h5>Data Pelanggan</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Total Transaksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $query = mysqli_query($konek, "SELECT *, (select sum(total_penjualan) from penjualan where pelanggan_id = pelanggan.id) as total_transaksi FROM pelanggan");
                  while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row[1] . "</td>
                    <td>" . $row[2] . "</td>
                    <td>" . $row[3] . "</td>
                    <td> Rp." . number_format($row[4], 0, ",", ".") . "</td>
                    <td>";
                    if($_SESSION['peran'] == "admin"){
                      echo"<a href='?page=pelangganedit&id=$row[0]' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>
                      <a href='?page=pelanggandelete&id=$row[0]' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data ini?\");'><i class='fa fa-trash'></i></a>";
                    }
                      echo "<a href='?page=pelangganhistory&id=$row[0]' class='btn btn-success btn-sm'><i class='fa fa-eye'></i></a>
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