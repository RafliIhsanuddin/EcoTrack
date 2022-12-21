<?php

require 'connect.php';
require 'functions.php';
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

unset($_SESSION['keyword']);

$iduser = $_SESSION["idakun"];

$transid = $_SESSION['transidpend'];
$transid++;

$jumperhal = 5;
$jumdata = count(querycoba("SELECT * FROM pendapatan WHERE id_User = $iduser AND id_Transaksi = $transid"));
$jumhal = ceil($jumdata / $jumperhal);

$halaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awaldata = ($jumperhal * $halaktif) - $jumperhal;
$var = "SELECT * FROM pendapatan WHERE id_User = $iduser AND id_Transaksi = $transid LIMIT $awaldata,$jumperhal";
$hasil = $conn->query($var);

$jumlahlink = 2;
if ($halaktif > $jumlahlink) {
    $angmul = $halaktif - $jumlahlink;
} else {
    $angmul = 1;
}


if ($halaktif < $jumhal - $jumlahlink) {
    $angakh = $halaktif + $jumlahlink;
} else {
    $angakh = $jumhal;
}



if (isset($_POST['submit'])) {

    $_SESSION['subpend'] = true;

    if (tambahbarpend($_POST,$iduser) > 0) {
        echo "<script>alert('Data Transaksi Berhasil Ditambahkan');
        document.location.href = 'transpend.php' </script>";
    } else {
        echo "<script>alert('Data Transaksi Gagal Ditambahkan');
        document.location.href = 'transpend.php' </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <title>Pendapatan</title>
</head>

<body class="bg-gray-200">
    <div class="flex flex-col justify-between">

        <header>
            <nav class="container hidden py-1 mx-auto min-w-full bg-gradient-to-r from-[#845EC2] via-[#FF6F91] to-[#FFC75F] md:flex">
                <div class="py-1 ml-6 justify-start w-fit items-center">
                    <img src="img/ecotrack2.png" class="w-44">
                </div>
                <ul class="flex flex-1 justify-start items-center gap-10 mx-10 text-white font-semibold">
                    <li><a href="dashboard.php" class="hover:text-[#482C75]">Dashboard</a>
                    </li>
                    <li><a href="pembukuan.php" class="hover:text-[#482C75]">Pembukuan</a></li>
                    <li><a href="bantuan.php" class="hover:text-[#482C75]">Bantuan</a></li>
                    <li><a href="transpend.php" class="bg-[#845EC2] hover:text-[#FFC75F] px-3 py-2 rounded-lg">Transaksi pendapatan</a></li>

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
                            <a href="akun.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Akun</a>
                        </li>
                        <li>
                            <a href="landing.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
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
                    <li>
                        <a href="transpend.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transaksi Pendapatan</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="landing.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                </div>
            </div>

        </header>

        <main>
            <div class="w-[90%] h-fit mx-auto bg-white rounded-lg shadow-sm mt-16 md:w-[700px] lg:w-[900px]">
                <div class="p-8">
                    <h1 class="text-2xl font-semibold">Pendapatan</h1>
                    <p class="text-sm">Pencatatan data pendapatan beserta barangnya</p>
                </div>

                <div class="flex mx-auto container flex-col">

                    <!-- form transaksi -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="flex p-5 mb-3 py-3 md:w-3/4 mx-auto sm:gap-2 sm:justify-center flex-wrap">

                            <div class="mx-auto">
                                <input type="file" id="bukti" name="buktit" class="rounded-full w-[280px] text-sm h-10 border border-gray-300 ">
                            </div>
                            <div class="mx-auto">
                                <input type="text" id="jenis" name="jenist" placeholder="Jenis Transaksi" required class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10">
                            </div>

                            <div class="relative mx-auto">
                                
                                <input type="date" name="tglt" class="bg-white border border-gray-300 text-gray-900 text-sm px-5 h-10 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-[280px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="Tanggal Transaksi">
                            </div>

                            <div class="mx-auto">
                                <input type="number" id="nomor" name="not" placeholder="Nomor Transaksi" required class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10">
                            </div>
                            <div class="mx-auto">
                                <!-- <input type="text" id="status"  placeholder="Status" required class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10"> -->
                                <select name="status" placeholder="Status" id="status" required class="invalid:text-slate-500 focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10">
                                <option value="" disabled selected hidden>Status Transaksi</option>
                                <option value="lunas">lunas</option>
                                <option value="belum">belum</option>
                            </select>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" id="submit" name="submit" class="bg-[#845EC2] hover:bg-[#643EA3] text-white text-sm border border-gray-300 px-5 rounded-full w-[280px] h-10">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="flex">
                        <div class="mx-auto">
                            <?php if ($halaktif > 1) : ?>
                                <a href="?halaman= <?= $halaktif - 1; ?>">&laquo;</a>
                            <?php endif; ?>
                            <?php for ($i = $angmul; $i <= $angakh; $i++) : ?>
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

                    <!-- table -->
                    <table class="w-[80%] mx-auto overflow-hidden rounded-lg mt-5 mb-5 table-auto">
                        <thead class="bg-transparent border-b border-gray-500">
                            <tr>
                                <th class="px-[2px] py-2 text-sm font-bold text-center">
                                    No
                                </th>
                                <th class="px-[2px] py-2 text-sm font-bold text-center">
                                    Nama Barang
                                </th>
                                <th class="px-[2px] py-2 text-sm font-bold text-center">
                                    Harga Barang
                                </th>
                                <th class="px-[2px] py-2 text-sm font-bold text-center">
                                    Jumlah Barang
                                </th>
                                <th class="px-[2px] py-2 text-sm font-bold text-center">
                                    Satuan
                                </th>
                                <th class="px-[2px] py-2 text-sm font-bold text-center">
                                    Referensi/Toko
                                </th>
                                <th class="px-[2px] py-2 text-sm font-bold text-center">
                                    Ubah
                                </th>
                                <th class="px-[2px] py-2 text-sm font-bold text-center">
                                    Hapus
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php if ($hasil->num_rows > 0) : ?>
                                <?php $j = 1; ?>
                                <?php while ($baris = $hasil->fetch_assoc()) : ?>
                                    <tr class="">
                                        <td class=""><?= $j ?></td>
                                        <td class=""><?php echo $baris['Nama_Barang']; ?></td>
                                        <td class=""><?php echo $baris['Harga_Barang']; ?></td>
                                        <td class=""><?php echo $baris['Jumlah_Barang']; ?></td>
                                        <td class=""><?php echo $baris['Satuan']; ?></td>
                                        <td class=""><?php echo $baris['Referensi']; ?></td>
                                        <td class=""><a href="hapusbarpend.php?id=<?= $baris['Id_Barang']; ?>" onclick="return confirm('yakin?')" class="hover:text-red-700">Hapus</a></td>
                                        <td class=""><a href="ubahbarpend.php?id=<?= $baris['Id_Barang']; ?>" class="hover:text-green-700">Ubah</a></td>
                                    </tr>
                                    <?php $j++ ?>
                                <?php endwhile ?>
                            <?php endif ?>
                        </tbody>
                    </table>

                    <!-- hapus ubah tambah -->
                    <div class="flex flex-col mx-auto gap-0 space-y-2 w-90% p-8 md:max-w-2xl md:space-x-4 md:space-y-0 md:flex-row">
                        <!-- <div class="w-[280px] md:w-[150px]">
                            <a href="">
                                <button type="button" id="hapus" class="bg-[#845EC2] hover:bg-[#643EA3] text-white text-sm w-full border border-gray-300 px-5 rounded-full h-10">
                                    Hapus
                                </button>
                            </a>
                        </div>
                        <div class="w-[280px] md:w-[150px]">
                            <a href="">
                                <button type="button" id="ubah" class="bg-[#845EC2] hover:bg-[#643EA3] text-white text-sm w-full border border-gray-300 px-5 rounded-full h-10">
                                    Ubah
                                </button>
                            </a>
                        </div> -->
                        <div class="w-[280px] md:w-[150px]">
                            <a href="pendtambah.php">
                                <button type="button" id="tambah" class="bg-[#845EC2] hover:bg-[#643EA3] text-white text-sm w-full border border-gray-300 px-5 mb-5 rounded-full h-10">
                                    Tambah
                                </button>
                            </a>
                        </div>
                    </div>

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

        <script src="node_modules/flowbite/dist/datepicker.js"></script>
        <script src="node_modules/flowbite/dist/flowbite.js"></script>

    </div>

    <script>
        let x = document.getElementById("tanggalt");
        x.addEventListener("focusin", myFocusFunction);
        x.addEventListener("focusout", mytext);

        function myFocusFunction() {
            document.getElementById("tanggalt").type = 'date';
        }

        function mytext() {
            document.getElementById("tanggalt").type = 'text';
        }

        function mytex() {
            document.getElementById("statust").type = 'text';
        }
    </script>
</body>

</html>