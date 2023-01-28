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
            <h2>Aduan Anda:</h2>
            <?php
                $id_pengaduan = $_GET['id'];
				$kueri_lihat_aduan = mysqli_query($konek,"SELECT * FROM pengaduan WHERE id_pengaduan = '".$id_pengaduan."' ");
				while($data_aduan = mysqli_fetch_array($kueri_lihat_aduan)){
                    echo "Tanggal ".$data_aduan[1]."<br>
                        Isi Aduan ".$data_aduan[3]."<br>
                        <img src='../img/".$data_aduan[4]."'><br><br>
                        Status ".$data_aduan[5]."<br>";
                    echo "<h2>Tanggapan</h2>";
                    $kueri_tanggapan = mysqli_query($konek, "SELECT * FROM tanggapan WHERE id_pengaduan='".$data_aduan[0]."' ");
                    $data_tanggapan = mysqli_fetch_array($kueri_tanggapan);
                    if(mysqli_num_rows($kueri_tanggapan) >0 ){
                        echo "Tanggal : ".$data_tanggapan[2]."<br>Tanggapan Petugas : ".$data_tanggapan[3]."<br> ";
                    }else{
                        echo "Belum ada tanggapan";
                    }
                    
				}
			?>
			<p><a href="index.php">Kembali ke halaman utama</a></p>
    </div>

    <footer>
        <p>2023 - Rekayasa Perangkat Lunak</p>
    </footer>
</body>
</html>