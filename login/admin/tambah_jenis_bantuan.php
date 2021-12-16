<!DOCTYPE html>
	<html>
		<head> <title>Tambah Data Jenis Bantuan</title> </head>
		<link href="bs/bootstrap.min.css" rel="stylesheet" type="text/css">
			<body>
     		<legend>Form Data Jenis Bantuan</legend>
				<form method="post" action="tambah_jenis_bantuan_simpan.php"><br>
			<table cellpadding="3" cellspacing="0" >
			<tr><td>Nama Bantuan</td> <td>:</td> <td><input class="form-control" type="text" name="nm_bantuan"></td></tr>
			<tr><td>Deskripsi Bantuan</td> <td>:</td> <td><textarea class="form-control" type="text" name="des" rows="3"></textarea></td></tr>
			<tr><td>&nbsp;</td>	<td></td> <td><input class="btn btn-success"  type="submit" name="tambahkan" value="Tambah">
				<a href="jns_bantuan.php"> <input class="btn btn-success" type='button' value='Kembali'></a> </td> </tr>
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
