<?php
session_start();

require_once 'connect.php';
require 'functions.php';
global $conn;



if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

$iduser = $_SESSION["idakun"];



$tes = $conn->query("SELECT MAX(id_Transaksi) FROM transaksi_pengeluaran");

if ($tes->num_rows > 0) {
    while ($baris1 = $tes->fetch_assoc()) {
        $_SESSION['transid'] = $baris1['MAX(id_Transaksi)'];
    }
}

$pengeluaran = mysqli_query($conn, "SELECT * FROM pengeluaran WHERE id_User = $iduser");
$tkeluar = 0;
foreach ($pengeluaran as $keluar) {
    $tkeluar = $tkeluar + $keluar['Jumlah_Barang'] * $keluar['Harga_Barang'];
}
$totk= mysqli_query($conn, "SELECT * FROM `transaksi_pengeluaran` WHERE id_User = $iduser;");
$tot = 0;
foreach ($totk as $k) {
    $tot = $tot + 1;
}

// echo count($totk);
// echo $iduser;
// echo $tkeluar;
// $pendapatan = mysqli_query($conn, "SELECT * FROM pendapatan WHERE id_User = $iduser");
// echo $tkeluar;
$tmasuk = 0;
// foreach ($pengeluaran as $row) {
//     $tmasuk = $tmasuk + $row['Jumlah_Barang'] * $row['Harga_Barang'];
// }

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="output.css">
</head>

<body class="bg-gray-200">
    <div class="flex flex-col justify-between">

        <header>
            <!-- header -->
            <nav
                class="container hidden py-1 mx-auto min-w-full bg-gradient-to-r from-[#845EC2] via-[#FF6F91] to-[#FFC75F] md:flex">
                <!-- logo -->
                <div class="py-1 ml-6 justify-start w-fit items-center">
                    <img src="img/ecotrack2.png" class="w-44">
                </div>
                <!-- nav menu -->
                <ul class="flex flex-1 justify-start items-center gap-10 mx-10 text-white font-semibold">
                    <li><a href="dashboard.php" class="bg-white text-evendarkerBlue px-3 py-2 rounded-lg">Dashboard</a>
                    </li>
                    <li><a href="pembukuan.php" class="hover:text-[#482C75]">Pembukuan</a></li>
                    <li><a href="bantuan.php" class="hover:text-[#482C75]">Bantuan</a></li>
                </ul>

                <div class="flex">

                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                        class="text-white bg-transparent mr-4 mx-auto hover:font-bold focus:outline-none font-medium rounded-lg text-lg px-4 py-0 text-center inline-flex items-center"
                        type="button">
                        <div class="w-10 h-10 rounded-full bg-[#645CAA] flex"><img src="img/acc.png"
                                class="mx-auto w-10 h-10 p-0" alt=""></div>
                    </button>
                </div>

                <!-- Dropdown menu -->
                <div id="dropdownDivider"
                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                        <li>
                            <a href="akun.php"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Akun</a>
                        </li>
                        <li>
                            <a href="logout.php"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- dropdown button -->
            <div class="flex">

                <button id="dropdownDividerButton2" data-dropdown-toggle="dropdownDivider2"
                    class="text-white bg-transparent mr-0 mx-auto hover:font-bold focus:outline-none font-medium rounded-lg text-lg px-4 py-2.5 text-center inline-flex items-center md:hidden"
                    type="button">
                    <div class="w-10 h-10 rounded-full bg-[#645CAA] flex"><img src="img/menudots.png"
                            class="mx-auto w-10 h-10 p-2" alt=""></div>
                </button>
            </div>

            <!-- Dropdown menu -->
            <div id="dropdownDivider2"
                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                    <li>
                        <a href="akun.php"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Akun</a>
                    </li>
                    <li>
                        <a href="pembukuan.php"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pembukuan</a>
                    </li>
                    <li>
                        <a href="bantuan.php"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bantuan</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="logout.php"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                </div>
            </div>

        </header>

        <!-- middle section -->


        <main>
            <div class="">
                <div class="m-7 mb-0">
                    <h1 class="text-2xl font-semibold">Dashboard</h1>
                    <p class="text-sm">Statistik umum seluruh transaksi</p>
                    <div class=" bg-white flex flex-wrap w-full mb-auto p-2 gap-x-1 ">
                        <div class="w shadow-lg rounded-lg overflow-hidden mb-auto">
                            <div class="py-3 px-5 bg-gray-50">Arus transaksi</div>
                            <canvas class="p-10 " id="chartBar"></canvas>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col m-6 space-y-5 space-x-0 md:flex-row md:space-y-0 md:space-x-5">
                    <div
                        class="bg-white rounded-lg border border-gray-300 shadow-sm w-full max-w-[420px] h-[120px] p-5 md:w-1/3">
                        <h2 class="font-semibold">Total Transaksi</h2>
                        <p class="font-semibold text-right mr-5 text-3xl"><?php echo $tot; ?></p>
                    </div>
                    <div
                        class="bg-white rounded-lg border border-gray-300 shadow-sm w-full max-w-[420px] h-[120px] p-5 md:w-1/3">
                        <h2 class="font-semibold">Total Pendapatan</h2>
                        <p class="font-semibold text-right mr-5 text-3xl"><?php echo rupiah($tmasuk); ?></p>
                    </div>
                    <div
                        class="bg-white rounded-lg border border-gray-300 shadow-sm w-full max-w-[420px] h-[120px] p-5 md:w-1/3">
                        <h2 class="font-semibold">Total Pengeluaran</h2>
                        <p class="font-semibold text-right mr-5 text-3xl"><?php echo rupiah($tkeluar); ?></p>
                    </div>
                </div>
            </div>

            <div class="m-6">

                <ul
                    class="hidden text-sm font-medium text-center rounded-lg divide-x divide-gray-500 border border-gray-300 shadow-sm max-w-[1300px] sm:flex">
                    <li class="w-full">
                        <a href="transpend.php"
                            class="inline-block p-4 w-full text-gray-900 bg-gray-100 rounded-l-lg">Pendapatan</a>
                    </li>
                    <li class="w-full">
                        <a href="transpeng.php"
                            class="inline-block p-4 w-full text-gray-900 bg-white rounded-r-lg">Pengeluaran</a>
                    </li>
                </ul>

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


    <!-- Chart bar -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart bar -->
    <script>
        const arus_kas = [
            "pendapatan", "pengeluaran",
        ];
        const dataBarChart = {
            labels: arus_kas,
            datasets: [{
                label: "arus_kas",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [<?php echo $tmasuk ?>, <?php echo $tkeluar ?>],
            },],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );
    </script>
    <script src="node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>