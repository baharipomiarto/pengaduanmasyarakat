<?php
include "inc/koneksi.php";
$aksi = $_GET['a'];

if($aksi == 'login'){
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];

    if($kueri = mysqli_query($konek,"SELECT * FROM masyarakat WHERE username='".$pengguna."' AND password='".$sandi."'")){
        $cek = mysqli_num_rows($kueri);
        $data = mysqli_fetch_array($kueri);
        if($cek>0){
            session_start();
            $_SESSION['ses_status'] = "masyarakat";
            $_SESSION['ses_idmasyarakat'] = $data[0];
            echo "<meta http-equiv='refresh' content='0; URL=masyarakat/index.php'>";
        }else{
            echo "<h1 style='color:red; text-align:center'>oops!! Login gagal</h1>";
            echo "<meta http-equiv='refresh' content='2; URL=registrasi.php'>";
        }
    }else{
        echo "<h1 style='color:red; text-align:center'>oops!! Database tidak dapat dihubungi</h1>";
        echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
    }
    
}elseif($aksi == 'registrasi'){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];
    $telp = $_POST['telp'];

    $kueri = "INSERT INTO masyarakat VALUES ('".$nik."','".$nama."','".$pengguna."','".$sandi."','".$telp."')";
    if(!mysqli_query($konek, $kueri)){
        echo "<h1 style='color:red; text-align:center'>oops!! Registrasi gagal</h1>";
    }else{
        echo "<h1 style='color:green; text-align:center'>Registrasi berhasil</h1>";
    }
    echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
}elseif($aksi == 'loginpetugas'){
    $pengguna = $_POST['pengguna'];
    $sandi = $_POST['sandi'];

    if($kueri = mysqli_query($konek,"SELECT * FROM petugas WHERE username='".$pengguna."' AND password='".$sandi."'")){
        $cek = mysqli_num_rows($kueri);
        $data = mysqli_fetch_array($kueri);
        if($cek>0){
            session_start();
            $_SESSION['ses_status'] = "petugas";
            $_SESSION['ses_idpetugas'] = $data[0];
            echo "<meta http-equiv='refresh' content='0; URL=petugas/index.php'>";
        }else{
            echo "<h1 style='color:red; text-align:center'>oops!! Login gagal</h1>";
            echo "<meta http-equiv='refresh' content='2; URL=loginpetugas.php'>";
        }
    }else{
        echo "<h1 style='color:red; text-align:center'>oops!! Database tidak dapat dihubungi</h1>";
        echo "<meta http-equiv='refresh' content='2; URL=index.php'>";
    }
}
?>