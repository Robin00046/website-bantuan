<!DOCTYPE html>
<html>
	<head> <title>Tampil Menerima Bantuan</title> 
	<style type="text/css">
	</style>
	<link href="style.css" rel="stylesheet" type="text/css"> 
    <link href="bs/bootstrap.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php 
	include "koneksi.php"; 
	?>
	<fieldset><font face="Century Gothic"><b>
	
	 <h2 class="FONT"><center><b>DATA MENERIMA BANTUAN</b></center></h2>
        <hr/>
			
			<form class="form-inline" method="get" action="cari_menerima_bantuan.php">
			<p class="container" align="left">
            &nbsp;Cari : &nbsp;<input class="form-control" type="text" name="q">&nbsp; <button class="btn btn-dark" type="submit">Search</button>
    		</p>
        	</form>

	    	<form class="form-inline" method="get" action="tampil_menerima_bantuan.php">
	    	<p align="left" class="container" >
			<select class="form-control" name="d">
			<option value="" selected="">--- Pilih ---</option>
			<?php 
				$query = "SELECT * FROM jns_bantuan";
				$hasil = mysql_query($query);
				while ($data = mysql_fetch_array($hasil))
					{
						echo "<option value='".$data['id_jns_bantuan']."'>".$data['nm_bantuan']."</option>";
					}
			?>
			</select>   
			<select name="d" class="form-control">
                <option value="">--- Pilih ---</option>
                <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x >= 2017; $x--) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
                </select></td></tr>
			<button class="btn btn-dark" type="submit">Tampilkan</button>
        	</p></form>

        	<form action="hapus_menerima_bantuan.php" method="post">
			<p align="center" class="container">
				<input class="btn btn-success" type="button" onclick="cek(this.form.cekbox)" value="Select All"  />
		        <input class="btn btn-success" type="button" onclick="uncek(this.form.cekbox)" value="Clear All"  /> 
		        <input class="btn btn-success" type="submit" value="Hapus" name="submit"onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"/>
	    	</p>
    <?php
        if(isset($_GET['q']) && $_GET['q']){
        $conn = mysql_connect("localhost", "root", "");
        mysql_select_db("kramatselatan");
        $q = $_GET['q'];
        $sql = "SELECT 
				mdpt_bantuan.id_mdpt_bantuan,
				bdt.no_urut_rt,
				bdt.nama,
				jns_bantuan.nm_bantuan,
				mdpt_bantuan.thn
				FROM
				mdpt_bantuan 
				INNER JOIN bdt ON mdpt_bantuan.no = bdt.no
				INNER JOIN jns_bantuan ON mdpt_bantuan.id_jns_bantuan = jns_bantuan.id_jns_bantuan
				WHERE nama like '%$q%' OR no_urut_rt like '%$q%'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            ?>
		<div class="container">
		<table  class="table table-striped" >
				<thead><tr><th>NO</th><th>Cek</th><th>No Urut Rumah Tangga</th><th>Nama Penerima</th><th>Nama Bantuan</th> <th>Tahun Anggaran</th></tr></thead>
				<tbody>
				<?php
				$no=0;
			while ($row = mysql_fetch_array($result))
			{ $no++; ?>
				<tr >
					<td align="left" > <?php echo $no;?> </td>
					<td align="left"><input type="checkbox" id="cekbox" name="cekbox[]" value="<?php echo $row['id_mdpt_bantuan'] ?>"/></td>
					<td align="left" > <?php echo $row['no_urut_rt'];?> </td>
					<td align="left" > <?php echo $row['nama'];?> </td>
					<td align="left" > <?php echo $row['nm_bantuan'];?> </td>
					<td align="left" > <?php echo $row['thn'];?> </td>
				</tr> 
			<?php 
			} 
			?>
			</tbody>
		</table>
		</div>
		<?php
        }else{
            echo 'Data Tidak Ditemukan';
        }
    }
    ?>
    </form>
            <script> 
			function cek(cekbox){
     		for(i=0; i < cekbox.length; i++){
         		cekbox[i].checked = true;
     			}
 			}
 			function uncek(cekbox){
     		for(i=0; i < cekbox.length; i++){
         		cekbox[i].checked = false;
     			}
 			} 
		</script>
	</body> 
</html>