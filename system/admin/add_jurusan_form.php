<?php
session_start(); 
$ses_userid = $_SESSION[ses_userid];                                         
$ses_username = $_SESSION[ses_username];                         
	if($ses_username ==""){
		echo "Harap login system<br />";
	}
	
	if($_SESSION[ses_status] != "admin" and $_SESSION[ses_status] != "user" ) {
		echo "Laman ini untuk Admin";
		echo "<a href=../login_form.php>Back</a>";
		exit();
	}
	
	include("function/function.php");
	dpcode_check()

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Tambah jurusan</title>
  
    <!-- Custom CSS -->
    <link href="../shop-item/css/shop-item.css" rel="stylesheet">
    
    <link href="../shop-item/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootflat Core CSS -->
    <link href="../bootflat/bootflat/css/bootflat.css" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="../bootflat/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
d.serif {
    font-family: Arial, Helvetica, sans-serif;
	font-size:16px;
}

d.sansserif {
    font-family: Arial, Helvetica, sans-serif;
	font-size:12px;
	font-style:italic
}
</style>

</head>

<body style="background:#eee;">

    <!-- Navigation -->
    <?php include("layout/nav.php"); ?>
	<br>
    <br>
	<br>
 
   <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p align="left"><img src="../images/LOGO_JISDA_WEB.png" class="img-rounded"></p>
                <!--Left menu-->
                <?php include("layout/left_menu.php"); ?>
                    
                </div></p>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    
                    <div class="caption-full">
                        <h6 class="pull-right">
						<?php
echo "<b>Hari bulan : </b>" . date("l")  . date(" Y/m/d") . "<br>";
?>
						
                        </h6>
                        <h4><span class="glyphicon glyphicon-bookmark"><b> Tambah jurusan</b></span></h4>
                        <hr>
                        <p>
                        <!-- Post list -->
                        <div class="pull-right">
                        	<?php include("layout/fd_menu.php"); ?>
                        </div>
                        <br><br><br>
                      
                      <form class="form-horizontal" role="form" action="function/save_add_jurusan.php" method="post" enctype="multipart/form-data" ><!-- Form -->
							
							<div class="form-group">
									<label for="Iputfacultycode" class="col-sm-3">Kode jurusan :</label>
									<div class="col-sm-2">
										<input type="text" name="dp_code" class="form-control" id="dp_code" placeholder="Kode" required onBlur="dpcodecheck()">
									</div><span id="dpcodestatus"></span>  	
								</div>
							
							<div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Jurusan :</label>
                                	<div class="col-sm-5">
                                	<input type="text" class="form-control" id="dp_name" name="dp_name" placeholder="Tambah jurusan baru"  required  >
                                	</div>
							</div>
                       
                       <div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Fakulti :</label>
                                	<div class="col-sm-3">
                          
                          			<!-- Faculties query  -->
                                    <?php 
										include("connect.php");
										$sql_fct = "select * from fakultys";
										$query_fct = mysql_query($sql_fct);
										
									?>
	                                		<select name="ft_id" class="form-control">
                                            <?php
												while($result_fct = mysql_fetch_array($query_fct)){
												$ft_name = str_replace("\'", "&#39;", $result_fct['ft_name']);
											?>			 
                                        	<option value="<?= $result_fct[ft_id]; ?>"><?= $ft_name?></option>
											<? } ?> 
                                        </select> 
                                       
                                	</div>
                            	</div>
								
                                <div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Perinci :</label>
                                	<div class="col-sm-5">
										<textarea class="form-control" id="describe" name="dp_describtion" required ></textarea>
                                	</div>
                            	</div>
                        <div class="form-group"></div>
                                <div class="form-group"></div>
                        <div class="form-group">
                                	<label for="IputImage" class="col-sm-3">Logo / Lambang :</label>
                                    <div class="col-sm-4">
                                    	<input type="file" name="image" class="form-control"> 
                                    </div>
                        </div>
                       	
                        
                            <button type="submit" class="btn btn-success" name="save"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
                            <button type="reset" class="btn btn-success">Reset</button>
                   	  </form><!-- /.Form -->
                      
                      <br>
                      </p>
                      
                    </div>
                    
                    
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                	
                    <p align="center"><b>Developed by JISDA , Copy right 2014</b></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootflat/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="function/function.js"></script>

</body>

</html>
