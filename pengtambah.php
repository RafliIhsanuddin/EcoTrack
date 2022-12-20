<?php

require_once('connect.php');
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}



$transid = $_SESSION['transid'];
$transid++;

$iduser = $_SESSION["idakun"];



if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $nama = htmlspecialchars($_POST['nabar']);
    $harga = htmlspecialchars($_POST['habar']);
    $jumlah = htmlspecialchars($_POST['jumbar']);
    $satuan = htmlspecialchars($_POST['satuan']);
    $toko = htmlspecialchars($_POST['toko']);

    $query = "INSERT INTO `pengeluaran` (`Id_Barang`, `Nama_Barang`, `Satuan`, `Jumlah_Barang`, `Harga_Barang`, `Referensi`, `id_Transaksi`, `id_User`) VALUES ('','$nama','$satuan','$jumlah','$harga','$toko','$transid','$iduser')";
    $hasil = $conn->query($query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data Transaksi Berhasil Ditambahkan');
        document.location.href = 'pengeluaran.php' </script>";
    } else {
        echo "<script>alert('Data Transaksi Gagal Ditambahkan');
        document.location.href = 'pengeluaran.php' </script>";
    }
}

?>














<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <title>Pengeluaran</title>
    <!-- <style>
        * {
            border: 1px solid black;
        }
    </style> -->
</head>

<body class="bg-gray-200">
    <div class="flex flex-col justify-between">

        <header>
            <!-- header -->
            <nav class="container hidden py-1 mx-auto min-w-full bg-gradient-to-r from-[#845EC2] via-[#FF6F91] to-[#FFC75F] md:flex">
                <!-- logo -->
                <div class="py-1 ml-6 justify-start w-fit items-center">
                    <img src="img/ecotrack2.png" class="w-44">
                </div>
                <!-- nav menu -->
                <ul class="flex flex-1 justify-start items-center gap-10 mx-10 text-white font-semibold">
                <li><a href="pengeluaran.php" class="bg-[#FFC75F] hover:text-[#482C75] px-3 py-2 rounded-lg">Pengeluaran</a></li>
                    <li><a href="dashboard.php" class="hover:text-[#482C75]">Dashboard</a>
                    </li>
                    <li><a href="#" class="hover:text-[#482C75]">Pembukuan</a></li>
                    <li><a href="bantuan.php" class="hover:text-[#482C75]">Bantuan</a></li>
                    <!-- <a href="landing.html"
                    class="px-2 py-2 mr-10 w-20 font-bold bg-white text-evendarkerBlue text-center rounded-full">
                    Logout
                </a> -->
                </ul>

                <!-- dropdown button -->
                <div class="flex">

                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white bg-transparent mr-4 mx-auto hover:font-bold focus:outline-none font-medium rounded-lg text-lg px-4 py-0 text-center inline-flex items-center" type="button">
                        <div class="w-10 h-10 rounded-full bg-[#645CAA] flex"><img src="img/acc.png" class="mx-auto w-10 h-10 p-0" alt=""></div>
                    </button>
                </div>

                <!-- Dropdown menu -->
                <div id="dropdownDivider" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                        <li>
                            <a href="akun.html" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Akun</a>
                        </li>
                        <li>
                            <a href="landing.html" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- dropdown button -->
            <div class="flex">

                <button id="dropdownDividerButton2" data-dropdown-toggle="dropdownDivider2" class="text-white bg-transparent mr-0 mx-auto hover:font-bold focus:outline-none font-medium rounded-lg text-lg px-4 py-2.5 text-center inline-flex items-center md:hidden" type="button">
                    <div class="w-10 h-10 rounded-full bg-[#645CAA] flex"><img src="img/menudots.png" class="mx-auto w-10 h-10 p-2" alt=""></div>
                </button>
            </div>

            <!-- Dropdown menu -->
            <div id="dropdownDivider2" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                    <li>
                        <a href="akun.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Akun</a>
                    </li>
                    <li>
                        <a href="dashboard.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="pembukuan.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pembukuan</a>
                    </li>
                    <li>
                        <a href="bantuan.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bantuan</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="landing.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                </div>
            </div>

        </header>

        <main>

            <div class="w-[90%] h-[500px] mx-auto bg-white rounded-lg shadow-sm mt-20 md:w-[700px] lg:w-[900px]">

                <div class="p-8">
                    <h1 class="text-2xl font-semibold">Tambah Pengeluaran</h1>
                    <p class="text-sm">Lorem ipsum dolor sit amet</p>
                </div>

                <div class="flex mx-auto container flex-col">

                    <!-- form pengeluaran -->
                    <form action="" method="POST">
                        <div class="flex p-8 mb-3 mt-2 lg:mt-14 md:w-3/4 mx-auto sm:gap-2 sm:justify-center flex-wrap">

                            <div class="mx-auto">
                                <input type="text" placeholder="Nama Barang" required name="nabar" class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10" name="nabar">
                            </div>

                            <div class="mx-auto">
                                <input type="number" placeholder="Harga Barang" required name="habar" class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10" name="habar">
                            </div>

                            <div class="mx-auto">
                                <input type="number" placeholder="Jumlah Barang" required name="jumbar" class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10" name="jumbar">
                            </div>

                            <div class="mx-auto">
                                <input type="text" placeholder="Satuan" required name="satuan" class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10" name="satuan">
                            </div>
                            <div class="mx-auto">
                                <input type="text" placeholder="Referensi/Toko" required name="toko" class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10" name="toko">
                            </div>
                            <div class="mx-auto">
                                <button type="submit" id="submit" class="bg-[#845EC2] hover:bg-[#643EA3] text-white text-sm border border-gray-300 px-5 rounded-full w-[280px] h-10">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer>
            <div class="px-12 py-12 mx-auto mt-20 h-full min-w-full md:flex bg-[#482C75] text-white">
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
                        <a href="bantuan.php" class="underline hover:text-[#845EC2]">Frequently asked questions</a>
                    </div>
                </div>

            </div>
        </footer>

    </div>

    <script src="node_modules/flowbite/dist/datepicker.js"></script>
    <script src="node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>