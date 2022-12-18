<?php

require 'connect.php';
require 'functions.php';
session_start();

$id = $_GET['id'];

$_SESSION['idtrans'];


$barang = querycoba("SELECT * FROM pengeluaran WHERE Id_Barang = $id")[0];
// echo "<br>";
// var_dump($barang);



if(isset($_POST["submit"])){
    if( ubah($_POST) > 0 ){
        echo "<script>alert('Data Transaksi Berhasil Diubah');
        document.location.href = 'ubahtransaksipeng.php?id=".$_SESSION['idtrans']."' </script>";
        // echo "berhasil";
    }else{
        echo "<script>alert('Data Transaksi Gagal Diubah');
        document.location.href = 'ubahtransaksipeng.php?id=".$_SESSION['idtrans']."' </script>";
        // echo "gagal";
    }
}


// if($_SERVER["REQUEST_METHOD"] === 'POST'){
//     // echo "$nama \r\n <br>";
//     // echo "$harga \r\n <br>";
//     // echo "$jumlah \r\n <br>";
//     // echo "$satuan \r\n <br>";
//     // echo "$toko \r\n <br>";

//     // var_dump(mysqli_affected_rows($conn));

   

    

//     // header("Location: pengeluaran.php");

//     // echo $hasil;

    

    
// }

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

<body class="bg-gradient-to-r from-[#A084CA] via-[#BFACE0] to-[#EBC7E8] min-width-md">
    <div class="lg:">
        <div class="">
            <div class="font-bold mx-auto my-3 text-center justify-center py-6 ">
                <span class="bg-white w-1/6 h-20 rounded-2xl py-3 px-3">Ubah Pengeluaran</span>
            </div>
        </div>
        <div class="px-5">
            <form action="#" id="register" method="POST">
                <div
                    class="bg-white rounded-2xl shadow-2xl mb-3 py-3 md:w-full container mx-auto sm:flex sm:flex-wrap sm:gap-2 sm:justify-center">  
                    <input type="hidden" name="id" value="<?= $barang['Id_Barang']?>">
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="Nama Barang" required
                            class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="nabar" value="<?= $barang['Nama_Barang']?>">
                    </div>
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="Harga Barang" required
                            class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="habar" value="<?= $barang['Harga_Barang']?>">
                    </div>
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="Jumlah Barang" required
                            class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="jumbar" value="<?= $barang['Jumlah_Barang']?>">
                    </div>
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="Satuan" required
                            class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="satuan" value="<?= $barang['Satuan']?>">
                    </div>
                    <div class=" sm:mb-0 shadow-lg sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-white h-12 mb-2">
                        <input type="text" id="nama" placeholder="referensi/toko" required
                            class="focus:ring-black bg-transparent border-[1.7px] border-black focus:border-black font-bold placeholder:text-black focus:text-black px-5 rounded-full w-full h-full" name="toko" value="<?= $barang['Referensi']?>">
                    </div>
                    <div
                        class="sm:mb-0 shadow-lg border-slate-200 sm:w-64 md:w-[400px] w-3/4 rounded-full mx-auto bg-[#9F73AB] h-12 mb-2 hover:opacity-[0.95] active:shadow-none">
                        <input type="submit" id="submit" name="submit"
                            class="bg-[#3F3B6C] text-2xl bg-clip-text text-transparent font-bold placeholder:text-black px-5 rounded-full w-full h-full">
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>