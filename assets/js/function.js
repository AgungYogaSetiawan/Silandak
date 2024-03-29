
    $(document).ready(function () {
        $('#tabel').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
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


// script show hide radio button 

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


// <!-- script modal edit user -->


$(document).ready(function(){
    $('#edit_modal').on('show.bs.modal', function (e) {
        var idx = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'pengguna/pengguna_detail.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
        });
});

// <!-- end script modal edit user -->


// <!-- script hide/show old password -->

    // membuat fungsi change
    function showHideOld() {

        // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
        var x = document.getElementById('old_pass').type;

        //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
        if (x == 'password') {

            //ubah form input password menjadi text
            document.getElementById('old_pass').type = 'text';
            
            //ubah icon mata terbuka menjadi tertutup
            document.getElementById('btnold').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                            <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                            </svg>`;
        }
        else {

            //ubah form input password menjadi text
            document.getElementById('old_pass').type = 'password';

            //ubah icon mata terbuka menjadi tertutup
            document.getElementById('btnold').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>`;
        }
    }
// <!-- end script hide/show old password -->

// <!-- script hide/show new password -->
    // membuat fungsi change
    function showHideNew() {

        // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
        var x = document.getElementById('new_pass').type;

        //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
        if (x == 'password') {

            //ubah form input password menjadi text
            document.getElementById('new_pass').type = 'text';
            
            //ubah icon mata terbuka menjadi tertutup
            document.getElementById('btnnew').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                            <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                            </svg>`;
        }
        else {

            //ubah form input password menjadi text
            document.getElementById('new_pass').type = 'password';

            //ubah icon mata terbuka menjadi tertutup
            document.getElementById('btnnew').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>`;
        }
    }
// <!-- end script hide/show new password -->

// <!-- script hide/show repass password -->
    // membuat fungsi change
    function showHideRepass() {

        // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
        var x = document.getElementById('re_pass').type;

        //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
        if (x == 'password') {

            //ubah form input password menjadi text
            document.getElementById('re_pass').type = 'text';
            
            //ubah icon mata terbuka menjadi tertutup
            document.getElementById('btnrepass').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                            <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                            </svg>`;
        }
        else {

            //ubah form input password menjadi text
            document.getElementById('re_pass').type = 'password';

            //ubah icon mata terbuka menjadi tertutup
            document.getElementById('btnrepass').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>`;
        }
    }
// <!-- end script hide/show repass password -->


// script hitung total penduduk awal bulan
function hitungJmlAwal() {
    var l_awal = parseFloat(document.getElementById("l_awal").value);
    var p_awal = parseFloat(document.getElementById("p_awal").value);
    var result = l_awal + p_awal;
    document.getElementById('tot_awal').value = result;
}


// script hitung total penduduk lahir
function hitungJmlLahir() {
    var l_lahir = parseFloat(document.getElementById("l_lahir").value);
    var p_lahir = parseFloat(document.getElementById("p_lahir").value);
    var result = l_lahir + p_lahir;
    document.getElementById('tot_lahir').value = result;
}


// script hitung total penduduk mati
function hitungJmlMati() {
    var l_mati = parseFloat(document.getElementById("l_mati").value);
    var p_mati = parseFloat(document.getElementById("p_mati").value);
    var result = l_mati + p_mati;
    document.getElementById('tot_mati').value = result;
}


// script hitung total penduduk datang
function hitungJmlDatang() {
    var l_datang = parseFloat(document.getElementById("l_datang").value);
    var p_datang = parseFloat(document.getElementById("p_datang").value);
    var result = l_datang + p_datang;
    document.getElementById('tot_datang').value = result;
}


// script hitung total penduduk pindah
function hitungJmlPindah() {
    var l_pindah = parseFloat(document.getElementById("l_pindah").value);
    var p_pindah = parseFloat(document.getElementById("p_pindah").value);
    var result = l_pindah + p_pindah;
    document.getElementById('tot_pindah').value = result;
}


// script hitung total penduduk akhir bulan
function hitungJmlAkhir() {
    var l_awal = parseFloat(document.getElementById("l_awal").value);
    var l_lahir = parseFloat(document.getElementById("l_lahir").value);
    var l_mati = parseFloat(document.getElementById("l_mati").value);
    var l_datang = parseFloat(document.getElementById("l_datang").value);
    var l_pindah = parseFloat(document.getElementById("l_pindah").value);
    var p_awal = parseFloat(document.getElementById("p_awal").value);
    var p_lahir = parseFloat(document.getElementById("p_lahir").value);
    var p_mati = parseFloat(document.getElementById("p_mati").value);
    var p_datang = parseFloat(document.getElementById("p_datang").value);
    var p_pindah = parseFloat(document.getElementById("p_pindah").value);

    var res = l_awal + l_lahir - l_mati + l_datang - l_pindah;
    var resp = p_awal + p_lahir - p_mati + p_datang - p_pindah;
    var tot = res + resp;
    document.getElementById('l_akhir').value = res;
    document.getElementById('p_akhir').value = resp;
    document.getElementById('tot_akhir').value = tot;

}

function JmlAkhir() {
    hitungJmlAwal();
    hitungJmlAkhir();
    hitungJmlLahir();
    hitungJmlMati();
    hitungJmlDatang();
    hitungJmlPindah();
}

//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}