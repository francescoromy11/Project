<?php
    //koneksi terpusat
    include "conn.php";

    include 'head.php'; 
error_reporting(E_ALL ^ E_NOTICE); 

    if(isset($_POST['submit'])){
    
    $jumSis = $_POST['jumlah'];
    
    
    for ($i=1; $i<=$jumSis; $i++)
    {
       
     $sql=mysql_query("select * from tbl_nilai order by id_nilai DESC LIMIT 0,1");
    $data=mysql_fetch_array($sql);
  $kodeawal=substr($data['id_nilai'],3,4)+1;
  if($kodeawal<10){
    $kode='N0000'.$kodeawal;
  }elseif($kodeawal > 9 && $kodeawal <=99){
    $kode='N000'.$kodeawal;
  }else{
    $kode='N00'.$kodeawal;
  }  
     $nilai_tgs1  = $_POST['nilai_tgs1'.$i];
     $nilai_tgs2  = $_POST['nilai_tgs2'.$i];
     $nilai_tgs3  = $_POST['nilai_tgs3'.$i];
     $nilai_tgs4  = $_POST['nilai_tgs4'.$i];
     $nilai_uh1  = 0;
     $nilai_uh2  = 0;
     $nilai_uh3  = 0;
     $nilai_uh4  = 0;
     $rata_uh  = 0;
     $uts  = 0;
     $uas  = 0;
     $rata_kelas  = 0;
     
     
     if($nilai_tgs1=='0' && $nilai_tgs2=='0' && $nilai_tgs3=='0' && $nilai_tgs4=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1!=='0' && $nilai_tgs2=='0' && $nilai_tgs3=='0' && $nilai_tgs4=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1=='0' && $nilai_tgs2!=='0' && $nilai_tgs3=='0' && $nilai_tgs4=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1=='0' && $nilai_tgs2=='0' && $nilai_tgs3!=='0' && $nilai_tgs4=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1=='0' && $nilai_tgs2=='0' && $nilai_tgs3=='0' && $nilai_tgs4!=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1!=='0' && $nilai_tgs2!=='0' && $nilai_tgs3=='0' && $nilai_tgs4=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1!=='0' && $nilai_tgs2=='0' && $nilai_tgs3!=='0' && $nilai_tgs4=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1!=='0' && $nilai_tgs2=='0' && $nilai_tgs3=='0' && $nilai_tgs4!=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1=='0' && $nilai_tgs2!=='0' && $nilai_tgs3!=='0' && $nilai_tgs4=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1=='0' && $nilai_tgs2!=='0' && $nilai_tgs3=='0' && $nilai_tgs4!=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1=='0' && $nilai_tgs2=='0' && $nilai_tgs3!=='0' && $nilai_tgs4!=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1!=='0' && $nilai_tgs2!=='0' && $nilai_tgs3!=='0' && $nilai_tgs4=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1!=='0' && $nilai_tgs2!=='0' && $nilai_tgs3=='0' && $nilai_tgs4!=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1!=='0' && $nilai_tgs2=='0' && $nilai_tgs3!=='0' && $nilai_tgs4!=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1=='0' && $nilai_tgs2!=='0' && $nilai_tgs3!=='0' && $nilai_tgs4!=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     if($nilai_tgs1!=='0' && $nilai_tgs2!=='0' && $nilai_tgs3!=='0' && $nilai_tgs4!=='0') $rata_tgs = ($nilai_tgs1 + $nilai_tgs2 + $nilai_tgs3 + $nilai_tgs4)/4;
     
     $nilai_akhir = (15 * $rata_tgs)/100;
     $kkm = 70;
     
     $total = $total + $nilai_akhir;
     
     if($nilai_akhir < $kkm) $predikat = 'Tidak Tuntas';
     if($nilai_akhir >= 40) $predikat = 'Kurang';
     if($nilai_akhir >= 56) $predikat = 'Cukup';
     if($nilai_akhir >= 71) $predikat = 'Baik';
     if($nilai_akhir >= 86) $predikat = 'Sangat Baik';
       
       $id_siswa    = $_POST['id_siswa'.$i];
       $id_guru     = $_POST['id_guru'];
       $id_kelas    = $_POST['id_kelas'];
       $id_jadwal   = $_POST['id_jadwal'];
       $id_pelajaran= $_POST['id_pelajaran'];
    
       $query = "insert into tbl_nilai (id_siswa,
                                        id_jadwal,
                                        id_pelajaran, 
                                        id_kelas, 
                                        id_guru, 
                                        nilai_uh1, 
                                        nilai_uh2, 
                                        nilai_uh3, 
                                        nilai_uh4, 
                                        rata_uh, 
                                        nilai_tgs1, 
                                        nilai_tgs2, 
                                        nilai_tgs3, 
                                        nilai_tgs4, 
                                        rata_tgs, 
                                        uts, 
                                        uas, 
                                        nilai_akhir, 
                                        kkm, 
                                        rata_kelas, 
                                        predikat) 
                                values('$id_siswa',
                                        '$id_jadwal',
                                        '$id_pelajaran',
                                        '$id_kelas',
                                        '$id_guru',
                                        '$nilai_uh1',
                                        '$nilai_uh2',
                                        '$nilai_uh3',
                                        '$nilai_uh4',
                                        '$rata_uh',
                                        '$nilai_tgs1',
                                        '$nilai_tgs2',
                                        '$nilai_tgs3',
                                        '$nilai_tgs4',
                                        '$rata_tgs',
                                        '$uts',
                                        '$uas',
                                        '$nilai_akhir',
                                        '$kkm',
                                        '$rata_kelas',
                                        '$predikat'
                                      )";
       $hasil=mysql_query($query);
       
       if($i>=$jumSis) { 
       $rata_kelas = $total / $jumSis;
       for ($i=1; $i<=$jumSis; $i++)
        {
        $id_siswa = $_POST['id_siswa'.$i];
       $query = "update tbl_nilai set rata_kelas='$rata_kelas' where id_siswa='$id_siswa' and id_jadwal='$id_jadwal' and id_pelajaran='$id_pelajaran' and id_kelas='$id_kelas' and id_guru='$id_guru'";
       $hasil=mysql_query($query);
        }
       }
    }
    
    if($hasil){
        ?><script language="javascript">document.location.href="nilai_tugas_selesai.php?id_guru=<?php echo $id_guru;?>&id_kelas=<?php echo $id_kelas;?>&id_jadwal=<?php echo $id_jadwal;?>&id_pelajaran=<?php echo $id_pelajaran;?>";</script><?php
    }else{
        ?><script language="javascript">document.location.href="nilai_tugas_selesai.php?status=2";</script><?php
    }
    
}else{
    unset($_POST['submit']);
}

?>

<body>
    <!-- topbar starts -->
    <?php include 'topbar.php'; ?>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
            <?php include'menu_guru.php'; ?>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Tugas</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Tugas</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>

            <br>

            <?php
              if($_GET['status']=='1'){
              ?>
              
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  Data Berhasil Disimpan.
              </div>
              
              <?php
              }
              
              if($_GET['status']=='0'){
              ?>

              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  Maaf, Data gagal di simpan
              </div>
              
              <?php
              }
              ?>

            <?php
                $id_guru=$_GET['id_guru'];
                $id_kelas=$_GET['id_kelas'];
                $id_jadwal=$_GET['id_jadwal'];
                $id_pelajaran=$_GET['id_pelajaran'];
                
                $guru=mysql_fetch_array(mysql_query("select * from data_guru where id_guru='$id_guru'"));
                $kelas=mysql_fetch_array(mysql_query("select * from tbl_kelas where id_kelas='$id_kelas'"));
                $pelajaran=mysql_fetch_array(mysql_query("select * from tbl_jadwal jadwal, tbl_pelajaran pelajaran where jadwal.id_pelajaran=pelajaran.id_pelajaran and id_jadwal='$id_jadwal'"));
                
                $nama_guru=$guru['nama_guru'];
                $nama_kelas=$kelas['nama_kelas'];
                $nama_pelajaran=$pelajaran['nama_pelajaran'];
            ?>

            <div class="box-content">
              <div class="form-group">
                  <label>Nama Guru</label>
                  <input type="text" name="nama_guru" class="form-control" value="<?php echo $nama_guru;?>" disabled="disabled">
              </div>
              <div class="form-group">
                  <label>Pelajaran</label>
                  <input type="text" name="nama_pelajaran" class="form-control" value="<?php echo $nama_pelajaran;?>" disabled="disabled">
              </div>
              <div class="form-group">
                  <label>Kelas</label>
                  <input type="text" name="kelas" class="form-control" value="<?php echo $nama_kelas;?>" disabled="disabled">
              </div>
            </div>
        </div>
    </div>
    <!--/span-->


    </div><!--/row -->

    <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Input Nilai Ulangan Harian</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>

            <div class="box-content">
              <form action="nilai_tugas_input.php" method="post" role="form">
              <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <thead>
                <tr>
                    <th width="5%">Nomor</th>
                    <th width="30%">Nama Siswa</th>
                    <th width="15%">NIS</th>
                    <th width="10%">Tugas 1</th>
                    <th width="10%">Tugas 2</th>
                    <th width="10%">Tugas 3</th>
                    <th width="10%">Tugas 4</th>
                    <th width="10%">Rata-rata</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $view=mysql_query("SELECT * FROM data_siswa WHERE id_kelas='$id_kelas' order by nama_siswa asc");
                
                $i = 1;
                while($row=mysql_fetch_array($view)){
                  ?>
                  <input type="hidden" name="id_guru" value="<?php echo $id_guru;?>" />
                  <input type="hidden" name="id_mapel" value="<?php echo $id_mapel;?>" /> 
                  <input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>" />
                  <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran;?>" />
                  <?php echo "<input type='hidden' name='id_siswa".$i."' value='".$row['id_siswa']."' />"; ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['nama_siswa'];?></td>
                  <td><?php echo $row['nis'];?></td>
                  <td><?php echo "<input type='text' name='nilai_tgs1".$i."' size='10' value='0'/>"; ?></td>
                  <td><?php echo "<input type='text' name='nilai_tgs2".$i."' size='10' value='0'/>"; ?></td>
                  <td><?php echo "<input type='text' name='nilai_tgs3".$i."' size='10' value='0'/>"; ?></td>
                  <td><?php echo "<input type='text' name='nilai_tgs4".$i."' size='10' value='0'/>"; ?></td>
                  <td><?php echo 0; ?></td>
                    
                </tr>
                <?php
                  $i++;
                }
                  $jumSis = $i-1;
                ?>
                <input type="hidden" name="jumlah" value="<?php echo $jumSis ?>" />
                <tr>
                  <td colspan="8" align="center"><input type="submit" onclick="return confirm('Apakah Anda yakin?')" value="Input" name="submit"/></td>
                </tr>
                </tbody>
              </table>
            </form>
            </div>
        </div>
    </div>
    <!--/span-->


    </div><!--/row -->

    <!-- <div class="row"> -->
        <!-- <div class="box col-md-12"> -->
            <!-- <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Responsive, Swipable Table</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td>Muhammad Usman</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    View
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Abraham</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    View
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Brown Blue</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    View
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Worth Name</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    View
                                </a>
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->
        <!-- </div> -->
        <!--/span-->

    <!-- </div>/row -->

    <!-- <div class="row"> -->
        <!-- <div class="box col-md-6">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Simple Table</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Muhammad Usman</td>
                            <td class="center">2012/01/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>White Horse</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-default label label-danger">Banned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sheikh Heera</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Admin</td>
                            <td class="center">
                                <span class="label-default label">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Saruar</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sana Amrin</td>
                            <td class="center">2012/01/21</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span

        <div class="box col-md-6">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Striped Table</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Muhammad Usman</td>
                            <td class="center">2012/01/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>White Horse</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-default label label-danger">Banned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sheikh Heera</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Admin</td>
                            <td class="center">
                                <span class="label-default label">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Saruar</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sana Amrin</td>
                            <td class="center">2012/01/21</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!--/span-->
    <!-- </div>/row -->

    <!-- <div class="row">
        <div class="box col-md-6">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Bordered Table</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Muhammad Usman</td>
                            <td class="center">2012/01/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>White Horse</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-default label label-danger">Banned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sheikh Heera</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Admin</td>
                            <td class="center">
                                <span class="label-default label">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Saruar</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sana Amrin</td>
                            <td class="center">2012/01/21</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
        /span

        <div class="box col-md-6">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Condensed Table</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Muhammad Usman</td>
                            <td class="center">2012/01/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>White Horse</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-default label label-danger">Banned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sheikh Heera</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Admin</td>
                            <td class="center">
                                <span class="label-default label">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Saruar</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sana Amrin</td>
                            <td class="center">2012/01/21</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span

    </div> --><!--/row-->

    <!-- <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Combined All</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Muhammad Usman</td>
                            <td class="center">2012/01/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>White Horse</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-default label label-danger">Banned</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sheikh Heera</td>
                            <td class="center">2012/02/01</td>
                            <td class="center">Admin</td>
                            <td class="center">
                                <span class="label-default label">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Saruar</td>
                            <td class="center">2012/03/01</td>
                            <td class="center">Member</td>
                            <td class="center">
                                <span class="label-warning label label-default">Pending</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sana Amrin</td>
                            <td class="center">2012/01/21</td>
                            <td class="center">Staff</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --><!--/span-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    <div class="row">
        <!-- <div class="col-md-9 col-lg-9 col-xs-9 hidden-xs">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Charisma Demo 2 
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-5108790028230107"
                 data-ad-slot="3193373905"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div> -->
        <div class="col-md-2 col-lg-3 col-sm-12 col-xs-12 email-subscription-footer">
            <div class="mc_embed_signup">
                <form action="//halalit.us3.list-manage.com/subscribe/post?u=444b176aa3c39f656c66381f6&amp;id=eeb0c04e84" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <!-- <div>
                        <label>Keep up with my work</label>
                        <input type="email" value="" name="EMAIL" class="email" placeholder="Email address" required>

                        <div class="power_field"><input type="text" name="b_444b176aa3c39f656c66381f6_eeb0c04e84" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" class="button"></div>
                    </div> -->
                </form>
            </div>

            <!--End mc_embed_signup-->
        </div>

    <br><br><br><br><br><br>
    <hr>

    <?php include 'footer.php'; 
    

?>  