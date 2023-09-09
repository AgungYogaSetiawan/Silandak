<!-- <button class="btn btn-danger up-icon" data-toggle='modal' data-target='#modalLapor'>
    <i class="fa fa-exclamation"></i>
</button> -->

<?php include 'kartu_keluarga/modalKK.php'; ?>
<?php include 'akta_kelahiran/modal_akta_lahir.php'; ?>
<?php include 'surat_pindah/modal_sp.php'; ?>
<?php include 'akta_kematian/modal_akta_kematian.php'; ?>
<?php include 'surat_pindah_datang/modal_spd.php'; ?>
<?php include 'biodata_wni/modal_wni.php'; ?>
<?php include 'rekam_ktp/modal_rekam_ktp.php'; ?>





<footer class="main-footer">
    <div class="text-center">
        Copyright &copy; 2023 <div class="bullet"></div> Coded By <a href="https://www.linkedin.com/in/agung-yoga-setiawan/" target="_blank" class="text-danger">Agung Yoga Setiawan</a>
    </div>
    <div class="footer-right">
        Version 1.0.0
    </div>
</footer>
</div>
</div>

<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda mau Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="login/logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>



<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="assets/js/stisla.js"></script>


<!-- dattables -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>
<!-- sweet alert js
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<!-- Fungsi custom script js -->
<script src="assets/js/function.js"></script>


<!-- JS Libraies -->
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    <?php if (isset($script)) {
        echo $script;
    } ?>
</script>
</body>
</html>
