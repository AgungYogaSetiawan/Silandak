<?php
session_start();
require '../pengaturan/fungsi.php';
if (isset($_SESSION['login'])) {
  header('location:../index.php?page=beranda');
}

if (isset($_POST['daftar'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>alert('Akun anda berhasil dibuat!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=login_view.php'>";
  } else {
    echo mysqli_error($conn);
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Registrasi - Aplikasi Sistem Layanan Data Kecamatan Banua Lawas</title>

  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo_tabalong_new.png">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- icon -->
  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- data tables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

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

            <div class="card card-danger">
              <div class="card-header text-danger">
                <h6>Daftar</h6>
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
                      <label for="password" class="control-label">Kata Sandi</label>
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
                    </div>

                    <div class="invalid-feedback">
                      Masukan password anda
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4" name="daftar">
                      Daftar
                    </button>
                  </div>
                  <div class="mt-3 text-muted text-center">
                    Sudah punya akun? Silahkan <a href="login_view.php" class="text-danger" style="text-decoration: none;">Login</a>
                  </div>
                </form>
              </div>
            </div>

            <div class="mt-5 text-muted text-center">
              <button data-toggle='modal' data-target='#modalFAQ' class="btn btn-transparent text-danger">FAQ</button> | <button data-toggle='modal' data-target='#modalAbout' class="btn btn-transparent text-danger">TENTANG APLIKASI</button> | <button data-toggle='modal' data-target='#modalPengaduan' class="btn btn-transparent text-danger">PENGADUAN</button>
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
              <p>A: SILANDAK (Sistem Informasi Pelayanan Online Kecamatan) yang berguna untuk menyediakan pelayanan yang ada di kecamatan namun berbasis online yang dapat diakses dari mana saja</p>
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
              <h5>ALUR PEMOHON/MASYARAKAT</h5>
            </div>
            <hr>
            <div class="row mt-4">
              <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <div class="wizard-step-label">
                      Daftar
                    </div>
                  </div>
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="wizard-step-label">
                      Isi Formulir
                    </div>
                  </div>
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-upload"></i>
                    </div>
                    <div class="wizard-step-label">
                      Unggah Berkas
                    </div>
                  </div>
                  <div class="wizard-step wizard-step-success">
                    <div class="wizard-step-icon">
                      <i class="fas fa-paper-plane"></i>
                    </div>
                    <div class="wizard-step-label">
                      Kirim
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="author-box-name">
              <h5>ALUR ADMIN KECAMATAN</h5>
            </div>
            <hr>
            <div class="row mt-4">
              <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-tshirt"></i>
                    </div>
                    <div class="wizard-step-label">
                      Order Placed
                    </div>
                  </div>
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="wizard-step-label">
                      Payment Completed
                    </div>
                  </div>
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="wizard-step-label">
                      Product Shipped
                    </div>
                  </div>
                  <div class="wizard-step wizard-step-success">
                    <div class="wizard-step-icon">
                      <i class="fas fa-check"></i>
                    </div>
                    <div class="wizard-step-label">
                      Order Completed
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="author-box-name">
            <h5>ALUR ADMIN DESA</h5>
          </div>
          <hr>
          <div class="row mt-4">
            <div class="col-12 col-lg-8 offset-lg-2">
              <div class="wizard-steps">
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="fas fa-tshirt"></i>
                  </div>
                  <div class="wizard-step-label">
                    Order Placed
                  </div>
                </div>
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="fas fa-credit-card"></i>
                  </div>
                  <div class="wizard-step-label">
                    Payment Completed
                  </div>
                </div>
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="fas fa-shipping-fast"></i>
                  </div>
                  <div class="wizard-step-label">
                    Product Shipped
                  </div>
                </div>
                <div class="wizard-step wizard-step-success">
                  <div class="wizard-step-icon">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="wizard-step-label">
                    Order Completed
                  </div>
                </div>
              </div>
            </div>
          </div>
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

              <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="permintaan informasi" autocomplete="off">
              <label class="btn btn-outline-danger" for="btnradio3">PERMINTAAN INFORMASI</label>
            </div>

            <div class="card-body">
              <div id="pengaduan" style="display:none;">
                <form method="POST">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="judul_laporan" placeholder="Ketik Judul Laporan Anda">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="isi_laporan" placeholder="Ketik Isi Laporan Anda">
                  </div>
                  <div class="mb-3">
                    <input type="date" class="form-control" id="tanggal_laporan" placeholder="Pilih Tanggal Kejadian">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="isi_laporan" placeholder="Ketik Lokasi Kejadian">
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

              <div id="aspirasi" style="display:none;">
                <form method="POST">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="judul_laporan" placeholder="Ketik Judul Laporan Anda">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="isi_laporan" placeholder="Ketik Isi Laporan Anda">
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
                    <input type="text" class="form-control" id="judul_laporan" placeholder="Ketik Judul Laporan Anda">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="isi_laporan" placeholder="Ketik Isi Laporan Anda">
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
  <!-- end modal pengaduan -->

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/auth-register.js"></script>

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
</body>

</html>