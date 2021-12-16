<?php
   include('koneksi.php');
   $cekbox = $_POST['cekbox'];
	 if ($cekbox) 
	{
	     echo 'Data Penduduk dengan Nomor Urut Rumah Tangga : ';
	     foreach ($cekbox as $value) {
	         mysql_query("DELETE FROM bdt WHERE no_urut_rt = '$value'");
		         echo $value;
		         echo " , ";
	   			 }
	     echo " berhasil dihapus </br>";
	     echo '<a href="penduduk.php">Kembali ke tabel</a>';
	 }  else {
	     echo '<script>alert("anda belum memilih data.");
		 window.location="penduduk.php"</script>';
		} 
?> 
