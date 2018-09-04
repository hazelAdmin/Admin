<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $idpackage = $_REQUEST['idpackage'];

    if($idpackage == 1){
        header("location: ./admin.php?hlm=package");
        die();
    }

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_package WHERE id_package='$idpackage'");
    if($sql == true){
        header("Location: ./admin.php?hlm=package");
        die();
    }
    else{
        echo "<center><h3>Gagal Hapus !</h1> Data Sedang Digunakan.
        <h4> <a href='admin.php?hlm=package'>Kembali</a></h4></center> ";
    }
    }
}
?>
