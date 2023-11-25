<?php
// koding jika disetujui
$idlahir = $_GET['id_lahir'];
$sql = "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.id_lahir='$idlahir'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$baru = $data['status_berkas'];
$id = $data['id_lahir'];
if (isset($_POST['ubah']) and $baru === 'Baru') {
  // foto akta lahir
  $str = rand();
  $str1 = md5($str);
  $fotoLamaAL = htmlspecialchars($_POST['fotoLamaAL']);
  $namaFileAL1 = $_FILES['file_akta_lahir']['name'];
  $ukuranFileAL = $_FILES['file_akta_lahir']['size'];
  $errorAL = $_FILES['file_akta_lahir']['error'];
  $tmpNameAL = $_FILES['file_akta_lahir']['tmp_name'];
  $pdf_AL = explode('.', $namaFileAL1);
  $ekstensi_AL = strtolower(end($pdf_AL));
  $namaFileAL = date('ymdhis') . $str1 . '.' . $ekstensi_AL;

  move_uploaded_file($tmpNameAL, 'assets/' . $namaFileAL);
  // cek apakah edit foto baru
  if ($_FILES['file_akta_lahir']['error'] === 4) {
    $fotoAL = $fotoLamaAL;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorAL === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiAL = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarAL = explode('.', $namaFileAL);
    $ekstensiGambarAL = strtolower(end($ekstensiGambarAL));
    if (!in_array($ekstensiGambarAL, $ekstensiAL)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileAL > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoAL = $namaFileAL;
  }

  // foto ket lahir
  $str = rand();
  $str2 = md5($str);
  $fotoLamaKL = htmlspecialchars($_POST['fotoLamaKL']);
  $namaFileKL1 = $_FILES['file_ket_lahir']['name'];
  $ukuranFileKL = $_FILES['file_ket_lahir']['size'];
  $errorKL = $_FILES['file_ket_lahir']['error'];
  $tmpNameKL = $_FILES['file_ket_lahir']['tmp_name'];
  $pdf_KL = explode('.', $namaFileKL1);
  $ekstensi_KL = strtolower(end($pdf_KL));
  $namaFileKL = date('ymdhis') . $str2 . '.' . $ekstensi_KL;

  move_uploaded_file($tmpNameKL, 'assets/' . $namaFileKL);
  // cek apakah edit foto baru
  if ($_FILES['file_ket_lahir']['error'] === 4) {
    $fotoKL = $fotoLamaKL;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorKL === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiKL = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarKL = explode('.', $namaFileKL);
    $ekstensiGambarKL = strtolower(end($ekstensiGambarKL));
    if (!in_array($ekstensiGambarKL, $ekstensiKL)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileKL > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoKL = $namaFileKL;
  }

  // foto buku nikah
  $str = rand();
  $str3 = md5($str);
  $fotoLamaBK = htmlspecialchars($_POST['fotoLamaBK']);
  $namaFileBK1 = $_FILES['file_buku_nikah']['name'];
  $ukuranFileBK = $_FILES['file_buku_nikah']['size'];
  $errorBK = $_FILES['file_buku_nikah']['error'];
  $tmpNameBK = $_FILES['file_buku_nikah']['tmp_name'];
  $pdf_BK = explode('.', $namaFileBK1);
  $ekstensi_BK = strtolower(end($pdf_BK));
  $namaFileBK = date('ymdhis') . $str3 . '.' . $ekstensi_BK;

  move_uploaded_file($tmpNameBK, 'assets/' . $namaFileBK);
  // cek apakah edit foto baru
  if ($_FILES['file_buku_nikah']['error'] === 4) {
    $fotoBK = $fotoLamaBK;
  } else {
    // cek apakah ada foto yang diupload
    if ($errorBK === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiBK = ['jpg', 'jpeg', 'png', 'pdf'];
    $ekstensiGambarBK = explode('.', $namaFileBK);
    $ekstensiGambarBK = strtolower(end($ekstensiGambarBK));
    if (!in_array($ekstensiGambarBK, $ekstensiBK)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFileBK > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $fotoBK = $namaFileBK;
  }

  // foto kk
  $str = rand();
  $str4 = md5($str);
  $fotoLamaKK = htmlspecialchars($_POST['fotoLamaKK']);
  $namaFileKK1 = $_FILES['file_kk']['name'];
  $ukuranFileKK = $_FILES['file_kk']['size'];
  $errorKK = $_FILES['file_kk']['error'];
  $tmpNameKK = $_FILES['file_kk']['tmp_name'];
  $pdf_KK = explode('.', $namaFileKK1);
  $ekstensi_KK = strtolower(end($pdf_KK));
  $namaFileKK = date('ymdhis') . $str4 . '.' . $ekstensi_KK;

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

  $sql = "UPDATE tb_akta_lahir SET file_akta_lahir = '$fotoAL', file_ket_lahir = '$fotoKL', file_buku_nikah = '$fotoBK', file_kk = '$fotoKK', slug_ak = '$namaFileAL1' ,slug_sk = '$namaFileKL1', slug_bk = '$namaFileBK1', slug_kk = '$namaFileKK1' WHERE id_lahir = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanaktakelahiran'>";
  } else {
    echo "<script>alert('Terjadi kesalahan!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanaktakelahiran'>";
  }
} else if (isset($_POST['ubah']) and $baru === 'Selesai') {
  echo "<script>alert('Data sudah di acc, tidak bisa diubah!');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=permohonanaktakelahiran'>";
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
              <input type="hidden" id="fotoLamaAL" name="fotoLamaAL" value="<?php echo $data['file_akta_lahir']; ?>" readonly>
              <input type="hidden" id="fotoLamaKL" name="fotoLamaKL" value="<?php echo $data['file_ket_lahir']; ?>" readonly>
              <input type="hidden" id="fotoLamaBK" name="fotoLamaBK" value="<?php echo $data['file_buku_nikah']; ?>" readonly>
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
                <label>Upload Foto/Scan Permohonan Akta Lahir</label>
                <div class="custom-file">
                  <input type="file" class="form-control" name="file_akta_lahir">
                  <p class="text-dark">File yang diunggah: <?php echo $data['slug_ak']; ?></p>
                  <?php
                  $id = $_GET['id_lahir'];
                  $qry = mysqli_query($conn, "SELECT * FROM tb_akta_lahir WHERE id_lahir = '$id'");
                  $qry = mysqli_fetch_array($qry);
                  $pdf_kk = explode('.', $qry['file_akta_lahir']);
                  $ekstensi_kk = strtolower(end($pdf_kk));
                  if ($ekstensi_kk == 'pdf') {
                  ?>
                    <a href="assets/<?php echo $data['file_akta_lahir'] ?>"><i class="fa fa-file-pdf" style="font-size: 20px; color: red;"></i></a>
                  <?php } else { ?>
                    <a href="assets/<?php echo $data['file_akta_lahir'] ?>"><img src="assets/<?php echo $data['file_akta_lahir'] ?>" width="100"></a>
                  <?php } ?>
                  <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                </div>
              </div>
              <div class="form-group">
                <label>Upload Foto/Scan Surat Keterangan Lahir</label>
                <div class="custom-file">
                  <input type="file" class="form-control" name="file_ket_lahir">
                  <p class="text-dark">File yang diunggah: <?php echo $data['slug_sk']; ?></p>
                  <?php
                  $id = $_GET['id_lahir'];
                  $qry = mysqli_query($conn, "SELECT * FROM tb_akta_lahir WHERE id_lahir = '$id'");
                  $qry = mysqli_fetch_array($qry);
                  $pdf_kk = explode('.', $qry['file_ket_lahir']);
                  $ekstensi_kk = strtolower(end($pdf_kk));
                  if ($ekstensi_kk == 'pdf') {
                  ?>
                    <a href="assets/<?php echo $data['file_ket_lahir'] ?>"><i class="fa fa-file-pdf" style="font-size: 20px; color: red;"></i></a>
                  <?php } else { ?>
                    <a href="assets/<?php echo $data['file_ket_lahir'] ?>"><img src="assets/<?php echo $data['file_ket_lahir'] ?>" width="100"></a>
                  <?php } ?>
                  <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                </div>
              </div>
              <div class="form-group">
                <label>Upload Foto/Scan Buku Nikah Orang Tua/SPTJM (misal nikah siri)</label>
                <div class="custom-file">
                  <input type="file" class="form-control" name="file_buku_nikah">
                  <p class="text-dark">File yang diunggah: <?php echo $data['slug_bk']; ?></p>
                  <?php
                  $id = $_GET['id_lahir'];
                  $qry = mysqli_query($conn, "SELECT * FROM tb_akta_lahir WHERE id_lahir = '$id'");
                  $qry = mysqli_fetch_array($qry);
                  $pdf_kk = explode('.', $qry['file_buku_nikah']);
                  $ekstensi_kk = strtolower(end($pdf_kk));
                  if ($ekstensi_kk == 'pdf') {
                  ?>
                    <a href="assets/<?php echo $data['file_buku_nikah'] ?>"><i class="fa fa-file-pdf" style="font-size: 20px; color: red;"></i></a>
                  <?php } else { ?>
                    <a href="assets/<?php echo $data['file_buku_nikah'] ?>"><img src="assets/<?php echo $data['file_buku_nikah'] ?>" width="100"></a>
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
                  $id = $_GET['id_lahir'];
                  $qry = mysqli_query($conn, "SELECT * FROM tb_akta_lahir WHERE id_lahir = '$id'");
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
                <a href="?page=permohonanaktakelahiran" class="btn btn-danger btn-md">
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