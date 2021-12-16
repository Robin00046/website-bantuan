<!DOCTYPE html>
<html>
	<head> <title>Tampil Data Penduduk</title> 
		<script type="text/javascript" src="chartjs/Chart.js"></script>
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

		<form action="hapus_penduduk.php" method="post">
			<p class="container" align="center">
				<input class="btn btn-success" type="button" onclick="cek(this.form.cekbox)" value="Select All"  />
		        <input class="btn btn-success" type="button" onclick="uncek(this.form.cekbox)" value="Clear All"  /> 
		        <input class="btn btn-success" type="submit" value="Hapus" name="submit"onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"/>
	    	</p>

		<div class="container">
		<table class="table table-striped">
				<thead><tr><th>NO</th><th>Cek</th><th>NO URUT RUMAH TANGGA</th> <th>NIK</th> <th>NAMA</th> <th>JENIS KELAMIN</th> <th>ALAMAT</th> <th>KELURAHAN</th> <th>KECAMATAN</th>  <th>Aksi</th></tr></thead> 
				<tbody>
				<?php
				$sql = "SELECT no_urut_rt, nik,  nama, jk, alamat, kel, kec from bdt";
				$result = mysql_query($sql) or die("test Invalid query: " .mysql_error());
				$no=0;
			while ($row = mysql_fetch_array($result))
			{ $no++; ?>

				<tr>
					<td align="center" > <?php echo $no;?> </td>
					<td align="center"><input type="checkbox" id="cekbox" name="cekbox[]" value="<?php echo $row['no_urut_rt'] ?>"/></td>
					<td align="center" > <?php echo $row['no_urut_rt'];?> </td>
					<td align="left" > <?php echo $row['nik'];?> </td>
					<td align="left" > <?php echo $row['nama'];?> </td>
					<td align="left" > <?php echo $row['jk'];?> </td>
					<td align="left" > <?php echo $row['alamat'];?> </td>
					<td align="left" > <?php echo $row['kel'];?> </td>
					<td align="left" > <?php echo $row['kec'];?> </td>
					<td> <a href="edit_penduduk.php?id=<?php echo $row['no_urut_rt'];?>"> Edit </a>
					<td><a href="detail.php?id=<?php echo $row['no_urut_rt'];?>"> Detail </a>
				</tr> 
			<?php 
			} 
			?>
			</tbody>
		</table>
		</div>
    </from>
    			<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Laki-laki", "Perempuan"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_laki = mysqli_query($koneksi,"select * from bdt where jenis_kelamin='L'");
					echo mysqli_num_rows($jumlah_laki);
					?>, 
					<?php 
					$jumlah_perempuan = mysqli_query($koneksi,"select * from bdt where jenis_kelamin='P'");
					echo mysqli_num_rows($jumlah_perempuan);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
            <script> 
			function cek(cekbox){
     		for(i=0; i < cekbox.length; i++){
         		cekbox[i].checked = true;
     			}
 			}
 			function uncek(cekbox){
     		for(i=0; i < cekbox.length; i++){
         		cekbox[i].checked = false;
     			}
 			} 
		</script>
	</body> 
</html>
