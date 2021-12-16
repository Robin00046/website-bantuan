<?php 
if(isset($_POST['tambahkan']))
  {
    include('koneksi.php');
      $nama = $_POST['nm_bantuan'];
      $des = $_POST['des'];

      $input = mysql_query("INSERT INTO jns_bantuan (nm_bantuan,des)
       VALUES('$nama','$des')") or die(mysql_error());
      if($input)
        {
          echo 'Data berhasil di tambahkan! '; 
          echo '<a href="jns_bantuan.php">Kembali</a>';
         }
      else
        { 
          echo 'Gagal menambahkan data! '; 
          echo '<a href="jns_bantuan.php">Kembali</a>';
        } 
  }
else
  {
    echo '<script>window.history.back()</script>';  
  } 
?>
