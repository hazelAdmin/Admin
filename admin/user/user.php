<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if ($_SESSION['level']!=1){ 
		header('Location: ./');
		die();
	}

	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'user_baru.php';
				break;
			case 'edit':
				include 'user_edit.php';
				break;
			case 'hapus':
				include 'user_hapus.php';
				break;
		}
	} else {

		echo '

		<div class="row">
		<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					Data User
				</div>
				<div class="panel-body">
					<div class="table-responsive">
					<a href="admin.php?hlm=user&aksi=baru"  class="btn btn-success" style="margin-bottom: 7px; "><i class="fa fa-plus"></i>Tambah Data</a>
						<table class="table table-striped table-bordered table-hover" id="example">
				 <thead>
				   <tr class="info" >
					 <th>No</th>
					 <th >Username</th>
					 <th >Nama</th>
					 <th >Level</th>
					 <th >Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM user");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['username'].'</td>
					 <td>'.$row['nama'].'</td>
					 <td>';

					 if($row['level'] == 1){
						 echo 'Admin';
					 } else {
						 echo 'User Biasa';
					 }

					 echo'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus user ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>
					<center>
					 <a href="?hlm=user&aksi=edit&id_user='.$row['id_user'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=user&aksi=hapus&submit=yes&id_user='.$row['id_user'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
					</center>
					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=user&aksi=baru">Tambah user baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>

			<a href="./laporan/laporan_user_pdf.php" target="blank" class="btn btn-default" style="margin-top: 8px;"><i class="fa fa-print"></i>ExportToPdf</a>

		</div>
		<div class="panel-footer">
			<i><center>Hazel Photo House
			</div>
		</div>
	</div>
</div';
	}
}
?>
