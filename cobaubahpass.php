<?php
require 'connect.php';
require 'functions.php';
if (isset($_POST["submit"])) {
    if (ubahpass($_POST) > 0) {
        echo "<script>
        alert('password berhasil di ubah');
        document.location.href = 'akun.php'
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>