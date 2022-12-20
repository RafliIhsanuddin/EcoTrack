<?php
require 'connect.php';


function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM pengeluaran WHERE Id_Barang = $id");
    return mysqli_affected_rows($conn);
}

function hapuspend($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM pendapatan WHERE Id_Barang = $id");
    return mysqli_affected_rows($conn);
}




function hapustransbar($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM pengeluaran WHERE Id_Transaksi = $id");
    mysqli_query($conn,"DELETE FROM transaksi_pengeluaran WHERE Id_Transaksi = $id");
    return mysqli_affected_rows($conn);
}

function hapustransbarpend($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM pendapatan WHERE Id_Transaksi = $id");
    mysqli_query($conn,"DELETE FROM transaksi_pendapatan WHERE Id_Transaksi = $id");
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
function cariseb($keyword,$namatabel,$iduser){
    $query = "SELECT * FROM $namatabel WHERE id_User = $iduser 
    AND tanggal_Transaksi 
    LIKE '%$keyword%' 
    OR status_Transaksi 
    LIKE '%$keyword%' 
    OR jenis_Transaksi
    LIKE '%$keyword%' 
    ";

    return querycoba($query);
}


function cariBarang($keyword,$namatabel,$iduser,$awaldata,$jumperhal){
    $query = "SELECT $namatabel.id_Transaksi,$namatabel.jenis_Transaksi,$namatabel.status_Transaksi,$namatabel.tanggal_Transaksi,$namatabel.bukti_Transaksi,$namatabel.no_Transaksi FROM $namatabel JOIN pengeluaran ON pengeluaran.id_Transaksi = $namatabel.id_Transaksi WHERE pengeluaran.id_User = $iduser
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

function cariBarangpend($keyword,$namatabel,$iduser,$awaldata,$jumperhal){
    $query = "SELECT $namatabel.id_Transaksi,$namatabel.jenis_Transaksi,$namatabel.status_Transaksi,$namatabel.tanggal_Transaksi,$namatabel.bukti_Transaksi,$namatabel.no_Transaksi FROM $namatabel JOIN pendapatan ON pendapatan.id_Transaksi = $namatabel.id_Transaksi WHERE pendapatan.id_User = $iduser
    AND pendapatan.Nama_Barang 
    LIKE '%$keyword%' 
    OR pendapatan.Referensi 
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

function cariBarangseb($keyword,$namatabel,$iduser){
    $query = "SELECT $namatabel.id_Transaksi,$namatabel.jenis_Transaksi,$namatabel.status_Transaksi,$namatabel.tanggal_Transaksi,$namatabel.bukti_Transaksi,$namatabel.no_Transaksi FROM $namatabel JOIN pengeluaran ON pengeluaran.id_Transaksi = $namatabel.id_Transaksi WHERE pengeluaran.id_User = $iduser
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
    GROUP BY $namatabel.id_Transaksi ";

    return querycoba($query);
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


function ubahpend($data){
    global $conn;

    $id = $data['id'];
    $nama = htmlspecialchars($_POST['nabar']);
    $harga = htmlspecialchars($_POST['habar']);
    $jumlah = htmlspecialchars($_POST['jumbar']);
    $satuan = htmlspecialchars($_POST['satuan']);
    $toko = htmlspecialchars($_POST['toko']);

    $query = "UPDATE `pendapatan` SET 
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



function upload(){

    $namaFile = $_FILES['buktit']['name'];
    $ukuranFile = $_FILES['buktit']['size'];
    $error = $_FILES['buktit']['error'];
    $tmpname = $_FILES['buktit']['tmp_name'];

    if($error === 4){
        echo "<script> 
        alert('pilih gambar terlebih dahulu')
        </script>
        ";
        return false;
    }

    $EksistensiGambarValid = ['jpeg', 'jpg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$EksistensiGambarValid)){
        echo "<script> 
        alert('yang anda upload bukan gambar')
        </script>
        ";
        return false;
    }

    if($ukuranFile > 1000000){
        echo "<script> 
        alert('ukuran gambar terlalu besar')
        </script>
        ";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpname, 'upload/'.$namaFileBaru);

    return $namaFileBaru;

}




function tambahbarpeng($data,$iduser){
    global $conn;
    
    // $bukti = htmlspecialchars($_POST['buktit']);
    
    
    $status = htmlspecialchars($data['statust']);
    $jenis = htmlspecialchars($data['jenist']);
    $tgl = htmlspecialchars($data['tglt']);
    $no = htmlspecialchars($data['not']);
    

    $bukti = upload();
    if(!$bukti){
        return false;
    }

    $query = "INSERT INTO `transaksi_pengeluaran` (`id_Transaksi`, `jenis_Transaksi`, `status_Transaksi`,`no_Transaksi`,`tanggal_Transaksi`, `bukti_Transaksi`,`id_User`) VALUES ('','$jenis','$status','$no','$tgl','$bukti','$iduser')";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function tambahbarpend($data,$iduser){
    global $conn;
    
    // $bukti = htmlspecialchars($_POST['buktit']);
    
    
    $status = htmlspecialchars($data['statust']);
    $jenis = htmlspecialchars($data['jenist']);
    $tgl = htmlspecialchars($data['tglt']);
    $no = htmlspecialchars($data['not']);
    

    $bukti = upload();
    if(!$bukti){
        return false;
    }

    $query = "INSERT INTO `transaksi_pendapatan` (`id_Transaksi`, `jenis_Transaksi`, `status_Transaksi`,`no_Transaksi`,`tanggal_Transaksi`, `bukti_Transaksi`,`id_User`) VALUES ('','$jenis','$status','$no','$tgl','$bukti','$iduser')";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}













?>