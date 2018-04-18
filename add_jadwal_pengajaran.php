<?php include'head.php'; ?>
<?php include'conn.php'; ?>
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Input Jadwal Pengajaran</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="add_jadwal_pengajaran_proses.php" method="post" role="form" method="post" onSubmit='return validasi_input(this)'>
                    <div class="form-group">
                        <label>Nama guru</label>
                        <div class="controls">
                        <select name="id_guru" id="selectError">
                            <OPTION value=''></OPTION>
                            <?php
                            $guru=mysql_query("select * from data_guru order by nama_guru asc");
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
                        <label>Pelajaran</label>
                        <div class="controls">
                        <select name="nama_mapel" id="selectError">
                            <OPTION value=''></OPTION>
                            <option value="Pendidikan Agama">Pendidikan Agama</option>
                            <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
                            <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="Pendidikan Jasmani, Olahraga dan Kesehatan">Pendidikan Jasmani, Olahraga dan Kesehatan</option>
                            <option value="Ketrampilan">Ketrampilan</option>
                            <option value="Teknologi Informasi dan Komunikasi">Teknologi Informasi dan Komunikasi</option>
                            <option value="Bahasa Jawa">Bahasa Jawa</option>
                            <option value="Tata Boga">Tata Boga</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">

                        <label>Kelas</label>
                        <div class="controls">
                        <select name="id_kelas"  class="styledselect_form_1">
                            <OPTION value=''></OPTION>
                          <?php
                          $kelas=mysql_query("select * from tbl_kelas order by id_kelas asc");
                          while($row3=mysql_fetch_array($kelas)){
                          ?>
                              <option value="<?php echo $row3['id_kelas'];?>"><?php echo $row3['nama_kelas'];?></option>
                          <?php
                          }
                          ?>    
  
                        </select>
                    </div>
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