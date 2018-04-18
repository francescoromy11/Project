<?php
	include'conn.php';
	
    $nama_kelas = $_POST['nama_kelas'];
    $id_guru	= $_POST['id_guru'];
    $username	= $_POST['username'];
    $password	= md5($_POST['password']);
    
    
    $simpan=mysql_query("insert into tbl_kelas (nama_kelas, id_guru, username, password) values('$nama_kelas','$id_guru','$username','$password')");

    header('location:notifikasi_update.php');

 ?>