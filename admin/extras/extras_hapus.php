<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $idextras = $_REQUEST['idextras'];

    if($idextras == 1){
        header("location: ./admin.php?hlm=extras");
        die();
    }

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_extras WHERE id_extras='$idextras'");
    if($sql == true){
        header("Location: ./admin.php?hlm=extras");
        die();
    }
    else{
        echo "<center><h3>Gagal Hapus !</h1> Data Sedang Digunakan.
        <h4> <a href='admin.php?hlm=extras'>Kembali</a></h4></center> ";
    }
    }
}
?>
