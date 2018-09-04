<?php
if( empty( $_SESSION['id_user'] )  ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else if( !empty( $_SESSION['id_user'] ) && ($_SESSION['level'] ==1) ){

	if( isset( $_REQUEST['submit'] )){

		$idextras = $_REQUEST['idextras'];
        $nameextras = $_REQUEST['nameextras'];
		$price = $_REQUEST['price'];
		$kategori = $_REQUEST['kategori'];
		$id_user = $_SESSION['id_user'];

		$sql = mysqli_query($koneksi, "UPDATE tbl_extras SET name_extras='$nameextras', price='$price', id_paket='$kategori' WHERE id_extras='$idextras'");

		if($sql == true){
			header('Location: ./admin.php?hlm=extras');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$idextras = $_REQUEST['idextras'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_extras WHERE id_extras='$idextras'");
		while($row = mysqli_fetch_array($sql)){

?>
<div class="row">
		<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					Edit Data Extras
				</div>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="no_nota" class="col-sm-2 control-label">Id extras</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="Id extras" value="<?php echo $row['id_extras']; ?>"name="id_packet" placeholder="Id Paket" readonly>
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
		<input type="hidden" name="idextras" value="<?php echo $row['id_extras']; ?>">
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
		<label for="bayar" class="col-sm-2 control-label">Nama extras</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nameextras" name="nameextras" value="<?php echo $row['name_extras']; ?>" placeholder="Isi dengan Nama extras" required>
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
			<a href="./admin.php?hlm=extras" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<div class="panel-footer">
	<i><center>Hazel Photo House
</div>
</div>
</div>
<?php
	}
	}
}
?>
