<?php
if( empty( $_SESSION['id_user'] )  ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

        $namepackage = $_REQUEST['namepackage'];
        $range = $_REQUEST['range'];
		$price = $_REQUEST['price'];
		$kategori = $_REQUEST['paket'];
		

		$sql = mysqli_query($koneksi, "INSERT INTO tbl_package(name_package, range_package, price, id_paket) VALUES('$namepackage', '$range', '$price', '$kategori')");

		if($sql == true){
			header('Location: ./admin.php?hlm=package');
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
					 Tambah Data Package
			</div>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="namepackage" class="col-sm-2 control-label">Name Package</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="namepackage" name="namepackage" placeholder="Name Package" required>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Range</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="range" name="range" placeholder="ex : 5-10" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Price</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
		</div>
	</div>

	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Category</label>
		<div class="col-sm-3">
			<select name="paket" class="form-control" required>
				<option value="">--- Pilih Jenis Paket ---</option>
				<?php

				$q = mysqli_query($koneksi, "SELECT * FROM tbl_paket");
				while($hasil=mysqli_fetch_array($q)){
					echo '<option value="'.$hasil['id_paket'].'">'.$hasil['name_paket'].'</option>';
				}

			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=package" class="btn btn-danger">Batal</a>
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
