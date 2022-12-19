<?php

$conn = new mysqli("localhost", "root", "", "ecotrackupdate2");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected succesfully";

?>