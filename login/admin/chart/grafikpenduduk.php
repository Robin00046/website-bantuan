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
	<h2 class="FONT"><center><b>Pie Chart Dan Histogram Penduduk Kurang Mampu</b></center></h2>
        <hr/>
<?php 
	include 'koneksi.php';
	?>
    <form class="form-inline" method="get" action="cari_grafik_penduduk.php">
	    	<h4 align="left" class="container">Cari Berdasarkan Tahun</h4>
	    	<p align="left" class="container" >

			<select name="q" class="form-control">
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
	<div style="width: 500px;margin: 0px auto;">
		<canvas id="myChart1"></canvas>
	</div>

	
	<br/>
<table class="table table-striped">
	<tr > <script>
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
				labels: ["2019","2020"],
				datasets: [{
					label: 'Data Tambah Pertahun',
					data: [
					<?php 
					$jumlah_2019 = mysqli_query($koneksi,"select * from bdt where YEAR(tahun)='2019'");
					echo mysqli_num_rows($jumlah_2019);
					?>, 
					<?php 
					$jumlah_2020 = mysqli_query($koneksi,"select * from bdt where YEAR(tahun)='2020'");
					echo mysqli_num_rows($jumlah_2020);
					?>,
					<?php 
					$jumlah_2020 = mysqli_query($koneksi,"select * from bdt where YEAR(tahun)='2021'");
					echo mysqli_num_rows($jumlah_2020);
					?>,
					<?php 
					$jumlah_2020 = mysqli_query($koneksi,"select * from bdt where YEAR(tahun)='2022'");
					echo mysqli_num_rows($jumlah_2020);
					?>
					],
					backgroundColor: [
					'darkred',
					'Coral',
					'cyan',
					'Brown'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options : {
	title:{
		display:true,
		text:'Histogram Tambah Data Pertahun',
		fontColor:"#000000",
		fontSize: 16
	},
      scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Jumlah Penduduk',
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
	</script></tr>
	<tr> <script>
		var ctx = document.getElementById("myChart1").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["2019", "2020"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_laki = mysqli_query($koneksi,"select * from bdt where YEAR(tahun)='2019'");
					echo mysqli_num_rows($jumlah_laki);
					?>, 
					<?php 
					$jumlah_perempuan = mysqli_query($koneksi,"select * from bdt where YEAR(tahun)='2020'");
					echo mysqli_num_rows($jumlah_perempuan);
					?>,
					<?php 
					$jumlah_2020 = mysqli_query($koneksi,"select * from bdt where YEAR(tahun)='2021'");
					echo mysqli_num_rows($jumlah_2020);
					?>,
					<?php 
					$jumlah_2020 = mysqli_query($koneksi,"select * from bdt where YEAR(tahun)='2022'");
					echo mysqli_num_rows($jumlah_2020);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				title:{
		display:true,
		text:'Pie Chart Tambah Data Pertahun',
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
</table>

	
</body>
</html>