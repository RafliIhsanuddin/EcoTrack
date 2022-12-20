<?php
session_start();
require "functions.php";

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

if (isset($_POST["submit"])) {
}
$keyword = $_POST['input'];
$iduser = $_SESSION["idakun"];

$jumperhal = 5;
$jumdata = count(querycoba("SELECT * FROM transaksi_pengeluaran WHERE id_User = $iduser"));
$jumhal = ceil($jumdata / $jumperhal);
$halaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awaldata = ($jumperhal * $halaktif) - $jumperhal;





$var = cari($keyword, "transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);
$zx = 0;
foreach ($var as $baris) {
    $zx++;
}

if ($zx === 0) {
    $var = cariBarang($keyword, "transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);
}



?>

<div class="flex">
    <div class="mx-auto">
        <?php if ($halaktif > 1) : ?>
            <a href="?halaman= <?= $halaktif - 1; ?>">&laquo;</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $jumhal; $i++) : ?>
            <?php if ($i == $halaktif) : ?>
                <a href="?halaman= <?= $i; ?>" style="font-weight:bold; color:red;"><?= $i; ?></a>
            <?php else : ?>
                <a href="?halaman= <?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?> <?php if ($halaktif < $jumhal) : ?>
            <a href="?halaman= <?= $halaktif + 1; ?>">&raquo;</a>
        <?php endif; ?>
    </div>
</div>
<table class="w-full">
    <thead class="bg-gray-300 border-b-2 border-gray-500">
        <tr>
            <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center rounded-tl-lg">
                Nomor
            </th>
            <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center">
                Tanggal
            </th>
            <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center">
                Jenis
            </th>
            <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center">
                Status
            </th>
            <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center ">
                Bukti
            </th>
            <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center ">
                Ubah
            </th>
            <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center rounded-tr-lg">
                Hapus
            </th>
        </tr>
    </thead>
    <tbody class="bg-gray-100">
        <?php $j = 1; ?>
        <?php foreach ($var as $baris) : ?>
            <tr class="">
                <td>
                    <?= $j ?>
                </td>
                <td>
                    <?php echo $baris['tanggal_Transaksi']; ?>
                </td>
                <td>
                    <?php echo $baris['jenis_Transaksi']; ?>
                </td>
                <td>
                    <?php echo $baris['status_Transaksi']; ?>
                </td>
                <td>
                    <?php echo $baris['bukti_Transaksi']; ?>
                </td>
                <td>
                    <a href="ubahtransaksipeng.php?id=<?= $baris['id_Transaksi']; ?>" class="hover:text-green-700">Ubah</a>
                </td>
                <td>
                    <a href="">Hapus</a>
                </td>
            </tr>
            <?php $j++ ?>
        <?php endforeach; ?>
    </tbody>
</table>