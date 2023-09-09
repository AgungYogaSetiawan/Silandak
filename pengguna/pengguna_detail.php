<?php

include "../pengaturan/koneksi.php";
if($_POST['idx']) {
    $id = $_POST['idx'];      
    $sql = mysqli_query($konek,"SELECT * FROM tb_user WHERE id_user = $id");
    while ($result = mysqli_fetch_array($sql)){
    ?>
    <form action="pengguna/pengguna_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="<?php echo $result['id_user']; ?>">
        <input type="hidden" id="fotoLama" name="fotoLama" value="<?php echo $result['foto']; ?>" readonly>
        <div class="row">
            <div class="form-group col-6">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $result['username']; ?>">
            </div>
            <div class="form-group col-6">
                <label>Password</label>
                <input type="text" class="form-control" name="password">
            </div>
        </div>
        <div class="row">
                <div class="form-group col-6">
                    <label for="level">Peran</label>
                    <select name="level" required class="form-control">
                        <option value="">Pilih Peran Pengguna</option>
                        <option value="admin kecamatan" <?php echo ($result['level'] == 'admin kecamatan') ? " selected" : "" ?>>Admin Kecamatan</option>
                        <option value="admin desa" <?php echo ($result['level'] == 'admin desa') ? " selected" : "" ?>>Admin Desa</option>
                        <option value="warga" <?php echo ($result['level'] == 'warga') ? " selected" : "" ?>>Warga</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="<?php echo $result['kewarganegaraan']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control" name="nama" value="<?php echo $result['nama']; ?>">
                </div>
                <div class="form-group col-6">
                    <label for="nik">NIK</label>
                    <input id="nik" type="text" class="form-control" name="nik" value="<?php echo $result['nik']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="no_hp">No.Telepon</label>
                    <input id="no_hp" type="text" class="form-control" name="no_hp" value="<?php echo $result['no_hp']; ?>">
                </div>
                <div class="form-group col-6">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="<?php echo $result['pekerjaan']; ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-6">
                    <label for="tmpt_lahir">Tempat Lahir</label>
                    <input id="tmpt_lahir" type="text" class="form-control" name="tmpt_lahir" value="<?php echo $result['tmpt_lahir']; ?>">
                </div>
                <div class="form-group col-6">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="<?php echo $result['tgl_lahir']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                <label class="d-block" for="jk">Jenis Kelamin</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="jk1" name="jk" value="Laki-laki" <?php echo ($result['jk'] == 'Laki-laki') ? " checked" : "" ?>>
                    <label class="form-check-label" for="jk">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="jk2" name="jk" value="Perempuan" <?php echo ($result['jk'] == 'Perempuan') ? " checked" : "" ?>>
                    <label class="form-check-label" for="jk">Perempuan</label>
                </div>
                </div>
                <div class="form-group col-6">
                    <label>Status</label>
                    <select class="form-control selectric" name="status">
                        <option value="" disabled>--Pilih Status--</option>
                        <option value="Belum Menikah" <?php echo ($result['status'] == 'Belum Menikah') ? " selected" : "" ?>>Belum Menikah</option>
                        <option value="Sudah Menikah" <?php echo ($result['status'] == 'Sudah Menikah') ? " selected" : "" ?>>Sudah Menikah</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="agama">Agama</label>
                    <input id="agama" type="text" class="form-control" name="agama" value="<?php echo $result['agama']; ?>">
                </div>
                <div class="form-group col-6">
                    <label for="kelurahan">Desa</label>
                    <select class="form-control selectric" name="kelurahan">
                        <option disabled>--Pilih Desa--</option>
                        <?php
                        $res = mysqli_query($konek,"SELECT * FROM tb_penduduk");
                        while($data = mysqli_fetch_array($res)){?> 
                        <option value="<?php echo $data['desa']?>" <?php if($result["kelurahan"] == $data['desa']){echo "SELECTED";} ?>><?php echo $data['desa']?></option>
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
                    <input id="rt" type="text" class="form-control" name="rt" value="<?php echo $result['rt']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="rw">RW</label>
                    <input id="rw" type="text" class="form-control" name="rw" value="<?php echo $result['rw']; ?>">
                </div>
                <div class="form-group col-6">
                    <label for="alamat">Alamat Domisili</label>
                    <input id="alamat" type="text" class="form-control" name="alamat" value="<?php echo $result['alamat']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="kode_pos">Kode Pos</label>
                    <input id="kode_pos" type="number" class="form-control" name="kode_pos" value="<?php echo $result['kode_pos']; ?>">
                </div>
                <div class="form-group col-6">
                <label for="foto">Unggah Foto Profil</label>
                <div class="custom-file">
                    <input type="file" class="form-control" name="foto">
                    <img src="assets/<?php echo $result['foto'] ?>" width="100">
                    <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>     
    <?php } }
?>