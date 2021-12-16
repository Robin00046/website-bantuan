<?php 
if(isset($_POST['tambahkan']))
  {
    include('koneksi.php');
      $nmr = $_POST['no'];
      $id_jns_bantuan = $_POST['id_jns_bantuan'];

      $input = mysql_query("INSERT INTO mdpt_bantuan (no, id_jns_bantuan)
       VALUES('$nmr','$id_jns_bantuan')") or die(mysql_error());
      if($input)
        {
          echo 'Data berhasil di tambahkan! '; 
          echo '<a href="menerima_bantuan.php">Kembali</a>';
         }
      else
        { 
          echo 'Gagal menambahkan data! '; 
          echo '<a href="menerima_bantuan.php">Kembali</a>';
        } 
  }
else
  {
    echo '<script>window.history.back()</script>';  
  } 
?>
