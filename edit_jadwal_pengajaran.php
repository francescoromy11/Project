<?php include'head.php'; ?>
<?php include'conn.php'; ?>
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Jadwal Pengajaran</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php 
                    $id_jadwal = $_GET['id_jadwal'];
                    $query=mysql_query("SELECT
                                        tbl_jadwal.id_jadwal,
                                        tbl_jadwal.id_pelajaran,
                                        tbl_jadwal.id_guru,
                                        tbl_jadwal.id_kelas,
                                        data_guru.nama_guru,
                                        data_guru.id_guru
                                        FROM
                                        data_guru
                                        INNER JOIN tbl_jadwal ON tbl_jadwal.id_guru = data_guru.id_guru 
                                        where id_jadwal='$id_jadwal'") or die (mysql_error());
                    $row=mysql_fetch_array($query);
                    $id_guru=$row['id_guru'];

                 ?>
                <form action="edit_jadwal_pengajaran_proses.php" method="post" role="form" method="post" onSubmit='return validasi_input(this)'>
                    <div class="form-group">
                        <input type="hidden" name="id_jadwal" value=" <?php echo $id_jadwal; ?>"/>
                        <label>Nama Guru</label>
                        <div class="controls">
                        <select name="id_guru" id="selectError">
                            <?php    
                                $dept=mysql_query("SELECT * FROM data_guru WHERE NOT EXISTS (SELECT * FROM tbl_jadwal WHERE tbl_jadwal.id_guru = data_guru.id_guru) order by nama_guru asc");
                                echo"<option value='".$row['id_guru']."'>".$row['nama_guru']."</option>";
                                while($row1=mysql_fetch_array($dept))
                                {
                                    if ($row['id_guru']==$row1['id_guru']){
                                        echo "<option value='".$row1['id_guru']."' selected>".$row1['nama_guru']."</option>";
                                    }
                                    else {
                                        echo "<option value='".$row1['id_guru']."'>".$row1['nama_guru']."</option>";
                                    }
                                    ?>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Pelajaran</label>
                        <div class="controls">
                        <select name='id_pelajaran' id='selectError'>
                        <?php    
                            $dept=mysql_query("select * from tbl_pelajaran order by nama_pelajaran");
                            while($row1=mysql_fetch_array($dept))
                            {
                                if ($row['id_pelajaran']==$row1['id_pelajaran']){
                                    echo "<option value='".$row1['id_pelajaran']."' selected>".$row1['nama_pelajaran']."</option>";
                                }
                                else {
                                    echo "<option value='".$row1['id_pelajaran']."'>".$row1['nama_pelajaran']."</option>";
                                }
                                ?>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    </div>
                    <label>Kelas</label>
                    <div class="controls">
                        <select name='id_kelas' id='selectError'>
                            <?php    
                                $dept=mysql_query("select * from tbl_kelas order by nama_kelas");
                                while($row1=mysql_fetch_array($dept))
                                {
                                    if ($row['id_kelas']==$row1['id_kelas']){
                                        echo "<option value='".$row1['id_kelas']."' selected>".$row1['nama_kelas']."</option>";
                                    }
                                    else {
                                        echo "<option value='".$row1['id_kelas']."'>".$row1['nama_kelas']."</option>";
                                    }
                                    ?>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
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