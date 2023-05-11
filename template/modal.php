


<!-- SURAT PINDAH -->
<!-- modal daftar surat pindah -->
<div class="modal fade" id="modalDaftarSuratPindah" tabindex="-1" role="dialog" aria-labelledby="modalDaftarSuratPindahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDaftarSuratPindahLabel">Form Pendaftaran Surat Pindah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
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
                <option selected>Banua Lawas</option>
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
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6></div>
          <div class="form-group">
            <label>Upload Foto/Scan Surat Keterangan Pindah</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Keluarga</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Tanda Penduduk</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-md">
              <i class="fas fa-paper-plane"></i> Kirim
            </button>
            <button type="submit" class="btn btn-warning btn-md">
              <i class="fas fa-save"></i> Simpan Sementara
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
<!-- end modal daftar surat pindah -->
<!-- END SURAT PINDAH -->



<!-- AKTA KEMATIAN -->
<!-- modal daftar akta kematian -->
<div class="modal fade" id="modalDaftarAktaKematian" tabindex="-1" role="dialog" aria-labelledby="modalDaftarAktaKematianLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDaftarAktaKematianLabel">Form Pendaftaran Akta Kematian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
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
                <option selected>Banua Lawas</option>
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
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6></div>
          <div class="form-group">
            <label>Upload Foto/Scan Surat Keterangan Kepala Desa atau Surat Keterangan Rumah Sakit</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Keluarga</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-md">
              <i class="fas fa-paper-plane"></i> Kirim
            </button>
            <button type="submit" class="btn btn-warning btn-md">
              <i class="fas fa-save"></i> Simpan Sementara
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
<!-- end modal daftar akta kematian -->
<!-- END AKTA KEMATIAN -->



<!-- SURAT PINDAH DATANG -->
<!-- modal daftar surat pindah datang -->
<div class="modal fade" id="modalDaftarSuratPindahDatang" tabindex="-1" role="dialog" aria-labelledby="modalDaftarSuratPindahDatangLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDaftarSuratPindahDatangLabel">Form Pendaftaran Surat Pindah Datang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
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
                <option selected>Banua Lawas</option>
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
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6></div>
          <div class="form-group">
            <label>Upload Foto/Scan Surat Keterangan Pindah</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Tanda Penduduk</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-md">
              <i class="fas fa-paper-plane"></i> Kirim
            </button>
            <button type="submit" class="btn btn-warning btn-md">
              <i class="fas fa-save"></i> Simpan Sementara
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
<!-- end modal daftar surat pindah datang -->
<!-- END SURAT PINDAH DATANG -->




<!-- BIODATA WNI -->
<!-- modal daftar biodata wni -->
<div class="modal fade" id="modalDaftarBiodataWNI" tabindex="-1" role="dialog" aria-labelledby="modalDaftarBiodataWNILabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDaftarBiodataWNILabel">Form Pendaftaran Biodata WNI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
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
                <option selected>Banua Lawas</option>
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
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6></div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Keluarga</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-md">
              <i class="fas fa-paper-plane"></i> Kirim
            </button>
            <button type="submit" class="btn btn-warning btn-md">
              <i class="fas fa-save"></i> Simpan Sementara
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
<!-- end modal daftar biodata wni -->
<!-- END BIODATA WNI -->




<!-- REKAM KTP -->
<!-- modal daftar rekam ktp -->
<div class="modal fade" id="modalDaftarRekamKTP" tabindex="-1" role="dialog" aria-labelledby="modalDaftarRekamKTPLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDaftarRekamKTPLabel">Form Pendaftaran Surat Pindah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr>
      <div class="modal-body" id="bodydetail">
        <div class="text-danger mb-5"><h6><i class="fas fa-user"></i> DATA PEMOHON</h6></div>
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
                <option selected>Banua Lawas</option>
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
          <hr>
          <div class="text-danger mb-5"><h6><i class="fas fa-file"></i> BERKAS PERSYARATAN</h6></div>
          <div class="form-group">
            <label>Upload Foto/Scan Kartu Keluarga</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-md">
              <i class="fas fa-paper-plane"></i> Kirim
            </button>
            <button type="submit" class="btn btn-warning btn-md">
              <i class="fas fa-save"></i> Simpan Sementara
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
<!-- end modal daftar rekam ktp -->
<!-- END REKAM KTP -->
