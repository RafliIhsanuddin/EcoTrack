<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotrack - Akun</title>
    <link rel="stylesheet" href="output.css">
</head>

<body class="bg-gray-200">
    <div class="flex flex-col h-screen justify-between">

        <!-- header -->
        <nav class="container hidden py-5 mx-auto min-w-full bg-gradient-to-r from-[#845EC2] via-[#FF6F91] to-[#FFC75F] md:flex">
            <!-- logo -->
            <div class="py-1 ml-10 justify-start items-center">
                <img src="img/ecotrack2.png" class="w-52">
            </div>
            <!-- nav menu -->
            <ul class="flex flex-1 justify-end items-center gap-10 mx-10 text-white font-semibold">
                <li><a href="dashboard.html" class="hover:text-[#845EC2]">Dashboard</a></li>
                <li><a href="bantuan.html" class="hover:text-[#845EC2]">Bantuan</a></li>
                <a href="landing.html"
                    class="px-2 py-2 mr-10 w-20 font-bold bg-white text-evendarkerBlue text-center rounded-full">
                    Logout
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
                    <a href="dashboard.html"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="bantuan.html"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bantuan</a>
                </li>
            </ul>
            <div class="py-1">
                <a href="landing.html"
                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
            </div>
        </div>

        <!-- main section -->
        <section>
            <div
                class="container flex flex-col border-gray-300 border justify-center text-left text-evendarkerBlue mt-10 p-10 mx-auto w-full h-full max-w-[90%] md:max-w-5xl bg-white rounded-lg md:pt-0">
                <div class="space-y-2 text-left mb-7">
                    <h2 class="text-3xl pt-5">
                        Basic Info
                    </h2>
                    <p>
                        Informasi dasar terkait akun pengguna.
                    </p>
                </div>
                
                <div class="bg-transparent border-t py-5">
                    <p class="text-sm text-gray-400 font-semibold">Nama</p>
                    <p>Nama disini</p>
                </div>

                <div class="bg-transparent border-t py-5">
                    <p class="text-sm text-gray-400 font-semibold">Username</p>
                    <p>Username disini</p>
                </div>

                <div class="bg-transparent border-t py-5">
                    <p class="text-sm text-gray-400 font-semibold">Email</p>
                    <p>Email disini</p>
                </div>
                
                <div class="bg-transparent border-t py-5">
                    <p class="text-sm text-gray-400 font-semibold">Password</p>
                    <p>Password disini</p>
                    <a href="#" class="text-xs text-[#845EC2] hover:text-[#645CAA] font-semibold">Ubah password?</a>
                </div>

                <div class="space-y-2 text-left mb-7 pt-10">
                    <h2 class="text-3xl pt-5">
                        Contact Info
                    </h2>
                </div>
                
                <div class="bg-transparent border-t py-5">
                    <p class="text-sm text-gray-400 font-semibold">Email</p>
                    <p>Email disini</p>
                </div>

                <div class="bg-transparent border-t py-5">
                    <p class="text-sm text-gray-400 font-semibold">No. Telp</p>
                    <p>No. Telp disini</p>
                </div>

            </div>
        </section>

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

    </div>

    <script src="node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>