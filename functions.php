<?php
require 'connect.php';



function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM pengeluaran WHERE Id_Barang = $id");
    return mysqli_affected_rows($conn);
}


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}


function ubah($data){
    global $conn;

    $id = $data['id'];
    $nama = htmlspecialchars($_POST['nabar']);
    $harga = htmlspecialchars($_POST['habar']);
    $jumlah = htmlspecialchars($_POST['jumbar']);
    $satuan = htmlspecialchars($_POST['satuan']);
    $toko = htmlspecialchars($_POST['toko']);

    $query = "UPDATE `pengeluaran` SET 
        `Nama_Barang` = '$nama',
        `Satuan` = '$satuan',
        `Jumlah_Barang` ='$jumlah',
        `Harga_Barang` = '$harga',
        `Referensi` = '$toko'
        WHERE Id_Barang = $id" 
        ;

    $hasil = $conn -> query($query);

    return mysqli_affected_rows($conn);
}






?>