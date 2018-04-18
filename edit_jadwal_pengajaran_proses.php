<?php
include "conn.php";
	$id_jadwal	= $_POST['id_jadwal'];
	$id_pelajaran=$_POST['id_pelajaran'];
	$id_guru=$_POST['id_guru'];
	$id_kelas=$_POST['id_kelas'];
		
$masuk = mysql_query ("update tbl_jadwal set id_pelajaran='$id_pelajaran', id_guru='$id_guru', id_kelas='$id_kelas' where id_jadwal='$id_jadwal'");

if ($masuk){
echo '<script languange="javasript">alert("Data Berhasil di Update")</script>';
?>
<?php
echo '<script languange=javascript">window.location = "notifikasi_update.php"</script>';
}
?>
