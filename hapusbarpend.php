<?php
require 'functions.php';

$id = $_GET['id'];



if( hapuspend($id) > 0){
    echo "<script>
            alert('Barang Berhasil dihapus!');
            document.location.href = 'pendapatan.php' 
        </script>"
    ;
}else{
    echo "<script>
            alert('Barang Gagal dihapus!');
            document.location.href = 'pendapatan.php' 
        </script>"
    ;
}







?>