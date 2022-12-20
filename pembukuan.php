<?php
session_start();
ob_start();
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
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,800;1,300&display=swap"
        rel="stylesheet">
    <title>Pembukuan</title>
    <!-- <style>
        * {
            border: 1px solid black;
        }
    </style> -->
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
                    <li><a href="dashboard.php" class="hover:text-[#482C75]">Dashboard</a>
                    </li>
                    <li><a href="#" class="bg-white text-evendarkerBlue px-3 py-2 rounded-lg">Pembukuan</a></li>
                    <li><a href="bantuan.php" class="hover:text-[#482C75]">Bantuan</a></li>
                    <!-- <a href="landing.html"
                    class="px-2 py-2 mr-10 w-20 font-bold bg-white text-evendarkerBlue text-center rounded-full">
                    Logout
                </a> -->
                </ul>

                <!-- dropdown button -->
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
                            <a href="landing.php"
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
                        <a href="dashboard.php"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="bantuan.php"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bantuan</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="landing.php"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                </div>
            </div>

        </header>

        <main class="h-[600px]">
            <div class="w-3/4 h-[500px] mx-auto bg-white rounded-lg shadow-sm mt-16 md:w-[700px] lg:w-[900px]">
                <div class="p-8">
                    <h1 class="text-2xl font-semibold">Pembukuan</h1>
                    <p class="text-sm">Pengunduhan data transaksi sesuai rentang tanggal dan jenis dokumen yang dipilih
                    </p>
                </div>
                <form action="pdf.php" method="POST">
                    <div class="mx-auto w-3/4 md:px-[70px] lg:w-1/2 mb-5 mt-14">
                        <div class="relative">
                            <div
                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none rounded-full">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker autocomplete="off" type="text" name="awal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tanggal awal">
                        </div>
                    </div>
                    <div class="mx-auto w-3/4 md:px-[70px] lg:w-1/2 my-5 ">
                        <div class="relative">
                            <div
                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none rounded-full">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker autocomplete="off" type="text" name="akhir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tanggal akhir">
                        </div>
                    </div>
                    <div class="flex justify-center md:justify-end">
                        <button type="submit" name="html"
                            class="p-1 bg-[#845EC2] hover:bg-[#643EA3] text-white text-sm h-9 w-[150px] my-5 font-semibold text-center justify-center mx-auto rounded-full md:mx-10">Print</button>
                    </div>
                </form>
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
    <script src="node_modules/flowbite/dist/datepicker.js"></script>
    <script src="node_modules/flowbite/dist/flowbite.js"></script>


</body>

</html>