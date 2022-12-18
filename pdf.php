<?php
session_start();
require_once 'connect.php';
require_once 'functions.php';
echo $awal = $_POST['awal'];
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

use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
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
        font-weight: bold;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }
    </style>

</head>
<body>
<table border="1">
    <legend>Pengeluaran</legend>
    <thead>
        <tr>
            <th style="width:5%">No.</th>
            <th style="width:5%">Id Transaksi</th>
            <th style="width:10%">Jenis Transaksi</th>
            <th style="width:10%">tanggal</th>
            <th style="width:10%">Nama barang</th>
            <th style="width:10%">harga barang</th>
            <th style="width:5%">Jumlah barang</th>
            <th style="width:5%">satuan</th>
            <th style="width:5%">total harga barang</th>
            <th style="width:10%">Referensi</th>
        </tr>
    </thead>
    <tbody>
    ';
$i = 1;
while ($r2 = mysqli_fetch_assoc($q2)) {
    $total = $r2['Jumlah_Barang'] * $r2['Harga_Barang'];
    $html .= ' <tr>
            <td style="width:5%">' . $i++ . '</td>
            <td style="width:5%">' . $r2['id_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['jenis_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['tanggal_Transaksi'] . '</td>
            <td style="width:10%">' . $r2['Nama_Barang'] . '</td>
            <td style="width:10%">' . $r2['Harga_Barang'] . '</td>
            <td style="width:10%">' . $r2['Jumlah_Barang'] . '</td>
            <td style="width:10%">' . $r2['Satuan'] . '</td>
            <td style="width:10%">' . $total . '</td>
            <td style="width:10%">' . $r2['Referensi'] . '</td>
            <tr>';
}
$html .= '
    </tbody>
    </table>
</body>
</html>
';
$mpdf->WriteHTML($html);
$mpdf->Output('Pembukuan-transaksi-pengeluaran.pdf', \Mpdf\Output\Destination::INLINE);