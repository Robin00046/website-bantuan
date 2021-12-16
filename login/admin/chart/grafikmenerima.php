<!DOCTYPE html>
<html>
<head>
	<title>grafik</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
	<style type="text/css">
    </style>
    <link href="style.css" rel="stylesheet" type="text/css"> 
    <link href="bs/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h2 class="FONT"><center><b>Pie Chart Dan Histogram Penerima Bantuan</b></center></h2>
        <hr/>
	<?php 
	include 'koneksi.php';
	?><h4 align="left" class="container">Cari  </h4>
	<form class="form-inline" method="get" action="cari_grafik_menerima.php">
	    	<p align="left" class="container" > 

	    	<select class="form-control" name="bantuan">
			<option value="" selected="">--- Pilih ---</option>
			<?php 
				$query = "SELECT nm_bantuan FROM jns_bantuan";
				$hasil = mysql_query($query);
				while ($data = mysql_fetch_array($hasil))
					{
						echo "<option value=".$data['nm_bantuan'].">".$data['nm_bantuan']."</option>";
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

	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>


	
	<div style="width: 600px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
	<br/>
	<div style="width: 550px;margin: 0px auto;">
		<canvas id="myChart1"></canvas>
	</div>
	<br/>
	<div style="width: 550px;margin: 0px auto;">
		<canvas id="myChart2"></canvas>
	</div>
	
	<br/>
<script>
		<?php 
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "kramatselatan";
$koneksi    = mysqli_connect($host, $user, $password, $database);
?>
		var ctx = document.getElementById("myChart").getContext('2d');

		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["2017","2018","2019","2020","2021"],
				datasets: [{
					label: 'Data Penerima Bantuan Pertahun',
					data: [
					<?php 
					$jumlah_2017 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2017'");
					echo mysqli_num_rows($jumlah_2017);
					?>,
					<?php 
					$jumlah_2018 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2018'");
					echo mysqli_num_rows($jumlah_2018);
					?>, 
					<?php 
					$jumlah_2019 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2019'");
					echo mysqli_num_rows($jumlah_2019);
					?>,
					<?php 
					$jumlah_2020 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2020'");
					echo mysqli_num_rows($jumlah_2020);
					?>,
					<?php 
					$jumlah_2021 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2021'");
					echo mysqli_num_rows($jumlah_2021);
					?>
					],
					backgroundColor: [
					'darkred',
					'Coral',
					'cyan',
					'Brown'
					],
					borderColor: [
					'lime',
					'lime',
					'lime',
					'lime'
					],
					borderWidth: 1
				}]
			},
options : {
	title:{
		display:true,
		text:'Histogram',
		fontColor:"#000000",
		fontSize: 16
	},
      scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Jumlah Penerima Bantuan',
            fontColor: "#000000",
            fontSize: 14
          }
        }],
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Tahun',
            fontColor: "#000000",
            fontSize: 16
          }
        }],
      }
    }
		});

	</script>
	<script>
		var ctx = document.getElementById("myChart1").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["2017","2018","2019","2020","2021"],
				datasets: [{
					label: 'Data Penerima Bantuan Pertahun',
					data: [
					<?php 
					$jumlah_2017 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2017'");
					echo mysqli_num_rows($jumlah_2017);
					?>,
					<?php 
					$jumlah_2018 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2018'");
					echo mysqli_num_rows($jumlah_2018);
					?>, 
					<?php 
					$jumlah_2019 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2019'");
					echo mysqli_num_rows($jumlah_2019);
					?>,
					<?php 
					$jumlah_2020 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2020'");
					echo mysqli_num_rows($jumlah_2020);
					?>,
					<?php 
					$jumlah_2021 = mysqli_query($koneksi,"select * from mdpt_bantuan where YEAR(thn)='2021'");
					echo mysqli_num_rows($jumlah_2021);
					?>
					],
					backgroundColor: [
					'wheat',
					'Grey',
					'Peru',
					'Lightgreen'
					],
					borderColor: [
					'lime',
					'lime',
					'lime',
					'lime'
					],
					borderWidth: 1
				}]
			},
			
			options: {
				title:{
		display:true,
		text:'Pie Chart Data Pertahun',
		fontColor:"#000000",
		fontSize: 16
	},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script></tr>
	<tr> <script>
		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
		title:{
		display:true,
		text:'Histogram',
		fontColor:"#000000",
		fontSize: 16
			},
				labels: ["Beras","PKH","Bedah Rumah"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_1 = mysqli_query($koneksi,"select * from mdpt_bantuan where id_jns_bantuan='1'");
					echo mysqli_num_rows($jumlah_1);
					?>, 
					<?php 
					$jumlah_2 = mysqli_query($koneksi,"select * from mdpt_bantuan where id_jns_bantuan='2'");
					echo mysqli_num_rows($jumlah_2);
					?>,
					<?php 
					$jumlah_3 = mysqli_query($koneksi,"select * from mdpt_bantuan where id_jns_bantuan='3'");
					echo mysqli_num_rows($jumlah_3);
					?>
					],
					backgroundColor: [
					'wheat',
					'Grey',
					'Peru',
					'Lightgreen'
					],
					borderColor: [
					'lime',
					'lime',
					'lime',
					'lime',
					'lime'
					],
					borderWidth: 1
				}]
			},
			options: {
				title:{
			display:true,
			text:'Pie Chart Bentuk Penerima bantuan',
		fontColor:"#000000",
		fontSize: 16
			},
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
	
</body>
</html>