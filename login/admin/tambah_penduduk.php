<!DOCTYPE html>
	<html>
		<head> <title>Tambah Data Penduduk</title> </head>
		<link href="bs/bootstrap.min.css" rel="stylesheet" type="text/css">
			<body>
     		<legend>Form Data Penduduk</legend>
				<form method="post" action="tambah_penduduk_simpan.php"><br>
			<table cellpadding="3" cellspacing="0" >
			<tr><td>No Urut Rumah Tangga</td> <td>:</td> <td><input class="form-control" type="text" name="no_urut_rt"></td></tr>
			<tr><td>NIK</td> <td>:</td> <td><input class="form-control" type="text" name="nik"></td></tr>
			<tr><td>Nama</td> <td>:</td> <td><input class="form-control" type="text" name="nama"></td></tr>
			<tr><td>Jenis Kelamin</td> <td>:</td> <td><select class="form-control" type="text" name="jk" selected="selected">
      			<option>L</option>
      			<option>P</option>
      		</select></td></tr>
			<tr><td>Alamat</td> <td>:</td> <td><textarea class="form-control" type="text" name="alamat" rows="3"></textarea></td></tr>
			<tr><td>Kelurahan</td> <td>:</td> <td><input class="form-control" type="text" name="kel" value="KRAMAT SELATAN"></td></tr>
			<tr><td>Kecamatan</td> <td>:</td> <td><input class="form-control" type="text" name="kec" value="MAGELANG UTARA"></td></tr>
			<tr><td>Kota</td> <td>:</td> <td><input class="form-control" type="text" name="kota" value="KOTA MAGELANG"></td></tr>
			<tr><td>Provinsi</td> <td>:</td> <td><input class="form-control" type="text" name="prov" value="JAWA TENGAH"></td></tr>
			<tr><td>Link Lokasi</td> <td>:</td> <td><textarea class="form-control" type="text" name="lokasi" rows="2"></textarea></td></tr>
			<tr><td>&nbsp;</td>	<td></td> <td><input class="btn btn-success"  type="submit" name="tambahkan" value="Tambah">
				<a href="penduduk.php"> <input class="btn btn-success" type='button' value='Kembali'></a> </td> </tr>
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
