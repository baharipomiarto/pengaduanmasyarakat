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
		<h2>Riwayat Aduan Anda</h2>
		<table width="100%">
		<tr><td width="20%" class="headertabel">Tanggal Aduan</td>
			<td class="headertabel">Isi Aduan</td>
			<td class="headertabel">Status</td>
			<td class="headertabel">Detail</td></tr>
		<?php
			$kueri_lihat_aduan = mysqli_query($konek,"SELECT * FROM pengaduan WHERE nik = '$data_identitas[0]' ");
			while($data_aduan = mysqli_fetch_array($kueri_lihat_aduan)){
				echo "<tr><td>$data_aduan[1]</td>
						<td>$data_aduan[3]</td><td>$data_aduan[5]</td>
						<td><a href='detail.php?id=$data_aduan[0]'>detail</a></td></tr>";
			}
		?>
		</table>
		<h2>Tambah Aduan</h2>
		<form name="f_aduan" method="post" action="aksimasyarakat.php?a=tambahaduan" enctype="multipart/form-data">
			Isi Aduan<br>
			<textarea name="isi_aduan" class="isi_aduan"></textarea><br>
			Gambar<br>
			<input type="file" name="gambar"><br>
			<input type="hidden" name="nik" value="<?php echo $data_identitas[0]; ?>"><br>
			<input type="submit" value="Kirim Aduan" class="tombol"><input type="reset" class="tombol">
		</form>
		<br><br>
	</div>

    <footer>
        <p>2023 - Rekayasa Perangkat Lunak</p>
    </footer>
</body>
</html>