<?php
include "config/koneksi.php";
include "assets/library/fpdf/fpdf.php";

// Mulai dokumen PDF
$pdf = new FPDF('l', 'mm');
$pdf->AddPage('A4');
$pdf->SetTitle('Laporan Checklist');

if (isset($_GET['tanggal'])) {

    // Judul laporan
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(280, 7, 'LAPORAN CHECKLIST KEBERSIHAN TOILET', 0, 1, 'C');
    $pdf->Cell(10, 12, '', 0, 1);

    // Judul tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 10, 'NO', 1, 0, 'C');
    $pdf->Cell(30, 10, 'ID USER', 1, 0, 'C');
    $pdf->Cell(25, 10, 'ID TOILET', 1, 0, 'C');
    $pdf->Cell(25, 10, 'KLOSET', 1, 0, 'C');
    $pdf->Cell(25, 10, 'WASTAFEL', 1, 0, 'C');
    $pdf->Cell(25, 10, 'LANTAI', 1, 0, 'C');
    $pdf->Cell(25, 10, 'DINDING', 1, 0, 'C');
    $pdf->Cell(25, 10, 'KACA', 1, 0, 'C');
    $pdf->Cell(25, 10, 'BAU', 1, 0, 'C');
    $pdf->Cell(25, 10, 'SABUN', 1, 0, 'C');
    $pdf->Cell(35, 10, 'TANGGAL', 1, 1, 'C');

    // Menampilkan data dari database
    $pdf->SetFont('Arial', '', 10);
    $tanggal = $_GET['tanggal'];
    $no = 1;
    $result = mysqli_query($conn, "SELECT * FROM checklist WHERE tanggal LIKE '%$tanggal%'");
    while ($row = mysqli_fetch_array($result)) {
        $pdf->Cell(10, 10, $no++, 1, 0, 'C');
        $pdf->Cell(30, 10, $row['users_id'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['toilet_id'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['kloset'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['wastafel'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['lantai'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['dinding'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['kaca'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['bau'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['sabun'], 1, 0, 'C');
        $pdf->Cell(35, 10, date('d-m-Y', strtotime($row['tanggal'])), 1, 1, 'C');
    }
} 

elseif (isset($_GET['bagian'])) {

    // Judul laporan
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(280, 7, 'LAPORAN CHECKLIST TOILET', 0, 1, 'C');
    $pdf->Cell(10, 12, '', 0, 1);

    // Judul tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 10, 'NO', 1, 0, 'C');
    $pdf->Cell(30, 10, 'ID USER', 1, 0, 'C');
    $pdf->Cell(25, 10, 'ID TOILET', 1, 0, 'C');
    $pdf->Cell(25, 10, 'KLOSET', 1, 0, 'C');
    $pdf->Cell(25, 10, 'WASTAFEL', 1, 0, 'C');
    $pdf->Cell(25, 10, 'LANTAI', 1, 0, 'C');
    $pdf->Cell(25, 10, 'DINDING', 1, 0, 'C');
    $pdf->Cell(25, 10, 'KACA', 1, 0, 'C');
    $pdf->Cell(25, 10, 'BAU', 1, 0, 'C');
    $pdf->Cell(25, 10, 'SABUN', 1, 0, 'C');
    $pdf->Cell(35, 10, 'TANGGAL', 1, 1, 'C');

    function tampilkanData($conn, $pdf, $kondisi) {
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM checklist WHERE $kondisi");
    
        while ($row = mysqli_fetch_array($result)) {
            $pdf->Cell(10, 10, $no++, 1, 0, 'C');
            $pdf->Cell(30, 10, $row['users_id'], 1, 0, 'C');
            $pdf->Cell(25, 10, $row['toilet_id'], 1, 0, 'C');
            $pdf->Cell(25, 10, $row['kloset'], 1, 0, 'C');
            $pdf->Cell(25, 10, $row['wastafel'], 1, 0, 'C');
            $pdf->Cell(25, 10, $row['lantai'], 1, 0, 'C');
            $pdf->Cell(25, 10, $row['dinding'], 1, 0, 'C');
            $pdf->Cell(25, 10, $row['kaca'], 1, 0, 'C');
            $pdf->Cell(25, 10, $row['bau'], 1, 0, 'C');
            $pdf->Cell(25, 10, $row['sabun'], 1, 0, 'C');
            $pdf->Cell(35, 10, date('d-m-Y', strtotime($row['tanggal'])), 1, 1, 'C');
        }
    }
    
    if (isset($_GET['bagian'])) {
        if ($_GET['bagian'] == 'Kloset') {
            tampilkanData($conn, $pdf, "kloset = 'Rusak' OR kloset = 'Kotor'");
        } elseif ($_GET['bagian'] == 'Wastafel') {
            tampilkanData($conn, $pdf, "wastafel = 'Rusak' OR wastafel = 'Kotor'");
        } elseif ($_GET['bagian'] == 'Lantai') {
            tampilkanData($conn, $pdf, "lantai = 'Rusak' OR lantai = 'Kotor'");
        } elseif ($_GET['bagian'] == 'Dinding') {
            tampilkanData($conn, $pdf, "dinding = 'Rusak' OR dinding = 'Kotor'");
        } elseif ($_GET['bagian'] == 'Kaca') {
            tampilkanData($conn, $pdf, "kaca = 'Rusak' OR kaca = 'Kotor'");
        }
    }
}

elseif (isset($_GET['toilet'])) {
    // Mulai dokumen PDF
    $pdf = new FPDF('l', 'mm');
    $pdf->AddPage('A4');
    $pdf->SetTitle('Laporan Data Toilet');

    // Judul laporan
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(280, 7, 'LAPORAN DATA TOILET', 0, 1, 'C');
    $pdf->Cell(10, 12, '', 0, 1);

    // Judul tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(35, 10, 'NO', 1, 0, 'C');
    $pdf->Cell(80, 10, 'ID TOILET', 1, 0, 'C');
    $pdf->Cell(80, 10, 'LOKASI', 1, 0, 'C');
    $pdf->Cell(80, 10, 'KETERANGAN', 1, 1, 'C');

    // Menampilkan data dari database
    $pdf->SetFont('Arial', '', 10);
    $no = 1;
    $result = mysqli_query($conn, "SELECT * FROM toilet");
    while ($row = mysqli_fetch_array($result)) {
        $pdf->Cell(35, 10, $no++, 1, 0, 'C');
        $pdf->Cell(80, 10, $row['id'], 1, 0, 'C');
        $pdf->Cell(80, 10, $row['lokasi'], 1, 0, 'C');
        $pdf->Cell(80, 10, $row['keterangan'], 1, 1, 'C');
    }
}

elseif (isset($_GET['keterangan'])) {
    // Mulai dokumen PDF
    $pdf = new FPDF('l', 'mm');
    $pdf->AddPage('A4');
    $pdf->SetTitle('Laporan Data Toilet');

    // Judul laporan
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(280, 7, 'LAPORAN DATA TOILET', 0, 1, 'C');
    $pdf->Cell(10, 12, '', 0, 1);

    // Judul tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(35, 10, 'NO', 1, 0, 'C');
    $pdf->Cell(80, 10, 'ID TOILET', 1, 0, 'C');
    $pdf->Cell(80, 10, 'LOKASI', 1, 0, 'C');
    $pdf->Cell(80, 10, 'KETERANGAN', 1, 1, 'C');

    function tampilkanData($conn, $pdf, $kondisi) {
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM toilet WHERE $kondisi");
    
        while ($row = mysqli_fetch_array($result)) {
            $pdf->Cell(35, 10, $no++, 1, 0, 'C');
            $pdf->Cell(80, 10, $row['id'], 1, 0, 'C');
            $pdf->Cell(80, 10, $row['lokasi'], 1, 0, 'C');
            $pdf->Cell(80, 10, $row['keterangan'], 1, 1, 'C');
        }
    }

    if (isset($_GET['keterangan'])) {
        if ($_GET['keterangan'] == 'Sudah') {
            tampilkanData($conn, $pdf, "keterangan = 'Sudah'");
        } elseif ($_GET['keterangan'] == 'Belum') {
            tampilkanData($conn, $pdf, "keterangan = 'Belum'");
        }
    }    
}

$pdf->Output();
?>