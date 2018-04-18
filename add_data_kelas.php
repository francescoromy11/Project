<?php include'head.php'; ?>
<?php include'conn.php'; ?>
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Input Kelas</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="add_data_kelas_proses.php" method="post" role="form" method="post" onSubmit='return validasi_input(this)'>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control"  placeholder="Nama Kelas">
                    </div>
                    <div class="form-group">
                        <label>Nama Wali Kelas</label>
                        <div class="controls">
                        <select name="id_guru" id="selectError" placeholder="Nama Wali Kelas">
                            <OPTION value=''></OPTION>
                            <?php
                            $guru=mysql_query("SELECT * FROM data_guru WHERE NOT EXISTS (SELECT * FROM tbl_kelas WHERE tbl_kelas.id_guru = data_guru.id_guru) order by nama_guru asc");
                            while($row1=mysql_fetch_array($guru)){
                              ?>
                            <option value="<?php echo $row1['id_guru'];?>"><?php echo $row1['nama_guru'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"  placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                    <button type="button" 
        onclick="window.open('', '_self', ''); window.close();" class="btn btn-danger">Keluar</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

    </div><!--/row -->