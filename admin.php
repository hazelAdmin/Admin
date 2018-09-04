<?php
session_start();
if( empty( $_SESSION['id_user'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cashier Hazel Photo House</title>
    <!-- Bootstrap core CSS -->
	     <!-- Bootstrap core CSS -->
	
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

	<style type="text/css">
	body {
	  min-height: 200px;
	  padding-top: 70px;
	}
   @media print {
	   .container {
		   margin-top: -30px;
	   }
	   #tombol,
      .noprint {
         display: none;
      }
   }
	</style>

  </head>

  <body>

    <?php include "menu.php"; ?>

    <div class="container">

	<?php
	if( isset($_REQUEST['hlm'] )){

		$hlm = $_REQUEST['hlm'];

		switch( $hlm ){
			case 'transaksi':
				include "transaksi/transaksi.php";
				break;
			case 'laporan':
				include "laporan.php";
				break;
			case 'user':
				include "admin/user/user.php";
				break;
			case 'biaya':
				include "admin/biaya/biaya.php";
				break;
			case 'cetak':
				include "cetak_nota.php";
				break;
			case 'package':
				include "admin/package/package.php";
				break;
			case 'extras' :
				include "admin/extras/extras.php";
				break;
			case 'fotografer' :
				include "admin/fotografer/fotografer.php";
				break;
		}
	} else {
	?>
      <!-- Main component for a primary marketing message or call to action -->
	  
      <div class="jumbotron">
        <h2>Selamat Datang di Hazel Photo House</h2>

        <p>Halo <strong><?php echo $_SESSION['nama']; ?></strong>, Anda login sebagai
			<strong>
			<?php
				if($_SESSION['level'] == 1){
					echo 'Admin.';
				} else {
						echo 'Petugas Kasir.';
				}
			?>
			</strong>
		</p>
      </div>
	<?php
	}
	?>
    </div>    <!-- Containergit 
	 -->


  


   <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- DATA TABLE SCRIPTS -->
	<script src="assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>		
	<script>
  				$(document).ready(function () {
    				$('#example').dataTable();
  				});
	</script>

  </body>

</html>
<?php
}
?>
