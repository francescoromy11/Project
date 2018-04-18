<?php  session_start();

include "conn.php";

if (isset($_POST['login'])){
    //koneksi terpusat

    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $domain=$_POST['domain'];
    
    if($domain=="admin"){
        $query=mysql_query("select * from tbl_admin where username='$username' and password='$password'");
        $cek=mysql_num_rows($query);
        $row=mysql_fetch_array($query);
        $id_admin=$row['id_admin'];
        
        if($cek){
            $_SESSION['username']=$username;
            $_SESSION['id_admin']=$id_admin;
            $_SESSION['domain']=$domain;
            $_SESSION['waktu']=date("Y-m-d H:i:s");
            
            ?><script language="javascript">document.location.href="home.php";</script><?php
            
        }else{
            ?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
        }   
    }
    
    if($domain=="guru"){
        $query=mysql_query("select * from data_guru where username='$username' and password='$password'");
        $cek=mysql_num_rows($query);
        $row=mysql_fetch_array($query);
        $id_guru=$row['id_guru'];
        
        if($cek){
            $_SESSION['username']=$username;
            $_SESSION['id_guru']=$id_guru;
            $_SESSION['waktu']=date("Y-m-d H:i:s");
            $_SESSION['domain']=$domain;
            
            ?><script language="javascript">document.location.href="home.php";</script><?php
            
        }else{
            ?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
        }
    }
    
    if($domain=="siswa"){
        $query=mysql_query("select * from data_siswa where username='$username' and password='$password'");
        $cek=mysql_num_rows($query);
        $row=mysql_fetch_array($query);
        $id_siswa=$row['id_siswa'];
        
        if($cek){
            $_SESSION['username']=$username;
            $_SESSION['id_siswa']=$id_siswa;
            $_SESSION['waktu']=date("Y-m-d H:i:s");
            $_SESSION['domain']=$domain;
            
            ?><script language="javascript">document.location.href="home.php";</script><?php
            
        }else{
            ?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
        }
    }
    
    if($domain=="wali_kelas"){
        $query=mysql_query("select * from tbl_kelas where username='$username' and password='$password'");
        $cek=mysql_num_rows($query);
        $row=mysql_fetch_array($query);
        $id_kelas=$row['id_kelas'];
        
        if($cek){
            $_SESSION['username']=$username;
            $_SESSION['id_kelas']=$id_kelas;
            $_SESSION['waktu']=date("Y-m-d H:i:s");
            $_SESSION['domain']=$domain;
            
            ?><script language="javascript">document.location.href="home.php";</script><?php
            
        }else{
            ?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
        }
    }
            
}else{
    unset($_POST['login']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Aplikasi Nilai Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to *******</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <p align="center"><font face="verdana" size="2" color="#333333"><?php  if(isset($_GET['status'])){ echo "&laquo;".$_GET['status']."&raquo;"; }?></font></p>
            <form class="form-horizontal" action="index.php" method="post"name="postform">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list red"></i></span>
                    <select name="domain" class="form-control">
                        <option value="admin"> ADMIN </option>
                        <option value="guru"> GURU </option>
                        <option value="siswa"> SISWA </option>
                        <option value="wali_kelas"> WALI KELAS </option>
                    </select>
                    </div>
                    <div class="clearfix"></div><br>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
