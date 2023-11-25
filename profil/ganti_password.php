<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header justify-content-between bg-danger rounded-lg">
      <h1 class="text-white">FORM GANTI PASSWORD</h1>
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
                <h6>GANTI PASSWORD</h6>
              </div>
              <div class="card-body">
                <form method="POST" action="pengaturan/aksi_ganti_pass.php">
                  <div class="form-group">
                    <label for="old_pass">Kata Sandi Lama <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
                    <div class="input-group">
                      <input id="old_pass" type="password" class="form-control" name="old_pass" autofocus required>
                      <div class="input-group-append">
                        <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                        <span id="btnold" onclick="showHideOld()" class="input-group-text">
                          <!-- icon mata bawaan bootstrap  -->
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="new_pass">Kata Sandi Baru <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
                    <div class="input-group">
                      <input id="new_pass" type="password" class="form-control" name="new_pass" required>
                      <div class="input-group-append">
                        <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                        <span id="btnnew" onclick="showHideNew()" class="input-group-text">
                          <!-- icon mata bawaan bootstrap  -->
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="re_pass">Ulangi Kata Sandi Baru <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
                    <div class="input-group">
                      <input id="re_pass" type="password" class="form-control" name="re_pass" required>
                      <div class="input-group-append">
                        <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                        <span id="btnrepass" onclick="showHideRepass()" class="input-group-text">
                          <!-- icon mata bawaan bootstrap  -->
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>

                  <?php if ($_SESSION['peran'] !== 'admin kecamatan') : ?>
                    <div class="text-muted mb-3">
                      <a href="?page=lupapassword" class="text-danger">Lupa Password?</a>
                    </div>
                  <?php endif; ?>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md" name="ubah">
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