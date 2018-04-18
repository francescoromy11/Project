<?php
include "conn.php";
	$id_kelas	= $_POST['id_kelas'];
	$nama_kelas	= $_POST['nama_kelas'];
	$id_guru	= $_POST['id_guru'];
	$username	= $_POST['username'];
	$password	= md5(htmlentities($_POST['password']));
		
$masuk = mysql_query ("update tbl_kelas set nama_kelas='$nama_kelas', id_guru='$id_guru', username='$username', password='$password' where id_kelas='$id_kelas'");

if ($masuk){
echo '<script languange="javasript">alert("Data Berhasil di Update")</script>';
?>
<?php
echo '<script languange=javascript">window.location = "notifikasi_update.php"</script>';
}
?>
