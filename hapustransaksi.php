<?php


require 'functions.php';

$id = $_GET['id'];

if( hapustransbar($id) > 0){
    echo "<script>
            alert('Data Transaksi Berhasil dihapus!');
            document.location.href = 'transpeng.php' 
        </script>"
    ;
}else{
    echo "<script>
            alert('Data Transaksi Gagal dihapus!');
            document.location.href = 'transpeng.php' 
        </script>"
    ;
}









?>