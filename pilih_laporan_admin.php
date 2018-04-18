<?php 
session_start();

if(isset($_SESSION['username'])){

    //koneksi terpusat
    include "conn.php";
    $username=$_SESSION['username'];

    include 'head.php'; 

error_reporting(E_ALL ^ E_NOTICE);

?>

<body>
    <!-- topbar starts -->
    <?php include 'topbar.php'; ?>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
            <?php include'menu_admin.php'; ?>
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
                <a href="#">Laporan Penilaian</a>
            </li>
        </ul>
    </div>

    <!-- <div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Input Guru</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="?page=data_guru" method="post" role="form"action="?page=data_guru" method="post">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control"  placeholder="Enter NIP">
                    </div>
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text" name="nama_guru" class="form-control"  placeholder="Nama Guru">
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="controls">
                        <select name="kelamin" id="selectError">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"  placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control"  placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span

    </div><!--/row--> 
<!-- <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Input Guru</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
            <form action="?page=data_guru" method="post">
                    <label>Cari Berdasarkan</label>&nbsp;
                    <select name="pilih" id="selectError">
                        <option value="0">-- pilih --</option>
                        <option value="semua">Semua</option>
                        <option value="nip">NIP</option>
                        <option value="nama">Nama</option>
                        <option value="jk">Jenis Kelamin</option>
                    </select>&nbsp;&nbsp;
                    <label>Kata Kunci</label>
                    <input type="text" name="kata" class="email"  placeholder="Kata Kunci">&nbsp;&nbsp;
                    <input type="submit" name="cari" value=" Cari " class="form-cari" />
            <!-- end id-form  
            </form>
        </div>
    </div>
</div> -->

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-file"></i> Laporan Penilaian</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>

            <div class="box-content">
                <form action="pilih_laporan_admin.php?id_kelas=<?php echo $row3['id_kelas'];?>&id_jadwal=<?php echo $row2['id_jadwal'];?>" role="form" method="post">
                    <div class="form-group">
                        <label>Kelas</label>
                        <div class="controls">
                        <select name="id_kelas"  class="styledselect_form_1">
                            <option value="0">-- Pilih Kelas --</option>
                          <?php
                          $kelas=mysql_query("select * from tbl_kelas order by nama_kelas asc");
                          while($row3=mysql_fetch_array($kelas)){
                          ?>
                              <option value="<?php echo $row3['id_kelas'];?>"><?php echo $row3['nama_kelas'];?></option>
                          <?php
                          }
                          ?>    
  
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Pelajaran</label>
                        <div class="controls">
                        <select name="id_pelajaran" id="selectError">
                            <option value="0">-- Pilih Mata Pelajaran --</option>
                            <?php
                          $pelajaran=mysql_query("select * from tbl_pelajaran order by nama_pelajaran asc");
                          while($row2=mysql_fetch_array($pelajaran)){
                          ?>
                              <option value="<?php echo $row2['id_pelajaran'];?>"><?php echo $row2['nama_pelajaran'];?></option>
                          <?php
                          }
                          ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <div class="controls">
                        <select name="pilih" id="pilih">
                            <option value="0">-- Pilih Nilai --</option>
                            <option value="semua">Semua Ulangan</option>
                            <option value="uh">Ulangan Harian</option>
                            <option value="tugas">Tugas</option>
                            <option value="uts">UTS</option>
                            <option value="uas">UAS</option>
                            <option value="akhir">Nilai Akhir</option>
                        </select>
                    </div>
                    </div>
                    <input type="submit" name="submit" value=" Cari " class="btn btn-success"/>

                    <img src="images/shared/blank.gif" width="695" height="1" alt="blank" />

                </form>

            
    <!--/span-->

    </div><!--/row -->

    <br><br>
    
     <?php
                
        if(isset($_POST['submit'])){
            $id_kelas=$_POST['id_kelas'];
            $id_jadwal=$_POST['id_jadwal'];
            }
            $view=mysql_query("SELECT * FROM tbl_nilai nilai, data_siswa siswa WHERE nilai.id_siswa=siswa.id_siswa and nilai.id_kelas='$id_kelas' and nilai.id_jadwal='$id_jadwal' order by siswa.nama_siswa asc");
            
            if($_POST['pilih']=="semua"){
            
            ?>

    <div class="box-content">
    <!-- <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
    <form action="print_nilai.php" role="form" method="post">
    <input type="submit" name="print" value="Cetak" class="btn btn-primary">
    <br><br>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>UH</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
    </tr>
    </thead>
    <tbody>
    <?php
        if($view=== FALSE) { 
          die(mysql_error()); 
          }         
        $i = 1;
        while($row=mysql_fetch_array($view)){
    ?>
        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>" />
        <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran;?>" />
        <input type="hidden" name="pilih" value="semua" />
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['nama_siswa'];?></td>
        <td><?php echo $row['nis'];?></td>
        <td><?php echo $row['rata_uh']; ?></td>
        <td><?php echo $row['rata_tgs']; ?></td>
        <td><?php echo $row['uts']; ?></td>
        <td><?php echo $row['uas']; ?></td>
        <td><?php echo $row['nilai_akhir']; ?></td>
    </tr>
    <?php
        $i++;
        }
    ?>
    </tbody>
    </table>
    </form>
    <?php
        }
        else if($_POST['pilih']=="uh"){
    ?>
    <form action="print_nilai.php" role="form" method="post">
    <input type="submit" name="print" value="Cetak" class="form-cetak">
    <br>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>UH1</th>
        <th>UH2</th>
        <th>UH3</th>
        <th>UH4</th>
        <th>Rata-Rata</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
        while($row=mysql_fetch_array($view)){
            ?>
        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>" />
        <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran;?>" />
        <input type="hidden" name="pilih" value="uh" />
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['nama_siswa'];?></td>
        <td><?php echo $row['nis'];?></td>
        <td><?php echo $row['nilai_uh1']; ?></td>
        <td><?php echo $row['nilai_uh2']; ?></td>
        <td><?php echo $row['nilai_uh3']; ?></td>
        <td><?php echo $row['nilai_uh4']; ?></td>
        <td><?php echo $row['rata_uh']; ?></td>
    </tr>
    <?php
        $i++;
        }
    ?>
    </tbody>
    </table>
    </form>
    <?php
        }
        else if($_POST['pilih']=="tugas"){
    ?>
    <form action="print_nilai.php" role="form" method="post">
    <input type="submit" name="print" value="Cetak" class="form-cetak">
    <br>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>Tugas1</th>
        <th>Tugas2</th>
        <th>Tugas3</th>
        <th>Tugas4</th>
        <th>Rata-Rata</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
        while($row=mysql_fetch_array($view)){
    ?>
        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>" />
        <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran;?>" />
        <input type="hidden" name="pilih" value="tugas" />
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['nama_siswa'];?></td>
        <td><?php echo $row['nis'];?></td>
        <td><?php echo $row['nilai_tgs1']; ?></td>
        <td><?php echo $row['nilai_tgs2']; ?></td>
        <td><?php echo $row['nilai_tgs3']; ?></td>
        <td><?php echo $row['nilai_tgs4']; ?></td>
        <td><?php echo $row['rata_tgs']; ?></td>
    </tr>
    <?php
        $i++;
        }
    ?>
    </tbody>
    </table>
    </form>
    <?php
        }
        else if($_POST['pilih']=="uts"){
    ?>
    <form action="print_nilai.php" role="form" method="post">
    <input type="submit" name="print" value="Cetak" class="form-cetak">
    <br>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>UTS</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
        while($row=mysql_fetch_array($view)){
    ?>
        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>" />
        <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran;?>" />
        <input type="hidden" name="pilih" value="uts" />
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['nama_siswa'];?></td>
        <td><?php echo $row['nis'];?></td>
        <td><?php echo $row['uts']; ?></td>
    </tr>
    <?php
        $i++;
        }
    ?>
    </tbody>
    </table>
    </form>
    <?php
        }
        else if($_POST['pilih']=="uas"){
    ?>
    <form action="print_nilai.php" role="form" method="post">
    <input type="submit" name="print" value="Cetak" class="form-cetak">
    <br>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>UAS</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
        while($row=mysql_fetch_array($view)){
    ?>
        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>" />
        <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran;?>" />
        <input type="hidden" name="pilih" value="uas" />
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['nama_siswa'];?></td>
        <td><?php echo $row['nis'];?></td>
        <td><?php echo $row['uas']; ?></td>
    </tr>
    <?php
        $i++;
        }
    ?>
    </tbody>
    </table>
    </form>
    <?php
        }
        else if($_POST['pilih']=="akhir"){
    ?>
    <form action="print_nilai.php" role="form" method="post">
    <input type="submit" name="print" value="Cetak" class="form-cetak">
    <br>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>Nilai Akhir</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $i = 1;
        while($row=mysql_fetch_array($view)){
    ?>
        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas;?>" />
        <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran;?>" />
        <input type="hidden" name="pilih" value="akhir" />
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['nama_siswa'];?></td>
        <td><?php echo $row['nis'];?></td>
        <td><?php echo $row['nilai_akhir']; ?></td>
    </tr>
    <?php
        $i++;
        }
    ?>
    </tbody>
    </table>
    </form>
    <?php
        }
    ?>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

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
    <!-- <div class="row">
        <div class="col-md-9 col-lg-9 col-xs-9 hidden-xs">
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

    <br><br><br><br><br><br><br><br><br><br>
    <hr>

    <?php include 'footer.php'; 

    }else{
    session_destroy();
    header('Location:index.php?status=Silahkan Login');
    }
    ?>
