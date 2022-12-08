<?php
require 'connect.php';



function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM pengeluaran WHERE Id_Barang = $id");
    return mysqli_affected_rows($conn);
}









?>