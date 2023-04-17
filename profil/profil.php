<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header justify-content-between bg-danger rounded-lg">
      <h1 class="text-white">FORM DATA PEMOHON</h1>
      <a href="#"><h1 class="text-white"><i class="fas fa-arrow-left" style="font-size:20px;"></i> Kembali</h1></a>
    </div>

    <div class="section-body">
      <div class="mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header text-danger"><h6>DATA PEMOHON</h6></div>
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="kewarganegaraan">Kewarganegaraan</label>
                      <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="nama">Nama Lengkap</label>
                      <input id="nama" type="text" class="form-control" name="nama">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nik">NIK</label>
                      <input id="nik" type="text" class="form-control" name="nik">
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
                      <label for="tempat_lahir">Tempat Lahir</label>
                      <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir">
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
                        <input class="form-check-input" type="radio" id="jk" value="">
                        <label class="form-check-label" for="jk">Laki-laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="jk" value="">
                        <label class="form-check-label" for="jk">Perempuan</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Status</label>
                      <select class="form-control selectric">
                        <option selected>--Pilih Status--</option>
                        <option>West Java</option>
                        <option>East Java</option>
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
                        <option selected>--Pilih Kecamatan--</option>
                        <option>West Java</option>
                        <option>East Java</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="rt">RT</label>
                      <input id="rt" type="number" class="form-control" name="rt">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="rw">RW</label>
                      <input id="rw" type="number" class="form-control" name="rw">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Alamat Domisili</label>
                      <textarea class="form-control"></textarea>
                    </div>
                    <div class="form-group col-6">
                      <label for="kodepos">Kode Pos</label>
                      <input id="kodepos" type="number" class="form-control" name="kodepos">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Upload Foto Profil</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
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
