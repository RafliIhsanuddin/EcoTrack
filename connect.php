<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "ecotrack";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

<<<<<<< HEAD
// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
=======


$conn = new mysqli("localhost","root","","ecotrack2");


if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected succesfully";

?>
>>>>>>> ad5bbad (memperbaiki alert)
