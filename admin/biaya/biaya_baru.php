<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$kategori = $_REQUEST['kategori'];
		$price= $_REQUEST['price'];

		$sql = mysqli_query($koneksi, "INSERT INTO tbl_paket(name_paket, price) VALUES('$kategori', '$price')");

		if($sql == true){
			header('Location: ./admin.php?hlm=biaya');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<div class="row">
			<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					Tambah Data Kategori
				</div>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="kategori" class="col-sm-2 control-label">Kategori</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" required>
		</div>
	</div>
	<div class="form-group">
		<label for="price" class="col-sm-2 control-label">Harga</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="price" name="price" placeholder="Harga" required>
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
?>
