<?php include'head.php'; ?>
<?php include'conn.php'; ?>
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Guru</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php 
                    $nip = $_GET['nip'];
                    $query=mysql_query("select * from data_guru where nip='$nip'") or die (mysql_error());
                    $row=mysql_fetch_array($query);
                    $id_guru=$row['id_guru'];
                 ?>
                <form action="edit_data_guru_proses.php" method="post" role="form" method="post" enctype='multipart/form-data' onSubmit="return check();">
                    <div class="form-group">
                        <input type="hidden" name="id_guru" value=" <?php echo $id_guru; ?>"/>
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control"  placeholder="Enter NIP" value="<?php echo "$row[nip]"; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text" name="nama_guru" class="form-control"  placeholder="Nama Guru" value="<?php echo "$row[nama_guru]"; ?>">
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