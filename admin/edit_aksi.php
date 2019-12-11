<?php
session_start(); 
include '../koneksi.php';
$id = $_POST['id_edit'];
$nama = $_POST['nama_edit'];
$alamat = $_POST['alamat_edit'];
$tgl = $_POST['tgl_edit'];
$pendidikan = $_POST['pendidikan_edit'];
$pengalaman = $_POST['pengalaman_edit'];
$divisi = $_POST['divisi_edit'];

$queryupdate = mysqli_query($koneksi, "UPDATE karyawan SET nama = '$nama', alamat = '$alamat', tgl = '$tgl', pendidikan = '$pendidikan', pengalaman = '$pengalaman', id_divisi = '$divisi' WHERE id = '$id'");

if($queryupdate){
	$_SESSION['suksesupdate'] = "yoi";
	header("location: index.php");
}
?>