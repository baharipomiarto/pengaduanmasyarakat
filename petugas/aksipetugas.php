<?php
session_start();
include "../inc/koneksi.php";

$aksi = $_GET['a'];
if($aksi == "ubahdata"){
    $id_petugas = $_POST['id_petugas'];
    $nama = $_POST['nama'];
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];
    $telp = $_POST['telp'];

    $kueri_edit = "UPDATE petugas 
                    SET nama_petugas='".$nama."', username='".$pengguna."', password='".$sandi."', telp='".$telp."'
                    WHERE id_petugas='".$id_petugas."' ";
    if(mysqli_query($konek,$kueri_edit)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil diubah</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=index.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil diubah</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=index.php'>";
    }
}elseif($aksi == "logout"){
    session_unset();
    session_destroy();
    echo "<h1 style='color:blue; text-align:center'>Anda Keluar dari halaman</h1>";
    echo "<meta http-equiv='refresh' content='1; URL=../index.php'>";
}elseif($aksi == "tanggapan"){
    $isi_tanggapan = $_POST['isi_tanggapan'];
	$status = $_POST['status'];
    $id_petugas = $_POST['id_petugas'];
    $id_pengaduan = $_POST['id_pengaduan'];

    $query = mysqli_query($konek,"INSERT INTO tanggapan VALUES('','".$id_pengaduan."',now(), '".$isi_tanggapan."', '".$id_petugas."')");
	
    if($query){
		mysqli_query($konek,"UPDATE pengaduan SET status='".$status."' WHERE id_pengaduan='".$id_pengaduan."' ");
        echo "<h1 style='color:green; text-align:center'>Tanggapan berhasil dikirim</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=tanggapan.php?id=$id_pengaduan'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Tanggapan tidak berhasil dikirim</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=tanggapan.php?id=$id_pengaduan'>";
    }
}elseif($aksi == "hapustanggapan"){
    $id = $_GET['id'];
	$id_tanggapan = $_GET['id_tanggapan'];

    $kueri_hapus = "DELETE FROM tanggapan WHERE id_tanggapan=$id_tanggapan";
	//echo "tanggapan.php?id=$id";exit;
	if(mysqli_query($konek,$kueri_hapus)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil dihapus</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=tanggapan.php?id=$id'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil dihapus</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=tanggapan.php?id=$id'>";
    }
}elseif($aksi == "tambahpetugas"){
    $nama = $_POST['nama'];
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];
    $telp = $_POST['telp'];

    $kueri_tambah = "INSERT INTO petugas VALUES ('','".$nama."', '".$pengguna."', '".$sandi."', '".$telp."', 'petugas' )";
	if(mysqli_query($konek,$kueri_tambah)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil ditambah</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=petugas.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil ditambah</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=petugas.php'>";
    }
}elseif($aksi == "editpetugas"){
    $id_petugas = $_POST['id_petugas'];
    $nama = $_POST['nama'];
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];
    $telp = $_POST['telp'];
    
    $kueri_edit = "UPDATE petugas SET
        nama_petugas='".$nama."', username='".$pengguna."', password='".$sandi."', telp='".$telp."' 
        WHERE id_petugas='".$id_petugas."' ";
    if(mysqli_query($konek,$kueri_edit)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil diedit</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=petugas.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil diedit</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=petugas.php'>";
    }
}elseif($aksi == "hapuspetugas"){
    $id_petugas = $_GET['id'];
    
    $kueri_hapus = "DELETE FROM petugas WHERE id_petugas='".$id_petugas."' ";
	if(mysqli_query($konek,$kueri_hapus)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil dihapus</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=petugas.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil dihapus</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=petugas.php'>";
    }
}elseif($aksi == "tambahmasyarakat"){
    $nik = $_POST['nik'];
	$nama = $_POST['nama'];
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];
    $telp = $_POST['telp'];

    $kueri_tambah = "INSERT INTO masyarakat VALUES ('$nik','$nama', '$pengguna', '$sandi', '$telp' )";
	if(mysqli_query($konek,$kueri_tambah)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil ditambah</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=registrasi.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil ditambah</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=registrasi.php'>";
    }
}elseif($aksi == "editmasyarakat"){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];
    $telp = $_POST['telp'];
    
    $kueri_edit = "UPDATE masyarakat SET nama='$nama', username='$pengguna', password='$sandi', telp='$telp' WHERE NIK='$nik' ";
    if(mysqli_query($konek,$kueri_edit)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil diedit</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=registrasi.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil diedit</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=registrasi.php'>";
    }
}elseif($aksi == "hapusmasyarakat"){
    $nik = $_GET['id'];
    
    $kueri_hapus = "DELETE FROM masyarakat WHERE nik='$nik' ";
	if(mysqli_query($konek,$kueri_hapus)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil dihapus</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=registrasi.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil dihapus</h1>";
        echo "<meta http-equiv='refresh' content='1; URL=registrasi.php'>";
    }
}
?>