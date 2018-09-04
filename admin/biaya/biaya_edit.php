<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_paket = $_REQUEST['id_paket'];
		$jenis = $_REQUEST['kategori'];
		$biaya = $_REQUEST['price'];

		$sql = mysqli_query($koneksi, "UPDATE tbl_paket SET name_paket='$jenis', price='$biaya' WHERE id_paket='$id_paket'");

		if($sql == true){
			header('Location: ./admin.php?hlm=biaya');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_paket = $_REQUEST['id_paket'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_paket WHERE id_paket='$id_paket'");
		while($row = mysqli_fetch_array($sql)){

?>
<div class="row">
			<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					Edit Data Kategori
				</div>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis Paket</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kategori" value="<?php echo $row['name_paket']; ?>" name="kategori" placeholder="Jenis Paket" required>
		</div>
	</div>
	<div class="form-group">
		<label for="price" class="col-sm-2 control-label">Harga</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="price" value="<?php echo $row['price']; ?>" name="price" placeholder="total Jasa" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=biaya" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<div class="panel-footer">
			<i><center>Hazel Photo House
</div>
</div>
</div>
</div>
<?php

	}
	}
}
?>
