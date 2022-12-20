<?php
session_start();
require_once 'connect.php';
require_once 'functions.php';

$id = $_SESSION['idakun'];

$awal = date_format(date_create($_POST["awal"]), "Y-m-d");
$akhir = date_format(date_create($_POST["akhir"]), "Y-m-d");
$id = $_SESSION['idakun'];
$q2 = mysqli_query(
    $conn,
    "SELECT *
FROM transaksi_pengeluaran
JOIN pengeluaran
ON pengeluaran.id_Transaksi = transaksi_pengeluaran.id_Transaksi
WHERE  transaksi_pengeluaran.id_User = $id AND tanggal_Transaksi BETWEEN '$awal'  AND '$akhir' "
);
// $q1 = mysqli_query($conn, " ");
$pengeluaran = mysqli_query($conn, "SELECT * FROM pengeluaran WHERE id_User = $id");
$tkeluar = 0;
foreach ($pengeluaran as $row) {
    $tkeluar = $tkeluar + $row['Jumlah_Barang'] * $row['Harga_Barang'];
}
use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4-L',
    'orientation' => 'L'
]);
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,800;1,300&display=swap"
        rel="stylesheet">
    <title>Pembukuan</title>
    <style>
    th {
        background-color: #dedede;
        color: #333333;
        margin: auto;
        font-weight: bold;
    }
    td{
        margin: auto;
        text-align: center;
    }
    table {
        border-collapse: collapse;
        margin: auto;
        padding: 10px;
        width: 100%;
    }
    </style>

</head>
<body>
<h3>Pengeluaran</h3>
<table border="1">

    <thead>
        <tr>
            <th style="width:4%">No.</th>
            <th style="width:6%">No transaksi</th>
            <th style="width:10%">Jenis Transaksi</th>
            <th style="width:10%">Tanggal</th>
            <th style="width:10%">Nama barang</th>
            <th style="width:15%">Harga barang</th>
            <th style="width:10%">Jumlah barang</th>
            <th style="width:10%">Satuan</th>
            <th style="width:15%">Total harga barang</th>
            <th style="width:10%">Referensi</th>
        </tr>
    </thead>
    <tbody>
    ';
$i = 1;
while ($r2 = mysqli_fetch_assoc($q2)) {
    $total = $r2['Jumlah_Barang'] * $r2['Harga_Barang'];
    $html .= ' <tr>
            <td style="width:4%">' . $i++ . '</td>
            <td style="width:6%">' . $r2['no_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['jenis_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['tanggal_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['Nama_Barang'] . '</td>
            <td style="width:15%">' . rupiah($r2['Harga_Barang']) . '</td>
            <td style="width:10%">' . $r2['Jumlah_Barang'] . '</td>
            <td style="width:10%">' . $r2['Satuan'] . '</td>
            <td style="width:15%">' . rupiah($total) . '</td>
            <td style="width:10%">' . $r2['Referensi'] . '</td>
            </tr>';
}
$html .= '   <tr>
            <td colspan="8"> pengeluaran </td>
            <td colspan="2">' . rupiah($tkeluar) . '</td>
            </tr>';
$html .= '
    </tbody>
    </table>

    <h3>pendapatan</h3>
    <table border="1">
    <thead>
        <tr>
            <th style="width:4%">No.</th>
            <th style="width:6%">Id Transaksi</th>
            <th style="width:10%">Jenis Transaksi</th>
            <th style="width:10%">Tanggal</th>
            <th style="width:10%">Nama barang</th>
            <th style="width:15%">Harga barang</th>
            <th style="width:10%">Jumlah barang</th>
            <th style="width:10%">Satuan</th>
            <th style="width:15%">Total harga barang</th>
            <th style="width:10%">Referensi</th>
        </tr>
    </thead>
    <tbody>';
$j = 1;
while ($r2 = mysqli_fetch_assoc($q2)) {
    $total = $r2['Jumlah_Barang'] * $r2['Harga_Barang'];
    $html .= ' <tr>
            <td style="width:4%">' . $i++ . '</td>
            <td style="width:6%">' . $r2['id_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['jenis_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['tanggal_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['Nama_Barang'] . '</td>
            <td style="width:15%">' . rupiah($r2['Harga_Barang']) . '</td>
            <td style="width:10%">' . $r2['Jumlah_Barang'] . '</td>
            <td style="width:10%">' . $r2['Satuan'] . '</td>
            <td style="width:15%">' . rupiah($total) . '</td>
            <td style="width:10%">' . $r2['Referensi'] . '</td>
            <tr>';
}
$html .= '</tbody>
    </table>
    </body>
</html>
';
$mpdf->WriteHTML($html);
$mpdf->Output('Pembukuan-transaksi.pdf', \Mpdf\Output\Destination::INLINE);