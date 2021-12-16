<?php 

$id = $_GET['id'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$no="";
$nik="";
$nama="";
$jk="";
$almt="";
$kel="";
$kec="";
$kot="";
$prov="";
$lok="";
foreach($obj->results as $item){
  $no.=$item->no_urut_rt;
  $nik.=$item->nik;
  $nama.=$item->nama;
  $jk.=$item->jk;
  $almt.=$item->alamat;
  $kel.=$item->kel;
  $kec.=$item->kec;
  $kot.=$item->kota;
  $prov.=$item->prov;
  $lok.=$item->lokasi;
}
 ?>
          <table class="table">
            <script type="text/javascript" src="chartjs/Chart.js"></script>
              	<link href="bs/bootstrap.min.css" rel="stylesheet" type="text/css">
               <tr>
                   
               </tr>
               <tr>
                 <td>Nomor Urut Rumah Tangga</td>
                 <td>:</td>
                 <td><?php echo $no ?></td>
                 <td>           </td>
                 <td align="center">Wilayah Kramat Selatan</td>
               </tr>
               <tr>
                 <td>NIK</td>
                 <td>:</td>
                 <td><?php echo $nik ?></td>
                 <td>            </td>
                 <td rowspan="8"><script>
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
  </script></td>
               </tr>
               <tr>
                 <td>Nama</td>
                 <td>:</td>
                 <td><?php echo $nama ?></td>
               </tr>
               <tr>
                 <td>Jenis Kelamin</td>
                 <td>:</td>
                 <td><?php echo $jk?></td>
               </tr>
               <tr>
                 <td>Alamat</td>
                 <td>:</td>
                 <td><?php echo $almt?></td>
               </tr>
                <tr>
                 <td>Kelurahan</td>
                 <td>:</td>
                 <td><?php echo $kel ?></td>
               </tr>
                <tr>
                 <td>Kecamatan</td>
                 <td>:</td>
                 <td><?php echo $kec ?></td>
               </tr>
               <tr>
                 <td>Kota</td>
                 <td>:</td>
                 <td><?php echo $kot ?></td>
               </tr>
               <tr>
                 <td>Provinsi</td>
                 <td>:</td>
                 <td><?php echo $prov ?></td>
               </tr>
               <tr>
                 <td>Lokasi</td>
                 <td>:</td>
                 <td><a href="<?php echo $lok  ?>" target="_blank"> <button class="btn btn-success" type="button" style="font: bold 14px gotham; color: #ffffff;">Google Maps</button></a></td>
               </tr>
              
             </table>