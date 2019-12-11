<?php
//aktifkan session
session_start();

//menghubungkan koneksi
include 'koneksi.php';

//menagkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

//menyeleksi data admin
$data = mysqli_query($koneksi,"select * from admin where username='$username' and passwordd='$password'");

//menghitung jumlah data
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/index.php");
    $_SESSION['bukanadmin'] = "logout";
}
else{
    header("location:index.php?pesan=gagal");
    $_SESSION['pesan'] = "gagal";
}
?>