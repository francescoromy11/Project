<?php
include_once 'conn.php';
$id_kelas=$_GET['id_kelas'];
mysql_query("delete from tbl_kelas where id_kelas='$id_kelas'") or die (mysql_error());
header("location:http:data_kelas.php");
?>