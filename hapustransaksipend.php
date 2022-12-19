<?php


require 'functions.php';

$id = $_GET['id'];

if( hapustransbarpend($id) > 0){
    echo "<script>
            alert('Data Transaksi Berhasil dihapus!');
            document.location.href = 'transpend.php' 
        </script>"
    ;
}else{
    echo "<script>
            alert('Data Transaksi Gagal dihapus!');
            document.location.href = 'transpend.php' 
        </script>"
    ;
}









?>