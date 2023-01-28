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
        <h2>Login Petugas</h2>
        <form name="floginpetugas" method="post" action="aksi.php?a=loginpetugas" class="loginpetugas">
            <table border="0">
                <tr><td>Username</td><td><input type="text" name="pengguna" class="inputan"></td></tr>
                <tr><td>Password</td><td><input type="password" name="sandi" class="inputan"></td></tr>
                <tr><td>&nbsp;</td>
					<td><input type="submit" value="Login" class="tombol">
						<input type="reset" value="Reset" class="tombol"></td></tr>
            </table>
        </form>
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