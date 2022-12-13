<?php
// require 'cobalogin.php';
require 'connect.php';

session_start();

if( isset($_SESSION["login"])){
    header("location: dashboard.php");
    exit;
}


if (isset($_POST["login"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE email_User = '$email' ");

    
    
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password_User"])){
            header("Location:dashboard.php");
            $_SESSION["idakun"] = $row["id_User"];
            $_SESSION["login"] = true;
            exit;
        }else{
            header("location: login.php?error=Username atau password anda salah");
            exit();
        }
    }
}













?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotrack - Login</title>
    <link rel="stylesheet" href="output.css">
</head>

<body class="bg-gradient-to-tr from-[#845EC2] via-[#FF6F91] to-[#FFC75F]">

    <div class="flex flex-col justify-between">

        <!-- header -->
        <header>
            <nav class="container hidden py-5 mx-auto min-w-full bg-transparent md:flex">
                <!-- logo -->
                <div class="py-1 ml-10 justify-start items-center">
                    <img src="img/ecotrack2.png" class="w-52">
                </div>
                <!-- nav menu -->
                <ul class="flex flex-1 justify-end items-center gap-10 mx-10 text-white font-semibold">
                    <li><a href="landing.html" class="hover:text-[#845EC2]">Home</a></li>
                    <li><a href="about.html" class="hover:text-[#845EC2]">About</a></li>
                    <li><a href="register.html" class="hover:text-[#845EC2]">Daftar</a></li>
                    <a href="#"
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

        </header>

        <!-- login section -->
        <!-- <main> -->
        <section id="login">
            <!-- flex container -->
            <main class="container flex flex-col w-608px items-center mx-auto my-32 h-96 bg-transparent md:flex-row">
                <!-- left (login) -->
                <div class=" w-full h-full rounded-t-lg items-center bg-white md:rounded-tr-none md:rounded-l-lg md:w-1/2">
                    <h1 class="text-center font-bold text-3xl pt-5 mb-5">
                        Login
                    </h1>
                    <?php if (isset($_GET['error'])) : ?>
                    <!-- <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo $_GET['error'] ?>
                        </span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div> -->
                    <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium"></span><?php echo $_GET['error'] ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <form action="#" id="login" method="POST">
                        <div class="">
                            <div>
                                <label for=" id" class="mx-16 text-sm p-3 w-20 md:w-3/4 md:mx-10">Email</label>
                            </div>
                            <div>
                                <input type="email" id="email" required name="email"
                                    class="mx-16 my-1 px-3 py-0.5 w-3/4 rounded-full bg-lightGreen md:w-3/4 md:mx-10">
                            </div>
                            <div>
                                <label for="pass" class=" mx-16 text-sm p-3 w-20 md:w-3/4 md:mx-10">Password</label>
                            </div>
                            <div class="">
                                <input type="password" id="pass" required name="password"
                                    class="mx-16 my-1 px-3 py-0.5 w-3/4 rounded-full bg-lightGreen md:w-3/4 md:mx-10">
                            </div>
                        </div>
                        <input name="login" type="submit" value="Login"
                            class="flex p-1 bg-customPurple hover:bg-lighterPurple text-white w-3/4 my-5 font-bold text-center justify-center mx-16 rounded-full md:mx-10">
                    </form>
                </div>
                <!-- right (no acc? register)-->
                <div class="flex flex-col p-10 w-full h-full rounded-b-lg md:rounded-bl-none md:rounded-r-lg md:w-1/2 bg-gradient-to-r from-[#F9F871] to-[#FCE068]">
                    <h1 class="font-bold text-3xl text-center md:text-left">
                        Don't have an account?
                    </h1>
                    <p class="text-center text-sm my-5 max-w-md md:text-left">
                        Buat akun dan mulai blah blah blah
                    </p>
                    <a href="register.html"
                        class="py-1 w-3/4 bg-[#845EC2] hover:bg-[#643EA3] text-white font-bold text-center mx-auto rounded-full">Register
                        Now</a>
                </div>
            </main>
        </section>
        <!-- </main> -->

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