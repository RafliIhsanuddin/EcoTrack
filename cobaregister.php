<?php
session_start();

use LDAP\Result;

require_once('connect.php');
$emailErr  = $passwordErr = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["email"]) && isset($_POST["password"])&& isset($_POST['telp']) && isset($_POST['username']) && isset($_POST['konfirmasi']) ){
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


    $result = mysqli_query($conn, "SELECT * FROM user WHERE email_User = '$email' AND password_User = '$password'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email_User'] == $email && $row['password_User'] == $password) {
            $_SESSION['id'] = $row['id_User'];
            $_SESSION['nama'] = $row['nama_User'];
            header("location: dashboard.php");
            exit();
        } else {
            header("location: login.php?error=Username atau password anda salah");
            exit();
        }
    } else {
        header("location: login.php?error=Username atau password anda salah");
        exit();
    }
}