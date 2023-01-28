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
		<div class="identitas">Selamat Datang <?php echo $data_identitas[1]." <br> ".$data_identitas[5]; ?><br>
		<a href="aksipetugas.php?a=logout">logout</a></div>
    </header>
    
    <nav>
        <?php
			include("menu.php");
		?>
    </nav>
   
    <div class="container">
        <div class="content">
            <h2>Daftar Aduan Yang Belum Ditanggapi</h2>
			<table width="100%">
			<tr><td width="20%" class="headertabel">Tanggal Aduan</td>
				<td class="headertabel">Isi Aduan</td>
				<td class="headertabel">Status</td>
				<td class="headertabel">Proses</td></tr>
			<?php
				$kueri_lihat_aduan = mysqli_query($konek,"SELECT * FROM pengaduan WHERE status = '0' or status='proses' ");
				while($data_aduan = mysqli_fetch_array($kueri_lihat_aduan)){
					echo "<tr><td>".$data_aduan[1]."</td>
							<td>".$data_aduan[3]."</td><td>".$data_aduan[5]."</td>
							<td><a href='tanggapan.php?id=".$data_aduan[0]."'>Beri Tanggapan</a></td></tr>";
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