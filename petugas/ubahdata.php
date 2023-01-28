<?php
session_start();
include "../inc/koneksi.php";

if($_SESSION['ses_status'] !="petugas"){
	header("location:../index.php");
}
$kueri_identitas = mysqli_query($konek,"SELECT * FROM petugas WHERE id_petugas = '".$_SESSION['ses_idpetugas']."'");
$data_identitas = mysqli_fetch_array($kueri_identitas);
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Pengaduan petugas</title>
     <link rel="stylesheet" type="text/css" href="stylepetugas.css">
</head>
<body>
    <header>
        <h1>Sistem Informasi Pengaduan petugas</h1>
		<div class="identitas">Selamat Datang <?php echo $data_identitas[1]; ?><br>
		<a href="aksipetugas.php?a=logout">logout</a></div>
    </header>
    
    <nav>
        <?php
			include("menu.php");
		?>
    </nav>
   
    <div class="container">
        <div class="content">
            <h2>Ubah Data Pribadi</h2>
			
			<form name="f_ubahdata" method="post" action="aksipetugas.php?a=ubahdata" enctype="multipart/form-data">
				<table border="0">
                <tr><td>ID</td><td><input type="text" name="id_petugas" readonly value="<?php echo $data_identitas[0]; ?>" class="inputan"></td></tr>
                <tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo $data_identitas[1]; ?>" class="inputan"></td></tr>
                <tr><td>Username</td><td><input type="text" name="pengguna" value="<?php echo $data_identitas[2]; ?>" class="inputan"></td></tr>
                <tr><td>Password</td><td><input type="password" name="sandi" value="<?php echo $data_identitas[3]; ?>" class="inputan"></td></tr>
                <tr><td>No Telp</td><td><input type="text" name="telp" value="<?php echo $data_identitas[4]; ?>" class="inputan"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Ubah Data" class="tombol"><input type="reset" value="Reset" class="tombol"></td></tr>
                </table>
            </form>
        </div>
    </div>

    <footer>
        <p>2023 - Rekayasa Perangkat Lunak</p>
    </footer>
</body>
</html>