<?php
session_start();
include "../inc/koneksi.php";

if($_SESSION['ses_status'] !="masyarakat"){
	header("location:../index.php");
}
$kueri_identitas = mysqli_query($konek,"SELECT * FROM masyarakat WHERE nik = '".$_SESSION['ses_idmasyarakat']."'");
$data_identitas = mysqli_fetch_array($kueri_identitas);
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Pengaduan Masyarakat</title>
     <link rel="stylesheet" type="text/css" href="stylemasyarakat.css">
</head>
<body>
    <header>
        <h1>Sistem Informasi Pengaduan Masyarakat</h1>
		<div class="identitas">Selamat Datang <?php echo $data_identitas[1]; ?><br><br>
		<a href="aksimasyarakat.php?a=logout">logout</a></div>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="ubahdata.php">Ubah Data Pribadi</a></li>
        </ul>
    </nav>
   
    <div class="content">
            <h2>Ubah Data Pribadi</h2>
			
			<form name="f_ubahdata" method="post" action="aksimasyarakat.php?a=ubahdata" enctype="multipart/form-data">
				<table border="0">
                <tr><td>No Induk Kependudukan</td><td><input type="text" name="nik" readonly value="<?php echo $data_identitas[0]; ?>" class="inputan"></td></tr>
                <tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo $data_identitas[1]; ?>" class="inputan"></td></tr>
                <tr><td>Username</td><td><input type="text" name="pengguna" value="<?php echo $data_identitas[2]; ?>" class="inputan"></td></tr>
                <tr><td>Password</td><td><input type="password" name="sandi" value="<?php echo $data_identitas[3]; ?>" class="inputan"></td></tr>
                <tr><td>No Telp</td><td><input type="text" name="telp" value="<?php echo $data_identitas[4]; ?>" class="inputan"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Ubah Data" class="tombol"><input type="reset" value="Reset" class="tombol"></td></tr>
                </table>
            </form>
    </div>

    <footer>
        <p>2023 - Rekayasa Perangkat Lunak</p>
    </footer>
</body>
</html>