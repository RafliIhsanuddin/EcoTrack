<?php

require "functions.php";
session_start();


$iduser = $_SESSION["idakun"];

unset($_SESSION['idtrans']);

if(isset($_POST["cari"])){
    $keyword = $_POST['keyword'];
    $_SESSION['keyword'] = $keyword;
}

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
}else{
    $keyword = $_SESSION['keyword'];
}


$jumdataseb = count(cariseb($keyword, "transaksi_pengeluaran", $iduser));
$jumhal = ceil($jumdataseb / $jumperhal);

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


$var = cari($_SESSION['keyword'],"transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);

    $zx = 0;
    foreach ($var as $baris) {
        $zx++;
    }

    if ($zx === 0) {
        $var = cariBarang($_SESSION['keyword'], "transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);
    }



if (!isset($_SESSION['subpeng'])) {
    $query = "DELETE FROM pengeluaran WHERE id_Transaksi = $transbar ";
    mysqli_query($conn, $query);
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
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center"><img src="upload/<?php echo $baris['bukti_Transaksi']; ?>" alt="" width="50">

                                            </td>
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
                                                <a href="ubahtransaksipeng.php?id=<?= $baris['id_Transaksi']; ?>" class="hover:text-green-700">Ubah</a>
                                            </td>
                                            <td class=" md:px-3 lg:px-8 py-2 text-sm md:text-lg text-center">
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
    </div>

    <!-- <script src="dashboard.js"></script> -->

</body>

</html>