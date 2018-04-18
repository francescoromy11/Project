<?php
include_once 'conn.php';
$nis=$_GET['nis'];
mysql_query("delete from data_siswa where nis='$nis'") or die (mysql_error());
header("location:http:data_siswa.php");
?>