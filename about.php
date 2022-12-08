<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotrack - About</title>
    <link rel="stylesheet" href="output.css">
</head>

<body class="bg-gradient-to-tr from-[#845EC2] to-[#FF6F91]">

    <!-- header -->
    <nav class="container hidden py-5 mx-auto min-w-full bg-transparent md:flex">
        <!-- logo -->
        <div class="py-1 ml-10 justify-start items-center">
            <img src="img/ecotrack2.png" class="w-52">
        </div>
        <!-- nav menu -->
        <ul class="flex flex-1 justify-end items-center gap-10 mx-10 text-white font-semibold">
            <li><a href="landing.html" class="hover:text-[#845EC2]">Home</a></li>
            <li><a href="#" class="text-[#845EC2]">About</a></li>
            <li><a href="register.html" class="hover:text-[#845EC2]">Daftar</a></li>
            <a href="login.html"
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

    <!-- about section -->
    <section>
        <div class="container flex flex-col justify-center mt-10 pt-10 mx-auto space-y-10 w-full h-full text-white text-center md:pt-0">
            <div class="space-y-10">
                <h1 class="text-5xl font-semibold">
                    About
                </h1>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique voluptates eos quia, vitae animi
                    saepe et sunt,
                    <br>
                    officiis sint, unde consectetur quisquam quos id provident dolor facilis accusantium tempora cumque.
                </p>
            </div>
            <!-- images -->
            <div class="flex flex-col space-y-5 justify-center mx-auto text-center md:space-y-0 md:space-x-5 md:flex-row">
                <!-- member 1 -->
                <div class="">
                    <img src="img/kitty.jpg" alt="" class="w-auto mx-auto max-w-[320px] h-auto max-h-[320px]">
                </div>
                <!-- member 2 -->
                <div class="">
                    <img src="img/kitty2.jpg" alt=""
                        class="w-auto mx-auto min-w-[320px] max-w-[320px] h-auto max-h-[320px]">
                </div>

            </div>
            <div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quo illo cum dolores qui eligendi
                    sapiente temporibus!
                    <br>
                    Veritatis esse quidem doloribus,
                    debitis mollitia aperiam, eum nisi ducimus necessitatibus aspernatur modi!
                </p>
            </div>
        </div>
    </section>

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
                    <a href="bantuan.html" class="underline hover:text-[#845EC2]">Frequently asked questions</a>
                </div>
            </div>

        </div>
    </footer>

    <script src="node_modules/flowbite/dist/flowbite.js"></script>

</body>

</html>