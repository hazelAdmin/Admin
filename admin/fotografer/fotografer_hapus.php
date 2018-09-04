<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $idfotografer = $_REQUEST['idfotografer'];

    if($idfotografer == 1){
        header("location: ./admin.php?hlm=fotografer");
        die();
    }

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_fotografer WHERE id_fotografer='$idfotografer'");
    if($sql == true){
        header("Location: ./admin.php?hlm=fotografer");
        die();
    }
    else{
        echo "<center><h3>Gagal Hapus !</h1> Data Sedang Digunakan.
        <h4> <a href='admin.php?hlm=fotografer'>Kembali</a></h4></center> ";
    }
    }
}
?>
