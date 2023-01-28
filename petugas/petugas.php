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
            <h2>Daftar Petugas</h2>
			<a href="tambahpetugas.php">Tambah Data Petugas</a>
            <table width="100%">
			<tr>
				<td class="headertabel">Nama</td>
				<td class="headertabel">Username</td>
				<td class="headertabel">Telp</td>
				<td class="headertabel">Level</td>
				<td class="headertabel">Aksi</td></tr>
			<?php
				$kueri_petugas = mysqli_query($konek,"SELECT * FROM petugas ");
				while($data_petugas = mysqli_fetch_array($kueri_petugas)){
					echo "<tr>
							<td>".$data_petugas[1]."</td><td>".$data_petugas[2]."</td><td>".$data_petugas[4]."</td><td>".$data_petugas[5]."</td>
							<td>
							<a href='editpetugas.php?id=".$data_petugas[0]."'>Edit</a> | 
							<a href='aksipetugas.php?a=hapuspetugas&id=".$data_petugas[0]."'>Hapus</a>
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