<?php
session_start();


require_once('connect.php');
$emailErr  = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // $query =  "SELECT username_User,password_User FROM 'user' WHERE email_User = '$email' AND password_User = '$password'";
    // $hasil = $conn->query($query);

    // if ($hasil->num_rows > 0) {
    //     // $row = mysqli_fetch_assoc($result);
    //     // password_verify($password, $row['password']);
    //     header("location: dashboard.html");
    //     exit;
    // }
    // $error = true;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email_User = '$email' AND password_User = '$password'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        password_verify($password, $row['password']);
        header("location: dashboard.html");
        exit;

    }
    $error = true;
}
?>
