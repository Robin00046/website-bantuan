<?php
   include('koneksi.php');
   $cekbox = $_POST['cekbox'];
	 if ($cekbox) 
	{
	     echo 'Data Jenis Bantuan ';
	     foreach ($cekbox as $value) {
	         mysql_query("DELETE FROM jns_bantuan WHERE nm_bantuan = '$value'");
		         echo $value ;
	   			 }
	     echo " berhasil dihapus </br>";
	     echo '<a href="jns_bantuan.php">Kembali ke tabel</a>';
	 }  else {
	     echo '<script>alert("anda belum memilih data.");
		 window.location="jns_bantuan.php"</script>';
		} 
?> 
