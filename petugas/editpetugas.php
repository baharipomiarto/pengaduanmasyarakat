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
            <h2>Tambah Data Petugas</h2>
			<?php
                $kueri_petugas = mysqli_query($konek, "SELECT * FROM petugas WHERE id_petugas='".$_GET['id']."' ");
                $data_petugas = mysqli_fetch_array($kueri_petugas);
            ?>
			<form name="f_editdata" method="post" action="aksipetugas.php?a=editpetugas">
				<table border="0">
                <tr><td>ID</td><td><input type="text" name="id_petugas" class="inputan" value="<?php echo $data_petugas[0]; ?>"></td></tr>
                <tr><td>Nama Lengkap</td><td><input type="text" name="nama" class="inputan" value="<?php echo $data_petugas[1]; ?>"></td></tr>
                <tr><td>Username</td><td><input type="text" name="pengguna" class="inputan" value="<?php echo $data_petugas[2]; ?>"></td></tr>
                <tr><td>Password</td><td><input type="password" name="sandi" class="inputan" value="<?php echo $data_petugas[3]; ?>"></td></tr>
                <tr><td>No Telp</td><td><input type="text" name="telp" class="inputan" value="<?php echo $data_petugas[4]; ?>"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Edit Data" class="tombol"><input type="reset" value="Reset" class="tombol"></td></tr>
                </table>
            </form>
        </div>
    </div>

    <footer>
        <p>2023 - Rekayasa Perangkat Lunak</p>
    </footer>
</body>
</html>