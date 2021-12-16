<?php
   include('koneksi.php');
   $cekbox = $_POST['cekbox'];
	 if ($cekbox) 
	{
	     echo 'Data Penerima Bantuan berhasil dihapus ';
	     foreach ($cekbox as $value) {
	         mysql_query("DELETE FROM mdpt_bantuan WHERE id_mdpt_bantuan = '$value'");
	   			 }
	     echo '<a href="menerima_bantuan.php">Kembali ke tabel</a>';
	 }  else {
	     echo '<script>alert("anda belum memilih data.");
		 window.location="menerima_bantuan.php"</script>';
		} 
?> 
