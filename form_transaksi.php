<?php
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotrack - Transaksi</title>
    <link rel="stylesheet" href="output.css">
</head>
<body class="bg-gradient-to-br from-[#FF6F91] to-[#FF9671]">

    <!-- header -->
    <nav class="container hidden py-5 mx-auto min-w-full bg-transparent md:flex">
        <!-- logo -->
        <div class="py-1 ml-10 justify-start items-center">
            <img src="img/ecotrack2.png" class="w-52">
        </div>
        <!-- nav menu -->
        <ul class="flex flex-1 justify-end items-center gap-10 mx-10 text-white font-semibold">
            <li><a href="landing.php" class="hover:text-[#845EC2]">Home</a></li>
            <li><a href="about.php" class="hover:text-[#845EC2]">About</a></li>
            <li><a href="" class="text-[#845EC2]">Daftar</a></li>
            <a href="login.php"
                class="px-2 py-2 mr-10 w-20 font-bold bg-white text-evendarkerBlue text-center rounded-full">
                Login
            </a>
        </ul>
    </nav>


    <!-- dropdown button -->
    <div class="flex">

        <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
            class="text-white bg-transparent mr-0 mx-auto hover:font-bold focus:outline-none font-medium rounded-lg text-lg px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:hidden"
            type="button">
            <div class="w-10 h-10 rounded-full bg-[#645CAA] flex"><img src="img/menudots.png"
                    class="mx-auto w-10 h-10 p-2" alt=""></div>
        </button>
    </div>

    <!-- Dropdown menu -->
    <div id="dropdownDivider"
        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
            <li>
                <a href="landing.php"
                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Home</a>
            </li>
            <li>
                <a href="about.php"
                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">About</a>
            </li>
            <li>
                <a href="register.php"
                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Daftar</a>
            </li>
        </ul>
        <div class="py-1">
            <a href="login.php"
                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Login</a>
        </div>
    </div>

        <!-- flex container -->
        <div class="container justify-center rounded-lg items-center mx-auto my-32 w-full bg-white md:max-w-2xl">
            <!-- register form -->
            <div class="justify-center p-10 w-full h-full">
                <form action="#" id="register">
                    <div>
                        <div>
                            <h1 class="text-center font-bold mb-5 text-3xl">
                                Transaksi
                            </h1>
                        </div>
                        <div>
                            <div>
                                <label for="namabarang" class="text-sm p-3">Nama barang</label>
                            </div>
                            <input type="text" id="namabarang" required
                                class="my-1 px-3 py-0.5 shadow-xl block rounded-full bg-white w-full border-[1px] mx-auto"><br>
                            <div>
                                <label for="hargabarang" class="text-sm p-3">Harga barang</label>
                            </div>
                            <input type="text" id="hargabarang" required
                                class="my-1 px-3 py-0.5 shadow-xl block rounded-full  bg-white w-full border-[1px] mx-auto"><br>
                            <div>
                                <label for="jumlahbarang" class="text-sm p-3">Jumlah barang</label>
                            </div>
                            <input type="text" id="jumlahbarang" required
                                class="my-1 px-3 py-0.5 shadow-xl block rounded-full  bg-white w-full border-[1px] mx-auto"><br>
                            <div>
                                <label for="satuan" class="text-sm p-3">Satuan</label>
                            </div>
                            <input type="text" id="satuan" required
                                class="my-1 px-3 py-0.5 shadow-xl block rounded-full  bg-white w-full border-[1px] mx-auto"><br>
                            <div>
                                <label for="referensi" class="text-sm p-3">Referensi/Toko</label>
                            </div>
                            <input type="text" id="referensi" required
                                class="my-1 px-3 py-0.5 shadow-xl block rounded-full  bg-white w-full border-[1px] mx-auto"><br>
                        </div>
                        </p>
                        <a href="#"
                            class="flex p-1 bg-[#845EC2] hover:bg-[#643EA3] text-white mx-auto w-3/4 my-7 font-bold justify-center rounded-full md:w-1/2">Submit
                        </a>
                    </div>
                </form>

            </div>
        </div>

    <!-- footer -->
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

    <script src="node_modules/flowbite/dist/flowbite.js"></script>

</body>
</html>

