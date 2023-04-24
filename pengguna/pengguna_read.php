<!-- Main Content -->
<div class="main-content">
<section class="section">

<div class="section-body">
    <div class="mt-5">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-12">
        <div class="card card-danger">
            <div class="card-header">
            <h4 class="text-danger">Data User</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="tabel">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_user");
                    $no = 1;
                    while($row = mysqli_fetch_array($query)){?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row["username"] ?></td>
                            <td><?php echo $row["level"] ?></td>
                            <?php
                            echo "
                            <td>
                                <div class='btn-row'>
                                    <div class='btn-group'>
                                        <a href='pengguna/pengguna_edit.php?id_user=$row[0]' class='btn btn-warning btn-md mr-2'><i class='fas fa-user-edit'></i></a>
                                        <a href='#' class='btn btn-danger btn-md'><i class='fas fa-trash'></i></a>
                                    </div>
                                </div>
                            </td>";
                            ?>
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
