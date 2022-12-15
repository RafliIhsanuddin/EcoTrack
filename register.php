<?php
require 'cobaregister.php';
?>

<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotrack - Register</title>
    <link rel="stylesheet" href="output.css">
    <!-- <style>
        *{
            border: solid black 1px;
        }
    </style> -->
</head>

<body class="bg-gradient-to-tr from-[#845EC2] via-[#FF6F91] to-[#FFC75F]">


    <!-- header -->
    <nav class="container hidden py-5 mx-auto min-w-full bg-transparent md:flex">
        <!-- logo -->
        <div class="py-1 ml-10 justify-start items-center">
            <img src="img/ecotrack2.png" class="w-52">
        </div>
        <!-- nav menu -->
        <ul class="flex flex-1 justify-end items-center gap-10 mx-10 text-white font-semibold">
            <li><a href="landing.php" class="hover:text-[#A084CA]">Home</a></li>
            <li><a href="about.php" class="hover:text-[#A084CA]">About</a></li>
            <li><a href="register.php" class="text-[#A084CA]">Daftar</a></li>
            <a href="login.php"
                class="px-2 py-2 mr-10 w-20 font-bold bg-[#A084CA] text-evendarkerBlue text-center rounded-full">
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

    <!-- register section -->
    <section id="register">
        <!-- flex container -->
        <div class="container justify-center rounded-lg items-center mx-auto my-32 w-96 bg-white">
            <!-- register form -->
            <div class="justify-center p-10 w-full h-full">
                <form action="" id="register" method="POST">
                    <div>
                        <div>
                            <?php if (isset($_GET['error'])): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <span class="block sm:inline">
                                    <?php echo $_GET['error'] ?>
                                </span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />

                                </span>
                            </div>
                            <?php endif ?>
                            <?php if (isset($_GET['success'])): ?>
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                                role="alert">
                                <div class="flex">
                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                        </svg></div>
                                    <div>
                                        >
                                        <?php echo $_GET['success'] ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                            <div>
                                <div>
                                    <div>
                                        <h1 class="text-center font-bold mb-5 text-3xl">
                                            Register
                                        </h1>
                                    </div>
                                    <div>
                                        <div>
                                            <label for="email" class="text-sm p-3">Email</label>
                                        </div>
                                        <input type="email" id="email" name="email" required
                                            class="my-1 px-3 py-0.5 shadow-xl block rounded-full bg-white w-full border-[1px] md:w-full"><br>
                                        <div>
                                            <label for="username" class="text-sm p-3">Username</label>
                                        </div>
                                        <input type="text" id="username" name="username" required
                                            class="my-1 px-3 py-0.5 shadow-xl block rounded-full  bg-white w-full border-[1px] md:w-full"><br>
                                        <div>
                                            <label for="telp" class="text-sm p-3">No. Telp</label>
                                        </div>
                                        <input type="tel" id="telp" name="telp" required
                                            class="my-1 px-3 py-0.5 shadow-xl block rounded-full  bg-white w-full border-[1px] md:w-full"><br>
                                        <div>
                                            <label for="pass" class="text-sm p-3">Password</label>
                                        </div>
                                        <input type="password" id="pass" name="password" required
                                            class="my-1 px-3 py-0.5 shadow-xl block rounded-full  bg-white w-full border-[1px] md:w-full"><br>
                                        <div>
                                            <label for="konfirmpass" class="text-sm p-3">Konfirmasi Password</label>
                                        </div>
                                        <input type="password" id="konfirmpass" name="konfirmasi" required class=" my-1
                                            px-3 py-0.5 shadow-xl block rounded-full bg-white w-full border-[1px]
                                            md:w-full"><br>
                                    </div>
                                    </p>
                                    <input type="submit" name="register" href="#"
                                        class="flex p-1 bg-[#845EC2] hover:bg-[#643EA3] text-white w-full my-7 font-bold justify-center rounded-full md:w-full">Register
                                    <a href="register.php"
                                        class="text-center no-underline font-semibold text-sm text-black hover:text-darkBlue hover:underline decoration-inherit">
                                        Sudah punya akun? Kembali ke halaman Login.
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

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

    <script src="node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>