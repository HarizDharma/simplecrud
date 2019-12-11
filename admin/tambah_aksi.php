<?php 
//koneksi
include '../koneksi.php';

//nagkep data yang dikirim
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl = $_POST['tgl'];
$pendidikan = $_POST['pendidikan'];
$pengalaman = $_POST['pengalaman'];
$divisi = $_POST['divisi'];

//input data
mysqli_query($koneksi,"INSERT into karyawan values(0,'$nama','$alamat','$tgl','$pendidikan','$pengalaman','$divisi
	')");

//alih halaman ke index.php
header("location:index.php");
 ?>