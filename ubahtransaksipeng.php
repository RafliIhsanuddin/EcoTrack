<?php

require 'connect.php';
require 'functions.php';
session_start();

$_SESSION['idtrans'] = $_GET['id'];

$id = $_SESSION['idtrans'];

$iduser = $_SESSION["idakun"];

$jumperhal = 5;
$jumdata = count(querycoba("SELECT * FROM pengeluaran WHERE id_User = $iduser AND id_Transaksi = $id"));
$jumhal = ceil($jumdata / $jumperhal);

$halaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awaldata = ($jumperhal * $halaktif) - $jumperhal;

// if(isset($_GET['halaman'])){
//     $halaktif = $_GET['halaman'];
// }else{
//     $halaktif = 1;
// }

$var = "SELECT * FROM pengeluaran WHERE id_User = $iduser AND id_Transaksi = $id LIMIT $awaldata,$jumperhal";
$hasil = $conn->query($var);

$transaksi = querycoba("SELECT * FROM transaksi_pengeluaran WHERE id_Transaksi = $id")[0];





if (isset($_POST['submit'])) {
    $idubah = htmlspecialchars($_POST['idubah']);
    $status = htmlspecialchars($_POST['statust']);
    $jenis = htmlspecialchars($_POST['jenist']);
    $tgl = htmlspecialchars($_POST['tglt']);
    $no = htmlspecialchars($_POST['not']);
    $buktilama = htmlspecialchars($_POST['buktiLama']);

    if($_FILES['buktit']['error'] === 4 ){
        $bukti = $buktilama;
    }else{
        $bukti = upload();
    }

    

    $query = "UPDATE `transaksi_pengeluaran` SET 
    `jenis_Transaksi` = '$jenis',
    `status_Transaksi` = '$status',
    `tanggal_Transaksi` ='$tgl',
    `bukti_Transaksi` = '$bukti',
    `no_Transaksi` = '$no'
    WHERE Id_Transaksi = $idubah";

    mysqli_query($conn, $query);
    

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data Transaksi Berhasil Diubah');
        document.location.href = 'transpeng.php' </script>";
        // echo "berhasil";
    } else {
        echo "<script>alert('Data Transaksi Gagal Diubah');
        document.location.href = 'transpeng.php' </script>";
        // echo "gagal";
    }
}

$jumlahlink = 2;
if($halaktif > $jumlahlink){
    $angmul = $halaktif - $jumlahlink;
}else{
    $angmul = 1;
}


if($halaktif < $jumhal - $jumlahlink){
    $angakh = $halaktif + $jumlahlink;
}else{
    $angakh = $jumhal;
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
    <title>Pengeluaran</title>
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
                    <li><a href="dashboard.html" class="hover:text-[#482C75]">Dashboard</a>
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

        <main>
            <div class="w-[90%] h-fit mx-auto bg-white rounded-lg shadow-sm mt-16 md:w-[700px] lg:w-[900px]">
                <div class="p-8">
                    <h1 class="text-2xl font-semibold">Pengeluaran</h1>
                    <p class="text-sm">Lorem ipsum dolor sit amet</p>
                </div>

                <div class="flex mx-auto container flex-col">

                    <!-- form transaksi -->
                    <form action="" method="POST" enctype=multipart/form-data>
                        <div class="flex p-5 mb-3 py-3 md:w-3/4 mx-auto sm:gap-2 sm:justify-center flex-wrap">
                        <input type="hidden" name="idubah" value="<?= $transaksi['id_Transaksi']?>">
                        <input type="hidden" name="buktiLama" value="<?= $transaksi['bukti_Transaksi']?>">
                            <div class="mx-auto">
                                <input name="buktit" type="file" id="bukti" class="rounded-full w-[280px] text-sm h-10 border border-gray-300 ">
                                <div>Gambar Lama</div>
                                <img class="w-48" src="upload/<?= $transaksi['bukti_Transaksi']?>" alt="">
                            </div>
                            <div class="mx-auto">
                                <input name="jenist" type="text" value="<?= $transaksi['jenis_Transaksi']?>" id="jenis" placeholder="Jenis Transaksi" required class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10">
                            </div>

                            <div class="relative mx-auto">
                                <input name="tglt" type="date" value="<?= $transaksi['tanggal_Transaksi']?>" name="tglt" class="bg-white border border-gray-300 text-gray-900 text-sm px-5 h-10 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-[280px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="Tanggal Transaksi">
                            </div>

                            <div class="mx-auto">
                                <input name="not" type="text" value="<?= $transaksi['no_Transaksi']?>" id="nomor" placeholder="Nomor Transaksi" required class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10">
                            </div>
                            <div class="mx-auto">
                                <!-- <input type="text" id="status"  placeholder="Status" required class="focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10"> -->
                                <select name="statust" placeholder="Status" id="status" required class="invalid:text-slate-500 focus:ring-black bg-white border border-gray-300 text-gray-900 text-sm focus:text-black px-5 rounded-full w-[280px] h-10">
                                <!-- <option value="" disabled selected hidden>Status Transaksi</option> -->
                                <option value="<?= $transaksi['status_Transaksi']?>"selected hidden><?= $transaksi['status_Transaksi']?></option>
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
                                <a href="ubahtransaksipeng.php?id=<?= $id ?>&halaman= <?= $halaktif - 1; ?>">&laquo;</a>
                            <?php endif; ?>
                            <?php for ($i = $angmul; $i <= $angakh; $i++) : ?>
                                <?php if ($i == $halaktif) : ?>
                                    <a href="ubahtransaksipeng.php?id=<?= $id ?>&halaman= <?= $i; ?>" style="font-weight:bold; color:red;"><?= $i; ?></a>
                                <?php else : ?>
                                    <a href="ubahtransaksipeng.php?id=<?= $id ?>&halaman= <?= $i; ?>"><?= $i; ?></a>
                                <?php endif; ?>
                            <?php endfor; ?> <?php if ($halaktif < $jumhal) : ?>
                                <a href="ubahtransaksipeng.php?id=<?= $id ?>&halaman= <?= $halaktif + 1; ?>">&raquo;</a>
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
                                <?php $j = 1 + $awaldata; ?>
                                <?php while ($baris = $hasil->fetch_assoc()) : ?>
                                    <tr class="">
                                        <td class=""><?= $j ?></td>
                                        <td class=""><?php echo $baris['Nama_Barang']; ?></td>
                                        <td class=""><?php echo $baris['Harga_Barang']; ?></td>
                                        <td class=""><?php echo $baris['Jumlah_Barang']; ?></td>
                                        <td class=""><?php echo $baris['Satuan']; ?></td>
                                        <td class=""><?php echo $baris['Referensi']; ?></td>
                                        <td class=""><a href="hapusubahtranspeng.php?id=<?= $baris['Id_Barang']; ?>" onclick="return confirm('yakin?')" class="hover:text-red-700">Hapus</a></td>
                                        <td class=""><a href="ubahtransbarpeng.php?id=<?= $baris['Id_Barang']; ?>" class="hover:text-green-700">Ubah</a></td>
                                    </tr>
                                    <?php $j++ ?>
                                <?php endwhile ?>
                            <?php endif ?>
                        </tbody>
                    </table>

                    <!-- hapus ubah tambah -->
                    <div class="flex flex-col mx-auto gap-0 space-y-2 w-90% p-8 md:max-w-2xl md:space-x-4 md:space-y-0 md:flex-row">
                        <div class="w-[280px] md:w-[150px]">
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
                        </div>
                        <div class="w-[280px] md:w-[150px]">
                            <a href="ubahpengtambah.php">
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
                        <a href="bantuan.html" class="underline hover:text-[#845EC2]">Frequently asked questions</a>
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
            document.getElementById("status").type = 'text';
        }
    </script>
</body>

</html>