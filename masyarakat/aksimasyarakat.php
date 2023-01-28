<?php
session_start();
include "../inc/koneksi.php";

$aksi = $_GET['a'];
if($aksi == "ubahdata"){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];
    $telp = $_POST['telp'];

    $kueri_edit = "UPDATE masyarakat 
                    SET nama='".$nama."', username='".$pengguna."', password='".$sandi."', telp='".$telp."'
                    WHERE nik='".$nik."' ";
    if(mysqli_query($konek,$kueri_edit)){
        echo "<h1 style='color:green; text-align:center'>Data berhasil diubah</h1>";
        echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Data tidak berhasil diubah</h1>";
        echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
    }
}elseif($aksi == "logout"){
    session_unset();
    session_destroy();
    echo "<h1 style='color:blue; text-align:center'>Anda Keluar dari halaman</h1>";
    echo "<meta http-equiv='refresh' content='1; URL=../index.php'>";
}elseif($aksi == "tambahaduan"){
    $isi_aduan = $_POST['isi_aduan'];
    $nik = $_POST['nik'];
    $nama = $_FILES['gambar']['name'];
    $ukuran	= $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];	

    move_uploaded_file($file_tmp, '../img/'.$nama);
    
    $query = mysqli_query($konek,"INSERT INTO pengaduan VALUES('',now(),'".$nik."', '".$isi_aduan."', '".$nama."','proses')");
    if($query){
        echo "<h1 style='color:green; text-align:center'>Aduan berhasil dikirim</h1>";
        echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
    }else{
        echo "<h1 style='color:red; text-align:center'>Oops!! Aduan tidak berhasil dikirim</h1>";
        echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
    }
    
}
?>