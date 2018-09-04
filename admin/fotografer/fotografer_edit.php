<?php
if( empty( $_SESSION['id_user'] )  ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else if( !empty( $_SESSION['id_user'] ) && ($_SESSION['level'] ==1) ){

	if( isset( $_REQUEST['submit'] )){

		$idfotografer = $_REQUEST['idfotografer'];
        $namefotografer = $_REQUEST['namefotografer'];
        $notlp	 = $_REQUEST['notlp'];
		$email = $_REQUEST['email'];
		

		$sql = mysqli_query($koneksi, "UPDATE tbl_fotografer SET name_fotografer='$namefotografer', no_telp	='$notlp', email='email' WHERE id_fotografer='$idfotografer'");

		if($sql == true){
			header('Location: ./admin.php?hlm=fotografer');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
		$idfotografer = $_REQUEST['idfotografer'];
		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_fotografer WHERE id_fotografer='$idfotografer'");
		while($row = mysqli_fetch_array($sql)){
?>
<div class="row">
		<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					Edit Data fotografer
				</div>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="no_nota" class="col-sm-2 control-label">Id fotografer</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="Id fotografer" value="<?php echo $row['id_fotografer']; ?>"name="id_packet" placeholder="Id Paket" readonly>
		</div>
	</div>
    <!-- <div class="form-group">
		<label for="no_nota" class="col-sm-2 control-label">Id User</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="Id User" value="<?php echo $row['id_user']; ?>"name="id_user" placeholder="Id User" readonly>
		</div>
	</div> -->

	<div class="form-group">
		<label for="bayar" class="col-sm-2 control-label">Nama fotografer</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="namefotografer" name="namefotografer" value="<?php echo $row['name_fotografer']; ?>" placeholder="Isi dengan Nama fotografer" required>
		</div>
	</div>
	<div class="form-group">
		<label for="notlp" class="col-sm-2 control-label">No Telpon</label>
		<div class="col-sm-3">
			<input type="notlp" class="form-control" id="notlp" name="notlp" value="<?php echo $row['no_telp']; ?>" placeholder="No Telpon" required>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="email" required>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=fotografer" class="btn btn-danger">Batal</a>
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
