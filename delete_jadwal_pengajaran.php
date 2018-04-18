<?php
include_once 'conn.php';
$id_jadwal=$_GET['id_jadwal'];
mysql_query("delete from tbl_jadwal where id_jadwal='$id_jadwal'") or die (mysql_error());
header("location:http:jadwal_pengajaran.php");
?>