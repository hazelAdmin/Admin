<?php
    if( !empty( $_SESSION['id_user'] ) ){
    include "koneksi.php";
?>
<!-- Fixed navbar -->
<!-- Sugih Purnama-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
		<!-- Judul dan Logo Hazel -->
	  <a class="navbar-brand" href="" ><img src="beranda.png" width="30" height="20" style="float:left; margin:0 3px 5px 0"/>Cashier Hazel Photo House</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li><a href="./admin.php">Beranda</a></li>
		<li><a href="./admin.php?hlm=transaksi">Transaksi</a></li>
        <li><a href="?hlm=laporan">Laporan</a></li>

        <?php
        if( $_SESSION['level'] == 1 ){
        ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li><a href="./admin.php?hlm=biaya">Data Kategori Paket</a></li>
			<li><a href="./admin.php?hlm=package">Data Package</a></li>
			<li><a href="./admin.php?hlm=extras">Data Extras</a></li>
			<li><a href="./admin.php?hlm=fotografer">Data Fotografer</a></li>
			<li><a href="./admin.php?hlm=user">Data User</a></li>
			<?php
			}
			?>
		  </ul>
		</li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<!-- tambahan waktu alfian -->
		<a class="navbar-brand navbar-left" data-toggle="dropdown" href="#" style="margin:0 0px 0px 0"><?php date_default_timezone_set("Asia/Jakarta"); echo date('d F Y ', time()); ?> &nbsp;</a>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		
			<?php echo $_SESSION['nama']; ?> <b class="caret"></b>
		  </a>
		  <ul class="dropdown-menu">
			<li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</div>
<?php
} else {
	header("Location: ./");
	die();
}
?>
