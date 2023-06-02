




<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-body">
      <div class="mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <form method="post" enctype="multipart/form-data" role="form">
              <div class="row">
                <div class="form-group col-6">
                  <label for="desa">Desa</label>
                  <input id="desa" type="text" class="form-control" name="desa" value="<?php echo $row['desa']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="l_awal">Jumlah Laki-laki Awal Bulan</label>
                  <input id="l_awal" type="number" class="form-control" name="l_awal" value="<?php echo $row['l_awal']; ?>">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="p_awal">Jumlah Perempuan Awal Bulan</label>
                  <input id="p_awal" type="number" class="form-control" name="p_awal" value="<?php echo $row['p_awal']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="tot_awal">Total Penduduk Awal Bulan</label>
                  <input id="tot_awal" type="number" class="form-control" name="tot_awal" value="<?php echo $row['tot_awal']; ?>">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="jml_kk_awal">Jumlah KK Awal Bulan</label>
                  <input id="jml_kk_awal" type="number" class="form-control" name="jml_kk_awal" value="<?php echo $row['jml_kk_awal']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="l_lahir">Jumlah Lahir Laki-laki Bulan Ini</label>
                  <input id="l_lahir" type="number" class="form-control" name="l_lahir" value="<?php echo $row['l_lahir']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="p_lahir">Jumlah Lahir Perempuan Bulan Ini</label>
                  <input id="p_lahir" type="number" class="form-control" name="p_lahir" value="<?php echo $row['p_lahir']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="tot_lahir">Total Lahir Bulan Ini</label>
                  <input id="tot_lahir" type="number" class="form-control" name="tot_lahir" value="<?php echo $row['tot_lahir']; ?>">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="l_mati">Jumlah Mati Laki-laki Bulan Ini</label>
                  <input id="l_mati" type="number" class="form-control" name="l_mati" value="<?php echo $row['l_mati']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="p_mati">Jumlah Mati Perempuan Bulan Ini</label>
                  <input id="p_mati" type="number" class="form-control" name="p_mati" value="<?php echo $row['p_mati']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="tot_mati">Total Mati Bulan Ini</label>
                  <input id="tot_mati" type="number" class="form-control" name="tot_mati" value="<?php echo $row['tot_mati']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="l_datang">Jumlah Datang Laki-laki Bulan Ini</label>
                  <input id="l_datang" type="number" class="form-control" name="l_datang" value="<?php echo $row['l_datang']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="p_datang">Jumlah Datang Perempuan Bulan Ini</label>
                  <input id="p_datang" type="number" class="form-control" name="p_datang" value="<?php echo $row['p_datang']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="tot_datang">Total Datang Bulan Ini</label>
                  <input id="tot_datang" type="number" class="form-control" name="tot_datang" value="<?php echo $row['tot_datang']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="l_pindah">Jumlah Pindah Laki-laki Bulan Ini</label>
                  <input id="l_pindah" type="number" class="form-control" name="l_pindah" value="<?php echo $row['l_pindah']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="p_datang">Jumlah Pindah Perempuan Bulan Ini</label>
                  <input id="p_datang" type="number" class="form-control" name="p_datang" value="<?php echo $row['p_datang']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="tot_pindah">Total Pindah Bulan Ini</label>
                  <input id="tot_pindah" type="number" class="form-control" name="tot_pindah" value="<?php echo $row['tot_pindah']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="l_akhir">Jumlah Laki-laki Akhir Bulan Ini</label>
                  <input id="l_akhir" type="number" class="form-control" name="l_akhir" value="<?php echo $row['l_akhir']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="p_akhir">Jumlah Perempuan Akhir Bulan Ini</label>
                  <input id="p_akhir" type="number" class="form-control" name="p_akhir" value="<?php echo $row['p_akhir']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="tot_akhir">Total Penduduk Akhir Bulan Ini</label>
                  <input id="tot_akhir" type="number" class="form-control" name="tot_akhir" value="<?php echo $row['tot_akhir']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="jml_kk_akhir">Jumlah KK Akhir Bulan Ini</label>
                  <input id="jml_kk_akhir" type="number" class="form-control" name="jml_kk_akhir" value="<?php echo $row['jml_kk_akhir']; ?>">
                </div>
                <div class="form-group col-6">
                  <input type="hidden" class="form-control">
                </div>
              </div>
                
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-md" name="tambah">
                  <i class="fas fa-plus"></i> Tambah
                </button>
                <button type="reset" class="btn btn-danger btn-md">
                  <i class="fas fa-window-close"></i> Batal
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
