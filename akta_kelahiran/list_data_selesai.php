<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-body">
      <div class="mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header">
                <h4 class="text-danger">Pengurusan Akta Kelahiran</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="tabel">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No.Pendaftaran</th>
                        <th>No.HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = mysqli_query($conn, "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE status_berkas='Selesai'");
                      $no = 1;
                      while($row = mysqli_fetch_array($query)) {
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['tgl']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['nik']; ?></td>
                        <td><?php echo $row['nik']; ?></td>
                        <td><?php echo $row['no_hp']; ?></td>
                        <td>
                        <?php
                        if($row['status_berkas'] == 'Baru') {?>
                          <div class="btn btn-primary" disabled><?php echo 'Baru' ?></div>
                        <?php
                        } else {?>
                          <div class="btn btn-success" disabled><?php echo 'Selesai' ?></div>
                        <?php
                        }
                        ?>
                        </td>
                        <td><button class="btn btn-info" data-toggle="modal" data-target="#modalViewVerifAktaLahir"><i class="fas fa-search"></i></button></td>
                      </tr>
                      <?php
                      }
                      ?>
                        <!-- <td><div class="btn btn-success btn-sm">Completed</div></td>
                        <td><button class="btn btn-info" data-toggle="modal" data-target="#modalLihatDataKK"><i class="fas fa-search"></i></button></td> -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
