<?php
session_start();
include '../pengaturan/koneksi.php';
if (!isset($_SESSION['login'])) {
  header("location:../login/login_view.php");
  exit;
}
function angkaKeBulan($angka)
{
  $daftarBulan = array(
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
  );

  return $daftarBulan[$angka];
}
$angkaKeBulan = angkaKeBulan(date("n"));
if (isset($_POST['pdf'])) {

  $bulan = htmlspecialchars($_POST['bulan']);
  $tahun = htmlspecialchars($_POST['tahun']);
  $desa = $_SESSION['kelurahan'];
  $bulanNow = angkaKeBulan(date('n'));
  $tahunNow = date('Y');

  if (!empty($bulan) && !empty($tahun)) {
    if ($_SESSION['peran'] == 'admin desa') {
      $query = mysqli_query($konek, "SELECT * FROM tb_penduduk WHERE bulan = '$bulan' AND tahun = '$tahun'");
    } else {
      $query = mysqli_query($konek, "SELECT * FROM tb_penduduk WHERE bulan = '$bulan' AND tahun = '$tahun'");
    }
  } else {
    if ($_SESSION['peran'] == 'admin desa') {
      $query = mysqli_query($konek, "SELECT * FROM tb_penduduk WHERE bulan = '$bulanNow' AND tahun = '$tahunNow'");
    } else {
      $query = mysqli_query($konek, "SELECT * FROM tb_penduduk WHERE bulan = '$bulanNow' AND tahun = '$tahunNow'");
    }
  }
} else if (isset($_POST['excel'])) {

  $bulan = htmlspecialchars($_POST['bulan']);
  $tahun = htmlspecialchars($_POST['tahun']);
  $desa = $_SESSION['kelurahan'];
  $bulanNow = angkaKeBulan(date('n'));
  $tahunNow = date('Y');

  if (!empty($bulan) && !empty($tahun)) {
    if ($_SESSION['peran'] == 'admin desa') {
      $query = mysqli_query($konek, "SELECT * FROM tb_penduduk WHERE bulan = '$bulan' AND tahun = '$tahun'");
    } else {
      $query = mysqli_query($konek, "SELECT * FROM tb_penduduk WHERE bulan = '$bulan' AND tahun = '$tahun'");
    }
  } else {
    if ($_SESSION['peran'] == 'admin desa') {
      $query = mysqli_query($konek, "SELECT * FROM tb_penduduk WHERE bulan = '$bulanNow' AND tahun = '$tahunNow'");
    } else {
      $query = mysqli_query($konek, "SELECT * FROM tb_penduduk WHERE bulan = '$bulanNow' AND tahun = '$tahunNow'");
    }
  }
}
?>

<style>
  .demo {
    border: 1px solid;
    border-collapse: collapse;
    padding: 5px;
  }

  .demo th {
    border: 1px solid;
    padding: 5px;
    font-weight: normal;
  }

  .demo td {
    border: 1px solid;
    padding: 5px;
  }
</style>

<?php
if (isset($_POST['excel'])) {
  $filename = "Laporan Bulanan Kependudukan Kecamatan " . $_SESSION['kelurahan'] . " Bulan " . $angkaKeBulan . " " . date('Y') . ".xls";
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=" . $filename);
}

?>

<center>
  <table class="demo" id="tabel" width="850" cellspacing="0">
    <center>
      <H3 style="margin-top: 50px;">LAPORAN BULANAN KEPENDUDUKAN<br>KECAMATAN <span style="text-transform: uppercase;"><?= $_SESSION['kelurahan']; ?></span><br>BULAN <span style="text-transform: uppercase;"><?= $angkaKeBulan  ?></span> <?= date('Y'); ?></H3>
    </center>
    <thead>
      <tr>
        <th rowspan=2 style="text-align:center; vertical-align: middle;" valign="middle">NO</th>
        <th rowspan=2 style="text-align:center; vertical-align: middle;">DESA</th>
        <th colspan=4 style="text-align:center; vertical-align: middle;">PENDUDUK AWAL BULAN INI</th>
        <th colspan=3 style="text-align:center; vertical-align: middle;">LAHIR BULAN INI</th>
        <th colspan=3 style="text-align:center; vertical-align: middle;">MATI BULAN INI</th>
        <th colspan=3 style="text-align:center; vertical-align: middle;">DATANG BULAN INI</th>
        <th colspan=3 style="text-align:center; vertical-align: middle;">PINDAH BULAN INI</th>
        <th colspan=4 style="text-align:center; vertical-align: middle;">PENDUDUK AKHIR BULAN INI</th>
      </tr>
      <tr>
        <th style="text-align:center; vertical-align: middle;">L</th>
        <th style="text-align:center; vertical-align: middle;">P</th>
        <th style="text-align:center; vertical-align: middle;">L+P</th>
        <th style="text-align:center; vertical-align: middle;">JML KK</th>
        <th style="text-align:center; vertical-align: middle;">L</th>
        <th style="text-align:center; vertical-align: middle;">P</th>
        <th style="text-align:center; vertical-align: middle;">L+P</th>
        <th style="text-align:center; vertical-align: middle;">L</th>
        <th style="text-align:center; vertical-align: middle;">P</th>
        <th style="text-align:center; vertical-align: middle;">L+P</th>
        <th style="text-align:center; vertical-align: middle;">L</th>
        <th style="text-align:center; vertical-align: middle;">P</th>
        <th style="text-align:center; vertical-align: middle;">L+P</th>
        <th style="text-align:center; vertical-align: middle;">L</th>
        <th style="text-align:center; vertical-align: middle;">P</th>
        <th style="text-align:center; vertical-align: middle;">L+P</th>
        <th style="text-align:center; vertical-align: middle;">L</th>
        <th style="text-align:center; vertical-align: middle;">P</th>
        <th style="text-align:center; vertical-align: middle;">L+P</th>
        <th style="text-align:center; vertical-align: middle;">JML KK</th>
      </tr>
      <tr style="height:30px;">
        <td align="center" class="font-italic">1</td>
        <td align="center" class="font-italic">2</td>
        <td align="center" class="font-italic">3</td>
        <td align="center" class="font-italic">4</td>
        <td align="center" class="font-italic">5</td>
        <td align="center" class="font-italic">6</td>
        <td align="center" class="font-italic">7</td>
        <td align="center" class="font-italic">8</td>
        <td align="center" class="font-italic">9</td>
        <td align="center" class="font-italic">10</td>
        <td align="center" class="font-italic">11</td>
        <td align="center" class="font-italic">12</td>
        <td align="center" class="font-italic">13</td>
        <td align="center" class="font-italic">14</td>
        <td align="center" class="font-italic">15</td>
        <td align="center" class="font-italic">16</td>
        <td align="center" class="font-italic">17</td>
        <td align="center" class="font-italic">18</td>
        <td align="center" class="font-italic">19</td>
        <td align="center" class="font-italic">20</td>
        <td align="center" class="font-italic">21</td>
        <td align="center" class="font-italic">22</td>
      </tr>
    </thead>
    <tbody>
      <?php
      include "../pengaturan/fungsi.php";
      $no = 1;
      $bulanNow = angkaKeBulan(date('n'));
      $tahunNow = date('Y');
      $jml_l_awal = 0;
      $jml_p_awal = 0;
      $jml_kk_awal = 0;
      $jml_l_lahir = 0;
      $jml_p_lahir = 0;
      $jml_l_mati = 0;
      $jml_p_mati = 0;
      $jml_l_datang = 0;
      $jml_p_datang = 0;
      $jml_l_pindah = 0;
      $jml_p_pindah = 0;
      $jml_l_akhir = 0;
      $jml_p_akhir = 0;
      $jml_kk_akhir = 0;
      $jml_tot_awal = 0;
      $jml_tot_lahir = 0;
      $jml_tot_mati = 0;
      $jml_tot_datang = 0;
      $jml_tot_pindah = 0;
      $jml_tot_akhir = 0;

      while ($row = mysqli_fetch_array($query)) {
        $jml_l_awal += $row['l_awal'];
        $jml_p_awal += $row['p_awal'];
        $jml_tot_awal = $jml_l_awal + $jml_p_awal;
        $jml_kk_awal += $row['jml_kk_awal'];
        $jml_l_lahir += $row['l_lahir'];
        $jml_p_lahir += $row['p_lahir'];
        $jml_tot_lahir = $jml_l_lahir + $jml_p_lahir;
        $jml_l_mati += $row['l_mati'];
        $jml_p_mati += $row['p_mati'];
        $jml_tot_mati = $jml_l_mati + $jml_p_mati;
        $jml_l_datang += $row['l_datang'];
        $jml_p_datang += $row['p_datang'];
        $jml_tot_datang = $jml_l_datang + $jml_p_datang;
        $jml_l_pindah += $row['l_pindah'];
        $jml_p_pindah += $row['p_pindah'];
        $jml_tot_pindah = $jml_l_pindah + $jml_p_pindah;
        $jml_l_akhir += $row['l_akhir'];
        $jml_p_akhir += $row['p_akhir'];
        $jml_tot_akhir = $jml_l_akhir + $jml_p_akhir;
        $jml_kk_akhir += $row['jml_kk_akhir'];
      ?>
        <tr>
          <td align="center"><?php echo $no++; ?></td>
          <td align="center"><?php echo $row['desa']; ?></td>
          <td align="center"><?php echo $row['l_awal']; ?></td>
          <td align="center"><?php echo $row['p_awal']; ?></td>
          <td align="center"><?php echo $row['tot_awal']; ?></td>
          <td align="center"><?php echo $row['jml_kk_awal']; ?></td>
          <td align="center"><?php echo $row['l_lahir']; ?></td>
          <td align="center"><?php echo $row['p_lahir']; ?></td>
          <td align="center"><?php echo $row['tot_lahir']; ?></td>
          <td align="center"><?php echo $row['l_mati']; ?></td>
          <td align="center"><?php echo $row['p_mati']; ?></td>
          <td align="center"><?php echo $row['tot_mati']; ?></td>
          <td align="center"><?php echo $row['l_datang']; ?></td>
          <td align="center"><?php echo $row['p_datang']; ?></td>
          <td align="center"><?php echo $row['tot_datang']; ?></td>
          <td align="center"><?php echo $row['l_pindah']; ?></td>
          <td align="center"><?php echo $row['p_pindah']; ?></td>
          <td align="center"><?php echo $row['tot_pindah']; ?></td>
          <td align="center"><?php echo $row['l_akhir']; ?></td>
          <td align="center"><?php echo $row['p_akhir']; ?></td>
          <td align="center"><?php echo $row['tot_akhir']; ?></td>
          <td align="center"><?php echo $row['jml_kk_akhir']; ?></td>
        </tr>

      <?php
      }
      ?>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td align="center"></td>
        <td align="center">Jumlah</td>
        <td align="center"><?= $jml_l_awal ?></td>
        <td align="center"><?= $jml_p_awal ?></td>
        <td align="center"><?= $jml_tot_awal ?></td>
        <td align="center"><?= $jml_kk_awal ?></td>
        <td align="center"><?= $jml_l_lahir ?></td>
        <td align="center"><?= $jml_p_lahir ?></td>
        <td align="center"><?= $jml_tot_lahir ?></td>
        <td align="center"><?= $jml_l_mati ?></td>
        <td align="center"><?= $jml_p_mati ?></td>
        <td align="center"><?= $jml_tot_mati ?></td>
        <td align="center"><?= $jml_l_datang ?></td>
        <td align="center"><?= $jml_p_datang ?></td>
        <td align="center"><?= $jml_tot_datang ?></td>
        <td align="center"><?= $jml_l_pindah ?></td>
        <td align="center"><?= $jml_p_pindah ?></td>
        <td align="center"><?= $jml_tot_pindah ?></td>
        <td align="center"><?= $jml_l_akhir ?></td>
        <td align="center"><?= $jml_p_akhir ?></td>
        <td align="center"><?= $jml_tot_akhir ?></td>
        <td align="center"><?= $jml_kk_akhir ?></td>
      </tr>
    </tbody>
  </table>
</center>
<?php if (isset($_POST['pdf'])) : ?>
  <script>
    window.print();
  </script>
<?php endif; ?>