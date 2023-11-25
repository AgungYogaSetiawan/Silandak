<!-- Modal persyaratan -->
<div class="modal fade" id="modalPersyaratanSPD" tabindex="-1" role="dialog" aria-labelledby="modalPersyaratanLabel" aria-hidden="true">
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
              <li>Siapkan berkas persyaratan dengan hasil foto/scan surat keterangan pindah</li>
              <li>Siapkan berkas persyaratan dengan hasil foto/scan kartu tanda pendudukan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end modal persyaratan -->


<!-- surat pindah datang -->
<!-- Modal daftar surat pindah datang -->
<div class="modal fade" id="modalDaftarSPD" tabindex="-1" role="dialog" aria-labelledby="modalDaftarSPDLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDaftarSPDLabel">Form Pendaftaran Surat Pindah Datang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5">
          <h6><i class="fas fa-user"></i> DATA PEMOHON</h6>
        </div>
        <form method="POST" action="surat_pindah_datang/fungsi_spd.php" enctype="multipart/form-data" role="form">
          <?php
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM tb_user WHERE id_user='$id'";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_array($result);

          // mengambil data barang dengan kode paling besar
          $q = mysqli_query($conn, "SELECT max(id_pd) as kodeTerbesar FROM tb_pindah_datang");
          $d = mysqli_fetch_array($q);
          $kodeBarang = $d['kodeTerbesar'];

          // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
          // dan diubah ke integer dengan (int)
          $urutan = (int) $kodeBarang;

          // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
          $urutan++;

          // membentuk kode barang baru
          // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
          // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
          // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
          $huruf = "SPD";
          $kodeBarang = $huruf . sprintf("%05s", $urutan);
          ?>
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $data['id_user']; ?>" readonly>
          <input type="hidden" id="nmr_urut" name="nmr_urut" value="<?php echo $kodeBarang; ?>" readonly>
          <div class="row">
            <div class="form-group col-6">
              <label for="kewarganegaraan">Kewarganegaraan <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="<?php echo $data['kewarganegaraan']; ?>" required>
            </div>
            <div class="form-group col-6">
              <label for="nama">Nama Lengkap <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="nama" type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="nik">NIK <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="nik" type="text" class="form-control" name="nik" value="<?php echo $data['nik']; ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="no_hp">No.Telepon <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="no_hp" type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="pekerjaan">Pekerjaan <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="tmpt_lahir">Tempat Lahir <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="tmpt_lahir" type="text" class="form-control" name="tmpt_lahir" value="<?php echo $data['tmpt_lahir']; ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="tgl_lahir">Tanggal Lahir <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label class="d-block" for="jk">Jenis Kelamin <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jk1" name="jk" value="Laki-laki" <?php echo ($data['jk'] == 'Laki-laki') ? " checked" : "" ?> required>
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
              <label>Status <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <select class="form-control selectric" name="status" required>
                <option value="">--Pilih Status--</option>
                <option value="Belum Menikah" <?php echo ($data['status'] == 'Belum Menikah') ? " selected" : "" ?>>Belum Menikah</option>
                <option value="Sudah Menikah" <?php echo ($data['status'] == 'Sudah Menikah') ? " selected" : "" ?>>Sudah Menikah</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label for="agama">Agama <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="agama" type="text" class="form-control" name="agama" value="<?php echo $data['agama'] ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="kelurahan">Desa <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <!-- <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="<?php echo $data['kelurahan'] ?>"> -->
              <select class="form-control" name="kelurahan" required>
                <option>--Pilih Desa--</option>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM tb_penduduk");
                while ($row = mysqli_fetch_array($res)) { ?>
                  <option value="<?php echo $row['desa'] ?>" <?php if ($data["kelurahan"] == $row['desa']) {
                                                                echo "SELECTED";
                                                              } ?>><?php echo $row['desa'] ?></option>
                <?php }
                ?>
              </select>
            </div>
            <div class="form-group col-6">
              <label>Kecamatan <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <select class="form-control selectric" name="kecamatan">
                <option selected>Banua Lawas</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="rt">RT <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="rt" type="text" class="form-control" name="rt" value="<?php echo $data['rt'] ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="rw">RW <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="rw" type="text" class="form-control" name="rw" value="<?php echo $data['rw'] ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="alamat">Alamat Domisili <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="alamat" type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>" required>
            </div>
            <div class="form-group col-6">
              <label for="kode_pos">Kode Pos <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="kode_pos" type="number" class="form-control" name="kode_pos" value="<?php echo $data['kode_pos'] ?>" required>
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <hr>
          <div class="text-danger mb-5">
            <h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Surat Keterangan Pindah <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
            <div class="custom-file">
              <input type="file" class="form-control" name="file_kp" <?php if (isset($_SESSION["file_kp"])) {
                                                                        echo '';
                                                                      } else {
                                                                        echo 'required';
                                                                      } ?>>
              <?php
              if (isset($_SESSION['file_kp'])) {
                $fileName = $_SESSION['file_kp'];
                $fileSlug = $_SESSION['slug_kp'];
                echo '<p>File yang diunggah: ' . $fileSlug . '</p>';
                echo '<img src="assets/' . $fileName . '" width="100">';
              }
              ?>
              <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
            </div>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Tanda Penduduk <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
            <div class="custom-file">
              <input type="file" class="form-control" name="file_ktp" <?php if (isset($_SESSION["file_ktp"])) {
                                                                        echo '';
                                                                      } else {
                                                                        echo 'required';
                                                                      } ?>>
              <?php
              if (isset($_SESSION['file_ktp'])) {
                $fileName = $_SESSION['file_ktp'];
                $fileSlug = $_SESSION['slug_ktp'];
                echo '<p>File yang diunggah: ' . $fileSlug . '</p>';
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
            <a href="?page=beranda" class="btn btn-danger btn-md">
              <i class="fas fa-window-close"></i> Batal
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal daftar surat pindah datang -->

<!-- Modal lihat data surat pindah datang -->
<div class="modal fade" id="modalLihatDataSPD" tabindex="-1" role="dialog" aria-labelledby="modalLihatDataSPDLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLihatDataSPDLabel">Permohonan Kartu Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5">
          <h6><i class="fas fa-user"></i> DATA PEMOHON</h6>
        </div>
        <form method="POST" action="surat_pindah_datang/fungsi_spd.php" enctype="multipart/form-data" role="form">
          <?php
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id'";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_array($result);
          ?>
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $data['id_user']; ?>" readonly>
          <input type="hidden" id="fotoLamaKP" name="fotoLamaKP" value="<?php echo $data['file_kp']; ?>" readonly>
          <input type="hidden" id="fotoLamaKTP" name="fotoLamaKTP" value="<?php echo $data['file_ktp']; ?>" readonly>
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
              <label for="kelurahan">Desa</label>
              <!-- <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="<?php echo $data['kelurahan'] ?>"> -->
              <select class="form-control" name="kelurahan">
                <option>--Pilih Desa--</option>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM tb_penduduk");
                while ($row = mysqli_fetch_array($res)) { ?>
                  <option value="<?php echo $row['desa'] ?>" <?php if ($data["kelurahan"] == $row['desa']) {
                                                                echo "SELECTED";
                                                              } ?>><?php echo $row['desa'] ?></option>
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
          <div class="text-danger mb-5">
            <h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Surat Keterangan Pindah</label>
            <div class="custom-file">
              <input type="file" class="form-control" name="file_kp">
              <p class="text-dark">File yang diunggah: <?php echo $data['file_kp']; ?></p>
              <a href="assets/<?php echo $data['file_kp'] ?>"><img src="assets/<?php echo $data['file_kp'] ?>" width="100"></a>
              <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
            </div>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Tanda Penduduk</label>
            <div class="custom-file">
              <input type="file" class="form-control" name="file_ktp">
              <p class="text-dark">File yang diunggah: <?php echo $data['file_ktp']; ?></p>
              <a href="assets/<?php echo $data['file_ktp'] ?>"><img src="assets/<?php echo $data['file_ktp'] ?>" width="100"></a>
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
<!-- end modal lihat surat pindah datang -->

<!-- Modal view verif baru surat pindah datang -->
<div class="modal fade" id="modalViewVerifSPD" tabindex="-1" role="dialog" aria-labelledby="modalViewVerifSPDLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalViewVerifSPDLabel">Form Pendaftaran Surat Keterangan Pindah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5">
          <h6><i class="fas fa-user"></i> DATA PEMOHON</h6>
        </div>
        <?php
        $sql = "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        ?>
        <form method="post" action="surat_pindah_datang/fungsi_spd.php" enctype="multipart/form-data" role="form">
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $data['id_pd']; ?>" readonly>
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
          <div class="text-danger mb-5">
            <h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Surat Keterangan Pindah</label>
            <div class="custom-file">
              <input type="file" class="form-control" name="file_kp">
              <p class="text-dark">File yang diunggah: <?php echo $data['file_kp']; ?></p>
              <img src="assets/<?php echo $data['file_kp'] ?>" width="100">
              <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
            </div>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Tanda Penduduk</label>
            <div class="custom-file">
              <input type="file" class="form-control" name="file_ktp">
              <p class="text-dark">File yang diunggah: <?php echo $data['file_ktp']; ?></p>
              <img src="assets/<?php echo $data['file_ktp'] ?>" width="100">
              <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
            </div>
          </div>
          <hr>
          <div class="text-danger mb-5">
            <h6><i class="fas fa-thumbs-up"></i> Verifikasi Persyaratan</h6>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan"><?php echo $data['keterangan'] ?></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-md" name="setuju">
              <i class="fas fa-save"></i> Disetujui
            </button>
            <button type="submit" class="btn btn-danger btn-md" name="tolak">
              <i class="fas fa-user-edit"></i> Ditolak
            </button>
            <a href="dataBaruKartuKeluarga" class="btn btn-info btn-md">
              <i class="fas fa-window-close"></i> Batal
            </a>
          </div>
        </form>
        <hr>
        <div class="text-danger mb-5">
          <h6><i class="fas fa-history"></i> Data Histori</h6>
        </div>
        <?php
        $sql = "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user";
        $result = mysqli_query($conn, $sql);
        echo "<table class='table table-striped' id='tabel'>";
        echo "<thead>";
        echo "<tr>
                  <th>Waktu</th><th>Status Berkas</th><th>Keterangan</th>
                </tr>";
        echo "</thead>";

        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
          $status_berkas = $row['status_berkas'];
          if ($status_berkas == 'Baru') {
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
<!-- end modal view verif baru surat pindah datang-->

<!-- Modal view data progress surat pindah datang -->
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
        <div class="text-danger mb-5">
          <h6><i class="fas fa-user"></i> DATA PEMOHON</h6>
        </div>
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
        <div class="text-danger mb-5">
          <h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6>
        </div>
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
        <div class="text-danger mb-5">
          <h6><i class="fas fa-history"></i> Data Histori</h6>
        </div>
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
              <td>
                <div class="btn btn-success btn-sm" disabled>Completed</div>
              </td>
              <td>Berkas Oke banget silakan cetak</td>
            </tr>
          </tbody>
        </table>
        <!-- </div> -->
      </div>
    </div>
  </div>
</div>
<!-- end modal view data progress surat pindah datang -->

<!-- Modal view data selesai surat pindah datang -->
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
        <div class="text-danger mb-5">
          <h6><i class="fas fa-user"></i> DATA PEMOHON</h6>
        </div>
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
        <div class="text-danger mb-5">
          <h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6>
        </div>
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
        <div class="text-danger mb-5">
          <h6><i class="fas fa-history"></i> Data Histori</h6>
        </div>
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
              <td>
                <div class="btn btn-success btn-sm" disabled>Completed</div>
              </td>
              <td>Berkas Oke banget silakan cetak</td>
            </tr>
          </tbody>
        </table>
        <!-- </div> -->
      </div>
    </div>
  </div>
</div>
<!-- end modal view data selesai surat pindah datang -->
<!-- END surat pindah datang -->