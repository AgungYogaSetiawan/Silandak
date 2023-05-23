<?php
$id = $_SESSION['id'];

// kartu keluarga //
//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($conn, "SELECT * FROM tb_kk a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Baru'");
//menampilkan data
$status_baru = mysqli_num_rows($query);

$query = mysqli_query($conn, "SELECT * FROM tb_kk a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Selesai'");
//menampilkan data
$status_selesai = mysqli_num_rows($query);

// menampilkan notif angka pada admin
$query = mysqli_query($conn, "SELECT * FROM tb_kk a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Baru'");
$status_baru_admin = mysqli_num_rows($query);
$query = mysqli_query($conn, "SELECT * FROM tb_kk a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Selesai'");
$status_selesai_admin = mysqli_num_rows($query);


// menjumlahkan total permohonan
$total_permohonan_baru = $status_baru;
$total_permohonan_selesai = $status_selesai;
// total data pada admin
$total_permohonan_baru_admin = $status_baru_admin;
$total_permohonan_selesai_admin = $status_selesai_admin;

// end kartu keluarga //


// akta kelahiran //
//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($conn, "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Baru'");
//menampilkan data
$status_baru_lahir = mysqli_num_rows($query);

$query = mysqli_query($conn, "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Selesai'");
//menampilkan data
$status_selesai_lahir = mysqli_num_rows($query);

// menampilkan notif angka pada admin
$query = mysqli_query($conn, "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Baru'");
$status_baru_admin_lahir = mysqli_num_rows($query);
$query = mysqli_query($conn, "SELECT * FROM tb_akta_lahir a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Selesai'");
$status_selesai_admin_lahir = mysqli_num_rows($query);


// menjumlahkan total permohonan
$total_permohonan_baru_lahir = $status_baru_lahir;
$total_permohonan_selesai_lahir = $status_selesai_lahir;
// total data pada admin
$total_permohonan_baru_admin_lahir = $status_baru_admin_lahir;
$total_permohonan_selesai_admin_lahir = $status_selesai_admin_lahir;

// end akta kelahiran //


// surat pindah //
//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($conn, "SELECT * FROM tb_surat_pindah a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Baru'");
//menampilkan data
$status_baru_sp = mysqli_num_rows($query);

$query = mysqli_query($conn, "SELECT * FROM tb_surat_pindah a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Selesai'");
//menampilkan data
$status_selesai_sp = mysqli_num_rows($query);

// menampilkan notif angka pada admin
$query = mysqli_query($conn, "SELECT * FROM tb_surat_pindah a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Baru'");
$status_baru_admin_sp = mysqli_num_rows($query);
$query = mysqli_query($conn, "SELECT * FROM tb_surat_pindah a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Selesai'");
$status_selesai_admin_sp = mysqli_num_rows($query);


// menjumlahkan total permohonan
$total_permohonan_baru_sp = $status_baru_sp;
$total_permohonan_selesai_sp = $status_selesai_sp;
// total data pada admin
$total_permohonan_baru_admin_sp = $status_baru_admin_sp;
$total_permohonan_selesai_admin_sp = $status_selesai_admin_sp;

// end surat pindah //


// akta kematian //
//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($conn, "SELECT * FROM tb_kematian a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Baru'");
//menampilkan data
$status_baru_ak = mysqli_num_rows($query);

$query = mysqli_query($conn, "SELECT * FROM tb_kematian a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Selesai'");
//menampilkan data
$status_selesai_ak = mysqli_num_rows($query);

// menampilkan notif angka pada admin
$query = mysqli_query($conn, "SELECT * FROM tb_kematian a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Baru'");
$status_baru_admin_ak = mysqli_num_rows($query);
$query = mysqli_query($conn, "SELECT * FROM tb_kematian a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Selesai'");
$status_selesai_admin_ak = mysqli_num_rows($query);


// menjumlahkan total permohonan
$total_permohonan_baru_ak = $status_baru_ak;
$total_permohonan_selesai_ak = $status_selesai_ak;
// total data pada admin
$total_permohonan_baru_admin_ak = $status_baru_admin_ak;
$total_permohonan_selesai_admin_ak = $status_selesai_admin_ak;

// end akta kematian //


// surat pindah datang //
//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($conn, "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Baru'");
//menampilkan data
$status_baru_spd = mysqli_num_rows($query);

$query = mysqli_query($conn, "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Selesai'");
//menampilkan data
$status_selesai_spd = mysqli_num_rows($query);

// menampilkan notif angka pada admin
$query = mysqli_query($conn, "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Baru'");
$status_baru_admin_spd = mysqli_num_rows($query);
$query = mysqli_query($conn, "SELECT * FROM tb_pindah_datang a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Selesai'");
$status_selesai_admin_spd = mysqli_num_rows($query);


// menjumlahkan total permohonan
$total_permohonan_baru_spd = $status_baru_spd;
$total_permohonan_selesai_spd = $status_selesai_spd;
// total data pada admin
$total_permohonan_baru_admin_spd = $status_baru_admin_spd;
$total_permohonan_selesai_admin_spd = $status_selesai_admin_spd;

// end surat pindah datang //


// biodata wni //
//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($conn, "SELECT * FROM tb_bio_wni a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Baru'");
//menampilkan data
$status_baru_wni = mysqli_num_rows($query);

$query = mysqli_query($conn, "SELECT * FROM tb_bio_wni a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Selesai'");
//menampilkan data
$status_selesai_wni = mysqli_num_rows($query);

// menampilkan notif angka pada admin
$query = mysqli_query($conn, "SELECT * FROM tb_bio_wni a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Baru'");
$status_baru_admin_wni = mysqli_num_rows($query);
$query = mysqli_query($conn, "SELECT * FROM tb_bio_wni a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Selesai'");
$status_selesai_admin_wni = mysqli_num_rows($query);


// menjumlahkan total permohonan
$total_permohonan_baru_wni = $status_baru_wni;
$total_permohonan_selesai_wni = $status_selesai_wni;
// total data pada admin
$total_permohonan_baru_admin_wni = $status_baru_admin_wni;
$total_permohonan_selesai_admin_wni = $status_selesai_admin_wni;

// end biodata wni //


// rekam ktp //
//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($conn, "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Baru'");
//menampilkan data
$status_baru_ktp = mysqli_num_rows($query);

$query = mysqli_query($conn, "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE b.id_user='$id' AND a.status_berkas='Selesai'");
//menampilkan data
$status_selesai_ktp = mysqli_num_rows($query);

// menampilkan notif angka pada admin
$query = mysqli_query($conn, "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Baru'");
$status_baru_admin_ktp = mysqli_num_rows($query);
$query = mysqli_query($conn, "SELECT * FROM tb_rekam_ktp a INNER JOIN tb_user b ON a.user_id = b.id_user WHERE a.status_berkas='Selesai'");
$status_selesai_admin_ktp = mysqli_num_rows($query);


// menjumlahkan total permohonan
$total_permohonan_baru_ktp = $status_baru_ktp;
$total_permohonan_selesai_ktp = $status_selesai_ktp;
// total data pada admin
$total_permohonan_baru_admin_ktp = $status_baru_admin_ktp;
$total_permohonan_selesai_admin_ktp = $status_selesai_admin_ktp;

// end rekam ktp //

// total
$total_baru = $status_baru + $status_baru_lahir + $status_baru_sp + $status_baru_ak + $status_baru_spd + $status_baru_wni + $status_baru_ktp;
$total_selesai = $status_selesai + $status_selesai_lahir + $status_selesai_sp + $status_selesai_ak + $status_selesai_spd + $status_selesai_wni + $status_selesai_ktp;
// total data pada admin
$total_baru_admin = $status_baru_admin + $status_baru_admin_lahir + $status_baru_admin_sp + $status_baru_admin_ak + $status_baru_admin_spd + $status_baru_admin_wni + $status_baru_admin_ktp;
$total_selesai_admin = $status_selesai_admin + $status_selesai_admin_lahir + $status_selesai_admin_sp + $status_selesai_admin_ak + $status_selesai_admin_spd + $status_selesai_admin_wni + $status_selesai_admin_ktp;

