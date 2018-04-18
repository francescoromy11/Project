<?php 
include "conn.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cetak Laporan Nilai</title>
<link rel="stylesheet" href="images/style.css" type="text/css" />
</head>
<body><br /> 

<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="85%"><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20%"><img src="img/logo.png" width="100" height="100" /></td>
        <td width="80%"><b><font size="5">SMA xxxxxxxxxxx</font><br />
          <font size="4">Jl. xxxxxxxxxxx</font><br />
          website : xxxxxxxxxxx</b></td>
      </tr>
    </table></td>
  </tr>

<?php		
  $id_kelas=$_POST['id_kelas'];
	$id_jadwal=$_POST['id_jadwal'];
	$cek=mysql_query("SELECT
tbl_jadwal.id_jadwal,
tbl_jadwal.id_kelas,
tbl_jadwal.id_pelajaran,
tbl_jadwal.id_guru,
tbl_kelas.nama_kelas,
tbl_kelas.username,
tbl_kelas.`password`,
tbl_pelajaran.nama_pelajaran
FROM
tbl_jadwal
INNER JOIN tbl_kelas ON tbl_jadwal.id_kelas = tbl_kelas.id_kelas
INNER JOIN tbl_pelajaran ON tbl_jadwal.id_pelajaran = tbl_pelajaran.id_pelajaran
WHERE tbl_jadwal.id_kelas='$id_kelas' and tbl_jadwal.id_jadwal='$id_jadwal'");
	if($cek=== FALSE) { 
      die(mysql_error()); 
      }
  $hasil=mysql_fetch_array($cek);
	$nama_kelas=strtoupper($hasil['nama_kelas']);
	$nama_pelajaran=strtoupper($hasil['nama_pelajaran']);
		if(!empty($hasil)){
		$query=mysql_query("SELECT * FROM tbl_nilai nilai, data_siswa siswa, tbl_pelajaran pelajaran WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_pelajaran=pelajaran.id_pelajaran and nilai.id_kelas='$id_kelas' and nilai.id_jadwal='$id_jadwal' order by siswa.nama_siswa asc");
		
		echo "<script language='JavaScript' type='text/javascript'>
		window.print();
		</script>";
		

		
// LAPORAN SEMUA NILAI
		if($_POST['pilih']=="semua"){
?>
  <tr>
    <td><hr color="#000000" /></td>
  </tr>
  <tr>
  <td><?php echo "<p align='center'><b><font size='4'>LAPORAN NILAI MATA PELAJARAN $nama_pelajaran <br> KELAS $nama_kelas</font><b></p><br>"; ?></td>
  </tr>
  <tr>
    <td align="center">
      <table width="100%" border="1" cellspacing="0" cellpadding="3" align="center">
        <tr>
        	<th width="4%" class="table-header-repeat"><b>No</b></th>
            <th width="25%" class="table-header-repeat"><b>Nama Siswa</b></th>
            <th width="8%" class="table-header-repeat"><b>NIS</b></th>
            <th width="5%" class="table-header-repeat"><b>UH</b></th>
            <th width="7%" class="table-header-repeat"><b>Tugas</b></th>
            <th width="5%" class="table-header-repeat"><b>UTS</b></th>
            <th width="5%" class="table-header-repeat"><b>UAS</b></th>
            <th width="10%" class="table-header-repeat"><b>Nilai Akhir</b></th>
        </tr>
  <?php
  $i=1;
  while($row=mysql_fetch_array($query)) {
  ?>
        <tr>
          		<td><?php echo $i;?></td>
				<td><?php echo $row['nama_siswa'];?></td>
				<td><?php echo $row['nis'];?></td>
				<td align="center"><?php echo $row['rata_uh']; ?></td>
                <td align="center"><?php echo $row['rata_tgs']; ?></td>
                <td align="center"><?php echo $row['uts']; ?></td>
                <td align="center"><?php echo $row['uas']; ?></td>
                <td align="center"><?php echo $row['nilai_akhir']; ?></td>
        </tr>
        <?php $i++; } ?>
      </table>
<?php }


		
// LAPORAN NILAI UH
		else if($_POST['pilih']=="uh"){
?>

  <tr>
    <td><hr color="#000000" /></td>
  </tr>
  <tr>
  <td><?php echo "<p align='center'><b><font size='4'>LAPORAN NILAI ULANGAN HARIAN <br> MATA PELAJARAN $nama_pelajaran KELAS $nama_kelas</font><b></p><br>"; ?></td>
  </tr>
  <tr>
    <td align="center">
      <table width="100%" border="1" cellspacing="0" cellpadding="3" align="center">
        <tr>
        	<th width="4%" class="table-header-repeat"><b>No</b></th>
            <th width="25%" class="table-header-repeat"><b>Nama Siswa</b></th>
            <th width="8%" class="table-header-repeat"><b>NIS</b></th>
            <th width="5%" class="table-header-repeat"><b>UH1</b></th>
            <th width="7%" class="table-header-repeat"><b>UH2</b></th>
            <th width="5%" class="table-header-repeat"><b>UH3</b></th>
            <th width="5%" class="table-header-repeat"><b>UH4</b></th>
            <th width="10%" class="table-header-repeat"><b>Rata-Rata</b></th>
        </tr>
  <?php
  $i=1;
  while($row=mysql_fetch_array($query)) {
  ?>
        <tr>
          		<td><?php echo $i;?></td>
				<td><?php echo $row['nama_siswa'];?></td>
				<td><?php echo $row['nis'];?></td>
				<td align="center"><?php echo $row['nilai_uh1']; ?></td>
                <td align="center"><?php echo $row['nilai_uh2']; ?></td>
                <td align="center"><?php echo $row['nilai_uh3']; ?></td>
                <td align="center"><?php echo $row['nilai_uh4']; ?></td>
                <td align="center"><?php echo $row['rata_uh']; ?></td>
        </tr>
        <?php $i++; } ?>
      </table>
<?php }

		
// LAPORAN NILAI TUGAS
		else if($_POST['pilih']=="tugas"){
?>

  <tr>
    <td><hr color="#000000" /></td>
  </tr>
  <tr>
  <td><?php echo "<p align='center'><b><font size='4'>LAPORAN NILAI TUGAS <br> MATA PELAJARAN $nama_pelajaran KELAS $nama_kelas</font><b></p><br>"; ?></td>
  </tr>
  <tr>
    <td align="center">
      <table width="100%" border="1" cellspacing="0" cellpadding="3" align="center">
        <tr>
        	<th width="4%" class="table-header-repeat"><b>No</b></th>
            <th width="25%" class="table-header-repeat"><b>Nama Siswa</b></th>
            <th width="8%" class="table-header-repeat"><b>NIS</b></th>
            <th width="5%" class="table-header-repeat"><b>Tugas 1</b></th>
            <th width="7%" class="table-header-repeat"><b>Tugas 2</b></th>
            <th width="5%" class="table-header-repeat"><b>Tugas 3</b></th>
            <th width="5%" class="table-header-repeat"><b>Tugas 4</b></th>
            <th width="10%" class="table-header-repeat"><b>Rata-Rata</b></th>
        </tr>
  <?php
  $i=1;
  while($row=mysql_fetch_array($query)) {
  ?>
        <tr>
          		<td><?php echo $i;?></td>
				<td><?php echo $row['nama_siswa'];?></td>
				<td><?php echo $row['nis'];?></td>
				<td align="center"><?php echo $row['nilai_tgs1']; ?></td>
                <td align="center"><?php echo $row['nilai_tgs2']; ?></td>
                <td align="center"><?php echo $row['nilai_tgs3']; ?></td>
                <td align="center"><?php echo $row['nilai_tgs4']; ?></td>
                <td align="center"><?php echo $row['rata_tgs']; ?></td>
        </tr>
        <?php $i++; } ?>
      </table>
<?php }


// LAPORAN NILAI UTS
		else if($_POST['pilih']=="uts"){
?>

  <tr>
    <td><hr color="#000000" /></td>
  </tr>
  <tr>
  <td><?php echo "<p align='center'><b><font size='4'>LAPORAN NILAI UTS <br> MATA PELAJARAN $nama_pelajaran KELAS $nama_kelas</font><b></p><br>"; ?></td>
  </tr>
  <tr>
    <td align="center">
      <table width="100%" border="1" cellspacing="0" cellpadding="3" align="center">
        <tr>
        	<th width="4%" class="table-header-repeat"><b>No</b></th>
            <th width="25%" class="table-header-repeat"><b>Nama Siswa</b></th>
            <th width="8%" class="table-header-repeat"><b>NIS</b></th>
            <th width="5%" class="table-header-repeat"><b>UTS</b></th>
        </tr>
  <?php
  $i=1;
  while($row=mysql_fetch_array($query)) {
  ?>
        <tr>
          		<td><?php echo $i;?></td>
				<td><?php echo $row['nama_siswa'];?></td>
				<td><?php echo $row['nis'];?></td>
				<td align="center"><?php echo $row['uts']; ?></td>
        </tr>
        <?php $i++; } ?>
      </table>
<?php }



// LAPORAN NILAI UAS
		else if($_POST['pilih']=="uas"){
?>

  <tr>
    <td><hr color="#000000" /></td>
  </tr>
  <tr>
  <td><?php echo "<p align='center'><b><font size='4'>LAPORAN NILAI UAS <br> MATA PELAJARAN $nama_pelajaran KELAS $nama_kelas</font><b></p><br>"; ?></td>
  </tr>
  <tr>
    <td align="center">
      <table width="100%" border="1" cellspacing="0" cellpadding="3" align="center">
        <tr>
        	<th width="4%" class="table-header-repeat"><b>No</b></th>
            <th width="25%" class="table-header-repeat"><b>Nama Siswa</b></th>
            <th width="8%" class="table-header-repeat"><b>NIS</b></th>
            <th width="5%" class="table-header-repeat"><b>UAS</b></th>
        </tr>
  <?php
  $i=1;
  while($row=mysql_fetch_array($query)) {
  ?>
        <tr>
          		<td><?php echo $i;?></td>
				<td><?php echo $row['nama_siswa'];?></td>
				<td><?php echo $row['nis'];?></td>
				<td align="center"><?php echo $row['uas']; ?></td>
        </tr>
        <?php $i++; } ?>
      </table>
<?php }


// LAPORAN NILAI UTS
		else if($_POST['pilih']=="akhir"){
?>

  <tr>
    <td><hr color="#000000" /></td>
  </tr>
  <tr>
  <td><? echo "<p align='center'><b><font size='4'>LAPORAN NILAI AKHIR <br> MATA PELAJARAN $nama_pelajaran KELAS $nama_kelas</font><b></p><br>"; ?></td>
  </tr>
  <tr>
    <td align="center">
      <table width="100%" border="1" cellspacing="0" cellpadding="3" align="center">
        <tr>
        	<th width="4%" class="table-header-repeat"><b>No</b></th>
            <th width="25%" class="table-header-repeat"><b>Nama Siswa</b></th>
            <th width="8%" class="table-header-repeat"><b>NIS</b></th>
            <th width="5%" class="table-header-repeat"><b>Nilai Akhir</b></th>
        </tr>
  <?php
  $i=1;
  while($row=mysql_fetch_array($query)) {
  ?>
        <tr>
          		<td><?php echo $i;?></td>
				<td><?php echo $row['nama_siswa'];?></td>
				<td><?php echo $row['nis'];?></td>
				<td align="center"><?php echo $row['nilai_akhir']; ?></td>
        </tr>
        <?php $i++; } ?>
      </table>
<?php } }



?>
</td>
  </tr>
  <tr>
    <td><table width="200" border="0" cellspacing="0" cellpadding="0" align="right">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Jakarta, <?=date("d-m-Y"); ?></td>
      </tr>
      <tr>
        <td>Kepala Sekolah </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><u>XXXXXXXXXX</u></td>
      </tr>
      <tr>
        <td>NIP. XXXXXXXXXX</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>