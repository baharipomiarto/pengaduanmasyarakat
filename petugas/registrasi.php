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
            <h2>Daftar Akun Masyarakat</h2>
			<a href="tambahmasyarakat.php">Registrasi Akun Baru</a>
            <table width="100%">
			<tr><td width="20%" class="headertabel">NIK</td>
				<td class="headertabel">Nama</td>
				<td class="headertabel">Username</td>
				<td class="headertabel">Telp</td>
				<td class="headertabel">Aksi</td></tr>
			<?php
				$kueri_masy = mysqli_query($konek,"SELECT * FROM masyarakat ");
				while($data_masy = mysqli_fetch_array($kueri_masy)){
					echo "<tr><td>".$data_masy[0]."</td>
							<td>".$data_masy[1]."</td><td>".$data_masy[2]."</td><td>".$data_masy[4]."</td>
							<td>
							<a href='editmasyarakat.php?id=".$data_masy[0]."'>Edit</a> | 
							<a href='aksipetugas.php?a=hapusmasyarakat&id=".$data_masy[0]."'>Hapus</a>
							</td></tr>";
				}
			?>
			</table>
			
        </div>
    </div>

    <footer>
        <p>2023 - Rekayasa Perangkat Lunak</p>
    </footer>
</body>
</html>