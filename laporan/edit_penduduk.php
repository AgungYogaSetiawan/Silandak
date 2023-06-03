<?php
$id = $_GET['id_penduduk'];
$sql = "SELECT * FROM tb_penduduk WHERE id_penduduk='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if(isset($_POST['simpan'])){
    $id_penduduk =  $_POST['id_penduduk'];
    $desa =  htmlspecialchars($_POST['desa']);
    $l_awal =  htmlspecialchars($_POST['l_awal']);
    $p_awal = htmlspecialchars($_POST['p_awal']);
    $tot_awal =  htmlspecialchars($_POST['tot_awal']);
    $jml_kk_awal =  htmlspecialchars($_POST['jml_kk_awal']);
    $l_lahir =  htmlspecialchars($_POST['l_lahir']);
    $p_lahir =  htmlspecialchars($_POST['p_lahir']);
    $tot_lahir =  htmlspecialchars($_POST['tot_lahir']);
    $l_mati = htmlspecialchars($_POST['l_mati']);
    $p_mati = htmlspecialchars($_POST['p_mati']);
    $tot_mati = htmlspecialchars($_POST['tot_mati']);
    $l_datang = htmlspecialchars($_POST['l_datang']);
    $p_datang = htmlspecialchars($_POST['p_datang']);
    $tot_datang = htmlspecialchars($_POST['tot_datang']);
    $l_pindah = htmlspecialchars($_POST['l_pindah']);
    $p_pindah = htmlspecialchars($_POST['p_pindah']);
    $tot_pindah = htmlspecialchars($_POST['tot_pindah']);
    $l_akhir = htmlspecialchars($_POST['l_akhir']);
    $p_akhir = htmlspecialchars($_POST['p_akhir']);
    $tot_akhir = htmlspecialchars($_POST['tot_akhir']);
    $jml_kk_akhir = htmlspecialchars($_POST['jml_kk_akhir']);

    // menyimpan data ke tabel
    $sql = "UPDATE tb_penduduk SET desa='$desa', l_awal='$l_awal', p_awal='$p_awal', tot_awal='$tot_awal',jml_kk_awal='$jml_kk_awal', l_lahir='$l_lahir', p_lahir='$p_lahir', tot_lahir='$tot_lahir', l_mati='$l_mati', p_mati='$p_mati', tot_mati='$tot_mati', l_datang='$l_datang', p_datang='$p_datang',tot_datang='$tot_datang', l_pindah='$l_pindah', p_pindah='$p_pindah', tot_pindah='$tot_pindah', l_akhir='$l_akhir', p_akhir='$p_akhir', tot_akhir='$tot_akhir', jml_kk_akhir='$jml_kk_akhir' WHERE id_penduduk='$id_penduduk'";
    mysqli_query($conn,$sql);
    
    echo "<script>alert('Data Berhasil Diubah');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=datakependudukan'>";
}
?>




<!-- Main Content -->
<div class="main-content">
  <section class="section">

    <div class="section-body">
      <div class="mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <form method="post" enctype="multipart/form-data" role="form">
              <input type="hidden" id="id_penduduk" name="id_penduduk" value="<?php echo $row['id_penduduk']; ?>" readonly>
              <div class="row">
                <div class="form-group col-6">
                  <label for="desa">Desa</label>
                  <input id="desa" type="text" class="form-control" name="desa" value="<?php echo $row['desa']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="l_awal">Jumlah Laki-laki Awal Bulan</label>
                  <input id="l_awal" type="number" class="form-control" name="l_awal" value="<?php echo $row['l_awal']; ?>" oninput="hitungJmlAwal()">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="p_awal">Jumlah Perempuan Awal Bulan</label>
                  <input id="p_awal" type="number" class="form-control" name="p_awal" value="<?php echo $row['p_awal']; ?>" oninput="hitungJmlAwal()">
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
                  <input id="l_lahir" type="number" class="form-control" name="l_lahir" value="<?php echo $row['l_lahir']; ?>" oninput="hitungJmlLahir()">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="p_lahir">Jumlah Lahir Perempuan Bulan Ini</label>
                  <input id="p_lahir" type="number" class="form-control" name="p_lahir" value="<?php echo $row['p_lahir']; ?>" oninput="hitungJmlLahir()">
                </div>
                <div class="form-group col-6">
                  <label for="tot_lahir">Total Lahir Bulan Ini</label>
                  <input id="tot_lahir" type="number" class="form-control" name="tot_lahir" value="<?php echo $row['tot_lahir']; ?>">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label for="l_mati">Jumlah Mati Laki-laki Bulan Ini</label>
                  <input id="l_mati" type="number" class="form-control" name="l_mati" value="<?php echo $row['l_mati']; ?>" oninput="hitungJmlMati()">
                </div>
                <div class="form-group col-6">
                  <label for="p_mati">Jumlah Mati Perempuan Bulan Ini</label>
                  <input id="p_mati" type="number" class="form-control" name="p_mati" value="<?php echo $row['p_mati']; ?>" oninput="hitungJmlMati()">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="tot_mati">Total Mati Bulan Ini</label>
                  <input id="tot_mati" type="number" class="form-control" name="tot_mati" value="<?php echo $row['tot_mati']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="l_datang">Jumlah Datang Laki-laki Bulan Ini</label>
                  <input id="l_datang" type="number" class="form-control" name="l_datang" value="<?php echo $row['l_datang']; ?>" oninput="hitungJmlDatang()">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="p_datang">Jumlah Datang Perempuan Bulan Ini</label>
                  <input id="p_datang" type="number" class="form-control" name="p_datang" value="<?php echo $row['p_datang']; ?>" oninput="hitungJmlDatang()">
                </div>
                <div class="form-group col-6">
                  <label for="tot_datang">Total Datang Bulan Ini</label>
                  <input id="tot_datang" type="number" class="form-control" name="tot_datang" value="<?php echo $row['tot_datang']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="l_pindah">Jumlah Pindah Laki-laki Bulan Ini</label>
                  <input id="l_pindah" type="number" class="form-control" name="l_pindah" value="<?php echo $row['l_pindah']; ?>" oninput="hitungJmlPindah()">
                </div>
                <div class="form-group col-6">
                  <label for="p_pindah">Jumlah Pindah Perempuan Bulan Ini</label>
                  <input id="p_pindah" type="number" class="form-control" name="p_pindah" value="<?php echo $row['p_pindah']; ?>" oninput="hitungJmlPindah()">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="tot_pindah">Total Pindah Bulan Ini</label>
                  <input id="tot_pindah" type="number" class="form-control" name="tot_pindah" value="<?php echo $row['tot_pindah']; ?>">
                </div>
                <div class="form-group col-6">
                  <label for="l_akhir">Jumlah Laki-laki Akhir Bulan Ini</label>
                  <input id="l_akhir" type="number" class="form-control" name="l_akhir" value="<?php echo $row['l_akhir']; ?>" oninput="hitungJmlAkhir()">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="p_akhir">Jumlah Perempuan Akhir Bulan Ini</label>
                  <input id="p_akhir" type="number" class="form-control" name="p_akhir" value="<?php echo $row['p_akhir']; ?>" oninput="hitungJmlAkhir()">
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
                <button type="submit" class="btn btn-success btn-md" name="simpan">
                  <i class="fas fa-save"></i> Simpan
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
