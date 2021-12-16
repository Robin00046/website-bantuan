<!DOCTYPE html>
	<html>
		<head> <title>Tambah Mendapat Bantuan</title> </head>
		<link href="bs/bootstrap.min.css" rel="stylesheet" type="text/css">
			<body>
     		<legend>Form Edit Data Penduduk</legend>
            <?php
                 include('koneksi.php');
            ?> 
				<form method="post" action="tambah_menerima_bantuan_simpan.php"><br>
			<table cellpadding="3" cellspacing="0" >
			<tr><td>Nama Penduduk</td> <td>:</td> <td>
<select class="form-control" name="no">
<option value="" selected="selected">--- Pilih ---</option><?php
// query untuk menampilkan semua mata pelajaran dari tabel 
$query = "SELECT * FROM bdt";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
echo "<option value='".$data['no']."'>".$data['nama']."</option>";
}
?>
</select></td></tr></td></tr>
<tr><td>Jenis Bantuan</td> <td>:</td> <td>
<select class="form-control" name="id_jns_bantuan">
<option value="" selected="">--- Pilih ---</option>
<?php
// query untuk menampilkan semua mata pelajaran dari tabel 
$query = "SELECT * FROM jns_bantuan";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
echo "<option value='".$data['id_jns_bantuan']."'>".$data['nm_bantuan']."</option>";
}
?>
</select>
</td>
</tr>
			<tr><td>&nbsp;</td>	<td></td> <td><input class="btn btn-success"  type="submit" name="tambahkan" value="Tambah">
				<a href="menerima_bantuan.php"> <input class="btn btn-success" type='button' value='Kembali'></a> </td> </tr>
			</table>	
			</form>
			<script src="jquery.min.js"></script>
				<script src="jquery.maskedinput.js"></script>
				<script>
					jQuery(function($){
						$("#waktu").mask("99.99 - 99.99");
					});
				</script>
		</body>
	</html>