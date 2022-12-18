<?php
require 'functions.php';


session_start();

$id = $_GET['id'];

$_SESSION['idtrans'];



if( hapus($id) > 0){
    echo "<script>
            alert('Data Transaksi Berhasil dihapus!');
            document.location.href = 'ubahtransaksipeng.php?id=".$_SESSION['idtrans']."' 
        </script>"
    ;
}else{
    echo "<script>
            alert('Data Transaksi Gagal dihapus!');
            document.location.href = 'ubahtransaksipeng.php?id=".$_SESSION['idtrans']."' 
        </script>"
    ;
}







?>