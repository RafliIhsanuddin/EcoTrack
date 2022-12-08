<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotrack - About</title>
    <link rel="stylesheet" href="output.css">
</head>

<body class="bg-gradient-to-r from-darkerBlue to-evendarkerPurple h-screen">

    <!-- header -->
    <nav class="container flex py-5 mx-auto min-w-full bg-transparent">
        <!-- logo -->
        <div class="py-1 ml-10 justify-start items-center">
            <img src="img/ecotrack2.png" class="w-52">
        </div>
        <!-- nav menu -->
        <ul class="flex flex-1 justify-end items-center gap-10 mx-10 text-white font-semibold">
            <li><a href="landing.html" class="hover:text-lightGreen">Home</a></li>
            <li><a href="#" class="text-lightGreen">About</a></li>
            <li><a href="register.html" class="hover:text-lightGreen">Daftar</a></li>
            <a href="#"
                class="px-2 py-2 mr-10 w-20 font-bold bg-lightGreen text-evendarkerBlue text-center rounded-full">
                Login
            </a>
        </ul>
    </nav>

    <!-- about section -->
    <section>
        <div class="container flex flex-col justify-center pt-10 mx-auto space-y-10 w-full h-full text-white text-center md:pt-0">
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
        <div class="px-12 py-12 mx-auto mt-20 h-full min-w-full md:flex bg-evendarkerBlue text-white">
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
                    <a href="" class="underline hover:text-lightGreen">Frequently asked questions</a>
                </div>
            </div>

        </div>
    </footer>
</body>

</html>