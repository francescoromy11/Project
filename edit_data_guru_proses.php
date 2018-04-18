<?php
include "conn.php";
	$id_guru	= $_POST['id_guru'];
	$nip        = $_POST['nip'];
	$nama_guru	= ucwords($_POST['nama_guru']);
	$kelamin	= $_POST['kelamin'];
	$username	= $_POST['username'];
	$password	= md5(htmlentities($_POST['password']));
		
$masuk = mysql_query ("update data_guru set nip='$nip', nama_guru='$nama_guru', kelamin='$kelamin', username='$username', password='$password' where id_guru='$id_guru'");

if ($masuk){
echo '<script languange="javasript">alert("Data Berhasil di Update")</script>';
?>
<?php
echo '<script languange=javascript">window.location = "notifikasi_update.php"</script>';
}
?>
