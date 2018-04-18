<?php
include_once 'conn.php';
$id_guru=$_GET['id_guru'];
mysql_query("delete from data_guru where id_guru='$id_guru'") or die (mysql_error());
header("location:http:data_guru.php");
?>