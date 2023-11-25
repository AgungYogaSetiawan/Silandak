<?php
// koding jika disetujui
$idspd = $_GET['id_spd'];
$sql = "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.id_pd='$idspd'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_pd'];
if (isset($_POST['ubah']) and $baru === 'Baru') {
  // foto keterangan pindah
  $str = rand();
  $str1 = md5($str);
  $fotoLamaKP = htmlspecialchars($_POST['fotoLamaKP']);
  $namaFileKP1 = $_FILES['file_kp']['name'];
  $ukuranFileKP = $_FILES['file_kp']['size'];
  $errorKP = $_FILES['file_kp']['error'];
  $tmpNameKP = $_FILES['file_kp']['tmp_name'];
  $pdf_KP = explode('.', $namaFileKP1);
  $ekstensi_KP = strtolower(end($pdf_KP));
  $namaFileKP = date('ymdhis') . $str1 . '.' . $ekstensi_KP;

  move_uploaded_file($tmpNameKP, 'assets/' . $namaFileKP);
  // cek apakah edit foto baru
  if ($_FILES['file_kp']['error'] === 4) {
    $fotoKP = $fotoLamaKP;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorKP === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKP = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarKP = explode('.', $namaFileKP);
    $ekstensiGambarKP = strtolower(end($ekstensiGambarKP));
    if (!in_array($ekstensiGambarKP, $ekstensiKP)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileKP > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKP = $namaFileKP;
  }

  // foto KTP
  $str = rand();
  $str2 = md5($str);
  $fotoLamaKTP = htmlspecialchars($_POST['fotoLamaKTP']);
  $namaFileKTP1 = $_FILES['file_ktp']['name'];
  $ukuranFileKTP = $_FILES['file_ktp']['size'];
  $errorKTP = $_FILES['file_ktp']['error'];
  $tmpNameKTP = $_FILES['file_ktp']['tmp_name'];
  $pdf_KTP = explode('.', $namaFileKTP1);
  $ekstensi_KTP = strtolower(end($pdf_KTP));
  $namaFileKTP = date('ymdhis') . $str2 . '.' . $ekstensi_KTP;

  move_uploaded_file($tmpNameKTP, 'assets/' . $namaFileKTP);
  // cek apakah edit foto baru
  if ($_FILES['file_ktp']['error'] === 4) {
    $fotoKTP = $fotoLamaKTP;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorKTP === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKTP = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarKTP = explode('.', $namaFileKTP);
    $ekstensiGambarKTP = strtolower(end($ekstensiGambarKTP));
    if (!in_array($ekstensiGambarKTP, $ekstensiKTP)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileKTP > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKTP = $namaFileKTP;
  }

  $sql = "UPDATE tb_pindah_datang SET file_kp= '$fotoKP', file_ktp = '$fotoKTP', slug_kp = '$namaFileKP1', slug_ktp = '$namaFileKTP1' WHERE id_pd = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonansuratpindahdatang'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonansuratpindahdatang'>";
  }
} else if (isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonansuratpindahdatang'>";
}
?>






<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="mt-3">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <form method="POST" enctype="multipart/form-data" role="form">
              <input type="hidden" id="user_id" name="user_id" value="<?php echo $data['id_user']; ?>" readonly>
              <input type="hidden" id="fotoLamaKP" name="fotoLamaKP" value="<?php echo $data['file_kp']; ?>" readonly>
              <input type="hidden" id="fotoLamaKTP" name="fotoLamaKTP" value="<?php echo $data['file_ktp']; ?>" readonly>
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
                <label>Upload Foto/Scan Surat Keterangan Pindah</label>
                <div class="custom-file">
                  <input type="file" class="form-control" name="file_kp">
                  <p class="text-dark">File yang diunggah: <?php echo $data['slug_kp']; ?></p>
                  <?php
                  $id = $_GET['id_spd'];
                  $qry = mysqli_query($conn, "SELECT * FROM tb_pindah_datang WHERE id_spd = '$id'");
                  $qry = mysqli_fetch_array($qry);
                  $pdf_kk = explode('.', $qry['file_kp']);
                  $ekstensi_kk = strtolower(end($pdf_kk));
                  if ($ekstensi_kk == 'pdf') {
                  ?>
                    <a href="assets/<?php echo $data['file_kp'] ?>"><i class="fa fa-file-pdf" style="font-size: 20px; color: red;"></i></a>
                  <?php } else { ?>
                    <a href="assets/<?php echo $data['file_kp'] ?>"><img src="assets/<?php echo $data['file_kp'] ?>" width="100"></a>
                  <?php } ?>
                  <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                </div>
              </div>
              <div class="form-group">
                <label>Upload Foto/Scan Kartu Tanda Penduduk</label>
                <div class="custom-file">
                  <input type="file" class="form-control" name="file_ktp">
                  <p class="text-dark">File yang diunggah: <?php echo $data['slug_ktp']; ?></p>
                  <?php
                  $id = $_GET['id_spd'];
                  $qry = mysqli_query($conn, "SELECT * FROM tb_pindah_datang WHERE id_spd = '$id'");
                  $qry = mysqli_fetch_array($qry);
                  $pdf_kk = explode('.', $qry['file_ktp']);
                  $ekstensi_kk = strtolower(end($pdf_kk));
                  if ($ekstensi_kk == 'pdf') {
                  ?>
                    <a href="assets/<?php echo $data['file_ktp'] ?>"><i class="fa fa-file-pdf" style="font-size: 20px; color: red;"></i></a>
                  <?php } else { ?>
                    <a href="assets/<?php echo $data['file_ktp'] ?>"><img src="assets/<?php echo $data['file_ktp'] ?>" width="100"></a>
                  <?php } ?>
                  <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-md" name="ubah">
                  <i class="fas fa-save"></i> Simpan
                </button>
                <a href="?page=permohonansuratpindahdatang" class="btn btn-danger btn-md">
                  <i class="fas fa-window-close"></i> Batal
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>