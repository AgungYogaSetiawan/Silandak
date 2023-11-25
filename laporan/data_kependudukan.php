<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="mt-3">
                <div class="row">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4 class="text-danger">Data Kependudukan</h4>
                            </div>
                            <div class="card-body">
                                <h6>Filter Pencarian</h6>
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="desa"><strong>Desa</strong></label>
                                            <?php
                                            // Misalnya, Anda memiliki informasi desa yang login dalam variabel $desaLogin
                                            if ($_SESSION['peran'] == 'admin desa') {
                                                $desaLogin = $_SESSION['kelurahan']; // Contoh desa yang login


                                                // Daftar semua opsi desa
                                                $daftarDesa = [
                                                    "Bangkiling", "Bangkaling Raya", "Banua Lawas", "Banua Rantau", "Batang Banyu",
                                                    "Bungin", "Habau", "Habau Hulu", "Hariang", "Hapalah", "Pematang", "Purai",
                                                    "Sei Anyar", "Sei Durian", "Talan"
                                                ];

                                                // Menyaring opsi desa yang sesuai dengan desa yang login
                                                $opsiDesa = array_filter($daftarDesa, function ($desa) use ($desaLogin) {
                                                    return $desa == $desaLogin;
                                                });
                                            }
                                            ?>
                                            <select class="form-control" name="desa">
                                                <option>--Pilih Desa--</option>
                                                <option value='Bangkiling'>Bangkiling</option>
                                                <option value='Bangkaling Raya'>Bangkiling Raya</option>
                                                <option value='Banua Lawas'>Banua Lawas</option>
                                                <option value='Banua Rantau'>Banua Rantau</option>
                                                <option value='Batang Banyu'>Batang Banyu</option>
                                                <option value='Bungin'>Bungin</option>
                                                <option value='Habau'>Habau</option>
                                                <option value='Habau Hulu'>Habau Hulu</option>
                                                <option value='Hariang'>Hariang</option>
                                                <option value='Hapalah'>Hapalah</option>
                                                <option value='Pematang'>Pematang</option>
                                                <option value='Purai'>Purai</option>
                                                <option value='Sei Anyar'>Sei Anyar</option>
                                                <option value='Sei Durian'>Sei Durian</option>
                                                <option value='Talan'>Talan</option>
                                                <!-- <?php
                                                        // if ($_SESSION['peran'] !== 'admin desa') {

                                                        // } else {
                                                        //     // Logika yang diperlukan jika peran adalah 'admin desa'
                                                        //     foreach ($opsiDesa as $desa) {
                                                        //         echo "<option value=\"$desa\">$desa</option>";
                                                        //     }
                                                        // }
                                                        ?> -->
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="bulan"><strong>Bulan</strong></label>
                                            <select class="form-control" name="bulan">
                                                <option>--Pilih Bulan--</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="tahun"><strong>Tahun</strong></label>
                                            <input id="tahun" type="number" class="form-control" name="tahun">
                                        </div>
                                        <div class="form-group col-6" style="margin-top:6px;">
                                            <button type="submit" class="btn btn-warning btn-md mt-4" name="cari">
                                                <i class="fas fa-search"></i> Cari
                                            </button>
                                            <a href="?page=datakependudukan" class="btn btn-primary btn-md mt-4"><i class="fas fa-sync"></i> Refresh</a>
                                        </div>
                                    </div>
                                </form>
                                <?php if ($_SESSION['peran'] == 'admin desa') : ?>
                                    <hr>
                                    <h6 class="mt-3">Cetak Laporan</h6>
                                    <p class="text-danger">*Silahkan isi kolom dibawah apabila ingin mengunduh data yang berisi sesuai filter bulan dan tahun yang di isikan pada kolom dibawah</p>
                                    <form action="laporan/export.php" method="post" target="_blank">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class=""><strong>Bulan</strong></label>
                                                    <select class="form-control" name="bulan" style="width: 220px;">
                                                        <option>--Pilih Bulan--</option>
                                                        <option value="Januari">Januari</option>
                                                        <option value="Februari">Februari</option>
                                                        <option value="Maret">Maret</option>
                                                        <option value="April">April</option>
                                                        <option value="Mei">Mei</option>
                                                        <option value="Juni">Juni</option>
                                                        <option value="Juli">Juli</option>
                                                        <option value="Agustus">Agustus</option>
                                                        <option value="September">September</option>
                                                        <option value="Oktober">Oktober</option>
                                                        <option value="November">November</option>
                                                        <option value="Desember">Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class=""><strong>Tahun</strong></label>
                                                    <input type="text" class="form-control" name="tahun" style="width: 220px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="pdf" class="btn btn-danger btn-sm mb-3"><i class="fa fa fa-file-pdf"></i> Download File PDF</button>
                                            <button type="submit" name="excel" class="btn btn-success btn-sm mb-3"><i class="fa fa fa-file-excel"></i> Download File Excel</button>
                                        </div>
                                    </form>
                                <?php endif; ?>
                                <?php if ($_SESSION['peran'] !== 'warga') : ?>
                                    <a href="?page=tambahdatakependudukan" class="btn btn-primary btn-md mb-4"><i class="fas fa-plus"></i> Tambah Data</a>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
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
                                                <?php if ($_SESSION['peran'] !== 'warga') : ?>
                                                    <th rowspan=3 style="text-align:center; vertical-align: middle;">AKSI</th>
                                                <?php endif; ?>
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
                                            $batas = 10;
                                            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
                                            $previous = $halaman - 1;
                                            $next = $halaman + 1;
                                            $no = $halaman_awal + 1;
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
                                            if (isset($_POST['cari'])) {
                                                $desa = trim($_POST['desa']);
                                                $bulan = trim($_POST['bulan']);
                                                $tahun = trim($_POST['tahun']);
                                                $query = mysqli_query($conn, "SELECT * FROM tb_penduduk WHERE desa = '$desa' AND bulan = '$bulan' AND tahun = '$tahun' LIMIT $halaman_awal, $batas");
                                                $query_halaman = mysqli_query($conn, "SELECT * FROM tb_penduduk WHERE desa = '$desa' AND bulan = '$bulan' AND tahun = '$tahun'");
                                                $jumlah_data = mysqli_num_rows($query_halaman);
                                                $total_halaman = ceil($jumlah_data / $batas);
                                            } else if ($_SESSION['peran'] == 'admin desa') {
                                                $desa = $_SESSION['kelurahan'];
                                                $query = mysqli_query($conn, "SELECT * FROM tb_penduduk WHERE bulan = '$bulanNow' AND tahun = '$tahunNow' LIMIT $halaman_awal, $batas");
                                                $query_halaman = mysqli_query($conn, "SELECT * FROM tb_penduduk WHERE bulan = '$bulanNow' AND tahun = '$tahunNow'");
                                                $jumlah_data = mysqli_num_rows($query_halaman);
                                                $total_halaman = ceil($jumlah_data / $batas);
                                            } else {
                                                $query = mysqli_query($conn, "SELECT * FROM tb_penduduk WHERE bulan = '$bulanNow' AND tahun = '$tahunNow' LIMIT $halaman_awal, $batas");
                                                $query_halaman = mysqli_query($conn, "SELECT * FROM tb_penduduk WHERE bulan = '$bulanNow' AND tahun = '$tahunNow'");
                                                $jumlah_data = mysqli_num_rows($query_halaman);
                                                $total_halaman = ceil($jumlah_data / $batas);
                                            }
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
                                                    <?php if ($_SESSION['peran'] !== 'warga') : ?>
                                                        <td>
                                                            <div class='btn-row'>
                                                                <div class='btn-group'>
                                                                    <a href="?page=editdatakependudukan&id_penduduk=<?php echo $row['id_penduduk'] ?>" class='btn btn-warning btn-md mr-2'><i class='fas fa-user-edit'></i></a>
                                                                    <a href="?page=hapusdatakependudukan&id_penduduk=<?php echo $row['id_penduduk'] ?>" class='btn btn-danger btn-md' onclick="return confirm('Anda yakin mau menghapus data ini?');"><i class='fas fa-trash'></i></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
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
                                                <td></td>
                                                <?php if ($_SESSION['peran'] !== 'warga') : ?>
                                                    <td></td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php if (mysqli_num_rows($query) > 0) { ?>
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
                                                    <?php if ($_SESSION['peran'] !== 'warga') : ?>
                                                        <td align="center"></td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php } else { ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" <?php if ($halaman > 1) {
                                                                            echo "href='?page=datakependudukan&halaman=$previous'";
                                                                        } ?>>Sebelumnya</a>
                                            </li>
                                            <?php
                                            for ($x = 1; $x <= $total_halaman; $x++) {
                                            ?>
                                                <li class="page-item"><a class="page-link" href="?page=datakependudukan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                            <?php
                                            }
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                            echo "href='?page=datakependudukan&halaman=$next'";
                                                                        } ?>>Selanjutnya</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>