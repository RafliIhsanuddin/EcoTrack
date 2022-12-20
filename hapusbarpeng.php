<?php
require 'functions.php';

$id = $_GET['id'];



if( hapus($id) > 0){
    echo "<script>
            alert('Barang Berhasil dihapus!');
            document.location.href = 'pengeluaran.php' 
        </script>"
    ;
}else{
    echo "<script>
            alert('Barang Gagal dihapus!');
            document.location.href = 'pengeluaran.php' 
        </script>"
    ;
}







?>