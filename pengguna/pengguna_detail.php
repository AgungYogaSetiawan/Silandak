<?php

  include "../pengaturan/koneksi.php";
  if($_POST['idx']) {
      $id = $_POST['idx'];      
      $sql = mysqli_query($konek,"SELECT * FROM tb_user WHERE id_user = $id");
      while ($result = mysqli_fetch_array($sql)){
      ?>
      <form action="pengguna/pengguna_edit.php" method="post">
          <input type="hidden" name="id_user" value="<?php echo $result['id_user']; ?>">
          <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" value="<?php echo $result['username']; ?>">
          </div>
          <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" name="password">
          </div>
            <button class="btn btn-primary" type="submit">Update</button>
      </form>     
      <?php } }
?>