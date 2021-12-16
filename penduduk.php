<!DOCTYPE html>
<html>
	<head> <title>Tampil Data Penduduk</title> 
	<style type="text/css">
	</style>
	<link href="style.css" rel="stylesheet" type="text/css"> 
    <link href="bs/bootstrap.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php 
	include "koneksi.php"; 
	?>
	<fieldset><font face="Century Gothic"><b>
	
	 <h2 class="FONT"><center><b>DATA PENDUDUK KURANG MAMPU</b></center></h2>
        <hr/>

		<form class="form-inline" method="get" action="cari_penduduk.php">
			<p class="container" align="left">
            &nbsp; Cari : &nbsp;<input class="form-control" type="text" name="q">&nbsp; <button class="btn btn-dark" type="submit">Search</button>
    		</p>
        </form>

		<form  method="post">
			
		<div class="container">
		<table class="table table-striped">
				<thead><tr><th>NO</th><th>NO URUT RUMAH TANGGA</th> <th>NIK</th> <th>NAMA</th> <th>JENIS KELAMIN</th> <th>ALAMAT</th> <th>KELURAHAN</th> <th>KECAMATAN</th>  <th>Aksi</th></tr></thead> 
				<tbody>
				<?php
				$sql = "SELECT no_urut_rt, nik,  nama, jk, alamat, kel, kec from bdt";
				$result = mysql_query($sql) or die("test Invalid query: " .mysql_error());
				$no=0;
			while ($row = mysql_fetch_array($result))
			{ $no++; ?>

				<tr>
					<td align="center" > <?php echo $no;?> </td>
					<td align="center" > <?php echo $row['no_urut_rt'];?> </td>
					<td align="left" > <?php echo $row['nik'];?> </td>
					<td align="left" > <?php echo $row['nama'];?> </td>
					<td align="left" > <?php echo $row['jk'];?> </td>
					<td align="left" > <?php echo $row['alamat'];?> </td>
					<td align="left" > <?php echo $row['kel'];?> </td>
					<td align="left" > <?php echo $row['kec'];?> </td>
					<td><a href="detail.php?id=<?php echo $row['no_urut_rt'];?>"> Detail </a>
				</tr> 
			<?php 
			} 
			?>
			</tbody>
		</table>
		</div>
    </from>
	</body> 
</html>
