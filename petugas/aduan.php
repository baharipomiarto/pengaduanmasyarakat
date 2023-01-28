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
            <h2>Daftar Aduan</h2>
			<table width="100%">
			<tr><td width="20%" class="headertabel">Tanggal</td>
				<td class="headertabel">Isi</td>
				<td class="headertabel">Status</td>
				<td class="headertabel">Tanggapan</td></tr>
			<?php
				$kueri_pengaduan = mysqli_query($konek,"SELECT * FROM pengaduan ORDER BY tgl_pengaduan DESC");
				while($data_pengaduan = mysqli_fetch_array($kueri_pengaduan)){
					echo "<tr><td>".$data_pengaduan[1]."</td>
							<td>".$data_pengaduan[3]."</td><td>".$data_pengaduan[5]."</td>
							<td>
							<a href='tanggapan.php?id=".$data_pengaduan[0]."'>Lihat Tanggapan</a> </td></tr>";
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