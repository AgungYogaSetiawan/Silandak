<?php
include 'pengaturan/koneksi.php';

if (isset($_POST['submit'])) {
    // Ambil data diri dari form
    $pesan = mysqli_real_escape_string($konek, $_POST['pesan']);
    $tgl_kejadian = $_POST['tgl_kejadian'];
    $lokasi = mysqli_real_escape_string($konek, $_POST['lokasi']);
    if($_POST["alias"] == "anonim") {
      $alias = "anonymous";
    } else {
      $alias = str_split($_SESSION['username']);
      $alias = join("*", $alias);
    }

    // Proses upload file
    $files = $_FILES['files'];
    $fileCount = count($files['name']);
    for ($i = 0; $i < $fileCount; $i++) {
      $fileName = mysqli_real_escape_string($konek, $files['name'][$i]);
      $fileType = mysqli_real_escape_string($konek, $files['type'][$i]);
      $fileSize = $files['size'][$i];
      $fileTempName = $files['tmp_name'][$i];

      // Simpan file ke folder upload
      $uploadDir = 'assets/';
      $filePath = $uploadDir . $fileName;
      move_uploaded_file($fileTempName, $filePath);

      // Simpan informasi file ke tabel `files`
      $query = "INSERT INTO tb_files_aduan (id_file,name,size,type,path) VALUES ('','$fileName', '$fileSize', $fileType, '$filePath')";
      mysqli_query($konek, $query);

      // Ambil id file terakhir yang dimasukkan ke tabel `files`
      $fileId = mysqli_insert_id($konek);

      // Simpan hubungan antara file dan data diri ke tabel `file_relations`
      $query = "INSERT INTO tb_aduan (id_aduan,file_id,pengirim,pesan,tgl_kejadian,lokasi,lampiran) VALUES ('',$fileId, '$alias', '$pesan', '$tgl_kejadian', '$lokasi','$fileName')";
      $result = mysqli_query($konek, $query);
    }

    // memeriksa apakah data berhasil ditambahkan
    if ($result) {
      echo "<script>alert('Aduan berhasil dikirim!');</script>";
    } else {
      echo "<script>alert('Aduan gagal dikirim, mohon ulangi lagi!');</script>";
    }

    // Tutup koneksi ke database MySQL
    mysqli_close($conn);
}
?>



<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-body">
      <div class="mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger container">
              <h6 class="alert alert-danger mt-3">Sampaikan Laporan Anda</h6>

              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="pengaduan" autocomplete="off">
                <label class="btn btn-outline-danger" for="btnradio1">PENGADUAN</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="aspirasi" autocomplete="off">
                <label class="btn btn-outline-danger" for="btnradio2">ASPIRASI</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="permintaan informasi" autocomplete="off">
                <label class="btn btn-outline-danger" for="btnradio3">PERMINTAAN INFORMASI</label>
              </div>
              
              <div class="card-body">
                <div id="pengaduan" style="display:none;">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="pesan" name="pesan" placeholder="Ketik Judul dan Isi Laporan Anda">
                    </div>
                    <div class="mb-3">
                      <input type="date" class="form-control" id="tgl_kejadian" name="tgl_kejadian" placeholder="Pilih Tanggal Kejadian">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Ketik Lokasi Kejadian">
                    </div>       
                    <div class="custom-file">
                      <input type="file" class="form-control" name="files[]" multiple>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="anonim" value="anonim" name="alias">
                          <label class="form-check-label" for="anonim">Anonim</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="rahasia" value="rahasia" name="alias">
                          <label class="form-check-label" for="rahasia">Rahasia</label>
                        </div>
                      <button type="submit" class="btn btn-danger btn-lg" name="submit">
                        LAPOR!
                      </button>
                    </div>
                  </form>
                </div>

                <div id="aspirasi" style="display:none;">
                  <form method="POST">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="isi_laporan" placeholder="Ketik Judul dan Isi Laporan Anda">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="tanggal_laporan" placeholder="Ketik Asal Pelapor">
                    </div>       
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Upload Lampiran</label>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="jk" value="">
                          <label class="form-check-label" for="jk">Anonim</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="jk" value="">
                          <label class="form-check-label" for="jk">Rahasia</label>
                        </div>
                      <button type="submit" class="btn btn-danger btn-lg">
                        LAPOR!
                      </button>
                    </div>
                  </form>
                </div>

                <div id="permintaan_informasi" style="display:none;">
                  <form method="POST">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="isi_laporan" placeholder="Ketik Judul dan Isi Laporan Anda">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="tanggal_laporan" placeholder="Ketik Asal Pelapor">
                    </div>       
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Upload Lampiran</label>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="jk" value="">
                          <label class="form-check-label" for="jk">Anonim</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="jk" value="">
                          <label class="form-check-label" for="jk">Rahasia</label>
                        </div>
                      <button type="submit" class="btn btn-danger btn-lg">
                        LAPOR!
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>