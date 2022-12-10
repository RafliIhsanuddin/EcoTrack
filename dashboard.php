<?php
session_start();

require_once 'connect.php';
require  'functions.php';
// if (!isset($_SESSION['nama']) || !isset($_SESSION['id'])) {
//     header("location: login.php");
// }

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

$iduser = $_SESSION["idakun"];


$jumperhal = 5;
$jumdata = count(querycoba("SELECT * FROM transaksi_pengeluaran WHERE id_User = $iduser"));
$jumhal = ceil($jumdata / $jumperhal);


$tes = $conn->query("SELECT MAX(id_Transaksi) FROM transaksi_pengeluaran");


if ($tes->num_rows > 0) {
    while ($baris1 = $tes->fetch_assoc()) {
        $_SESSION['transid'] = $baris1['MAX(id_Transaksi)'];
    }
}





$halaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awaldata = ($jumperhal * $halaktif) - $jumperhal;


// if(isset($_GET['halaman'])){
//     $halaktif = $_GET['halaman'];
// }else{
//     $halaktif = 1;
// }


$var = "SELECT * FROM transaksi_pengeluaran WHERE id_User = $iduser LIMIT $awaldata,$jumperhal";
$hasil = $conn->query($var);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotrack - Dashboard</title>
    <link rel="stylesheet" href="output.css">
    <!-- <style>
        * {
            border: 1px solid black;
        }
    </style> -->
</head>

<body class="bg-darkerBlue">

    <div class="flex flex-col h-screen justify-between">

        <!-- top navbar -->
        <header>
            <nav class="container flex py-1 mx-auto min-w-full h-12 bg-darkerBlue text-white border-b-2 border-b-white">

                <!-- nav menu -->
                <ul class="flex flex-1 items-center gap-10 mx-10 font-semibold">
                    <li><a href="dashboard.php" class="hover:text-lightGreen">Dashboard</a></li>
                    <li><a href="pembukuan.html" class="hover:text-lightGreen">Pembukuan</a>
                    </li>
                    <li><a href="#" class="hover:text-lightGreen">Bantuan</a></li>
                </ul>

                <div>
                    <a href="logout.php" class="flex flex-1 hover:text-lightGreen font-semibold p-2 mx-10">Logout</a>
                </div>
            </nav>
        </header>

        <!-- middle section -->


        <!-- content -->

        <?php ?>;


        <!-- tabs -->
        <div class="tabs flex flex-wrap w-full mb-auto p-2 gap-x-1 ">
            <input type="radio" name="tabs" id="general" checked="checked" class="hidden">
            <label for="general" class="p-4 bg-evendarkerPurple text-white rounded-t-xl font-bold">
                General
            </label>
            <div class="tab w-full p-10 bg-white order-1 hidden">
                <div>
                    <!-- table section -->
                    <div class="flex w-full justify-center">
                        <div class="p-5">

                            <table class="w-full overflow-hidden rounded-2xl">
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
                                        <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center rounded-tr-lg">
                                            Bukti
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100">
                                    <tr class="">
                                        <td>
                                            a
                                        </td>
                                        <td>
                                            b
                                        </td>
                                        <td>
                                            c
                                        </td>
                                        <td>
                                            d
                                        </td>
                                        <td>
                                            e
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <td>
                                            a
                                        </td>
                                        <td>
                                            b
                                        </td>
                                        <td>
                                            c
                                        </td>
                                        <td>
                                            d
                                        </td>
                                        <td>
                                            e
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- edit hapus tambah -->
            </div>

            <input type="radio" name="tabs" id="pengeluaran" class="hidden">
            <label for="pengeluaran" class="p-4 bg-evendarkerPurple text-white rounded-t-xl font-bold">
                Pengeluaran
            </label>
            <div class="tab w-full p-10 bg-white order-1 hidden">
                <div>
                    <!-- table section -->
                    <div class="flex w-full justify-center">
                        <div class="p-5">

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
                                            Hapus
                                        </th>
                                        <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center rounded-tr-lg">
                                            Ubah
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100">
                                    <?php if ($hasil->num_rows > 0) : ?>
                                        <?php $j = 1; ?>
                                        <?php while ($baris = $hasil->fetch_assoc()) : ?>
                                            <?php  ?>
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
                                        <?php endwhile ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex py-1 h-10 mx-auto min-w-full bg-transparent">
                    <!-- nav menu -->
                    <div class="flex justify-center items-center mx-auto text-white font-semibold">
                        <div><a href="#" class="mx-2 px-5 md:mx-10 lg:mx-20 py-1 w-10 font-bold bg-lightGreen text-evendarkerBlue rounded-full">
                                Edit
                            </a>
                        </div>
                        <div><a href="#" class="mx-2 px-3 md:mx-10 lg:mx-20 py-1 w-10 font-bold bg-lightGreen text-evendarkerBlue rounded-full">
                                Hapus
                            </a>
                        </div>
                        <div><a href="pengeluaran.php" class="mx-2 px-2 md:mx-10 lg:mx-20 py-1 w-10 font-bold bg-lightGreen text-evendarkerBlue rounded-full">
                                Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <input type="radio" name="tabs" id="pendapatan" class="hidden">
            <label for="pendapatan" class="p-4 bg-evendarkerPurple text-white rounded-t-xl font-bold">
                Pendapatan
            </label>
            <div class="tab w-full p-10 bg-white order-1 hidden">
                <div>
                    <!-- table section -->
                    <div class="flex w-full justify-center">
                        <div class="p-5">

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
                                        <th class="px-2 md:px-6 lg:px-10 py-2 text-sm font-bold tracking-wide text-center rounded-tr-lg">
                                            Bukti
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100">
                                    <tr class="">
                                        <td>
                                            a
                                        </td>
                                        <td>
                                            b
                                        </td>
                                        <td>
                                            c
                                        </td>
                                        <td>
                                            d
                                        </td>
                                        <td>
                                            e
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <td>
                                            a
                                        </td>
                                        <td>
                                            b
                                        </td>
                                        <td>
                                            c
                                        </td>
                                        <td>
                                            d
                                        </td>
                                        <td>
                                            e
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex py-1 h-10 mx-auto min-w-full bg-transparent">
                    <!-- nav menu -->
                    <div class="flex justify-center items-center mx-auto text-white font-semibold">
                        <div><a href="#" class="mx-2 px-5 md:mx-10 lg:mx-20 py-1 w-10 font-bold bg-lightGreen text-evendarkerBlue rounded-full">
                                Edit
                            </a>
                        </div>
                        <div><a href="#" class="mx-2 px-3 md:mx-10 lg:mx-20 py-1 w-10 font-bold bg-lightGreen text-evendarkerBlue rounded-full">
                                Hapus
                            </a>
                        </div>
                        <div><a href="" class="mx-2 px-2 md:mx-10 lg:mx-20 py-1 w-10 font-bold bg-lightGreen text-evendarkerBlue rounded-full">
                                Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>











        <!-- footer -->
        <footer>
            <div class="px-12 py-12 mx-auto mt-20 h-full min-w-full md:flex bg-[#645CAA] text-white">
                <div class=" w-full py-3">
                    <div class="">
                        <h2>Address</h2>
                    </div>
                    <div class="">
                        <p>Kaliurang, Yogyakarta</p>
                    </div>
                </div>
                <div class=" w-full py-3">
                    <div class="">
                        <h2 class="">Contacts</h2>
                    </div>
                    <div class="">
                        <p class="">123 456 7890</p>
                    </div>
                    <div class="">
                        <p>aurora@email.com</p>
                    </div>
                </div>
                <div class=" w-full py-3">
                    <div class="">
                        <h2>FAQ</h2>
                    </div>
                    <div class="">
                        <a href="" class="underline hover:text-[#A084CA]">Frequently asked questions</a>
                    </div>
                </div>

            </div>
        </footer>

    </div>

</body>

</html>
