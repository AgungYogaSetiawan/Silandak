<?php
// koding jika disetujui
$idktp = $_GET['id_ktp'];
$sql = "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.id_ktp='$idktp'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$baru = $row['status_berkas'];
$id = $row['id_ktp'];
if(isset($_POST['setuju']) and $baru === 'Baru') {
  $keterangan = htmlspecialchars($_POST['keterangan']);
  $status_berkas = "Selesai";
    
  $sql = "UPDATE tb_rekam_ktp SET keterangan = '$keterangan', status_berkas = '$status_berkas' WHERE id_ktp = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if($hasil) {
    echo "<script>alert('Data berhasil disetujui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=dataSelesaiRekamKTP'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
  }
} else if(isset($_POST['setuju']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=dataSelesaiRekamKTP'>";
}
?>






<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="mt-3">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <form method="post" enctype="multipart/form-data" role="form">
              <input type="hidden" id="id_ktp" name="id_ktp" value="<?php echo $row['id_ktp']; ?>" readonly>
              <div class="row">
                <div class="form-group col-6">
                  <label for="kewarganegaraan">Kewarganegaraan</label>
                  <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="<?php echo $row['kewarganegaraan']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="nama">Nama Lengkap</label>
                  <input id="nama" type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="nik">NIK</label>
                  <input id="nik" type="text" class="form-control" name="nik" value="<?php echo $row['nik']; ?>">
                  <div class="invalid-feedback">
                </div>
              </div>
                <div class="form-group col-6">
                  <label for="no_hp">No.Telepon</label>
                  <input id="no_hp" type="text" class="form-control" name="no_hp" value="<?php echo $row['no_hp']; ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="pekerjaan">Pekerjaan</label>
                  <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="<?php echo $row['pekerjaan']; ?>">
                  <div class="invalid-feedback">
                </div>
              </div>
                <div class="form-group col-6">
                  <label for="tmpt_lahir">Tempat Lahir</label>
                  <input id="tmpt_lahir" type="text" class="form-control" name="tmpt_lahir" value="<?php echo $row['tmpt_lahir']; ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>">
                  <div class="invalid-feedback">
                </div>
              </div>
                <div class="form-group col-6">
                  <label class="d-block" for="jk">Jenis Kelamin</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="jk1" name="jk" value="Laki-laki" <?php echo ($row['jk'] == 'Laki-laki') ? " checked" : "" ?>>
                    <label class="form-check-label" for="jk">Laki-laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="jk2" name="jk" value="Perempuan" <?php echo ($row['jk'] == 'Perempuan') ? " checked" : "" ?>>
                    <label class="form-check-label" for="jk">Perempuan</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label>Status</label>
                  <select class="form-control selectric" name="status">
                    <option value="">--Pilih Status--</option>
                    <option value="Belum Menikah" <?php echo ($row['status'] == 'Belum Menikah') ? " selected" : "" ?>>Belum Menikah</option>
                    <option value="Sudah Menikah" <?php echo ($row['status'] == 'Sudah Menikah') ? " selected" : "" ?>>Sudah Menikah</option>
                  </select>
                </div>
                <div class="form-group col-6">
                  <label for="agama">Agama</label>
                  <input id="agama" type="text" class="form-control" name="agama" value="<?php echo $row['agama'] ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="kelurahan">Desa</label>
                  <!-- <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="<?php echo $row['kelurahan'] ?>"> -->
                  <select class="form-control" name="kelurahan">
                      <option>--Pilih Desa--</option>
                      <?php
                      $res = mysqli_query($conn,"SELECT * FROM tb_penduduk");
                      while($rows = mysqli_fetch_array($res)){?> 
                      <option value="<?php echo $rows['desa']?>" <?php if($row["kelurahan"] == $rows['desa']){echo "SELECTED";} ?>><?php echo $rows['desa']?></option>
                      <?php } 
                      ?>
                  </select>
                </div>
                <div class="form-group col-6">
                  <label>Kecamatan</label>
                  <select class="form-control selectric" name="kecamatan">
                    <option selected>Banua Lawas</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="rt">RT</label>
                  <input id="rt" type="text" class="form-control" name="rt" value="<?php echo $row['rt'] ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
                <div class="form-group col-6">
                  <label for="rw">RW</label>
                  <input id="rw" type="text" class="form-control" name="rw" value="<?php echo $row['rw'] ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="alamat">Alamat Domisili</label>
                  <input id="alamat" type="text" class="form-control" name="alamat" value="<?php echo $row['alamat'] ?>">
                </div>
                <div class="form-group col-6">
                  <label for="kode_pos">Kode Pos</label>
                  <input id="kode_pos" type="number" class="form-control" name="kode_pos" value="<?php echo $row['kode_pos'] ?>">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-danger mb-5"><h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6></div>
              <div class="form-group">
                <label>Upload Foto/Scan Kartu Keluarga</label>
                <div class="custom-file">
                  <input type="file" class="form-control" name="file_kk">
                  <p class="text-dark">File yang diunggah: <?php echo $row['file_kk']; ?></p>
                  <a href="assets/<?php echo $row['file_kk'] ?>"><img src="assets/<?php echo $row['file_kk'] ?>" width="100"></a>
                  <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                </div>
              </div>
              <hr>
              <div class="text-danger mb-5"><h6><i class="fas fa-thumbs-up"></i> Verifikasi Persyaratan</h6></div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea class="form-control" name="keterangan"><?php echo $row['keterangan'] ?></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-md" name="setuju">
                    <i class="fas fa-save"></i> Disetujui
                  </button>
                  <button type="submit" class="btn btn-danger btn-md" name="tolak">
                    <i class="fas fa-user-edit"></i> Ditolak
                  </button>
                  <a href="?page=dataBaruRekamKTP" class="btn btn-info btn-md">
                    <i class="fas fa-window-close"></i> Batal
                  </a>
                </div>
            </form>
                <hr>
                <div class="text-danger mb-5"><h6><i class="fas fa-history"></i> Data Histori</h6></div>
                <?php
                // $id = $_SESSION['id'];
                $sql = "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.user_id='$idktp'";
                $result = mysqli_query($conn,$sql);
                echo "<table class='table table-striped' id='tabel'>";
                echo "<thead>";
                echo "<tr>
                        <th>Waktu</th><th>Status Berkas</th><th>Keterangan</th>
                      </tr>";
                echo "</thead>";

                echo "<tbody>";
                while ($row = mysqli_fetch_array($result)) {
                    $status_berkas = $row['status_berkas'];
                    if($status_berkas == 'Baru') {
                      $alert = 'primary';
                    } else {
                      $alert = 'success';
                    }
                    echo "<tr>
                            <td>" . $row['tgl'] . "</td>
                            <td><div class='btn btn-$alert' disabled>$status_berkas</div></td>
                            <td>" . $row['keterangan'] . "</td>
                          </tr>";
                }

                echo "</tbody>";
                echo "</table>";

                ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
