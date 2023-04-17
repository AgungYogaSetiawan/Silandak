<?php
include '../pengaturan/koneksi.php';
include '../assets/fpdf/fpdf.php';

$pdf = new FPDF("P","cm","A4");
$pdf->AddPage();
$pdf->SetFont('arial','B',16);
$pdf->Cell(19, 1, "SUGARA KOMPUTER", 0, 1, "C");
$pdf->SetFont('arial','',12);
$pdf->Cell(19, 1, "Jl. Desa Pulau Sugara Rt.08 Kec. Alalak Kab. Barito Kuala", 0, 1, "C");

$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3, 20, 3);
$pdf->ln();
$pdf->SetFont('arial','B',14);
$pdf->Cell(19, 1, "NOTA PENJUALAN", 0, 1, "C");

$pdf->Image('../assets/img/uniska.png', 1, 1, 1.7, 1.7);

$pdf->SetLineWidth(0.01);
$id = $_POST['idpenjualan'];
$q = mysqli_query($konek, "SELECT p.*, pj.total_penjualan, pj.tanggal_penjualan FROM pelanggan AS p INNER JOIN penjualan AS pj ON p.id=pj.pelanggan_id WHERE pj.id='$id'");
$datapenjualan = mysqli_fetch_array($q);

$pdf->SetFont('arial','',11);
$pdf->Cell(19, 1, date("h:i:s d-m-Y",strtotime($datapenjualan['tanggal_penjualan'])), 0, 1, "C");

$pdf->Cell(5, 0.7, "ID Pelanggan", 0, 0, "L");
$pdf->Cell(5, 0.7, ": " . $datapenjualan['id'], 0, 0, "L");
$pdf->Cell(5, 0.7, "Nama Pelanggan", 0, 0, "L");
$pdf->Cell(5, 0.7, ": " . $datapenjualan['nama_pelanggan'], 0, 1, "L");
$pdf->Cell(5, 0.7, "Alamat", 0, 0, "L");
$pdf->Cell(5, 0.7, ": " . $datapenjualan['alamat'], 0, 0, "L");
$pdf->Cell(5, 0.7, "No Telepon", 0, 0, "L");
$pdf->Cell(5, 0.7, ": " . $datapenjualan['no_telp'], 0, 1, "L");

$pdf->ln(0.5);
$q = mysqli_query($konek, "SELECT pd.*, b.nama_barang FROM penjualan_detail AS pd INNER JOIN barang AS b ON pd.barang_id = b.id WHERE pd.penjualan_id='$id'");
$pdf->SetFont("arial","B",12);
$pdf->Cell(1, 0.7, "No", 1, 0, "C");
$pdf->Cell(6, 0.7, "Nama Barang", 1, 0, "C");
$pdf->Cell(5, 0.7, "Harga Barang", 1, 0, "C");
$pdf->Cell(2, 0.7, "Qty", 1, 0, "C");
$pdf->Cell(5, 0.7, "Sub Total", 1, 1, "C");

$no = 1;
while($row = mysqli_fetch_array($q)){
  $pdf->Cell(1, 0.7, $no++, 1, 0, "C");
  $pdf->Cell(6, 0.7, $row['nama_barang'], 1, 0, "C");
  $pdf->Cell(5, 0.7, "Rp. " . number_format($row['harga'], 0, ",", "."), 1, 0, "C");
  $pdf->Cell(2, 0.7, $row['qty'], 1, 0, "C");
  $pdf->Cell(5, 0.7, $row['harga'] * $row['qty'], 1, 1, "C");
}

$pdf->SetFont("arial","B",12);
$pdf->Cell(14, 0.7, "Total Keseluruhan", 1, 0, "R");
$pdf->Cell(5, 0.7, "Rp. " . number_format($datapenjualan['total_penjualan'], 0, ",", "."), 1, 1, "C");

$pdf->ln();
$pdf->SetFont("Arial", "", 11);
$pdf->Cell(19, 0.7, "Barito Kuala, " . date('d-m-y'), 0, 1, 'R');
$pdf->Cell(18, 0.7, "Mengetahui", 0, 1, 'R');
$pdf->ln();
$pdf->Cell(17.7, 0.7, "...........", 0, 1, 'R');
$pdf->ln(1);
$pdf->Cell(18.6, 0.7, "Sugara Komputer", 0, 1, 'R');


$pdf->Output();