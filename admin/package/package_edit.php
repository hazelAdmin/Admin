<?php
if( empty( $_SESSION['id_user'] )  ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else if( !empty( $_SESSION['id_user'] ) && ($_SESSION['level'] ==1) ){

	if( isset( $_REQUEST['submit'] )){

		$idpackage = $_REQUEST['idpackage'];
        $namepackage = $_REQUEST['namepackage'];
        $range = $_REQUEST['rangepackage'];
		$price = $_REQUEST['price'];
		$kategori = $_REQUEST['kategori'];
		$id_user = $_SESSION['id_user'];

		$sql = mysqli_query($koneksi, "UPDATE tbl_package SET name_package='$namepackage', range_package='$range', price='$price', id_paket='$kategori' WHERE id_package='$idpackage'");

		if($sql == true){
			header('Location: ./admin.php?hlm=package');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
		$idpackage = $_REQUEST['idpackage'];
		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_package WHERE id_package='$idpackage'");
		while($row = mysqli_fetch_array($sql)){
?>
<div class="row">
		<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					Edit Data Package
				</div>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="no_nota" class="col-sm-2 control-label">Id Package</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="Id Package" value="<?php echo $row['id_package']; ?>"name="id_packet" placeholder="Id Paket" readonly>
		</div>
	</div>
    <!-- <div class="form-group">
		<label for="no_nota" class="col-sm-2 control-label">Id User</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="Id User" value="<?php echo $row['id_user']; ?>"name="id_user" placeholder="Id User" readonly>
		</div>
	</div> -->
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis Paket</label>
		<input type="hidden" name="idpackage" value="<?php echo $row['id_package']; ?>">
		<div class="col-sm-3">
			<select name="kategori" class="form-control" required>
				<option value="<?php echo $row['id_paket']; ?>">Pilih Paket</option>
			<?php
				$q = mysqli_query($koneksi, "SELECT * FROM tbl_paket");
				while($paket=mysqli_fetch_array($q)){
					echo '<option value="'.$paket['id_paket'].'">'.$paket['name_paket'].'</option>';
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="bayar" class="col-sm-2 control-label">Nama Package</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="namepackage" name="namepackage" value="<?php echo $row['name_package']; ?>" placeholder="Isi dengan Nama Package" required>
		</div>
	</div>
	<div class="form-group">
		<label for="kembali" class="col-sm-2 control-label">Range</label>
		<div class="col-sm-3">
			<input type="rangepackage" class="form-control" id="rangepackage" name="rangepackage" value="<?php echo $row['range_package']; ?>" placeholder="Range" required>
		</div>
	</div>
	<div class="form-group">
		<label for="total" class="col-sm-2 control-label">Price</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" placeholder="Harga" required>
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
}
?>
