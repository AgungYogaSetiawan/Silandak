<?php
// koding jika disetujui
$idak = $_GET['id_ak'];
$sql = "SELECT * FROM tb_kematian a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.id_ak='$idak'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_ak'];
if (isset($_POST['ubah']) and $baru === 'Baru') {
  // foto sk rs kepala desa
  $str = rand();
  $str1 = md5($str);
  $fotoLamaSK = htmlspecialchars($_POST['fotoLamaSK']);
  $namaFileSK1 = $_FILES['file_sk']['name'];
  $ukuranFileSK = $_FILES['file_sk']['size'];
  $errorSK = $_FILES['file_sk']['error'];
  $tmpNameSK = $_FILES['file_sk']['tmp_name'];
  $pdf_sk = explode('.', $namaFilesk1);
  $ekstensi_sk = strtolower(end($pdf_sk));
  $namaFilesk = date('ymdhis') . $str1 . '.' . $ekstensi_sk;

  move_uploaded_file($tmpNameSK, 'assets/' . $namaFileSK);
  // cek apakah edit foto baru
  if ($_FILES['file_sk']['error'] === 4) {
    $fotoAK = $fotoLamaSK;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorSK === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiSK = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarSK = explode('.', $namaFileSK);
    $ekstensiGambarSK = strtolower(end($ekstensiGambarSK));
    if (!in_array($ekstensiGambarSK, $ekstensiSK)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileSK > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoSK = $namaFileSK;
  }

  // foto KK
  $str = rand();
  $str2 = md5($str);
  $fotoLamaKK = htmlspecialchars($_POST['fotoLamaKK']);
  $namaFileKK1 = $_FILES['file_kk']['name'];
  $ukuranFileKK = $_FILES['file_kk']['size'];
  $errorKK = $_FILES['file_kk']['error'];
  $tmpNameKK = $_FILES['file_kk']['tmp_name'];
  $pdf_KK = explode('.', $namaFileKK1);
  $ekstensi_KK = strtolower(end($pdf_KK));
  $namaFileKK = date('ymdhis') . $str2 . '.' . $ekstensi_KK;

  move_uploaded_file($tmpNameKK, 'assets/' . $namaFileKK);
  // cek apakah edit foto baru
  if ($_FILES['file_kk']['error'] === 4) {
    $fotoKK = $fotoLamaKK;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorKK === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKK = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarKK = explode('.', $namaFileKK);
    $ekstensiGambarKK = strtolower(end($ekstensiGambarKK));
    if (!in_array($ekstensiGambarKK, $ekstensiKK)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileKK > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKK = $namaFileKK;
  }

  $sql = "UPDATE tb_kematian SET file_sk = '$fotoSK', file_kk = '$fotoKK', slug_sk = '$namaFileSK1', slug_kk = '$namaFileKK1' WHERE id_ak = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanaktakematian'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanaktakematian'>";
  }
} else if (isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanaktakematian'>";
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
              <input type="hidden" id="fotoLamaSK" name="fotoLamaSK" value="<?php echo $data['file_sk']; ?>" readonly>
              <input type="hidden" id="fotoLamaKK" name="fotoLamaKK" value="<?php echo $data['file_kk']; ?>" readonly>
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
                <label>Upload Foto/Scan SK Rumah Sakit atau Kepala Desa</label>
                <div class="custom-file">
                  <input type="file" class="form-control" name="file_sk">
                  <p class="text-dark">File yang diunggah: <?php echo $data['slug_sk']; ?></p>
                  <?php
                  $id = $_GET['id_ak'];
                  $qry = mysqli_query($conn, "SELECT * FROM tb_kematian WHERE id_ak = '$id'");
                  $qry = mysqli_fetch_array($qry);
                  $pdf_kk = explode('.', $qry['file_sk']);
                  $ekstensi_kk = strtolower(end($pdf_kk));
                  if ($ekstensi_kk == 'pdf') {
                  ?>
                    <a href="assets/<?php echo $data['file_sk'] ?>"><i class="fa fa-file-pdf" style="font-size: 20px; color: red;"></i></a>
                  <?php } else { ?>
                    <a href="assets/<?php echo $data['file_sk'] ?>"><img src="assets/<?php echo $data['file_sk'] ?>" width="100"></a>
                  <?php } ?>
                  <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                </div>
              </div>
              <div class="form-group">
                <label>Upload Foto/Scan Kartu Keluarga</label>
                <div class="custom-file">
                  <input type="file" class="form-control" name="file_kk">
                  <p class="text-dark">File yang diunggah: <?php echo $data['slug_kk']; ?></p>
                  <?php
                  $id = $_GET['id_ak'];
                  $qry = mysqli_query($conn, "SELECT * FROM tb_kematian WHERE id_ak = '$id'");
                  $qry = mysqli_fetch_array($qry);
                  $pdf_kk = explode('.', $qry['file_kk']);
                  $ekstensi_kk = strtolower(end($pdf_kk));
                  if ($ekstensi_kk == 'pdf') {
                  ?>
                    <a href="assets/<?php echo $data['file_kk'] ?>"><i class="fa fa-file-pdf" style="font-size: 20px; color: red;"></i></a>
                  <?php } else { ?>
                    <a href="assets/<?php echo $data['file_kk'] ?>"><img src="assets/<?php echo $data['file_kk'] ?>" width="100"></a>
                  <?php } ?>
                  <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-md" name="ubah">
                  <i class="fas fa-save"></i> Simpan
                </button>
                <a href="?page=permohonanaktakematian" class="btn btn-danger btn-md">
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