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
  </section>
</div>