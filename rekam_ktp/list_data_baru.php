<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-body">
      <div class="mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header">
                <h4 class="text-danger">Pengurusan Rekam KTP</h4>
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
                      $query = mysqli_query($conn, "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE status_berkas='Baru'");
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
                        <td><a href="?page=detailKTP&id_ktp=<?php echo $row['user_id'] ?>" class="btn btn-info btnktp"><i class="fas fa-search"></i></a></td>
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

<!-- Modal view verif baru rekam ktp -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="modalViewVerifKTPLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalViewVerifKTPLabel">Form Pendaftaran Rekam KTP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        
      </div>
    </div>
  </div>
</div>
<!-- end modal view verif baru rekam ktp -->

<script>
$(document).ready(function(){
	$('.btnktp').click(function(){
		var data_id = $(this).data("id_ktp")
		$.ajax({
			url: "rekam_ktp/detail.php",
			method: "POST",
			data: {data_id: data_id},
			success: function(data){
				$("#bodydetail").html(data)
				$("#show").modal('show')
			}
		})
	})
})
</script>
