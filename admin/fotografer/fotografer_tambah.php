<?php
if( empty( $_SESSION['id_user'] )  ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

        $namefotografer = $_REQUEST['namefotografer'];
        $notlp= $_REQUEST['notlp'];
		$email = $_REQUEST['email'];
		
		//koneksi ke tabel fotografer
		$sql = mysqli_query($koneksi, "INSERT INTO tbl_fotografer(name_fotografer, no_telp, email) VALUES('$namefotografer', '$notlp', '$email')");
		if($sql == true){
			header('Location: ./admin.php?hlm=fotografer');
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
					 Tambah Data fotografer
			</div>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="namefotografer" class="col-sm-2 control-label">Name fotografer</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="namefotografer" name="namefotografer" placeholder="Name fotografer" required>
		</div>
	</div>
	<div class="form-group">
		<label for="notlp" class="col-sm-2 control-label">No Telpon</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="range" name="notlp" placeholder="No Telpon/Handphone" required>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="email" name="email" placeholder="email" required>
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
?>
