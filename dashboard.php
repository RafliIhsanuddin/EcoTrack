<?php
session_start();

require_once 'connect.php';
require  'functions.php';
global $conn;
// if (!isset($_SESSION['nama']) || !isset($_SESSION['id'])) {
//     header("location: login.php");
// }

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

$iduser = $_SESSION["idakun"];





if ($tes->num_rows > 0) {
    while ($baris1 = $tes->fetch_assoc()) {
        $_SESSION['transid'] = $baris1['MAX(id_Transaksi)'];
    }
}







// if (isset($_POST['cari'])) {
//     $var = cari($_POST["keyword"], "transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);
//     $zx = 0;
//     foreach ($var as $baris) {
//         $zx++;
//     }

//     if ($zx === 0) {
//         $var = cariBarang($_POST["keyword"], "transaksi_pengeluaran", $iduser, $awaldata, $jumperhal);
//     }
// }

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
    <title>Ecotrack - Dashboard</title>
    <link rel="stylesheet" href="output.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
                    <li><a href="dashboard.html" class="hover:text-lightGreen">Dashboard</a></li>
                    <li><a href="#" class="hover:text-lightGreen">Pembukuan</a></li>
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


        
        <div class="tabs flex flex-wrap w-full mb-auto p-2 gap-x-1 ">
            

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



    <script src="dashboard.js"></script>


    <!-- <script>
        $(document).ready(function() {
            $("#formpeng").submit(function(e) {
                e.preventDefault();
                let nama = $("#transpeng").val();
                $("#formpeng").load("search.php", {
                    input: nama
                });
            });
        });




        // $(document).ready(function(){
        //     $("#cari").click(function(){
        //         let form = $("#searchinput").val();
        //         $("#formpeng").load("searchtranspeng.php", {
        //             nformpeng: form
        //         });
        //     });
        // });
    </script> -->

</body>

</html>