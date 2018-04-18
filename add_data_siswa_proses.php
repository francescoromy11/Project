<?php
	include'conn.php';
	
	$nama_siswa	= ucwords($_POST['nama_siswa']);
    $nis 		= $_POST['nis'];
    $kelamin	= $_POST['kelamin'];
    $kelas		= $_POST['id_kelas'];
    $username	= $_POST['username'];
    $password	= md5($_POST['password']);
    
    
    $simpan=mysql_query("insert into data_siswa (nama_siswa, nis, kelamin, id_kelas, username, password) values('$nama_siswa','$nis','$kelamin','$kelas','$username','$password')");

    header('location:notifikasi_update.php');

 ?>