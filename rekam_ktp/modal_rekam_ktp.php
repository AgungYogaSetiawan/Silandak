<!-- Modal persyaratan -->
<div class="modal fade" id="modalPersyaratanKTP" tabindex="-1" role="dialog" aria-labelledby="modalPersyaratanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPersyaratanLabel">Persyaratan dan Ketentuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodydetail">
        <div class="author-box">
            <div class="author-box">
            <ol>
              <li>Mengisi formulir data pemohon</li>
              <li>Siapkan berkas persyaratan dengan hasil foto/scan kartu keluarga</li>
            </ol>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end modal persyaratan -->


<!-- rekam ktp -->
<!-- Modal daftar rekam ktp -->
<div class="modal fade" id="modalDaftarKTP" tabindex="-1" role="dialog" aria-labelledby="modalDaftarKTPLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDaftarKTPLabel">Form Pendaftaran Rekam KTP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
        <form method="POST" action="rekam_ktp/fungsi_rekam_ktp.php" enctype="multipart/form-data" role="form">
          <?php
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM tb_user WHERE id_user='$id'";
          $result = mysqli_query($conn,$sql);
          $data = mysqli_fetch_array($result);
          ?>
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $data['id_user']; ?>" readonly>
          <div class="row">
            <div class="form-group col-6">
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="<?php echo $data['kewarganegaraan']; ?>">
            </div>
            <div class="form-group col-6">
              <label for="nama">Nama Lengkap</label>
              <input id="nama" type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              <label for="nik">NIK</label>
              <input id="nik" type="text" class="form-control" name="nik" value="<?php echo $data['nik']; ?>">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label for="no_hp">No.Telepon</label>
              <input id="no_hp" type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              <label for="pekerjaan">Pekerjaan</label>
              <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label for="tmpt_lahir">Tempat Lahir</label>
              <input id="tmpt_lahir" type="text" class="form-control" name="tmpt_lahir" value="<?php echo $data['tmpt_lahir']; ?>">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label class="d-block" for="jk">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk1" name="jk" value="Laki-laki" <?php echo ($data['jk'] == 'Laki-laki') ? " checked" : "" ?>>
                <label class="form-check-label" for="jk">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk2" name="jk" value="Perempuan" <?php echo ($data['jk'] == 'Perempuan') ? " checked" : "" ?>>
                <label class="form-check-label" for="jk">Perempuan</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label>Status</label>
              <select class="form-control selectric" name="status">
                <option value="">--Pilih Status--</option>
                <option value="Belum Menikah" <?php echo ($data['status'] == 'Belum Menikah') ? " selected" : "" ?>>Belum Menikah</option>
                <option value="Sudah Menikah" <?php echo ($data['status'] == 'Sudah Menikah') ? " selected" : "" ?>>Sudah Menikah</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label for="agama">Agama</label>
              <input id="agama" type="text" class="form-control" name="agama" value="<?php echo $data['agama'] ?>">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="kelurahan">Kelurahan</label>
              <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="<?php echo $data['kelurahan'] ?>">
              <!-- <select class="form-control selectric">
                <option value="">--Pilih Kelurahan--</option>
                <option value="">West Java</option>
                <option>East Java</option>
              </select> -->
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
              <input id="rt" type="text" class="form-control" name="rt" value="<?php echo $data['rt'] ?>">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="rw">RW</label>
              <input id="rw" type="text" class="form-control" name="rw" value="<?php echo $data['rw'] ?>">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="alamat">Alamat Domisili</label>
              <input id="alamat" type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>">
            </div>
            <div class="form-group col-6">
              <label for="kode_pos">Kode Pos</label>
              <input id="kode_pos" type="number" class="form-control" name="kode_pos" value="<?php echo $data['kode_pos'] ?>">
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
              <?php
              if (isset($_SESSION['file_name'])) {
                $fileName = $_SESSION['file_name'];
                echo '<p>File yang diunggah: ' . $fileName . '</p>';
                echo '<img src="assets/' . $fileName . '" width="100">';
              }
              ?>
              
              <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-md" name="kirim">
              <i class="fas fa-paper-plane"></i> Kirim
            </button>
            <button type="submit" class="btn btn-warning btn-md" name="simpan_sementara">
              <i class="fas fa-save"></i> Simpan Sementara
            </button>
            <button type="reset" class="btn btn-danger btn-md">
              <i class="fas fa-window-close"></i> Batal
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal daftar rekam ktp -->

<!-- Modal lihat data rekam ktp -->
<div class="modal fade" id="modalLihatDataKTP" tabindex="-1" role="dialog" aria-labelledby="modalLihatDataKTPLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLihatDataKTPLabel">Permohonan Rekam KTP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
        <form method="POST" action="rekam_ktp/fungsi_rekam_ktp.php" enctype="multipart/form-data" role="form">
          <?php
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id'";
          $result = mysqli_query($conn,$sql);
          $data = mysqli_fetch_array($result);
          ?>
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $data['id_user']; ?>" readonly>
          <input type="hidden" id="fotoLamaKK" name="fotoLamaKK" value="<?php echo $data['file_kk']; ?>" readonly>
          <div class="row">
            <div class="form-group col-6">
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="<?php echo $data['kewarganegaraan']; ?>">
            </div>
            <div class="form-group col-6">
              <label for="nama">Nama Lengkap</label>
              <input id="nama" type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              <label for="nik">NIK</label>
              <input id="nik" type="text" class="form-control" name="nik" value="<?php echo $data['nik']; ?>">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label for="no_hp">No.Telepon</label>
              <input id="no_hp" type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              <label for="pekerjaan">Pekerjaan</label>
              <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label for="tmpt_lahir">Tempat Lahir</label>
              <input id="tmpt_lahir" type="text" class="form-control" name="tmpt_lahir" value="<?php echo $data['tmpt_lahir']; ?>">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label class="d-block" for="jk">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk1" name="jk" value="Laki-laki" <?php echo ($data['jk'] == 'Laki-laki') ? " checked" : "" ?>>
                <label class="form-check-label" for="jk">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk2" name="jk" value="Perempuan" <?php echo ($data['jk'] == 'Perempuan') ? " checked" : "" ?>>
                <label class="form-check-label" for="jk">Perempuan</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label>Status</label>
              <select class="form-control selectric" name="status">
                <option value="">--Pilih Status--</option>
                <option value="Belum Menikah" <?php echo ($data['status'] == 'Belum Menikah') ? " selected" : "" ?>>Belum Menikah</option>
                <option value="Sudah Menikah" <?php echo ($data['status'] == 'Sudah Menikah') ? " selected" : "" ?>>Sudah Menikah</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label for="agama">Agama</label>
              <input id="agama" type="text" class="form-control" name="agama" value="<?php echo $data['agama'] ?>">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="kelurahan">Kelurahan</label>
              <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="<?php echo $data['kelurahan'] ?>">
              <!-- <select class="form-control selectric">
                <option value="">--Pilih Kelurahan--</option>
                <option value="">West Java</option>
                <option>East Java</option>
              </select> -->
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
              <input id="rt" type="text" class="form-control" name="rt" value="<?php echo $data['rt'] ?>">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="rw">RW</label>
              <input id="rw" type="text" class="form-control" name="rw" value="<?php echo $data['rw'] ?>">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="alamat">Alamat Domisili</label>
              <input id="alamat" type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>">
            </div>
            <div class="form-group col-6">
              <label for="kode_pos">Kode Pos</label>
              <input id="kode_pos" type="number" class="form-control" name="kode_pos" value="<?php echo $data['kode_pos'] ?>">
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
              <p class="text-dark">File yang diunggah: <?php echo $data['file_kk']; ?></p>
              <img src="assets/<?php echo $data['file_kk'] ?>" width="100">
              <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-md" name="ubah">
              <i class="fas fa-save"></i> Simpan
            </button>
            <button type="reset" class="btn btn-danger btn-md">
              <i class="fas fa-window-close"></i> Batal
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal lihat rekam ktp -->



<!-- Modal view data progress rekam ktp -->
<div class="modal fade" id="modalViewVerifProgressKK" tabindex="-1" role="dialog" aria-labelledby="modalViewVerifProgressKKLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalViewVerifProgressKKLabel">Form Pendaftaran Kartu Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
          <div class="row">
            <div class="form-group col-6">
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" autofocus>
            </div>
            <div class="form-group col-6">
              <label for="nama">Nama Lengkap</label>
              <input id="nama" type="text" class="form-control" name="nama">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              <label for="nik">NIK</label>
              <input id="nik" type="text" class="form-control" name="nik">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label for="no_hp">No.Telepon</label>
              <input id="no_hp" type="number" class="form-control" name="no_hp">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              <label for="pekerjaan">Pekerjaan</label>
              <input id="pekerjaan" type="text" class="form-control" name="pekerjaan">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label class="d-block" for="jk">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk" value="">
                <label class="form-check-label" for="jk">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk" value="">
                <label class="form-check-label" for="jk">Perempuan</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label>Status</label>
              <select class="form-control selectric">
                <option selected>--Pilih Status--</option>
                <option>West Java</option>
                <option>East Java</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label for="agama">Agama</label>
              <input id="agama" type="text" class="form-control" name="agama">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label>Kelurahan</label>
              <select class="form-control selectric">
                <option selected>--Pilih Kelurahan--</option>
                <option>West Java</option>
                <option>East Java</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label>Kecamatan</label>
              <select class="form-control selectric">
                <option selected>Banua Lawas</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="rt">RT</label>
              <input id="rt" type="number" class="form-control" name="rt">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="rw">RW</label>
              <input id="rw" type="number" class="form-control" name="rw">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label>Alamat Domisili</label>
              <textarea class="form-control"></textarea>
            </div>
            <div class="form-group col-6">
              <label for="kodepos">Kode Pos</label>
              <input id="kodepos" type="number" class="form-control" name="kodepos">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6></div>
          <div class="form-group">
            <label>Foto/Scan Buku Nikah Suami Istri</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Foto/Scan Akta Mertua dan Orang Tua</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Foto/Scan Kartu Tanda Penduduk</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-history"></i> Data Histori</h6></div>
          <!-- <div class="table-responsive"> -->
            <table class="table table-striped" id="tabel">
              <thead>
                <tr>
                  <th>Waktu</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>04 April 2023</td>
                  <td><div class="btn btn-success btn-sm" disabled>Completed</div></td>
                  <td>Berkas Oke banget silakan cetak</td>
                </tr>
              </tbody>
            </table>
          <!-- </div> -->
      </div>
    </div>
  </div>
</div>
<!-- end modal view data progress rekam ktp -->

<!-- Modal view data selesai rekam ktp -->
<div class="modal fade" id="modalViewVerifSelesaiKK" tabindex="-1" role="dialog" aria-labelledby="modalViewVerifSelesaiKKLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalViewVerifSelesaiKKLabel">Form Pendaftaran Kartu Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
          <div class="row">
            <div class="form-group col-6">
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" autofocus>
            </div>
            <div class="form-group col-6">
              <label for="nama">Nama Lengkap</label>
              <input id="nama" type="text" class="form-control" name="nama">
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              <label for="nik">NIK</label>
              <input id="nik" type="text" class="form-control" name="nik">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label for="no_hp">No.Telepon</label>
              <input id="no_hp" type="number" class="form-control" name="no_hp">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-6">
              <label for="pekerjaan">Pekerjaan</label>
              <input id="pekerjaan" type="text" class="form-control" name="pekerjaan">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir">
              <div class="invalid-feedback">
            </div>
          </div>
            <div class="form-group col-6">
              <label class="d-block" for="jk">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk" value="">
                <label class="form-check-label" for="jk">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk" value="">
                <label class="form-check-label" for="jk">Perempuan</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label>Status</label>
              <select class="form-control selectric">
                <option selected>--Pilih Status--</option>
                <option>West Java</option>
                <option>East Java</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label for="agama">Agama</label>
              <input id="agama" type="text" class="form-control" name="agama">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label>Kelurahan</label>
              <select class="form-control selectric">
                <option selected>--Pilih Kelurahan--</option>
                <option>West Java</option>
                <option>East Java</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label>Kecamatan</label>
              <select class="form-control selectric">
                <option selected>Banua Lawas</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="rt">RT</label>
              <input id="rt" type="number" class="form-control" name="rt">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="rw">RW</label>
              <input id="rw" type="number" class="form-control" name="rw">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label>Alamat Domisili</label>
              <textarea class="form-control"></textarea>
            </div>
            <div class="form-group col-6">
              <label for="kodepos">Kode Pos</label>
              <input id="kodepos" type="number" class="form-control" name="kodepos">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6></div>
          <div class="form-group">
            <label>Foto/Scan Buku Nikah Suami Istri</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Foto/Scan Akta Mertua dan Orang Tua</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Foto/Scan Kartu Tanda Penduduk</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-history"></i> Data Histori</h6></div>
          <!-- <div class="table-responsive"> -->
            <table class="table table-striped" id="tabel">
              <thead>
                <tr>
                  <th>Waktu</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>04 April 2023</td>
                  <td><div class="btn btn-success btn-sm" disabled>Completed</div></td>
                  <td>Berkas Oke banget silakan cetak</td>
                </tr>
              </tbody>
            </table>
          <!-- </div> -->
      </div>
    </div>
  </div>
</div>
<!-- end modal view data selesai rekam ktp -->
<!-- END rekam ktp -->