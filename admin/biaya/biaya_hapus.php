<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_paket = $_REQUEST['id_paket'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_paket WHERE id_paket='$id_paket'");
    if($sql == true){
        header("Location: ./admin.php?hlm=biaya");
        die();
    }else{
        echo "<center><h3>Gagal Hapus !</h1> Data Sedang Digunakan.
        <h4> <a href='admin.php?hlm=biaya'>Kembali</a></h4></center> ";
    }

    $koneksi->close();
}

    
}
?>
