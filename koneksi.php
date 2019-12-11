<?php
$koneksi = mysqli_connect("localhost","dedsec","dedsec","company");

//cek koneksi
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>