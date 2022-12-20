<?php

$conn = new mysqli("localhost", "root", "", "ecotrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected succesfully";

?>