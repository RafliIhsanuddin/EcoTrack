<?php
require 'functions.php';


session_start();

$id = $_GET['id'];

$_SESSION['idtrans'];



if( hapus($id) > 0){
    echo "<script>
            alert('Barang Berhasil dihapus!');
            document.location.href = 'ubahtransaksipeng.php?id=".$_SESSION['idtrans']."' 
        </script>"
    ;
}else{
    echo "<script>
            alert('Barang Gagal dihapus!');
            document.location.href = 'ubahtransaksipeng.php?id=".$_SESSION['idtrans']."' 
        </script>"
    ;
}







?>