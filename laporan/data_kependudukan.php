<!-- Main Content -->
<div class="main-content">
<section class="section">

<div class="section-body">
    <div class="mt-5">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
        <div class="card card-danger">
            <div class="card-header">
                <h4 class="text-danger">Data Kependudukan</h4>
            </div>
            <div class="card-body">
            <a href="?page=tambahdatakependudukan" class="btn btn-primary btn-md mb-4"><i class="fas fa-plus"></i> Tambah Data</a>
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
                        <th rowspan=3 style="text-align:center; vertical-align: middle;">AKSI</th>
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
                        $query = mysqli_query($conn, "SELECT * FROM tb_penduduk");
                        $no = 1;
                        while($row = mysqli_fetch_array($query)) {
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
                            <td>
                                <div class='btn-row'>
                                    <div class='btn-group'>
                                        <a href="?page=editdatakependudukan&id_penduduk=<?php echo $row['id_penduduk'] ?>" class='btn btn-warning btn-md mr-2'><i class='fas fa-user-edit'></i></a>
                                        <a href="?page=hapusdatakependudukan&id_penduduk=<?php echo $row['id_penduduk'] ?>" class='btn btn-danger btn-md' onclick="return confirm('Anda yakin mau menghapus data ini?');"><i class='fas fa-trash'></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</section>
</div>



