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
    
     <h2 class="FONT"><center><b>Hasil Cari Pie Chart Dan Histogram Penduduk Kurang Mampu</b></center></h2>
        <hr/>

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
    <?php
        if(isset($_GET['q']) && $_GET['q']){
        $conn = mysql_connect("localhost", "root", "");
        mysql_select_db("kramatselatan");
        $q = $_GET['q'];
        $sql = "SELECT distinct year(tahun) from bdt where tahun like '%$q%'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            ?>
            <div class="container">
        <table class="table table-striped" >
            <?php
                $no=0;
            while ($row = mysql_fetch_array($result))
            {  ?>
<h2> <center> <?php echo 'Tahun Memasukan '. $row['year(tahun)'];?> </center> </h2>
 
            <?php 
            } 
            ?>
            </tbody>
        </table>
    </div>
        <div style="width: 600px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>
    <div style="width: 600px;margin: 0px auto;">
        <canvas id="myChart1"></canvas>
    </div>
        </div>
            <?php
        }else{
            echo 'Data Tidak Ditemukan';
        }
    }
    ?>
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
                labels: [''],
                datasets: [{
                    label: 'Data Tambah Pertahun',
                    data: [
                    <?php 
                    $jumlah = mysqli_query($koneksi,"select year(tahun) from bdt where tahun like '%$q%' ");
                    echo mysqli_num_rows($jumlah);
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
      }
    }
        });
    </script>
    <script>
        var ctx = document.getElementById("myChart1").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [""],
                datasets: [{
                    label: '',
                    data: [
                    <?php 
                    $jumlah_laki = mysqli_query($koneksi,"select  year(tahun) from bdt where tahun like '%$q%' ");
                    echo mysqli_num_rows($jumlah_laki);
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
    </script>
</body></html>
