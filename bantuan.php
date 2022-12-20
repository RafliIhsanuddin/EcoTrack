<?php

require "functions.php";


session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}


$iduser = $_SESSION["idakun"];

if (isset($_POST['submit'])) {
    $keluhan = $_POST['keluhan'];
    $query = "INSERT INTO `bantuan` (`id`,`keluhan`,`id_User`) VALUES ('','$keluhan','$iduser')";
    mysqli_query($conn, $query);
    echo "<script>alert('Keluhan berhasil dikirim');
        document.location.href = 'dashboard.php' </script>";
}



?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan</title>
    <link rel="stylesheet" href="output.css">
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
                    <li><a href="dashboard.php" class="hover:text-[#482C75]">Dashboard</a>
                    </li>
                    <li><a href="pembukuan.php" class="hover:text-[#482C75]">Pembukuan</a></li>
                    <li><a href="bantuan.php" class="bg-white text-evendarkerBlue px-3 py-2 rounded-lg">Bantuan</a></li>
                    <!-- <a href="landing.php"
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
                </ul>
                <div class="py-1">
                    <a href="landing.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                </div>
            </div>

        </header>

        <!-- about section -->
        <main>
            <div class="container flex flex-col justify-center mt-16 p-10 mx-auto space-y-10 w-3/4 h-full md:w-[700px] lg:w-[900px] bg-white rounded-lg shadow-sm text-center md:pt-0">
                <div class="">
                    <h1 class="text-2xl pt-10 font-semibold">
                        FAQ
                    </h1>
                    <p class="text-sm">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique voluptates eos quia, vitae animi
                        saepe et sunt, officiis sint, unde consectetur quisquam quos id provident dolor facilis accusantium tempora cumque.
                    </p>
                </div>
                <details class="pb-5 border-b hover:cursor-pointer">
                    <summary class="flex justify-between text-lg font-semibold items-center  text-evendarkerBlue hover:text-[#845EC2]">Question 1</summary>
                    <p class="text-evendarkerBlue text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </details>

                <details class="pb-5 border-b hover:cursor-pointer">
                    <summary class="flex justify-between text-lg font-semibold items-center text-summary text-evendarkerBlue hover:text-[#845EC2]">Question 2</summary>
                    <p class="text-evendarkerBlue text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </details>

                <details class="pb-5 border-b hover:cursor-pointer">
                    <summary class="flex justify-between text-lg font-semibold items-center text-summary text-evendarkerBlue hover:text-[#845EC2]">Question 3</summary>
                    <p class="text-evendarkerBlue text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </details>

                <details class="pb-5 border-b hover:cursor-pointer">
                    <summary class="flex justify-between text-lg font-semibold items-center text-summary text-evendarkerBlue hover:text-[#845EC2]">Question 4</summary>
                    <p class="text-evendarkerBlue text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </details>

                <details class="pb-5 border-b hover:cursor-pointer">
                    <summary class="flex justify-between text-lg font-semibold items-center text-summary text-evendarkerBlue hover:text-[#845EC2]">Question 5</summary>
                    <p class="text-evendarkerBlue text-sm text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </details>

                <form action="" method="POST">
                    <div>
                        <textarea name="keluhan" id="" cols="60" rows="5" placeholder="Perlu bantuan?" class="w-3/4 text-sm rounded-lg"></textarea>
                    </div>
                    <!-- <a href="#" class="flex p-1 bg-[#845EC2] hover:bg-[#643EA3] text-white w-1/3 mx-auto my-7 font-semibold justify-center rounded-full md:w-1/4">Submit
                </a> -->
                    <button name="submit" onclick="return confirm('anda yakin ingin memberikan keluhan ini?')" class="flex p-1 bg-[#845EC2] hover:bg-[#643EA3] text-white w-1/3 mx-auto my-7 font-semibold justify-center rounded-full md:w-1/4">Submit</button>
                </form>
            </div>
        </main>

        <!-- footer -->
        <footer>
            <div class="px-12 mt-20 py-12 mx-auto h-full min-w-full md:flex bg-[#482C75] text-white">
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
                        <a href="" class="underline hover:text-[#845EC2]">Frequently asked questions</a>
                    </div>
                </div>

            </div>
        </footer>

    </div>

    <script src="node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>