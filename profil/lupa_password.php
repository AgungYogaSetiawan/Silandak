<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header justify-content-between bg-danger rounded-lg">
      <h1 class="text-white">FORM LUPA PASSWORD</h1>
      <a href="?page=gantipassword">
        <h1 class="text-white"><i class="fas fa-arrow-left" style="font-size:20px;"></i> Kembali</h1>
      </a>
    </div>
    <div class="section-body">
      <div class="mt-3">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header text-danger">
                <h6>LUPA PASSWORD</h6>
              </div>
              <div class="card-body">
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
                    <input id="no_hp" type="number" class="form-control" name="no_hp" required>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan <span class="required-asterisk text-danger" aria-hidden="true">*</span></label>
                    <input id="keterangan" type="text" class="form-control" name="keterangan" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md" name="ubah">
                      <i class="fas fa-paper-plane"></i> Kirim
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