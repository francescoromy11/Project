<?php include'head.php'; ?>
<?php include'conn.php'; ?>
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Input Siswa</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="add_data_siswa_proses.php" method="post" role="form" method="post" onSubmit='return validasi_input(this)'>
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="nis" class="form-control" value=<?php echo"$_GET[nis]"; ?> readonly="true">
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control"  placeholder="Nama Siswa">
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
                    <label>Kelas</label>
                    <div class="controls">
                        <?php  ?>
                        <select name="id_kelas" id="selectError">
                            <option value=""></option>
                            <?php
                          $kelas=mysql_query("select * from tbl_kelas order by nama_kelas asc");
                          while($row3=mysql_fetch_array($kelas)){
                          ?>
                           <option value="<?php echo $row3['id_kelas'];?>">&nbsp;<?php echo $row3['nama_kelas'];?>&nbsp;</option>
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