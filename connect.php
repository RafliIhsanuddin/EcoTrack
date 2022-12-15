<?php

$conn = new mysqli("localhost", "root", "", "ecotrackupadate");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected succesfully";

?>