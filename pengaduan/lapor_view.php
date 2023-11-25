<?php
include 'pengaturan/koneksi.php';


// kode perintah tambah data aduan //
if (isset($_POST['submit_aduan'])) {
  // Ambil data diri dari form
  $pesan = mysqli_real_escape_string($konek, $_POST['pesan']);
  $tgl_kejadian = $_POST['tgl_kejadian'];
  $lokasi = mysqli_real_escape_string($konek, $_POST['lokasi']);
  if ($_POST["alias"] == "anonim") {
    $alias = "anonymous";
  } else {
    $alias = str_split($_SESSION['username']);
    $alias = join("*", $alias);
  }
  $limit = 10 * 1024 * 1024;
  $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');

  // Proses upload file
  $files = $_FILES['files'];
  $fileCount = count($files['name']);
  for ($i = 0; $i < $fileCount; $i++) {
    $fileName = mysqli_real_escape_string($konek, $files['name'][$i]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileSize = $files['size'][$i];
    $fileTempName = $files['tmp_name'][$i];
    if ($fileSize > $limit) {
      echo "<script>alert('Ukuran file terlalu besar!');</script>";
    } else {
      if (!in_array($fileType, $ekstensi)) {
        echo "<script>alert('Tipe file salah!');</script>";
      } else {
        // Simpan file ke folder upload
        $uploadDir = 'assets/';
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($fileTempName, $filePath);

        // Simpan hubungan antara file dan data diri ke tabel `file_relations`
        $query = "INSERT INTO tb_aduan (id_aduan,pengirim,pesan,tgl_kejadian,lokasi,lampiran) VALUES ('', '$alias', '$pesan', '$tgl_kejadian', '$lokasi','$fileName')";
        $result = mysqli_query($konek, $query);
      }
    }
  }

  // memeriksa apakah data berhasil ditambahkan
  if ($result) {
    $script = "
            Swal.fire({
                icon: 'success',
                title: 'Aduan anda telah terkirim!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
  } else {
    $script = "
            Swal.fire({
                icon: 'error',
                title: 'Aduan anda gagal terkirim!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
  }

  // Tutup koneksi ke database MySQL
  mysqli_close($conn);
}
// end kode untuk tambah data aduan //


// kode untuk tambah data aspirasi //
if (isset($_POST['submit_aspirasi'])) {
  // Ambil data diri dari form
  date_default_timezone_set('Asia/Ujung_Pandang');
  $tgl_waktu = date('d-M-Y');
  $pesan = mysqli_real_escape_string($konek, $_POST['pesan']);
  $asal_pelapor = mysqli_real_escape_string($konek, $_POST['asal_pelapor']);
  if ($_POST["alias"] == "anonim") {
    $alias = "anonymous";
  } else if ($_POST["alias"] == "rahasia") {
    $alias = str_split($_SESSION['username']);
    $alias = join("*", $alias);
  } else {
    $alias = "";
  }
  $limit = 10 * 1024 * 1024;
  $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');

  // Proses upload file
  $files = $_FILES['files'];
  $fileCount = count($files['name']);
  for ($i = 0; $i < $fileCount; $i++) {
    $fileName = mysqli_real_escape_string($konek, $files['name'][$i]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileSize = $files['size'][$i];
    $fileTempName = $files['tmp_name'][$i];
    if ($fileSize > $limit) {
      echo "<script>alert('Ukuran file terlalu besar!');</script>";
    } else {
      if (!in_array($fileType, $ekstensi)) {
        echo "<script>alert('Tipe file salah!');</script>";
      } else {
        // Simpan file ke folder upload
        $uploadDir = 'assets/';
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($fileTempName, $filePath);

        // Simpan hubungan antara file dan data diri ke tabel `file_relations`
        $query = "INSERT INTO tb_aspirasi (id_aspirasi,tgl_waktu,pengirim,pesan,asal_pelapor,lampiran) VALUES ('', '$tgl_waktu', '$alias', '$pesan', '$asal_pelapor','$fileName')";
        $result = mysqli_query($konek, $query);
      }
    }
  }

  // memeriksa apakah data berhasil ditambahkan
  if ($result) {
    $script = "
            Swal.fire({
                icon: 'success',
                title: 'Aspirasi anda berhasil terkirim!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
  } else {
    $script = "
            Swal.fire({
                icon: 'error',
                title: 'Aspirasi anda gagal terkirim!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
  }

  // Tutup koneksi ke database MySQL
  mysqli_close($conn);
}
// end kode untuk tambah data aspirasi //

// kode untuk tambah data permintaan informasi //
if (isset($_POST['submit_informasi'])) {
  // Ambil data diri dari form
  date_default_timezone_set('Asia/Ujung_Pandang');
  $tgl_waktu = date('d-M-Y');
  $pesan = mysqli_real_escape_string($konek, $_POST['pesan']);
  $asal_pelapor = mysqli_real_escape_string($konek, $_POST['asal_pelapor']);
  if ($_POST["alias"] == "anonim") {
    $alias = "anonymous";
  } else if ($_POST["alias"] == "rahasia") {
    $alias = str_split($_SESSION['username']);
    $alias = join("*", $alias);
  } else {
    $alias = "";
  }
  $limit = 10 * 1024 * 1024;
  $ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');

  // Proses upload file
  $files = $_FILES['files'];
  $fileCount = count($files['name']);
  for ($i = 0; $i < $fileCount; $i++) {
    $fileName = mysqli_real_escape_string($konek, $files['name'][$i]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileSize = $files['size'][$i];
    $fileTempName = $files['tmp_name'][$i];
    if ($fileSize > $limit) {
      echo "<script>alert('Ukuran file terlalu besar!');</script>";
    } else {
      if (!in_array($fileType, $ekstensi)) {
        echo "<script>alert('Tipe file salah!');</script>";
      } else {
        // Simpan file ke folder upload
        $uploadDir = 'assets/';
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($fileTempName, $filePath);

        // Simpan hubungan antara file dan data diri ke tabel `file_relations`
        $query = "INSERT INTO tb_informasi (id_informasi,tgl,pengirim,pesan,asal_pelapor,lampiran) VALUES ('', '$tgl_waktu', '$alias', '$pesan', '$asal_pelapor','$fileName')";
        $result = mysqli_query($konek, $query);
      }
    }
  }

  // memeriksa apakah data berhasil ditambahkan
  if ($result) {
    $script = "
            Swal.fire({
                icon: 'success',
                title: 'Informasi anda berhasil terkirim!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
  } else {
    $script = "
            Swal.fire({
                icon: 'error',
                title: 'Informasi anda gagal terkirim!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
  }

  // Tutup koneksi ke database MySQL
  mysqli_close($conn);
}
// end kode untuk tambah data aspirasi //

?>



<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="mt-3">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger container">
              <h6 class="alert alert-danger mt-3">Sampaikan Laporan Anda</h6>

              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="pengaduan" autocomplete="off">
                <label class="btn btn-outline-danger" for="btnradio1">PENGADUAN</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="aspirasi" autocomplete="off">
                <label class="btn btn-outline-danger" for="btnradio2">ASPIRASI</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="permintaan_informasi" autocomplete="off">
                <label class="btn btn-outline-danger" for="btnradio3">PERMINTAAN INFORMASI</label>
              </div>

              <div class="card-body">
                <div id="pengaduan" style="display:none;">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="pesan" name="pesan" placeholder="Ketik Judul dan Isi Laporan Anda" required>
                    </div>
                    <div class="mb-3">
                      <input type="date" class="form-control" id="tgl_kejadian" name="tgl_kejadian" placeholder="Pilih Tanggal Kejadian" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Ketik Lokasi Kejadian" required>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="form-control" name="files[]" multiple>
                      <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
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
                      <button type="submit" class="btn btn-danger btn-lg" name="submit_aduan">
                        LAPOR!
                      </button>
                    </div>
                  </form>
                </div>

                <div id="aspirasi" style="display:none;">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="pesan" name="pesan" placeholder="Ketik Judul dan Isi Laporan Anda" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="asal_pelapor" name="asal_pelapor" placeholder="Ketik Asal Pelapor" required>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="form-control" name="files[]" multiple>
                      <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
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
                      <button type="submit" class="btn btn-danger btn-lg" name="submit_aspirasi">
                        LAPOR!
                      </button>
                    </div>
                  </form>
                </div>

                <div id="permintaan_informasi" style="display:none;">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="pesan" name="pesan" placeholder="Ketik Judul dan Isi Laporan Anda" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="asal_pelapor" name="asal_pelapor" placeholder="Ketik Asal Pelapor" required>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="form-control" name="files[]" multiple>
                      <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
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
                      <button type="submit" class="btn btn-danger btn-lg" name="submit_informasi">
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