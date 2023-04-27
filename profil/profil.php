<!-- kode php -->
<?php
$id = $_SESSION['id'];
$sql = "SELECT * FROM tb_pemohon a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);

if(isset($_POST['simpan'])){
  $id_pemohon = $_POST['id_pemohon'];
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
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // cek apakah ada foto yang diupload
  if($error === 4) {
    echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
  }

  // cek apakah yang diupload adalah gambar
  $ekstensi = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if(!in_array($ekstensiGambar, $ekstensi)) {
    echo "<script>alert('Yang anda upload bukan gambar, mohon upload gambar!');</script>";
  }

  // cek ukuran
  if($ukuranFile > 1000000) {
    echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
  }

  move_uploaded_file($tmpName, 'assets/' . $namaFile);
  // cek apakah edit foto baru
  if($_FILES['foto']['error'] === 4) {
    $foto = $fotoLama;
  } else {
    $foto = $namaFile;
  }
  

  $sql = "UPDATE tb_pemohon SET kewarganegaraan = '$kewarganegaraan', nama = '$nama', nik = '$nik', no_hp = '$no_hp', pekerjaan = '$pekerjaan', tmpt_lahir = '$tmpt_lahir', tgl_lahir = '$tgl_lahir', jk = '$jk', status = '$status', agama = '$agama', kelurahan = '$kelurahan', kecamatan = '$kecamatan', rt = '$rt', rw = '$rw', alamat = '$alamat', kode_pos = '$kode_pos', foto = '$foto' WHERE id_pemohon = '$id_pemohon'";
  mysqli_query($conn, $sql);

  echo "<script>alert('Data Berhasil Disimpan');</script>";
}
?>
<!-- end kode php -->

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header justify-content-between bg-danger rounded-lg">
      <h1 class="text-white">FORM DATA PEMOHON</h1>
      <a href="beranda"><h1 class="text-white"><i class="fas fa-arrow-left" style="font-size:20px;"></i> Kembali</h1></a>
    </div>

    <div class="section-body">
      <div class="mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header text-danger"><h6>DATA PEMOHON</h6></div>
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <input type="hidden" id="id_user" name="id_user" value="<?php echo $data['id_user']; ?>" readonly>
                  <input type="hidden" id="fotoLama" name="fotoLama" value="<?php echo $data['foto']; ?>" readonly>
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
                      <input id="nik" type="number" class="form-control" name="nik" value="<?php echo $data['nik']; ?>">
                      <div class="invalid-feedback">
                    </div>
                  </div>
                    <div class="form-group col-6">
                      <label for="no_hp">No.Telepon</label>
                      <input id="no_hp" type="number" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>">
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
                  <div class="form-group">
                    <label for="foto">Unggah Foto Profil</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="foto">
                      <img src="assets/<?= $data['foto']; ?>" width="40"><br>
                      <label class="custom-file-label" for="customFile">Unggah Foto Profil</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md" name="simpan">
                      <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="beranda" class="btn btn-danger btn-md">
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
