<?php
include '../pengaturan/fungsi.php';
            $ope = $_GET['op'];
            if ($ope == "ambil_detail") {
                $user_id = $_GET['user_id'];
                $q = mysqli_query($conn, "SELECT * FROM tb_kk a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.id_kk = '$user_id'");
                $data = "<table class='table table-hover'>
                          <thead>
                            <tr>
                              <th>Waktu</th>
                              <th>Status Berkas</th>
                              <th>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>";
                while ($row = mysqli_fetch_array($q)) {
                    $data = $data . "<tr><td>" . $row['tgl'] . "</td>
                            <td>" . $row['status_berkas'] . "</td>
                            <td>" . $row['keterangan'] . "</td>
                            </tr>";
                }
                $data = $data . "</tbody></table>";
                echo $data;
            }
            ?>