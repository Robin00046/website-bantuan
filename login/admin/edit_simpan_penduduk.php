<?php
  if(isset($_POST['simpan']))
    {
      include('koneksi.php');
      $id= $_POST['no_urut_rt'];
      $ktp= $_POST['nik'];
      $nama= $_POST['nama'];
      $jk = $_POST['jk'];
      $alamat = $_POST['alamat'];
      $kel = $_POST['kel'];
      $kec = $_POST['kec'];
      $kota = $_POST['kota'];
      $prov = $_POST['prov'];
      $lokasi= $_POST['lokasi'];
                      
      $update = mysql_query("UPDATE bdt SET nik='$ktp', nama='$nama', jk='$jk', alamat='$alamat', kel='$kel', kec='$kec', kota='$kota', prov='$prov', lokasi='$lokasi' WHERE no_urut_rt='$id'") or die(mysql_error());
      if($update)
        {
          echo 'Data berhasil di simpan! ';
          echo '<a href="penduduk.php">Kembali</a>';
        }
      else
        {
          echo 'Gagal menyimpan data! ';
          echo '<a href="penduduk.php">Kembali</a>';
        }
    }
  else
    {
        echo '<script>window.history.back()</script>';
    }
?>  
