<!-- <button class="btn btn-danger up-icon" data-toggle='modal' data-target='#modalLapor'>
    <i class="fa fa-exclamation"></i>
</button> -->

<?php include 'modal.php'; ?>
<?php include 'kartu_keluarga/modalKK.php'; ?>

<footer class="main-footer">
    <div class="text-center">
        Copyright &copy; 2023 <div class="bullet"></div> Coded By <a href="https://www.linkedin.com/in/agung-yoga-setiawan/" target="_blank" class="text-danger">Agung Yoga Setiawan</a>
    </div>
    <div class="footer-right">
        2.3.0
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
<script>
    $(document).ready(function () {
        $('#tabel').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemuka - maaf",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data belum tersedia",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Cari:",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                }
            }
        });
    });
</script>

<!-- script show hide radio button -->
<script>
    const pengaduan = document.getElementById("pengaduan");
    const aspirasi = document.getElementById("aspirasi");
    const permintaan_informasi = document.getElementById("permintaan_informasi");
    const radioButtons = document.getElementsByName("btnradio");

    radioButtons.forEach((radio) => {
        radio.addEventListener("change", () => {
        if (radio.value === "pengaduan") {
            pengaduan.style.display = "block";
            aspirasi.style.display = "none";
            permintaan_informasi.style.display = "none";
        } else if (radio.value === "aspirasi") {
            aspirasi.style.display = "block";
            pengaduan.style.display = "none";
            permintaan_informasi.style.display = "none";
        } else if (radio.value === "permintaan_informasi") {
            permintaan_informasi.style.display = "block";
            pengaduan.style.display = "none";
            aspirasi.style.display = "none";
        }
        });
    });
</script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
