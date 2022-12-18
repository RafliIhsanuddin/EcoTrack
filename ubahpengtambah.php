<?php

require_once('connect.php');
session_start();



$transid = $_SESSION['idtrans'];

$iduser = $_SESSION["idakun"];



if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $nama = htmlspecialchars($_POST['nabar']);
    $harga = htmlspecialchars($_POST['habar']);
    $jumlah = htmlspecialchars($_POST['jumbar']);
    $satuan = htmlspecialchars($_POST['satuan']);
    $toko = htmlspecialchars($_POST['toko']);

    // echo "$nama \r\n <br>";
    // echo "$harga \r\n <br>";
    // echo "$jumlah \r\n <br>";
    // echo "$satuan \r\n <br>";
    // echo "$toko \r\n <br>";

    $query = "INSERT INTO `pengeluaran` (`Id_Barang`, `Nama_Barang`, `Satuan`, `Jumlah_Barang`, `Harga_Barang`, `Referensi`, `id_Transaksi`, `id_User`) VALUES ('','$nama','$satuan','$jumlah','$harga','$toko','$transid','$iduser')";
    $hasil = $conn->query($query);

    // var_dump(mysqli_affected_rows($conn));

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data Transaksi Berhasil Ditambahkan');
        document.location.href = 'ubahtransaksipeng.php?id=".$_SESSION['idtrans']."' </script>";
        // echo "berhasil";
    } else {
        echo "<script>alert('Data Transaksi Gagal Ditambahkan');
        document.location.href = 'ubahtransaksipeng.php?id=".$_SESSION['idtrans']."' </script>";
        // echo "gagal";
    }



    // header("Location: pengeluaran.php");

    // echo $hasil;




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
    <title>EcoTrack-Pengeluaran</title>
    <!-- <style>
        * {
            border: 1px solid black;
        }
    </style> -->
</head>


<body class="bg-gradient-to-r from-[#EB66A1] via-[#FF6F91] to-[#FF9671] min-width-md">

    <div class="lg:">
        <div class="">
            <div class="font-bold mx-auto my-3 text-center justify-center py-6 ">
                <span class="bg-white w-1/6 h-20 rounded-2xl py-3 px-3">Tambah Pengeluaran</span>
            </div>
        </div>
        <div class="px-5">
            <form action="#" id="register" method="POST">
                <div class="bg-white rounded-2xl shadow-2xl mb-3 py-3 md:w-full container mx-auto sm:flex sm:flex-wrap sm:gap-2 sm:justify-center">
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="Nama Barang" required class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="nabar">
                    </div>
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="Harga Barang" required class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="habar">
                    </div>
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="Jumlah Barang" required class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="jumbar">
                    </div>
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="Satuan" required class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="satuan">
                    </div>
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="referensi/toko" required class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="toko">
                    </div>
                    <div class="sm:mb-0 shadow-lg border-slate-200 sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-[#9F73AB] h-12 mb-2 hover:opacity-[0.95] active:shadow-none">
                        <input type="submit" id="submit" class="bg-[#3F3B6C] text-2xl bg-clip-text text-transparent font-bold placeholder:text-black px-5 rounded-full w-full h-full">
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>