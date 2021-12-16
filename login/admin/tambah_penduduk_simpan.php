<?php 
if(isset($_POST['tambahkan']))
  {
    include('koneksi.php');
      $id = $_POST['no_urut_rt'];
      $ktp = $_POST['nik'];
      $nama = $_POST['nama'];
      $jk = $_POST['jk'];
      $alamat = $_POST['alamat'];
      $kel = $_POST['kel'];
      $kec = $_POST['kec'];
      $kota = $_POST['kota'];
      $prov = $_POST['prov'];
      $lok = $_POST['lokasi'];

      $input = mysql_query("INSERT INTO bdt (no_urut_rt, nik, nama, jk, alamat, kel, kec, kota, prov, lokasi)
       VALUES('$id','$ktp','$nama','$jk','$alamat','$kel','$kec','$kota','$prov','$lok')") or die(mysql_error());
      if($input)
        {
          echo 'Data berhasil di tambahkan! '; 
          echo '<a href="penduduk.php">Kembali</a>';
         }
      else
        { 
          echo 'Gagal menambahkan data! '; 
          echo '<a href="penduduk.php">Kembali</a>';
        } 
  }
else
  {
    echo '<script>window.history.back()</script>';  
  } 
?>
