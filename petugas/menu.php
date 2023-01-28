<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="ubahdata.php">Ubah Data Pribadi</a></li>
	<li><a href="aduan.php">Data Aduan</a></li>
	<?php
		if($data_identitas[5] == "admin"){
			echo "<li><a href='petugas.php'>Data Petugas</a></li><li><a href='registrasi.php'>Registrasi</a></li>";
		}
	?>
</ul>