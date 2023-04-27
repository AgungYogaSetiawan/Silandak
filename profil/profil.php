<!-- kode php -->
<?php
$id = $_SESSION['id'];
$sql = "SELECT * FROM tb_pemohon a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);

if(isset($_POST['simpan'])){
  $id_pemohon = htmlspecialchars($_POST['id_pemohon']);
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
  $foto = htmlspecialchars($_POST['foto']);

  $sql = "UPDATE tb_pemohon SET kewarganegaraan = '$kewarganegaraan', nama = '$nama', nik = '$nik', no_hp = '$no_hp', pekerjaan = '$pekerjaan', tmpt_lahir = '$tmpt_lahir', tgl_lahir = '$tmgl_lahir', jk = '$jk', status = '$status', agama = '$agama', kelurahan = '$kelurahan', kecamatan = '$kecamatan', rt = '$rt', rw = '$rw', alamat = '$alamat', kode_pos = '$kode_pos', foto = '$foto' WHERE id_pemohon = '$id_pemohon'";
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
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="kewarganegaraan">Kewarganegaraan</label>
                      <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan">
                    </div>
                    <div class="form-group col-6">
                      <label for="nama">Nama Lengkap</label>
                      <input id="nama" type="text" class="form-control" name="nama">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nik">NIK</label>
                      <input id="nik" type="number" class="form-control" name="nik">
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
                      <label for="tmpt_lahir">Tempat Lahir</label>
                      <input id="tmpt_lahir" type="text" class="form-control" name="tmpt_lahir">
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
                        <input class="form-check-input" type="radio" id="jk" value="Laki-laki">
                        <label class="form-check-label" for="jk">Laki-laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="jk" value="Perempuan">
                        <label class="form-check-label" for="jk">Perempuan</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Status</label>
                      <select class="form-control selectric">
                        <option selected>--Pilih Status--</option>
                        <option>Belum Kawin</option>
                        <option>Sudah Kawin</option>
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
                      <input id="rt" type="text" class="form-control" name="rt">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="rw">RW</label>
                      <input id="rw" type="text" class="form-control" name="rw">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Alamat Domisili</label>
                      <textarea class="form-control" name="alamat" id="alamat"></textarea>
                    </div>
                    <div class="form-group col-6">
                      <label for="kode_pos">Kode Pos</label>
                      <input id="kode_pos" type="number" class="form-control" name="kode_pos">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Unggah Foto Profil</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
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
