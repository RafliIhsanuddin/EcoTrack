<?php
require 'functions.php';


session_start();

$id = $_GET['id'];

$_SESSION['idtranspend'];



if( hapuspend($id) > 0){
    echo "<script>
            alert('Barang Berhasil dihapus!');
            document.location.href = 'ubahtransaksipend.php?id=".$_SESSION['idtranspend']."' 
        </script>"
    ;
}else{
    echo "<script>
            alert('Barang Gagal dihapus!');
            document.location.href = 'ubahtransaksipend.php?id=".$_SESSION['idtranspend']."' 
        </script>"
    ;
}







?>