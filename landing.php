<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotrack - Home</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>

    <div class="flex flex-col h-screen justify-between">

        <!-- first -->
        <div class="bg-gradient-to-tr from-[#845EC2] via-[#FF6F91] to-[#FFC75F]">
            <!-- header -->
            <nav class="container hidden py-5 mx-auto min-w-full bg-transparent md:flex">
                <!-- logo -->
                <div class="py-1 ml-10 justify-start items-center">
                    <img src="img/ecotrack2.png" class="w-52">
                </div>
                <!-- nav menu -->
                <ul class="flex flex-1 justify-end items-center gap-10 mx-10 text-white font-semibold">
                    <li><a href="#" class="text-[#845EC2]">Home</a></li>
                    <!-- <li><a href="about.html" class="hover:text-[#845EC2]">About</a></li> -->
                    <li><a href="register.html" class="hover:text-[#845EC2]">Daftar</a></li>
                    <a href="login.html"
                        class="px-2 py-2 shadow-md mr-10 w-20 font-bold bg-white text-evendarkerBlue text-center rounded-full">
                        Login
                    </a>
                </ul>
            </nav>

            <!-- dropdown button -->
            <div class="flex">

                <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                    class="text-white bg-transparent mr-0 mx-auto hover:font-bold focus:outline-none font-medium rounded-lg text-lg px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:hidden"
                    type="button">
                    <div class="w-10 h-10 rounded-full bg-[#845EC2] flex"><img src="img/menudots.png"
                            class="mx-auto w-10 h-10 p-2" alt=""></div>
                </button>
            </div>
        
            <!-- Dropdown menu -->
            <div id="dropdownDivider"
                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                    <li>
                        <a href="landing.html"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Home</a>
                    </li>
                    <li>
                        <a href="about.html"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">About</a>
                    </li>
                    <li>
                        <a href="register.html"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Daftar</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="login.html"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Login</a>
                </div>
            </div>

            <!-- hero section -->
            <div class="container flex flex-col mx-auto min-w-full p-7 md:flex-row">
                <!-- left side -->
                <div
                    class="max-w-full text-white space-y-20 m-10 mt-20 h-screen md:h-fit md:space-y-9 md:m-44 md:w-1/2">
                    <h1 class="text-6xl font-semibold">
                        Ecotrack
                    </h1>
                    <p class="">
                        Ecotrack merupakan aplikasi berbasis web yang dapat membantu <br>
                        perusahaan dan UKM dalam melakukan pencatatan kegiatan transaksi <br>
                        dan melakukan pembukuan keuangan.
                    </p>
                    <div>
                        <a href="register.php"
                            class="px-5 py-2 font-bold bg-lightGreen text-evendarkerBlue text-center rounded-full">
                            Daftar Sekarang
                        </a>

                        <!-- hover stuff with transition-->
                        <!-- <a href="register.html" target="_blank"
                        class="transition-colors ease-in-out duration-500 delay-100 hover:bg-teal hover:text-evendarkerBlue px-5 py-2 font-bold bg-[#FF6F91] text-evendarkerBlue text-center rounded-full">
                        Daftar Sekarang
                    </a> -->
                    </div>
                </div>
                <!-- right side -->
                <div class="p-0 m-0">
                    <img src="img/iconn.png" class="hidden absolute p-0 m-0 opacity-10 bottom-0 right-0 lg:flex lg:w-[600px]">
                </div>
            </div>
        </div>

        <!-- second -->
        <div class="bg-[#FFC75F] h-fit">
            <div class="container flex flex-col mx-auto justify-center min-w-full p-7">
                <div class="mx-auto text-evendarkerBlue space-y-14 m-14">
                    <h1 class="text-5xl font-semibold text-center">
                        Fitur dan Keunggulan
                    </h1>
                    <!-- features list -->
                    <div class="flex flex-wrap flex-col justify-center gap-y-5 md:gap-y-0 md:gap-x-8 md:flex-row">
                        <!-- feature 1 -->
                        <div class="text-center space-y-2">
                            <img src="img/kitty.jpg" alt="" class="w-auto mx-auto rounded-full max-w-[320px] h-auto max-h-[320px] md:mb-5">

                            <h2 class="font-semibold">Mencatat Transaksi</h2>
                            <p>Lorem ipsum dolor sit amet
                                <br> consectetur adipisicing elit.
                            </p>
                        </div>
                        <!-- feature 2 -->
                        <div class="text-center space-y-2">
                            <img src="img/kitty2.jpg" alt=""
                                class="w-auto mx-auto rounded-full max-w-[320px] min-w-[320px] h-auto max-h-[320px] md:mb-5">

                            <h2 class="font-semibold">Pembukuan Keuangan</h2>
                            <p>Lorem ipsum dolor sit amet
                                <br> consectetur adipisicing elit.
                            </p>
                        </div>
                        <!-- feature 3 -->
                        <div class="text-center space-y-2">
                            <img src="img/kitty3.jpg" alt="" class="w-auto mx-auto rounded-full max-w-[320px] h-auto max-h-[320px] md:mb-5 md:pt-5 lg:pt-0">
                            <h2 class="font-semibold">Mencetak Pembukuan</h2>
                            <p>Lorem ipsum dolor sit amet
                                <br> consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- third -->
        <div class="bg-gradient-to-br from-[#FF6F91] to-[#845EC2]">
            <div class="container flex flex-col mx-auto justify-center min-w-full p-7">
                <div class="mx-auto text-white space-y-28 m-14">
                    <h1 class="text-5xl font-semibold text-center">
                        Anggota Tim
                    </h1>
                    <!-- team members -->
                    <div class="flex flex-wrap flex-col justify-center gap-y-10 md:gap-y-10 md:gap-x-8 md:flex-row">
                        <!-- member 1 -->
                        <div class="text-center space-y-2">
                            <img src="img/kitty.jpg" alt="" class="w-auto rounded-full max-w-[320px] h-auto max-h-[320px]">
                        </div>
                        <!-- member 2 -->
                        <div class="text-center space-y-2">
                            <img src="img/kitty2.jpg" alt=""
                                class="w-auto rounded-full max-w-[320px] min-w-[320px] h-auto max-h-[320px]">
                        </div>
                        <!-- member 3 -->
                        <div class="text-center space-y-2">
                            <img src="img/kitty3.jpg" alt="" class="w-auto rounded-full max-w-[320px] h-auto max-h-[320px]">
                        </div>
                        <!-- member 4 -->
                        <div class="text-center space-y-2">
                            <img src="img/kitty4.jpg" alt="" class="w-auto rounded-full max-w-[320px] h-auto max-h-[320px]">
                        </div>
                    </div>
                    <!-- <div class="text-center">
                        <a href="about.html"
                            class="px-5 py-2 shadow-md w-full font-bold bg-white text-evendarkerBlue text-center rounded-full">
                            Discover More
                        </a>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- footer -->
        <footer>
            <div class="px-12 py-12 mx-auto h-full min-w-full md:flex bg-[#482C75] text-white">
                <div class="w-full py-3">
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