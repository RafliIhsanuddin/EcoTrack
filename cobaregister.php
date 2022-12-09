<?php
session_start();

use LDAP\Result;

require_once('connect.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST['telp']) && isset($_POST['username']) && isset($_POST['konfirmasi'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $telp = validate($_POST["telp"]);
    $username = validate($_POST["username"]);
    $konfirmasi = validate($_POST["konfirmasi"]);
    $user_data = array($email);
    if ($password !== $konfirmasi) {
        header("location: registrasi.php?error=password dan konfirmasi password tidak sama");
        exit();
    } else {
        $pass = hash('md5', $password);

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if (mysqli_num_rows($result) > 0) {
            header("location: registrasi.php?error=username sudah ada silahkan mencoba yang lain");
            exit();
        } else {
            $result2 = mysqli_query($conn, "INSERT INTO user(nama_User, email_User,password_User,telp_User) VALUES('$username', '$email','$password','$telp')");
            if ($result2) {
                header("location: dashboard.php?success=akun anda sudah berhasil di buat");
                exit();
            } else {
                header("location: registrasi.php?success=akun anda sudah berhasil di buat");
                exit();
            }
        }
    }
}