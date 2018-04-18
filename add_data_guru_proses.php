<?php
	include'conn.php';
	
	$nama_guru	= ucwords($_POST['nama_guru']);
    $nip 		= $_POST['nip'];
    $kelamin	= $_POST['kelamin'];
    $username	= $_POST['username'];
    $password	= md5($_POST['password']);
    
    
    $simpan=mysql_query("insert into data_guru (nama_guru, nip, kelamin, username, password) values('$nama_guru','$nip','$kelamin','$username','$password')");

    header('location:notifikasi_update.php');

 ?>