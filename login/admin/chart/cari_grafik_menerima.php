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
        <h2 class="FONT"><center><b>Pie Chart Dan Histogram Penerima Bantuan</b></center></h2>
        <hr/>
    <?php 
    include "koneksi.php"; 
    ?>

    <fieldset><font face="Century Gothic"><b>
    
        <hr/>
<h4 align="left" class="container">Cari </h4>
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

        <form >
    <?php
        if(isset($_GET['bantuan']) && $_GET['thn']){
        $conn = mysql_connect("localhost", "root", "");
        mysql_select_db("kramatselatan");
        $qcari1 = $_GET['bantuan'];
        $qcari2 = $_GET['thn'];
        $sql = "select nm_bantuan, year(thn) from jns_bantuan
        INNER JOIN mdpt_bantuan ON jns_bantuan.id_jns_bantuan = mdpt_bantuan.id_jns_bantuan
        INNER JOIN bdt ON mdpt_bantuan.no = bdt.no
        WHERE nm_bantuan like '%$qcari1%' AND thn like '%$qcari2%'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            ?>
            <div class="container">
        <table class="table table-striped" >
            <?php
                $no=0;
            while ($row = mysql_fetch_array($result))
            {  ?>
<h2> <center> <?php echo 'Tahun Menerima '. $row['year(thn)'];?> </center> </h2>
<h2> <center> <?php echo 'Bentuk Bantuan '. $row['nm_bantuan'];?> </center> </h2>
 
            <?php 
            } 
            ?>
            </tbody>
        </table>
 
            <?php 
            } 
            ?>
            </tbody>
        </table>

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
                    $jumlah = mysqli_query($koneksi,"select * from jns_bantuan
        INNER JOIN mdpt_bantuan ON jns_bantuan.id_jns_bantuan = mdpt_bantuan.id_jns_bantuan
        INNER JOIN bdt ON mdpt_bantuan.no = bdt.no where nm_bantuan like '%$qcari1%' AND thn like '%$qcari2%' ");
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
                    $jumlah_laki = mysqli_query($koneksi,"select * from jns_bantuan
        INNER JOIN mdpt_bantuan ON jns_bantuan.id_jns_bantuan = mdpt_bantuan.id_jns_bantuan
        INNER JOIN bdt ON mdpt_bantuan.no = bdt.no where nm_bantuan like '%$qcari1%' AND thn like '%$qcari2%'");
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
