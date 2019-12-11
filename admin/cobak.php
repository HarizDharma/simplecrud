<?php 
session_start();

include 'koneksi.php';

$nama = $_POST['nama_edit'];
$alamat = $_POST['alamat_edit'];
$tgl = $_POST['tgl'];
$pendidikan = $_POST['pendidikan'];
$divisi = $_POST['divisi'];

$queryupdate = ($koneksi)
?>