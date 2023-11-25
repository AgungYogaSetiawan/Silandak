<!-- kode php -->
<?php

if (isset($_POST['kirim'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $level = $_POST['level'];
    $kewarganegaraan = htmlspecialchars($_POST['kewarganegaraan']);
    $nama = htmlspecialchars($_POST['nama']);
    $nik = htmlspecialchars($_POST['nik']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $tmpt_lahir = htmlspecialchars($_POST['tmpt_lahir']);
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = htmlspecialchars($_POST['jk']);
    $status = htmlspecialchars($_POST['status']);
    $agama = htmlspecialchars($_POST['agama']);
    $kelurahan = htmlspecialchars($_POST['kelurahan']);
    $kecamatan = htmlspecialchars($_POST['kecamatan']);
    $rt = htmlspecialchars($_POST['rt']);
    $rw = htmlspecialchars($_POST['rw']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $kode_pos = htmlspecialchars($_POST['kode_pos']);
    $ekstensi_diperbolehkan = array('pdf', 'png', 'jpg', 'jpeg');

    $file = $_FILES['foto']['name'];
    $pdf = explode('.', $file);
    $ekstensi = strtolower(end($pdf));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    // koding cek upload file buku_nikah
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'assets/' . $file);
        } else {
            echo 'UKURAN FILE TERLALU BESAR!';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
    }

    $sql = "INSERT INTO tb_user VALUES (NULL, '$username','$password','$level','$kewarganegaraan','$nama','$nik','$no_hp','$pekerjaan','$tmpt_lahir','$tgl_lahir','$jk','$status','$agama','$kelurahan','$kecamatan','$rt','$rw','$alamat','$kode_pos','$file')";
    $hasil = mysqli_query($conn, $sql);

    if ($hasil) {
        echo "<script>alert('Data Berhasil Disimpan');</script>";
    } else {
        echo "<script>alert('Data gagal disimpan!');</script>";
    }
}
?>
<!-- end kode php -->



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="mt-3">
                <div class="row">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4 class="text-danger">Data User</h4>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-primary mb-3" data-toggle='modal' data-target='#modalTambahUser'><i class="fas fa-plus"></i> Tambah Data</button>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="tabel">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Kewarganegaraan</th>
                                                <th>Nama Lengkap</th>
                                                <th>NIK</th>
                                                <th>No Handphone</th>
                                                <th>Pekerjaan</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Status</th>
                                                <th>Agama</th>
                                                <th>Desa</th>
                                                <th>Kecamatan</th>
                                                <th>RT</th>
                                                <th>RW</th>
                                                <th>Alamat</th>
                                                <th>Kode Pos</th>
                                                <th>Foto Profil</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM tb_user");
                                            $no = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                setlocale(LC_TIME, 'id_ID');
                                                $tanggal_format = strftime('%d %B %Y', strtotime($row['tgl_lahir']));
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $row["username"] ?></td>
                                                    <td><?php echo $row["level"] ?></td>
                                                    <td><?php echo $row["kewarganegaraan"] ?></td>
                                                    <td><?php echo $row["nama"] ?></td>
                                                    <td><?php echo $row["nik"] ?></td>
                                                    <td><?php echo $row["no_hp"] ?></td>
                                                    <td><?php echo $row["pekerjaan"] ?></td>
                                                    <td><?php echo $row["tmpt_lahir"] ?></td>
                                                    <td><?php echo $tanggal_format ?></td>
                                                    <td><?php echo $row["jk"] ?></td>
                                                    <td><?php echo $row["status"] ?></td>
                                                    <td><?php echo $row["agama"] ?></td>
                                                    <td><?php echo $row["kelurahan"] ?></td>
                                                    <td><?php echo $row["kecamatan"] ?></td>
                                                    <td><?php echo $row["rt"] ?></td>
                                                    <td><?php echo $row["rw"] ?></td>
                                                    <td><?php echo $row["alamat"] ?></td>
                                                    <td><?php echo $row["kode_pos"] ?></td>
                                                    <td><a href="assets/<?php echo $row["foto"] ?>"><img src="assets/<?php echo $row["foto"] ?>" width="80"></a></td>

                                                    <td>
                                                        <div class='btn-row'>
                                                            <div class='btn-group'>
                                                                <a href='#edit_modal' class='btn btn-warning btn-md mr-2' data-toggle='modal' data-id="<?php echo $row['id_user'] ?>"><i class='fas fa-user-edit'></i></a>
                                                                <a href="pengguna/pengguna_delete.php?id=<?php echo $row['id_user'] ?>" class='btn btn-danger btn-md' onclick="return confirm('Apakah anda yakin ingin hapus data ini?')"><i class='fas fa-trash'></i></a>
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

<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modalLupaPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLupaPasswordLabel">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodydetail">
                <div class="hasil-data"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalTambahUser" tabindex="-1" role="dialog" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahUserLabel">Form Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <hr>
            <div class="modal-body" id="bodydetail">
                <div class="text-danger mb-5">
                    <h6><i class="fas fa-user"></i> DATA USER</h6>
                </div>
                <form method="POST" action="" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" required name="username">
                        </div>
                        <div class="form-group col-6">
                            <label for="password">Password</label>
                            <input id="password" type="text" class="form-control" required name="password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="level">Peran</label>
                            <select name="level" required class="form-control">
                                <option value="">Pilih Peran Pengguna</option>
                                <option value="admin kecamatan">Admin Kecamatan</option>
                                <option value="admin desa">Admin Desa</option>
                                <option value="warga">Warga</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nama">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group col-6">
                            <label for="nik">NIK</label>
                            <input id="nik" type="text" class="form-control" name="nik">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="no_hp">No.Telepon</label>
                            <input id="no_hp" type="text" class="form-control" name="no_hp">
                        </div>
                        <div class="form-group col-6">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input id="pekerjaan" type="text" class="form-control" name="pekerjaan">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="tmpt_lahir">Tempat Lahir</label>
                            <input id="tmpt_lahir" type="text" class="form-control" name="tmpt_lahir">
                        </div>
                        <div class="form-group col-6">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="d-block" for="jk">Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="jk1" name="jk" value="Laki-laki">
                                <label class="form-check-label" for="jk">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="jk2" name="jk" value="Perempuan">
                                <label class="form-check-label" for="jk">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>Status</label>
                            <select class="form-control selectric" name="status">
                                <option value="">--Pilih Status--</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="agama">Agama</label>
                            <input id="agama" type="text" class="form-control" name="agama">
                        </div>
                        <div class="form-group col-6">
                            <label for="kelurahan">Desa</label>
                            <select class="form-control selectric" name="kelurahan">
                                <option>--Pilih Desa--</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM tb_penduduk");
                                while ($data = mysqli_fetch_array($result)) { ?>
                                    <option value="<?php echo $data['desa'] ?>" <?php if ($row["desa"] == $data['desa']) {
                                                                                    echo "SELECTED";
                                                                                } ?>><?php echo $data['desa'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Kecamatan</label>
                            <select class="form-control selectric" name="kecamatan">
                                <option selected>Banua Lawas</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="rt">RT</label>
                            <input id="rt" type="text" class="form-control" name="rt">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="rw">RW</label>
                            <input id="rw" type="text" class="form-control" name="rw">
                        </div>
                        <div class="form-group col-6">
                            <label for="alamat">Alamat Domisili</label>
                            <input id="alamat" type="text" class="form-control" name="alamat">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="kode_pos">Kode Pos</label>
                            <input id="kode_pos" type="number" class="form-control" name="kode_pos">
                        </div>
                        <div class="form-group col-6">
                            <label for="foto">Unggah Foto Profil</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" name="foto">
                                <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-md" name="kirim">
                            <i class="fas fa-paper-plane"></i> Kirim
                        </button>
                        <a href="?page=users" class="btn btn-danger btn-md">
                            <i class="fas fa-window-close"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>