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

// total
$total_baru = $status_baru + $status_baru_lahir + $status_baru_sp;
$total_selesai = $status_selesai + $status_selesai_lahir + $status_selesai_sp;
// total data pada admin
$total_baru_admin = $status_baru_admin + $status_baru_admin_lahir + $status_baru_admin_sp;
$total_selesai_admin = $status_selesai_admin + $status_selesai_admin_lahir + $status_selesai_admin_sp;

?>