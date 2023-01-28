<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Pengaduan Masyarakat</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1><a href="index.php">Sistem Informasi Pengaduan Masyarakat</a></h1>
    </header>
    <div class="row">
		<div class="kiri">
			<h2>Selamat Datang di Sistem Informasi Pengaduan Masyarakat</h2>
			<h3>Daftar Aduan Masyarakat</h3>
			<table width="100%" border="0">
			<?php
				include "inc/koneksi.php";
				$kueri = mysqli_query($konek,"SELECT a.tgl_pengaduan, a.isi_laporan, a.status, COUNT(c.id_tanggapan) as jml, b.nama, a.foto 
							FROM pengaduan a, masyarakat b, tanggapan c 
							WHERE b.nik=a.nik AND c.id_pengaduan=a.id_pengaduan
							GROUP BY a.id_pengaduan ORDER BY a.tgl_pengaduan DESC LIMIT 10 ");
				while($data=mysqli_fetch_array($kueri)){
					if($data[5]==''){
						echo "<tr><td colspan='2'>$data[0] oleh $data[4] | Status = $data[2] | $data[3] tanggapan <br> $data[1]</td></tr>";
					}else{
						echo "<tr><td><img src='img/$data[5]' width='300'></td><td>$data[0] oleh $data[4] | Status = $data[2] | $data[3] tanggapan <br> $data[1]</td></tr>";
					}
				}
			?>
			</table>
		</div>

		<div class="kanan">
			<h2>Login Masyarakat</h2>
			<form name="flogin" method="post" action="aksi.php?a=login">
				<table border="0">
				<tr><td>Username</td><td> <input type="text" name="pengguna" placeholder="username anda"> </td></tr>
					<tr><td>Password</td><td> <input type="password" name="sandi"></td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" value="Login" class="tombol"></td></tr>
				</table>
			</form><br>
			Belum memiliki akun? <a href="registrasi.php">Registrasi</a><br><br><a href="loginpetugas.php">Login Petugas</a>
		</div>
	</div>
    <footer>
        <p>2023 - Rekayasa Perangkat Lunak</p>
    </footer>
</body>
</html>