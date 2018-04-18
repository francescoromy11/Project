<?php include'head.php'; ?>
<?php include'conn.php'; ?>
<div class="row">
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
                <form action="add_data_guru_proses.php" method="post" role="form" onSubmit='return validasi_input(this)'>
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