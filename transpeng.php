<?php

require "functions.php";
session_start();


$iduser = $_SESSION["idakun"];

unset($_SESSION['idtrans']);


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

$transbar = $_SESSION['transid'] + 1;

// $jumlahlink = 2;
// if($halaktif > $jumlahlink){
//     $angmul = $halaktif - $jumlahlink;
// }else{
//     $angmul = 1;
// }


// if($halaktif < $jumhal - $jumlahlink){
//     $angakh = $halaktif + $jumlahlink;
// }else{
//     $angakh = $jumhal;
// }


$var = querycoba("SELECT * FROM transaksi_pengeluaran WHERE id_User = $iduser LIMIT $awaldata,$jumperhal");

// $var = querycoba("SELECT * FROM transaksi_pengeluaran");

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $_SESSION['keyword'] = $keyword;

    // $jumdataseb = count(cariseb($_POST["keyword"], "transaksi_pengeluaran", $iduser));
    // $jumhal = ceil($jumdataseb / $jumperhal);
    // $halaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    // $awaldata = ($jumperhal * $halaktif) - $jumperhal;
    // $var = cari($_SESSION['keyword'],"transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);
    // $zx = 0;
    // foreach ($var as $baris) {
    //     $zx++;
    // }

    // if ($zx === 0) {
    //     $var = cariBarang($_POST["keyword"], "transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);
    // }
} else {
    // $keyword = $_SESSION['keyword'];
    if(isset($_SESSION['keyword'])){
        $keyword = $_SESSION['keyword'];
    }else{
        $keyword = "";
    }
    
}



$jumdataseb = count(cariseb($keyword, "transaksi_pengeluaran", $iduser));
$jumhal = ceil($jumdataseb / $jumperhal);

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


$var = cari($keyword, "transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);

$zx = 0;
foreach ($var as $baris) {
    $zx++;
}

if ($zx === 0) {
    $var = cariBarang($keyword, "transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);
}



if (!isset($_SESSION['subpeng'])) {
    $query = "DELETE FROM pengeluaran WHERE id_Transaksi = $transbar";
    mysqli_query($conn, $query);
}else{
    unset($_SESSION['subpeng']);
}

if (isset($_SESSION['ubahtambar'])){
    if (isset($_SESSION['tambar'])) {
        echo "<script>alert('Data Barang Berhasil Diubah');
         document.location.href = 'transpeng.php' </script>";
        
        unset($_SESSION['tambar']);
    }
    unset($_SESSION['ubahtambar']);
}


// if (isset($_POST['reset'])) {
//     $var = querycoba("SELECT * FROM transaksi_pengeluaran WHERE id_User = $iduser LIMIT $awaldata,$jumperhal");
// }




?>

















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <title>Document</title>
    <script>
        if (window.history.neplacestate) {
            window.history.replacestate(null, null, window.location.href);
        }
    </script>
    <!-- <style>
        *{
            border: 1px solid black;
        }
    </style> -->
</head>

<body class="bg-gradient-to-r from-[#845EC2] via-[#FF6F91] to-[#FFC75F]">
    <div class="w-full h-full">
        <header>
            <!-- header -->
            <nav class="container hidden py-1 mx-auto min-w-full bg-gradient-to-r from-[#845EC2] via-[#FF6F91] to-[#FFC75F] md:flex">
                <!-- logo -->
                <div class="py-1 ml-6 justify-start w-fit items-center">
                    <img src="img/ecotrack2.png" class="w-44">
                </div>
                <!-- nav menu -->
                <ul class="flex flex-1 justify-start items-center gap-10 mx-10 text-white font-semibold">
                    <li><a href="dashboard.php" class="hover:text-[#482C75]">Dashboard</a>
                    </li>
                    <li><a href="#" class="hover:text-[#482C75]">Pembukuan</a></li>
                    <li><a href="bantuan.html" class="hover:text-[#482C75]">Bantuan</a></li>
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
                        <a href="akun.html" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Akun</a>
                    </li>
                    <li>
                        <a href="dashboard.html" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="pembukuan.html" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pembukuan</a>
                    </li>
                    <li>
                        <a href="bantuan.html" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bantuan</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="landing.html" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                </div>
            </div>

        </header>
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
                            <input type="text" id="transpeng" name="keyword" class="rounded-full h-7 w-48 mb-3" placeholder="masukkan keyword..." autocomplete="off" value="<?php echo $keyword ?>">
                            <button type="submit" id="cari" name="cari" class="text-white bg-blue-500 hover:bg-blue-700 rounded-full h-[29px] w-14 shadow-xl active:shadow-none active:bg-blue-700">Cari</button>
                            <!-- <button type="submit" name="reset" class="text-white bg-red-500 hover:bg-red-700 rounded-full h-[29px] w-14 shadow-xl active:shadow-none active:bg-red-700">RESET</button> -->
                        </form>
                        <div id="contpeng" class="max-lg">
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
                            <table class="w-full">
                                <thead class="bg-gray-300 border-b-2 border-gray-500">
                                    <tr>
                                        <th class="px-2 md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center rounded-tl-lg">
                                            Nomor
                                        </th>
                                        <th class="px-2 md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center">
                                            Tanggal
                                        </th>
                                        <th class="px-2 md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center">
                                            Jenis
                                        </th>
                                        <th class="px-2 md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center">
                                            Status
                                        </th>
                                        <th class="px-2 md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center">
                                            Nomor Transaksi
                                        </th>
                                        <th class="px-2 md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center ">
                                            Bukti
                                        </th>
                                        <th class="px-2 md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center ">
                                            Ubah
                                        </th>
                                        <th class="px-2 md:px-3 lg:px-8 py-2 text-sm font-bold tracking-wide text-center rounded-tr-lg">
                                            Hapus
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100">
                                    <?php $j = 1 + $awaldata; ?>
                                    <?php foreach ($var as $baris) : ?>
                                        <tr class="">
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?= $j ?>
                                            </td>
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?php echo $baris['tanggal_Transaksi']; ?>
                                            </td>
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?php echo $baris['jenis_Transaksi']; ?>
                                            </td>
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?php echo $baris['status_Transaksi']; ?>
                                            </td>
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <?php echo $baris['no_Transaksi']; ?>
                                            </td>
                                            <td class="w-48 md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <a href="upload/<?php echo $baris['bukti_Transaksi']; ?>">lihat Bukti</a>

                                            </td>
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <a href="ubahtransaksipeng.php?id=<?= $baris['id_Transaksi']; ?>" class="hover:text-green-700">Ubah</a>
                                            </td>
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <a href="hapustransaksi.php?id=<?= $baris['id_Transaksi']; ?>" onclick="return confirm('yakin?')" class="hover:text-red-700">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $j++ ?>
                                    <?php endforeach; ?>
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
        </div>
        <footer>
            <div class="px-12 py-20 mx-auto mt-20 h-full min-w-full md:flex bg-[#482C75] text-white">
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
                        <a href="bantuan.html" class="underline hover:text-[#845EC2]">Frequently asked questions</a>
                    </div>
                </div>

            </div>
        </footer>
    </div>

    <!-- <script src="dashboard.js"></script> -->

</body>

</html>