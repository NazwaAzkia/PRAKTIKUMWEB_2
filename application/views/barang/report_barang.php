<?php
$pdf = new FPDF('p', 'mm', 'A4');
$pdf->Addpage();
include 'report_header.php';
$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN DATA BARANG', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(20, 6, 'BARKODE', 1, 0, 'C');
$pdf->Cell(45, 6, 'NAMA BARANG', 1, 0, 'C');
$pdf->Cell(15, 6, 'SATUAN', 1, 0, 'C');
$pdf->Cell(20, 6, 'KATEGORI', 1, 0, 'C');
$pdf->Cell(20, 6, 'STOK', 1, 0, 'C');
$pdf->Cell(30, 6, 'HARGA BELI', 1, 0, 'C');
$pdf->Cell(30, 6, 'HARGA JUAL', 1, 1, 'C');
$i = 1;

$data = $this->db->get('barang')->result_array();
foreach ($data as $d) {
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(7, 6, $i++, 1, 0);
    $pdf->Cell(20, 6, $d['barkode'], 1, 0);
    $pdf->Cell(45, 6, $d['name'], 1, 0);
    $pdf->Cell(15, 6, $d['satuan_id'], 1, 0);
    $pdf->Cell(20, 6, $d['kategori_id'], 1, 0);
    $pdf->Cell(20, 6, $d['stok'], 1, 0);
    $pdf->Cell(30, 6, $d['harga_beli'], 1, 0);
    $pdf->Cell(30, 6, $d['harga_jual'], 1, 1);
}
$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_barang.pdf', 'I');
