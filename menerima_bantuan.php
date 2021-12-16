<!DOCTYPE html>
<html>
	<head> <title>Tampil Menerima Bantuan</title> 
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
	
	 <h2 class="FONT"><center><b>DATA MENERIMA BANTUAN</b></center></h2>
        <hr/>
			
        	<form class="form-inline" method="get" action="cari_menerima_bantuan.php">
			<p class="container" align="left">
            &nbsp;Cari : &nbsp;<input class="form-control" type="text" name="q">&nbsp; <button class="btn btn-dark" type="submit">Search</button>
    		</p>
        	</form>

	    	<form class="form-inline" method="get" action="tampil_menerima_bantuan.php">
	    	<p align=left" class="container" >
			<select class="form-control" name="id_jns_bantuan">
			<option value="" selected="">--- Pilih ---</option>
			<?php 
				$query = "SELECT * FROM jns_bantuan";
				$hasil = mysql_query($query);
				while ($data = mysql_fetch_array($hasil))
					{
						echo "<option value='".$data['id_jns_bantuan']."'>".$data['nm_bantuan']."</option>";
					}
			?>
			</select>   
			<select name="thn" class="form-control">
                <option value="">--- Pilih ---</option>
                <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x >= 2017; $x--) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
                </select></td></tr>
			<button class="btn btn-dark" type="submit">Tampilkan</button>
        	</p></form>

        	<form  method="post">
		
		<div class="container">
		<table  class="table table-striped" >
				<thead><tr><th>NO</th><th>No Urut Rumah Tangga</th><th>Nama Penerima</th><th>Nama Bantuan</th> <th>Tahun Anggaran</th></tr></thead>
				<tbody>
				<?php
				$sql = "SELECT id_mdpt_bantuan, no_urut_rt, nama, nm_bantuan, thn from mdpt_bantuan, bdt, jns_bantuan where bdt.no=mdpt_bantuan.no and jns_bantuan.id_jns_bantuan=mdpt_bantuan.id_jns_bantuan";
				$result = mysql_query($sql) or die("test Invalid query: " .mysql_error());
				$no=0;
			while ($row = mysql_fetch_array($result))
			{ $no++; ?>

				<tr >
					<td align="left" > <?php echo $no;?> </td>
				
					<td align="left" > <?php echo $row['no_urut_rt'];?> </td>
					<td align="left" > <?php echo $row['nama'];?> </td>
					<td align="left" > <?php echo $row['nm_bantuan'];?> </td>
					<td align="left" > <?php echo $row['thn'];?> </td>
				</tr> 
			<?php 
			} 
			?>
			</tbody>
		</table>
		</div>
    </form>
            
	</body> 
</html>