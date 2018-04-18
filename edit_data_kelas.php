<?php include'head.php'; ?>
<?php include'conn.php'; ?>
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Kelas</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php 
                    $id_kelas = $_GET['id_kelas'];
                    $query=mysql_query("SELECT
                                        tbl_kelas.id_kelas,
                                        tbl_kelas.nama_kelas,
                                        tbl_kelas.id_guru,
                                        tbl_kelas.username,
                                        tbl_kelas.password,
                                        data_guru.nama_guru,
                                        data_guru.id_guru
                                        FROM
                                        data_guru
                                        INNER JOIN tbl_kelas ON tbl_kelas.id_guru = data_guru.id_guru
                                         where id_kelas='$id_kelas'") or die (mysql_error());
                    $row=mysql_fetch_array($query);
                    $id_guru=$row['id_guru'];

                 ?>
                <form action="edit_data_kelas_proses.php" method="post" role="form" method="post" onSubmit='return validasi_input(this)'>
                    <div class="form-group">
                        <input type="hidden" name="id_kelas" value=" <?php echo $id_kelas; ?>"/>
                        <label>Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control"  placeholder="Nama Kelas" value="<?php echo "$row[nama_kelas]"; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Wali Kelas</label>
                        <div class="controls">
                        <select name="id_guru" id="selectError">
                            <?php    
                                $dept=mysql_query("SELECT * FROM data_guru WHERE NOT EXISTS (SELECT * FROM tbl_kelas WHERE tbl_kelas.id_guru = data_guru.id_guru) order by nama_guru asc");
                                echo"<option value='".$row['nama_guru']."'>".$row['nama_guru']."</option>";
                                while($row1=mysql_fetch_array($dept))
                                {
                                    if ($row['id_guru']==$row1['id_guru']){
                                        echo "<option value='".$row1['nama_guru']."' selected>".$row1['nama_guru']."</option>";
                                    }
                                    else {
                                        echo "<option value='".$row1['nama_guru']."'>".$row1['nama_guru']."</option>";
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