<!DOCTYPE html>
<html>
    <head> <title>Tampil Data Penduduk</title> 
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
    
     <h2 class="FONT"><center><b>DATA PENDUDUK KURANG MAMPU</b></center></h2>
        <hr/>

        <form class="form-inline" method="get">
            <p class="container" align="left">
            &nbsp; Cari : &nbsp;<input class="form-control" type="text" name="q" value="">&nbsp;
            <button class="btn btn-dark" type="submit">Search</button>
        </p>
        </form>

        <form action="hapus_penduduk.php" method="post">
            <p class="container" align="center">
                <input class="btn btn-success" type="button" onclick="cek(this.form.cekbox)" value="Select All"  />
                <input class="btn btn-success" type="button" onclick="uncek(this.form.cekbox)" value="Clear All"  /> 
                <input class="btn btn-success" type="submit" value="Hapus" name="submit"onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"/>
            </p>
    <?php
        if(isset($_GET['q']) && $_GET['q']){
        $conn = mysql_connect("localhost", "root", "");
        mysql_select_db("kramatselatan");
        $q = $_GET['q'];
        $sql = "SELECT no_urut_rt, nik,  nama, jk, alamat, kel, kec from bdt where no_urut_rt like '%$q%' or 
        alamat like '%$q%' or nama like '%$q%'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            ?>
            <div class="container">
        <table class="table table-striped" >
                <thead><tr><th>NO</th><th>Cek</th><th>NO URUT RUMAH TANGGA</th> <th>NIK</th> <th>NAMA</th> <th>JENIS KELAMIN</th> <th>ALAMAT</th> <th>KELURAHAN</th> <th>KECAMATAN</th>  <th>Aksi</th></tr></thead> 
                <tbody>
            <?php
                $no=0;
            while ($row = mysql_fetch_array($result))
            { $no++; ?>
                <tr>
                    <td align="center" > <?php echo $no;?> </td>
                    <td align="center"><input type="checkbox" id="cekbox" name="cekbox[]" value="<?php echo $row['no_urut_rt'] ?>"/></td>
                    <td align="center" > <?php echo $row['no_urut_rt'];?> </td>
                    <td align="left" > <?php echo $row['nik'];?> </td>
                    <td align="left" > <?php echo $row['nama'];?> </td>
                    <td align="left" > <?php echo $row['jk'];?> </td>
                    <td align="left" > <?php echo $row['alamat'];?> </td>
                    <td align="left" > <?php echo $row['kel'];?> </td>
                    <td align="left" > <?php echo $row['kec'];?> </td>
                    <td> <a href="edit_penduduk.php?id=<?php echo $row['no_urut_rt'];?>"> Edit </a>
                    <td><a href="detail.php?id=<?php echo $row['no_urut_rt'];?>"> Detail </a>
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
</body></html>
