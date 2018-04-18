<?php include'head.php'; ?>
<?php include'conn.php'; ?>
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Siswa</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php 
                    $nis = $_GET['nis'];
                    $query=mysql_query("select * from data_siswa where nis='$nis'") or die (mysql_error());
                    $row=mysql_fetch_array($query);
                    $id_siswa=$row['id_siswa'];

                 ?>
                <form action="edit_data_siswa_proses.php" method="post" role="form" method="post" enctype='multipart/form-data' onSubmit="return check();">
                    <div class="form-group">
                        <input type="hidden" name="id_siswa" value=" <?php echo $id_siswa; ?>"/>
                        <label>NIP</label>
                        <input type="text" name="nis" class="form-control"  placeholder="Enter NIS" value="<?php echo "$row[nis]"; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control"  placeholder="Nama Siswa" value="<?php echo "$row[nama_siswa]"; ?>">
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="controls">
                        <?php    
                            if($row['kelamin']=='laki-laki'){
                            $bg1="selected";
                            }else{
                            $bg1="";
                            }
                            if($row['kelamin']=='perempuan'){
                            $bg2="selected";
                            }else{
                            $bg2="";
                            }
                    echo "<select name='kelamin' id='selectError'>
                            <option value=laki-laki $bg1>Laki-laki</option>
                            <option value=perempuan $bg2>Perempuan</option>
                        </select>";
                        ?>
                    </div>
                    </div>
                    <div class="form-group">
                    <label>Kelas</label>
                    <div class="controls">
                        <select name='id_kelas' id='selectError'>
                            <?php    
                                $dept=mysql_query("select * from tbl_kelas order by nama_kelas");
                                while($row1=mysql_fetch_array($dept))
                                {
                                    if ($row['id_kelas']==$row1['id_kelas']){
                                        echo "<option value='".$row1['nama_kelas']."' selected>".$row1['nama_kelas']."</option>";
                                    }
                                    else {
                                        echo "<option value='".$row1['nama_kelas']."'>".$row1['nama_kelas']."</option>";
                                    }
                                    ?>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"  placeholder="Username" value="<?php echo "$row[username]"; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="Password" value="<?php echo "$row[password]"; ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" 
        onclick="window.open('', '_self', ''); window.close();" class="btn btn-danger">Keluar</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

    </div><!--/row -->