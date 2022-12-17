<?php

require "functions.php";


// $iduser = $_SESSION["idakun"];


// $jumperhal = 5;
// $jumdata = count(querycoba("SELECT * FROM transaksi_pengeluaran WHERE id_User = $iduser"));
// $jumhal = ceil($jumdata / $jumperhal);


// $tes = $conn->query("SELECT MAX(id_Transaksi) FROM transaksi_pengeluaran");


// $halaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

// $awaldata = ($jumperhal * $halaktif) - $jumperhal;




// $var = querycoba("SELECT * FROM transaksi_pengeluaran WHERE id_User = $iduser LIMIT $awaldata,$jumperhal");
$var = querycoba("SELECT * FROM transaksi_pengeluaran");




?>

















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Document</title>
    <!-- <style>
        *{
            border: 1px solid black;
        }
    </style> -->
</head>

<body class="bg-gradient-to-r from-[#845EC2] via-[#FF6F91] to-[#FFC75F]">
    <div class="w-full h-full">
        <div class="flex object-scale-down">
            <label for="pengeluaran" class="my-3 mx-auto bg-[#FFC75F] rounded-lg p-4 text-white font-bold">
                Pengeluaran
            </label>
        </div>
        <div class="flex object-scale-down">
            <div class="w-full p-10 bg-white md:w-11/12 rounded-xl order-1 mx-auto">
                <div class="flex w-full justify-center">
                    <div class="p-2">
                        <form action="" id="formpeng" method="POST">
                            <input type="text" id="transpeng" name="keyword" class="rounded-full h-7 w-48 mb-3" placeholder="masukkan keyword..." autocomplete="off">
                            <button type="submit" id="cari" name="cari" class="text-white bg-blue-500 hover:bg-blue-700 rounded-full h-[29px] w-14 shadow-xl active:shadow-none active:bg-blue-700">Cari</button>
                            <button type="submit" name="reset" class="text-white bg-red-500 hover:bg-red-700 rounded-full h-[29px] w-14 shadow-xl active:shadow-none active:bg-red-700">RESET</button>
                        </form>
                        <div id="contpeng" class="max-lg">
                            <table class="w-full">
                                <thead class="bg-gray-300 border-b-2 border-gray-500">
                                    <tr>
                                        <th class="px-2 text-sm md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center rounded-tl-lg">
                                            Nomor
                                        </th>
                                        <th class="px-2 text-sm md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center">
                                            Tanggal
                                        </th>
                                        <th class="px-2 text-sm md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center">
                                            Jenis
                                        </th>
                                        <th class="px-2 text-sm md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center">
                                            Status
                                        </th>
                                        <th class="px-2 text-sm md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center ">
                                            Bukti
                                        </th>
                                        <th class="px-2 text-sm md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center ">
                                            Ubah
                                        </th>
                                        <th class="px-2 text-sm md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center rounded-tr-lg">
                                            Hapus
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100">
                                    <?php $j = 1; ?>
                                    <?php foreach ($var as $baris) : ?>
                                        <tr class="">
                                            <td class="text-sm md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?= $j ?>
                                            </td>
                                            <td class="text-sm md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?php echo $baris['tanggal_Transaksi']; ?>
                                            </td>
                                            <td class="text-sm md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?php echo $baris['jenis_Transaksi']; ?>
                                            </td>
                                            <td class="text-sm md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?php echo $baris['status_Transaksi']; ?>
                                            </td>
                                            <td class="text-sm md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?php echo $baris['bukti_Transaksi']; ?>
                                            </td>
                                            <td class="text-sm md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <a href="ubahtransaksipeng.php?id=<?= $baris['id_Transaksi']; ?>" class="hover:text-green-700">Ubah</a>
                                            </td>
                                            <td class="text-sm md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <a href="">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $j++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>