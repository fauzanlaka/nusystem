<?php
session_start(); //เปิด session
$ses_userid =$_SESSION[ses_userid];                                          //สร้าง session สำหรับเก็บค่า ID
$ses_username = $_SESSION[ses_username];                          //สร้าง session สำหรับเก็บค่า username
//ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
if($ses_userid <> session_id() or $ses_username ==""){
echo "Please Login to system<br />";
}

//ตรวจสอบสถานะว่าใช่ admin รึเปล่า ถ้าไม่ใช่ให้หยุดอยู่แค่นี้
if($_SESSION[ses_status] != "admin" and $_SESSION[ses_status] != "user") {
echo "This page for Admin only!";
echo "<a href=index.html>Back</a>";
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN</title>
    
    <!-- Bootflat Core CSS -->
    <link href="bootflat/bootflat/css/bootflat.css" rel="stylesheet">
    
     <!-- Custom CSS -->
    <link href="shop-item/css/shop-item.css" rel="stylesheet">
    
    <link href="shop-item/css/bootstrap.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#eee;">

    <!-- Navigation -->
    <?php include("layout/nav.php"); ?>
	<br>
    <br>
    
    <div class="container"><!-- Container -->
        <div class="row"><!-- Row -->
        
            <div class="col-md-3"><!-- col-md3  Left menu-->
                <img src="../images/LOGO_JISDA_WEB.png" class="img-rounded"><!-- Logo -->
                <?php include("layout/left_menu.php"); ?><!--Left menu-->    
                </div>
            </div><!-- /.col-md-3  Left menu -->
            
            <div class="col-md-9"><!-- col-md-9 Content body -->
            	<div class="panel panel-success"><!-- Panel success--> 
                    <div class="panel-heading"><!-- Panel heading-->
                    	<h3 class=" panel-title"><span class="glyphicon glyphicon-user"></span> Tambah pengguna</h3>
                    </div><!-- /.Panel heading-->    
                    <div class="panel-body"><!-- Panel body-->
                    	<div class="pull-left">
                        <p><font color="#E81C4B">Harap sempurna form di bawah :-</font></p>
                        </div>
                    	<div class="pull-right">
                        	<a href="add_user.php"><button type="button" name="add_user" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Tambah pengguna</button></a>
							<a href="user.php"><button type="button" name="add_user" class="btn btn-success"><span class="glyphicon glyphicon-list"></span> Daftar anggota</button></a>
                        </div><br><br><br>
                        		<form class="form-horizontal" role="form" action="save_add_user.php" method="post" enctype="multipart/form-data" ><!-- Form -->
                        		<div class="form-group">
                            		<label for="Inputname" class="col-sm-2">Nama :</label>
                                	<div class="col-sm-5">
                                	<input type="text" class="form-control" id="name" name="name" placeholder="Ex : Nama Bin" required >
                                	</div>
                            	</div>
                            	<div class="form-group">
                            		<label for="Inputname" class="col-sm-2">Telephone :</label>
                                	<div class="col-sm-5">
                                	<input type="text" class="form-control" id="name" name="telephone" required placeholder="Ex : 09-12345678" >
                                	</div>
                            	</div>
                            	<div class="form-group">
                            		<label for="Inputname" class="col-sm-2">Email :</label>
                                	<div class="col-sm-5">
                                		<input type="text" class="form-control" id="name" name="email" required placeholder="Ex : name@gmail.com" >
                                	</div>
                            	</div>
                                <div class="form-group">
                            		<label for="Inputname" class="col-sm-2">Alamat :</label>
                                	<div class="col-sm-5">
                                		<textarea class="form-control" id="address" name="address" required ></textarea>
                                	</div>
                            	</div>
                                <div class="form-group">
                                	<label for="InputPostcode" class="col-sm-2">Post code :</label>
                               		<div class="col-sm-3">		
                                    	<input type="text" class="form-control" id="postcode" name="postcode" required placeholder="Ex : 12345" >
                                    </div>     
                                    
                                </div>
                                <div class="form-group">
                                	<label for="InputPostcode" class="col-sm-2">kelamin  :</label>
                               		<div class="col-sm-3">		
                                    	<input type="radio" id="sex1" name="sex" value="Lelaki" checked="checked"> Lelaki <br>
                                        <input type="radio" id="sex2" name="sex" value="Perempuan"> Perempuan
                                    </div>     
                                    
                                </div>
                                
                                <div class="form-group">
                            		<label for="Inputname" class="col-sm-2">Status :</label>
                                	<div class="col-sm-3">
                                		<select name="status" class="form-control">
                                        	<option value="admin">Administrator</option>
                                            <option value="user">Pengguna biasa</option> 
                                        </select> 
                                	</div>
                            	</div>
                                <div class="form-group">
                                	<label for="IputImage" class="col-sm-2">Gambar :</label>
                                    <div class="col-sm-4">
                                    	<input type="file" name="image" class="form-control"> 
                                    </div>
                                </div>
                            	<div class="form-group">
                            		<label for="Inputname" class="col-sm-2">Username :</label>
                                	<div class="col-sm-5">
                                		<input type="text" class="form-control" id="name" name="username" placeholder="Username" >
                                	</div>
                            	</div>
                            	<div class="form-group">
                            		<label for="Inputname" class="col-sm-2">Password :</label>
                                	<div class="col-sm-5">
                                		<input type="password" class="form-control" id="name" name="password" placeholder="Password">
                                	</div>
                            	</div>
                            <a href="user.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left" ></span> Back </button></a>
                            <button type="submit" class="btn btn-success" name="save"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
                            <button type="reset" class="btn btn-success">Reset</button>
                        	</form><!-- /.Form -->
                        </p>
                    </div><!-- /.Panel body -->

                </div><!-- Panel success -->
                
            </div><!--/.col-md-9 Body content -->

        </div><!--/.Row -->
        
        <hr>

        <footer><!-- Footer -->
            <div class="row">
                <div class="col-lg-12">
                    <p align="center"><b>Developed by JISDA , Copy right 2014</b></p>
                </div>
            </div>
        </footer>
    
    </div><!-- /.container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="../bootflat/js/bootstrap.min.js"></script>

</body>

</html>
