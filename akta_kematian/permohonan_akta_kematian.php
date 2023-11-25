<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="mt-3">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header">
                <h4 class="text-danger">Pengurusan Akta Kematian</h4>
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
                      $sesi = $_SESSION['id'];
                      $query = mysqli_query($conn, "SELECT * FROM tb_kematian a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$sesi' ORDER BY a.id_ak DESC");
                      $no = 1;
                      while ($row = mysqli_fetch_array($query)) {
                        setlocale(LC_TIME, 'id_ID');
                        $tanggal_format = strftime('%d %B %Y', strtotime($row['tgl']));
                      ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $tanggal_format; ?></td>
                          <td><?php echo $row['nama']; ?></td>
                          <td><?php echo $row['nik']; ?></td>
                          <td><?php echo $row['nmr_urut']; ?></td>
                          <td><?php echo $row['no_hp']; ?></td>
                          <td>
                            <?php
                            if ($row['status_berkas'] == 'Baru') { ?>
                              <div class="btn btn-primary" disabled><?php echo 'Baru' ?></div>
                            <?php
                            } else { ?>
                              <div class="btn btn-success" disabled><?php echo 'Selesai' ?></div>
                            <?php
                            }
                            ?>
                          </td>
                          <td>
                            <a href="?page=viewAKM&id_ak=<?php echo $row['id_ak'] ?>" class="btn btn-info btnktp"><i class="fas fa-search"></i></a>
                            <a href="?page=deleteAKM&id_ak=<?php echo $row['id_ak'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><i class="fas fa-trash"></i></a>
                            <?php if ($row['status_berkas'] == 'Selesai' && !empty($row['file_pemohon'])) { ?>
                              <a href="assets/<?php echo $row['file_pemohon'] ?>" class="btn btn-warning btnktp" download="<?php echo $row['file_pemohon'] ?>"><i class="fas fa-arrow-down"></i></a>
                            <?php
                            } else {
                            ?>
                              <a class="btn btn-secondary btnktp" disabled><i class="fas fa-arrow-down"></i></a>
                            <?php
                            }
                            ?>
                          </td>
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
<!-- <script>
  $(function() {
    $(".btnview").click(function() {
      var id_kk = $(this).data('id_kk');
      $("#user_id").val(id_kk);
      $.ajax({
        url: 'kartu_keluarga/kk_ajax.php?op=ambil_detail',
        data: 'user_id=' + id_kk,
        success: function(msg) {
          $("#tabel").html(msg);
        }
      });
    });
  });
</script> -->