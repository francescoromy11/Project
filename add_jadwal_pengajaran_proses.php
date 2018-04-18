<?php
	include'conn.php';
	
    $id_mapel 	= $_POST['id_mapel'];
    $id_guru	= $_POST['id_guru'];
    $nama_mapel	= $_POST['nama_mapel'];
    $id_kelas	= $_POST['id_kelas'];
    
    
    $simpan=mysql_query("insert into tbl_mapel (nama_mapel, id_guru, id_kelas) values('$nama_mapel','$id_guru','$id_kelas')");

    header('location:notifikasi_update.php');

 ?>