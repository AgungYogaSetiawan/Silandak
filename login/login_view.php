<?php
session_start();
require '../pengaturan/fungsi.php';
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";


// membuat sistem login //
// cek cookie
if (isset($_COOKIE["user_id"]) && isset($_COOKIE["user_key"])) {
  $id = $_COOKIE["user_id"];
  $key = $_COOKIE["user_key"];

  // ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE id_user='$id'");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row["username"])) {
    $_SESSION["login"] = true;
    $_SESSION['id'] = $row['id_user'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['peran'] = $row['level'];
  }
}

if (isset($_SESSION['login'])) {
  header('location:../index.php?page=beranda');
}
if (isset($_POST["login"])) {
  $username = htmlspecialchars($_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // set session
      $_SESSION['login'] = true;
      $_SESSION['id'] = $row['id_user'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['peran'] = $row['level'];

      // cek remember me cookie
      if (isset($_POST["remember"])) {
        // buat cookie
        $user_id = $row["id_user"];
        $user_hash = hash('sha256', $row["username"]);
        $expiry_time = time() + 1800; // Kadaluarsa dalam 30 menit
        $secure = true; // Hanya dapat dikirimkan melalui HTTPS
        $http_only = true; // Tidak dapat diakses melalui JavaScript
        setcookie('user_id', $user_id, $expiry_time, '/', '', $secure, $http_only);
        setcookie('user_key', $user_hash, $expiry_time, '/', '', $secure, $http_only);
      }

      // cek jika warga yang login
      if ($row["level"] == "warga") {
        $_SESSION['id'] = $row['id_user'];
        $_SESSION['username'] = $username;
        $_SESSION['peran'] = "warga";
        // alihkan ke menu warga
        echo "<script>alert('Login Berhasil Selamat datang $username');</script>";
        echo "<meta http-equiv='refresh' content='0;url=../index.php?page=profile'>";
        exit;
      } else if ($row["level"] == "admin kecamatan") {
        $_SESSION['id'] = $row['id_user'];
        $_SESSION['username'] = $username;
        $_SESSION['peran'] = "admin kecamatan";
        // alihkan ke menu warga
        echo "<script>alert('Login Berhasil Selamat datang $username');</script>";
        echo "<meta http-equiv='refresh' content='0;url=../index.php?page=adminkecamatan'>";
        exit;
      } else if ($row["level"] == "admin desa") {
        $_SESSION['id'] = $row['id_user'];
        $_SESSION['username'] = $username;
        $_SESSION['kelurahan'] = $row['kelurahan'];
        $_SESSION['peran'] = "admin desa";
        // alihkan ke menu warga
        echo "<script>alert('Login Berhasil Selamat datang $username');</script>";
        echo "<meta http-equiv='refresh' content='0;url=../index.php?page=admindesa'>";
        exit;
      }
    }
  }
  $error = true;
}
// akhir membuat sistem login //


// membuat sistem tambah data lupa password //
// memeriksa apakah ada input data yang dikirimkan melalui method POST
if (isset($_POST['kirim'])) {
  // mengambil nilai input dari form
  $username = $_POST['username'];
  $no_hp = $_POST['no_hp'];
  $pesan = $_POST['pesan'];

  // menginisialisasi objek connsi ke database
  $db = new mysqli('localhost', 'root', '', 'silandak');

  // menginstansiasi objek CRUD dengan objek connsi $db
  $crud = new CRUD($db);

  // menambahkan data ke tabel menggunakan fungsi create
  $data = array(
    'username' => $username,
    'no_hp' => $no_hp,
    'pesan' => $pesan
  );
  $result = $crud->create('tb_pesan', $data);

  // memeriksa apakah data berhasil ditambahkan
  if ($result) {
    $script = "
            Swal.fire({
                icon: 'success',
                title: 'Pesan telah terkirim!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
  } else {
    $script = "
            Swal.fire({
                icon: 'error',
                title: 'Pesan gagal terkirim, mohon ulangi lagi!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
  }
}
// akhir membuat sistem tambah data lupa password //

// kode perintah tambah data aduan //
if (isset($_POST['submit_aduan'])) {
  // Ambil data diri dari form
  $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);
  $tgl_kejadian = $_POST['tgl_kejadian'];
  $lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);
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
    $fileName = mysqli_real_escape_string($conn, $files['name'][$i]);
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
        $uploadDir = '../assets/';
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($fileTempName, $filePath);

        // Simpan hubungan antara file dan data diri ke tabel `file_relations`
        $query = "INSERT INTO tb_aduan (id_aduan,pengirim,pesan,tgl_kejadian,lokasi,lampiran) VALUES ('', '$alias', '$pesan', '$tgl_kejadian', '$lokasi','$fileName')";
        $result = mysqli_query($conn, $query);
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

  // Tutup connsi ke database MySQL
  mysqli_close($conn);
}
// end kode untuk tambah data aduan //


// kode untuk tambah data aspirasi //
if (isset($_POST['submit_aspirasi'])) {
  // Ambil data diri dari form
  date_default_timezone_set('Asia/Ujung_Pandang');
  $tgl_waktu = date('d-M-Y');
  $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);
  $asal_pelapor = mysqli_real_escape_string($conn, $_POST['asal_pelapor']);
  if ($_POST["alias"] == "anonim") {
    $alias = "anonymous";
  } else if ($_POST["alias"] == "rahasia") {
    $alias = str_split('');
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
    $fileName = mysqli_real_escape_string($conn, $files['name'][$i]);
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
        $uploadDir = '../assets/';
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($fileTempName, $filePath);

        // Simpan hubungan antara file dan data diri ke tabel `file_relations`
        $query = "INSERT INTO tb_aspirasi (id_aspirasi,tgl_waktu,pengirim,pesan,asal_pelapor,lampiran) VALUES ('', '$tgl_waktu', '$alias', '$pesan', '$asal_pelapor','$fileName')";
        $result = mysqli_query($conn, $query);
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

  // Tutup connsi ke database MySQL
  mysqli_close($conn);
}
// end kode untuk tambah data aspirasi //

// kode untuk tambah data permintaan informasi //
if (isset($_POST['submit_informasi'])) {
  // Ambil data diri dari form
  date_default_timezone_set('Asia/Ujung_Pandang');
  $tgl_waktu = date('d-M-Y');
  $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);
  $asal_pelapor = mysqli_real_escape_string($conn, $_POST['asal_pelapor']);
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
    $fileName = mysqli_real_escape_string($conn, $files['name'][$i]);
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
        $uploadDir = '../assets/';
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($fileTempName, $filePath);

        // Simpan hubungan antara file dan data diri ke tabel `file_relations`
        $query = "INSERT INTO tb_informasi (id_informasi,tgl,pengirim,pesan,asal_pelapor,lampiran) VALUES ('', '$tgl_waktu', '$alias', '$pesan', '$asal_pelapor','$fileName')";
        $result = mysqli_query($conn, $query);
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

  // Tutup connsi ke database MySQL
  mysqli_close($conn);
}
// end kode untuk tambah data aspirasi //


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login - Aplikasi Sistem Layanan Data Kecamatan Banua Lawas</title>

  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo_tabalong_new.png">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- icon -->
  <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- data tables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="../assets/img/logo_tabalong_new.png" alt="logo" width="100">
              <h4 class="mt-3">SILANDAK</h4>
            </div>
            <?php if (isset($error)) : ?>
              <div class="alert alert-danger">Username / Passsword anda salah!</div>
            <?php endif; ?>

            <div class="card card-danger">
              <div class="card-header text-danger">
                <h6>Login</h6>
              </div>

              <div class="card-body">
                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Masukan username anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <div class="input-group">
                      <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                      <div class="input-group-append">
                        <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                        <span id="mybutton" onclick="change()" class="input-group-text">
                          <!-- icon mata bawaan bootstrap  -->
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                          </svg>
                        </span>
                      </div>
                      <div class="invalid-feedback">
                        Masukan password anda
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4" name="login">
                      Login
                    </button>
                  </div>
                  <div class="mt-3 text-muted text-center">
                    Belum punya akun? Silahkan <a href="register_view.php" class="text-danger" style="text-decoration:none;">Daftar</a>
                  </div>
                </form>
              </div>
            </div>

            <div class="mt-5 text-muted text-center">
              <button data-toggle='modal' data-target='#modalFAQ' class="btn btn-transparent text-danger">FAQ</button> | <button data-toggle='modal' data-target='#modalAbout' class="btn btn-transparent text-danger">TENTANG APLIKASI</button> | <button data-toggle='modal' data-target='#modalPengaduan' class="btn btn-transparent text-danger">PENGADUAN</button> | <button data-toggle='modal' data-target='#modalLupaPassword' class="btn btn-transparent text-danger">LUPA PASSWORD</button>
            </div>
            <div class="simple-footer">
              Copyright &copy; <a href="https://www.linkedin.com/in/agung-yoga-setiawan/" target="_blank" class="text-danger">Agung Yoga Setiawan</a> 2023
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal faq -->
  <div class="modal fade" id="modalFAQ" tabindex="-1" role="dialog" aria-labelledby="modalFAQLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFAQLabel">Frequently Asked Questions (FAQ)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="bodydetail">
          <div class="author-box">
            <div class="author-box font-weight-bolder">Q: Apa itu SILANDAK?</div>
            <div class="author-box">
              <p>A: Aplikasi Sistem Layanan Data Kecamatan (SILANDAK) adalah sebuah aplikasi berbasis website yang dibangun untuk memberikan pelayanan administrasi kepada masyarakat Kecamatan Banua Lawas. aplikasi ini dibuat untuk membantu memudahkan masyarakat untuk pengajuan permohonan pengurusan surat di kecamatan.</p>
            </div>
            <div class="author-box font-weight-bolder">Q: Bagaimana saya dapat mengakses layanan SILANDAK?</div>
            <div class="author-box">
              <p>A: Untuk mengakses aplikasi Silandak, pertama-tama pastikan bahwa Anda telah mengunduh dan memasang aplikasi Silandak di perangkat Anda. Setelah itu, ikuti langkah-langkah berikut ini:
              <ol>
                <li>
                  Buka aplikasi Silandak di perangkat Anda.
                </li>
                <li>
                  Jika Anda belum memiliki akun Silandak, buatlah terlebih dahulu dengan mengikuti panduan yang tersedia di aplikasi.
                </li>
                <li>
                  Jika Anda sudah memiliki akun, masuk ke dalam aplikasi menggunakan email dan kata sandi yang telah Anda buat sebelumnya.
                </li>
                <li>
                  Setelah berhasil masuk, Anda dapat mengakses semua fitur dan layanan yang tersedia di aplikasi Silandak.
                </li>
                <li>
                  Pastikan juga bahwa perangkat Anda terhubung ke internet agar dapat mengakses aplikasi dengan lancar. Jika Anda mengalami masalah dalam mengakses aplikasi, Anda dapat menghubungi tim dukungan pelanggan Silandak untuk mendapatkan bantuan lebih lanjut.
                </li>
              </ol>
              </p>
            </div>

            <div class="author-box font-weight-bolder">Q: Apakah pelayanan pada SILANDAK berbayar?</div>
            <div class="author-box">
              <p>A: Tidak, semua layanan pada aplikasi Silandak tersedia secara gratis. Beberapa layanan yang tersedia di aplikasi Silandak antara lain:
              <ol>
                <li>Kartu Keluarga</li>
                <li>Akta Lahir</li>
                <li>Surat Pindah</li>
                <li>Akta Kematian</li>
                <li>Surat Pindah Datang</li>
                <li>Biodata WNI</li>
                <li>Rekam Kartu Tanda Penduduk</li>
              </ol>
              </p>
            </div>

            <div class="author-box font-weight-bolder">Q: Berapa lama waktu untuk proses pelayanan apabila sudah mengajukan permohonan?</div>
            <div class="author-box">
              <p>A: Untuk waktu proses bervariasi, kami memproses data dari yang pertama masuk dan proses verifikasi sekitar 30 menit kemudian kami akan menghubungi melalui whatsapp atau sms apabila data sudah di verifikasi</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal faq -->


  <!-- Modal about -->
  <div class="modal fade" id="modalAbout" tabindex="-1" role="dialog" aria-labelledby="modalAboutLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAboutLabel">Tentang Aplikasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="bodydetail">
          <div class="author-box">
            <div class="author-box-name">
              <h5>TENTANG APLIKASI SILANDAK</h5>
            </div>
            <hr>
            <div class="author-box">
              <p>Aplikasi Sistem Layanan Data Kecamatan (SILANDAK) adalah sebuah aplikasi berbasis website yang dibangun untuk memberikan pelayanan administrasi kepada masyarakat Kecamatan Banua Lawas. aplikasi ini dibuat untuk membantu memudahkan masyarakat untuk pengajuan permohonan pengurusan surat di kecamatan.</p>
              <p>Beberapa pelayanan yang tersedia adalah:</p>
              <ol>
                <li>Kartu Keluarga</li>
                <li>Akta Kelahiran</li>
                <li>Surat Pindah</li>
                <li>Akta Kematian</li>
                <li>Surat Pindah Datang</li>
                <li>Biodata WNI</li>
                <li>Rekam KTP</li>
              </ol>
            </div>

            <div class="author-box-name">
              <h5>ALUR PEMOHON/MASYARAKAT</h5>
            </div>
            <hr>
            <div class="author-box">
              <p>Silahkan buka file dibawah ini untuk melihat alur penggunaan bagi pemohon/masyarakat</p>
              <a href="../assets/Alur Penggunaan Aplikasi Website SILANDAK Untuk Pemohon Warga.pdf"><i class="fa fa-file-pdf" style="font-size: 40px; color: red;"></i></a>
            </div>

            <div class="author-box mt-3">
              <div class="author-box-name">
                <h5>ALUR ADMIN KECAMATAN</h5>
              </div>
              <hr>

              <div class="author-box">
                <p>Silahkan buka file dibawah ini untuk melihat alur penggunaan bagi admin kecamatan</p>
                <a href="../assets/Alur Penggunaan Aplikasi Website SILANDAK Untuk Admin Kecamatan.pdf"><i class="fa fa-file-pdf" style="font-size: 40px; color: red;"></i></a>
              </div>
            </div>

            <div class="author-box mt-3">
              <div class="author-box-name">
                <h5>ALUR ADMIN DESA</h5>
              </div>
              <hr>

              <div class="author-box">
                <p>Silahkan buka file dibawah ini untuk melihat alur penggunaan bagi admin desa</p>
                <a href="../assets/Alur Penggunaan Aplikasi Website SILANDAK Untuk Admin Desa.pdf"><i class="fa fa-file-pdf" style="font-size: 40px; color: red;"></i></a>
              </div>
            </div>

            <div class="author-box mt-3">
              <div class="author-box-name">
                <h5>CARA MENGGANTI PASSWORD BARU DAN LUPA PASSWORD</h5>
              </div>
              <hr>

              <div class="author-box">
                <p>Silahkan buka file dibawah ini untuk melihat alur penggunaan bagi admin desa</p>
                <a href="../assets/Cara Mengisi Ganti Password dan Lupa Password.pdf"><i class="fa fa-file-pdf" style="font-size: 40px; color: red;"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal about -->


  <!-- Modal pengaduan -->
  <div class="modal fade" id="modalPengaduan" tabindex="-1" role="dialog" aria-labelledby="modalPengaduanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPengaduanLabel">Pengaduan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="bodydetail">
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
                    <input type="text" class="form-control" id="pesan" name="pesan" placeholder="Ketik Judul dan Isi Laporan Anda">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="asal_pelapor" name="asal_pelapor" placeholder="Ketik Asal Pelapor">
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
                    <input type="text" class="form-control" id="pesan" name="pesan" placeholder="Ketik Judul dan Isi Laporan Anda">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="asal_pelapor" name="asal_pelapor" placeholder="Ketik Asal Pelapor">
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
  <!-- end modal pengaduan -->


  <!-- Modal lupa password -->
  <div class="modal fade" id="modalLupaPassword" tabindex="-1" role="dialog" aria-labelledby="modalLupaPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLupaPasswordLabel">Lupa Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="bodydetail">
          <div class="text-muted mb-3">
            <p>Masukan username dan nomor handphone / nomor whatsapp anda untuk pemprosesan mengganti kata sandi baru.</p>
          </div>
          <form method="POST">
            <div class="form-group">
              <label for="username">Username <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="username" type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
              <label for="no_hp">Nomor Handphone <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
              <input id="no_hp" type="text" class="form-control" name="no_hp" required>
            </div>
            <div class="form-group">
              <label for="pesan">Keterangan </label>
              <input id="pesan" type="text" class="form-control" name="pesan">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success btn-md" name="kirim">
                <i class="fas fa-paper-plane"></i> Kirim
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- end modal lupa password -->


  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- script show hide radio button -->
  <script>
    const pengaduan = document.getElementById("pengaduan");
    const aspirasi = document.getElementById("aspirasi");
    const permintaan_informasi = document.getElementById("permintaan_informasi");
    const radioButtons = document.getElementsByName("btnradio");

    radioButtons.forEach((radio) => {
      radio.addEventListener("change", () => {
        if (radio.value === "pengaduan") {
          pengaduan.style.display = "block";
          aspirasi.style.display = "none";
          permintaan_informasi.style.display = "none";
        } else if (radio.value === "aspirasi") {
          aspirasi.style.display = "block";
          pengaduan.style.display = "none";
          permintaan_informasi.style.display = "none";
        } else if (radio.value === "permintaan_informasi") {
          permintaan_informasi.style.display = "block";
          pengaduan.style.display = "none";
          aspirasi.style.display = "none";
        }
      });
    });
  </script>


  <script>
    // membuat fungsi change
    function change() {

      // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
      var x = document.getElementById('password').type;

      //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
      if (x == 'password') {

        //ubah form input password menjadi text
        document.getElementById('password').type = 'text';

        //ubah icon mata terbuka menjadi tertutup
        document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                          <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                          <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                          </svg>`;
      } else {

        //ubah form input password menjadi text
        document.getElementById('password').type = 'password';

        //ubah icon mata terbuka menjadi tertutup
        document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                          <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                          </svg>`;
      }
    }
  </script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script>
    <?php if (isset($script)) {
      echo $script;
    } ?>
  </script>

  <!-- Page Specific JS File -->
</body>

</html>