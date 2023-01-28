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
     <link rel="stylesheet" href="stylepetugas.css">
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
            <h2>Detail Aduan:</h2>
			
            <?php
                $id_pengaduan = $_GET['id'];
				$kueri_lihat_aduan = mysqli_query($konek,"SELECT a.id_pengaduan, a.tgl_pengaduan, b.nama, a.isi_laporan, a.foto, a.status 
															FROM pengaduan a, masyarakat b WHERE a.nik=b.nik AND a.id_pengaduan = $id_pengaduan ");
				if(mysqli_num_rows($kueri_lihat_aduan)>0){
					$data_aduan = mysqli_fetch_array($kueri_lihat_aduan);
                    echo "<table border='0' width='100%'><tr><td width='520'>Tanggal $data_aduan[1] | $data_aduan[2] | $data_aduan[5]<br>Isi Aduan $data_aduan[3]<br><img src='../img/$data_aduan[4]' ></td>";
                    echo "<td><h2>Tanggapan</h2>";
                    $kueri_tanggapan = mysqli_query($konek, "SELECT * FROM tanggapan WHERE id_pengaduan='$data_aduan[0]' ");
                    if(mysqli_num_rows($kueri_tanggapan) >0 ){
						while ($data_tanggapan = mysqli_fetch_array($kueri_tanggapan)){
							echo "Tanggal : $data_tanggapan[2]<br>Tanggapan : $data_tanggapan[3] | <a href=aksipetugas.php?a=hapustanggapan&id_tanggapan=$data_tanggapan[0]&id=$id_pengaduan>hapus tanggapan</a><br><hr> ";
						}
                    }else{
                        echo "Belum ada tanggapan";
                    }
					echo "</td></tr></table>";
				
			?>
			
				<h2>Beri Tanggapan</h2>
				<form name="f_aduan" method="post" action="aksipetugas.php?a=tanggapan" enctype="multipart/form-data">
					Isi Tanggapan<br>
					<textarea name="isi_tanggapan" class="isi_tanggapan"></textarea><br>
					Status
					<select name="status">
						<option value="proses">Proses</option>
						<option value="selesai">Selesai</option>
					</select><br>
					<input type="hidden" name="id_pengaduan" value="<?php echo $id_pengaduan; ?>">
					<input type="hidden" name="id_petugas" value="<?php echo $data_identitas[0]; ?>"><br>
					<input type="submit" value="Kirim Tanggapan" class="tombol"><input type="reset" class="tombol">
				</form><br>
			<?php
				}else{
					echo "data tidak ditemukan";
				}
			?>
			<br><p><a href="index.php">Kembali ke halaman utama</a></p>
        </div>
    </div>

    <footer>
        <p>2023 - Rekayasa Perangkat Lunak</p>
    </footer>
</body>
</html>