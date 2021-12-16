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
                 <td rowspan="8"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7912.273073791903!2d110.21405557400503!3d-7.450142978501398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a85c3e7df6cc9%3A0xef8a76b8a953f6da!2sKramat+Sel.%2C+Kec.+Magelang+Utara%2C+Kota+Magelang%2C+Jawa+Tengah!5e0!3m2!1sid!2sid!4v1565074996120!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></td>
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