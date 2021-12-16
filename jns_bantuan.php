<!DOCTYPE html>
<html>
	<head> <title>Tampil Jenis Bantuan</title> 
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
	
	 <h2 class="FONT"><center><b>DATA JENIS BANTUAN</b></center></h2>
        <hr/>
	
		<form action="hapus_jns_bantuan.php" method="post">
				<div class="container">
		<table class="table table-striped" >
				<thead><tr><th>NO</th><th>Jenis Bantuan</th><th>Deskripsi</th></tr></thead>
				<tbody>
				<?php
				$sql = "SELECT nm_bantuan,des from jns_bantuan";
				$result = mysql_query($sql) or die("test Invalid query: " .mysql_error());
				$no=0;
			while ($row = mysql_fetch_array($result))
			{ $no++; ?>

				<tr>
					<td align="left" > <?php echo $no;?> </td>
					<td align="left" > <?php echo $row['nm_bantuan'];?> </td>
					<td align="left" > <?php echo $row['des'];?> </td>
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
