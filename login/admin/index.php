<?php 
include '../koneksi.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php");
}
?>
 <html>
 <head><title>KRAMAT SELATAN</title>
 <link href='../logotab.png' rel='SHORTCUT ICON'/>
 </head>
<frameset rows="5%,*,10%" border="1">
    <frameset cols="18%,89%" border="0">
    <frame name="header" src="header.html" scrolling="no"></frame>
    <frame name="header" src="header2.html" scrolling="no"></frame>
    <frame src="UntitledFrame-1"></frameset>
    
    <frameset cols="18%,89%" border="0">
        <frame name="menu" src="menu.html"  scrolling="no" ></frame>
        <frame name="content" src="utama.php" ></frame>
        
    <frame src="UntitledFrame-2"></frameset>
     <frame name="footer" src="footer.html"  scrolling="no" ></frame>
</frameset><noframes></noframes>



 </html>
