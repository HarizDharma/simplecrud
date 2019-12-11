<?php 

session_start();
//koneksi dtbase
include '../koneksi.php';

//nagkap data id di kirim via url
 $zen = $_GET['ris'];

 //menghapus data dari data base

 $queryupdate = mysqli_query($koneksi,"DELETE FROM karyawan where id='$zen'");

 if($queryupdate){
	header("location: index.php");
 	$_SESSION['berhasil'] = "berhasil";

 }
 else{
 	$_SESSION['gagal'] = "gagal";
 	header("location: index.php");
 }
 ?>