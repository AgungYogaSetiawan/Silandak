<!-- kode php -->
<?php
$id = $_SESSION['id'];
$sql = "SELECT * FROM tb_user WHERE id_user='$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

if (isset($_POST['simpan'])) {
  $kewarganegaraan = htmlspecialchars($_POST['kewarganegaraan']);
  $nama = htmlspecialchars($_POST['nama']);
  $nik = htmlspecialchars($_POST['nik']);
  $no_hp = htmlspecialchars($_POST['no_hp']);
  $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
  $tmpt_lahir = htmlspecialchars($_POST['tmpt_lahir']);
  $tgl_lahir = $_POST['tgl_lahir'];
  $jk = htmlspecialchars($_POST['jk']);
  $status = htmlspecialchars($_POST['status']);
  $agama = htmlspecialchars($_POST['agama']);
  $kelurahan = htmlspecialchars($_POST['kelurahan']);
  $kecamatan = htmlspecialchars($_POST['kecamatan']);
  $rt = htmlspecialchars($_POST['rt']);
  $rw = htmlspecialchars($_POST['rw']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $kode_pos = htmlspecialchars($_POST['kode_pos']);
  $fotoLama = htmlspecialchars($_POST['fotoLama']);
  $file = $_FILES['foto']['name'];
  $split_file = explode('.', $file);
  $ekstensi = strtolower(end($split_file));
  $namaFile = date('ymdhis') . '.' . $ekstensi;
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];




  move_uploaded_file($tmpName, 'assets/' . $namaFile);
  // cek apakah edit foto baru
  if ($_FILES['foto']['error'] === 4) {
    $foto = $fotoLama;
  } else {
    // cek apakah ada foto yang diupload
    if ($error === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
    }

    // cek apakah yang diupload adalah gambar
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensi)) {
      echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
    }

    // cek ukuran
    if ($ukuranFile > 10485760) {
      echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
    }
    $foto = $namaFile;
  }


  $sql = "UPDATE tb_user SET kewarganegaraan = '$kewarganegaraan', nama = '$nama', nik = '$nik', no_hp = '$no_hp', pekerjaan = '$pekerjaan', tmpt_lahir = '$tmpt_lahir', tgl_lahir = '$tgl_lahir', jk = '$jk', status = '$status', agama = '$agama', kelurahan = '$kelurahan', kecamatan = '$kecamatan', rt = '$rt', rw = '$rw', alamat = '$alamat', kode_pos = '$kode_pos', foto = '$foto', slug_foto = '$file' WHERE id_user = '$id'";
  $hasil = mysqli_query($conn, $sql);

  if ($hasil) {
    $script = "
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Disimpan!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });

        ";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=beranda'>";
  } else {
    $script = "
            Swal.fire({
                icon: 'error',
                title: 'Data Gagal Disimpan!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=beranda'>";
  }
}
?>
<!-- end kode php -->

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header justify-content-between bg-danger rounded-lg">
      <h1 class="text-white">FORM DATA PEMOHON</h1>
      <a href="?page=beranda">
        <h1 class="text-white"><i class="fas fa-arrow-left" style="font-size:20px;"></i> Kembali</h1>
      </a>
    </div>
    <div class="section-body">
      <div class="mt-3">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header text-danger">
                <h6>DATA PEMOHON</h6>
              </div>
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <input type="hidden" id="fotoLama" name="fotoLama" value="<?php echo $data['foto']; ?>" readonly>
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
                  <div class="form-group">
                    <label for="foto">Unggah Foto Profil</label>
                    <div class="custom-file">
                      <input type="file" class="form-control" name="foto">
                      <p class="text-dark">File yang diunggah: <?php echo $data['slug_foto']; ?></p>
                      <a href="assets/<?= $data['foto']; ?>"><img src="assets/<?= $data['foto']; ?>" width="70"><br></a>
                      <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md" name="simpan">
                      <i class="fas fa-save"></i> Simpan
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
      </div>
    </div>
  </section>
</div>