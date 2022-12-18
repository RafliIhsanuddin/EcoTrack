<?php
require 'connect.php';



function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM pengeluaran WHERE Id_Barang = $id");
    return mysqli_affected_rows($conn);
}


function querycoba($query){
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

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}








function registrasi($data){
    global $conn;
    $email = stripslashes($data['email']);
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn,$data['password']);
    $telepon = $data['telp'];
    $konfirmasi = mysqli_real_escape_string($conn,$data['konfirmasi']);

    $result = mysqli_query($conn,"SELECT nama_User FROM user WHERE nama_User = '$username'");
    if(mysqli_fetch_assoc($result) ){
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }

    if($password !== $konfirmasi){
        echo "<script>
        alert('konfirmasi tidak sesuai')
        </script>";
        return false;
    }

    $password = password_hash($password,PASSWORD_DEFAULT);


    mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$email','$password',$telepon)");


    return mysqli_affected_rows($conn);
    // $password = md5($password);
    // var_dump($password);die;

    
}

function cari($keyword,$namatabel,$iduser,$awaldata,$jumperhal){
    $query = "SELECT * FROM $namatabel WHERE id_User = $iduser 
    AND tanggal_Transaksi 
    LIKE '%$keyword%' 
    OR status_Transaksi 
    LIKE '%$keyword%' 
    OR jenis_Transaksi
    LIKE '%$keyword%' 
    LIMIT $awaldata,$jumperhal";

    return querycoba($query);
}


function cariBarang($keyword,$namatabel,$iduser,$awaldata,$jumperhal){
    $query = "SELECT $namatabel.id_Transaksi,$namatabel.jenis_Transaksi,$namatabel.status_Transaksi,$namatabel.tanggal_Transaksi,$namatabel.bukti_Transaksi FROM $namatabel JOIN pengeluaran ON pengeluaran.id_Transaksi = $namatabel.id_Transaksi WHERE pengeluaran.id_User = $iduser
    AND pengeluaran.Nama_Barang 
    LIKE '%$keyword%' 
    OR pengeluaran.Referensi 
    LIKE '%$keyword%'
    OR $namatabel.tanggal_Transaksi
    LIKE '%$keyword%' 
    OR $namatabel.status_Transaksi
    LIKE '%$keyword%' 
    OR $namatabel.jenis_Transaksi
    LIKE '%$keyword%' 
    GROUP BY $namatabel.id_Transaksi 
    LIMIT $awaldata,$jumperhal";

    return querycoba($query);
}






?>