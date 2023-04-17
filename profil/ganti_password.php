<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header justify-content-between bg-danger rounded-lg">
      <h1 class="text-white">FORM GANTI PASSWORD</h1>
      <a href="#"><h1 class="text-white"><i class="fas fa-arrow-left" style="font-size:20px;"></i> Kembali</h1></a>
    </div>

    <div class="section-body">
      <div class="mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header text-danger"><h6>GANTI PASSWORD</h6></div>
              <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                      <label for="old_pass">Kata Sandi Lama</label>
                      <input id="old_pass" type="password" class="form-control" name="old_pass" autofocus require>
                    </div>

                    <div class="form-group">
                      <label for="new_pass">Kata Sandi Baru</label>
                      <input id="new_pass" type="password" class="form-control" name="new_pass" require>
                    </div>

                    <div class="form-group">
                      <label for="re_pass">Ulangi Kata Sandi Baru</label>
                      <input id="re_pass" type="password" class="form-control" name="re_pass" require>
                      <div class="invalid-feedback"></div>
                    </div>

                    <div class="text-muted mb-3">
                        <a href="lupapassword" class="text-danger">Lupa Password?</a>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-md">
                        <i class="fas fa-save"></i> Simpan
                      </button>
                      <button type="submit" class="btn btn-danger btn-md">
                        <i class="fas fa-window-close"></i> Batal
                      </button>
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
