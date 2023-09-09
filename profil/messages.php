<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="mt-3">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
            <div class="card card-danger">
              <div class="card-header">
                <h4 class="text-danger">Pesan Masuk</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="tabel">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No.HP</th>
                        <th>Isi Pesan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        // menginisialisasi objek koneksi ke database
                        $db = new mysqli('localhost', 'root', '', 'silandak');

                        // menginstansiasi objek CRUD dengan objek koneksi $db
                        $crud = new CRUD($db);

                        // mengambil data dari tabel menggunakan fungsi read
                        $result = $crud->read('tb_pesan');

                        // menampilkan data dalam tabel HTML
                        if ($result->num_rows > 0) {
                          $no = 1;
                          while($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>'.$no++.'</td>';
                            echo '<td>'.$row['username'].'</td>';
                            echo '<td><a href="https://wa.me/'.$row['no_hp'].'">'.$row['no_hp'].'</a></td>';
                            echo '<td>'.$row['pesan'].'</td>';
                            echo '</tr>';
                          }
                        } else {
                          echo '<tr><td colspan="3">Tidak ada data</td></tr>';
                        }
                        // menutup koneksi ke database
                        $db->close();
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
