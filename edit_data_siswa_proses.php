<?php
include "conn.php";
	$id_siswa	= $_POST['id_siswa'];
	$nis 		= $_POST['nis'];
	$nama_siswa	= ucwords($_POST['nama_siswa']);
	$kelamin	= $_POST['kelamin'];
	$id_kelas	= $_POST['id_kelas'];
	$username	= $_POST['username'];
	$password	= md5(htmlentities($_POST['password']));
		
$masuk = mysql_query ("update data_siswa set nis='$nis', nama_siswa='$nama_siswa', kelamin='$kelamin', id_kelas='$id_kelas', username='$username', password='$password' where id_siswa='$id_siswa'");

if ($masuk){
echo '<script languange="javasript">alert("Data Berhasil di Update")</script>';
?>
<?php
echo '<script languange=javascript">window.location = "notifikasi_update.php"</script>';
}
?>
