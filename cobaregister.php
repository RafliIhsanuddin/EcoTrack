<?php
session_start();

require 'connect.php';
require 'functions.php';
if (isset($_POST["register"])){
    if(registrasi($_POST) > 0 ){
        echo "<script>
        alert('user baru berhasil ditambahkan');
        document.location.href = 'login.php'
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
