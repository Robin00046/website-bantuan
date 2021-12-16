<!DOCTYPE html>
  <html>
  <head> <title>Edit Penduduk</title></head>
  <link href="bs/bootstrap.min.css" rel="stylesheet" type="text/css">
  <body>
  
        <legend>Form Edit Data Penduduk</legend>
            <?php
                 include('koneksi.php');
                 $id = $_GET['id'];
                 $show = mysql_query("SELECT no_urut_rt, nik, nama, jk, alamat, kel, kec, kota, prov, lokasi from bdt WHERE no_urut_rt='$id'");
                    if(mysql_num_rows($show) == 0)
                        {
                             echo '<script>window.history.back()</script>';
                        }
                    else
                      {
                         $data = mysql_fetch_assoc($show);
                        }
            ?> 
    <form action="edit_simpan_penduduk.php" method="post"><br>
    <input type="hidden" name="no_urut_rt" value="<?php echo $id; ?>">
    <table cellpadding="3" cellspacing="0">
      <tr><td>NO URUT RUMAH TANGGA</td> <td>:</td> <td><?php echo $data['no_urut_rt'];?></td></tr>
      <tr><td>NIK</td> <td>:</td> <td><input class="form-control" type="text" name="nik" value="<?php echo $data['nik'];?>"></td></tr>
      <tr><td>NAMA</td> <td>:</td> <td><input class="form-control" type="text" name="nama" value="<?php echo $data['nama'];?>"></td></tr>
      <tr><td>JENIS KELAMIN</td> <td>:</td> <td><select class="form-control" type="text" name="jk"><option value="" selected="selected"><?php echo $data['jk'];?></option>
      <option>L</option>
      <option>P</option>
      </select></td></tr>
      <tr><td>ALAMAT</td> <td>:</td> <td><textarea class="form-control"type="text" name="alamat" rows="4"><?php echo $data['alamat'];?></textarea></td></tr>
      <tr><td>KELURAHAN</td> <td>:</td> <td><input class="form-control" type="text" name="kel" value="<?php echo $data['kel'];?>"></td></tr>
      <tr><td>KECAMATAN</td> <td>:</td> <td><input class="form-control" type="text" name="kec" value="<?php echo $data['kec'];?>"></td></tr>
      <tr><td>KOTA</td> <td>:</td> <td><input class="form-control"type="text" name="kota" value="<?php echo $data['kota'];?>"></td></tr>
      <tr><td>PROVINSI</td> <td>:</td> <td><input class="form-control" type="text" name="prov" value="<?php echo $data['prov'];?>"></td></tr>
      <tr><td>LINK LOKASI</td> <td>:</td> <td><textarea class="form-control"type="text" name="lokasi" rows="3"><?php echo $data['lokasi'];?></textarea></td></tr>
      
      <tr><td>&nbsp</td><td>&nbsp</td><td><input class="btn  btn-success" type="submit" name="simpan" value="Simpan">
                <a href="penduduk.php"> <input class="btn  btn-success" type='button' value='Kembali'></a>
      </tr>
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
