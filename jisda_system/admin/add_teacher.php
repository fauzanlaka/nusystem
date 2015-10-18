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
 
include("function/all_function.php");
addteachers();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Tambah data guru</title>
  
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
			fieldset.scheduler-border {
			border: dotted 1px;
			padding: 0 1.4em 1.4em 1.4em !important;
			margin: 0 0 1.5em 0 !important;
			-webkit-box-shadow:  0px 0px 0px 0px #000;
					box-shadow:  0px 0px 0px 0px #000;
			}

			legend.scheduler-border {
			width:inherit; /* Or auto */
			padding:0 10px; /* To give a bit of padding on the left and right */
			border-bottom:none;
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
                        <h4><span class="glyphicon glyphicon-magnet"><b> TAMBAH DATA GURU</b></span></h4>
                        <hr>
						
						<div class="pull-right">
							<?php include("layout/teacher_menu.php"); ?>
						</div><br><br><br>
                   
						<form class="form-horizontal" role="form" action="<?=$_SERVER['PHP_SELF']?>" method="post"><!-- Form -->
							<div class="form-group">
										<label for="code" class="col-sm-1"> ID  :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="tc_code" required>
										</div>
							</div>
							
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>Biodata</b></font></legend>
									<div class="form-group">
											<label for="code" class="col-sm-2"> Nama  :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_name" name="tc_name" required>
											</div>
											<label for="code" class="col-sm-1"> Baka</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_lastname" name="tc_lastname" required>
											</div>
									</div>
									<div class="form-group">
										<label for="code" class="col-sm-2"> Janis kelamin :</label>
											<div class="col-sm-2">
												<select name="tc_gender" class="form-control">
													<option value="">----Pilih----</option>
													<option value="Lelaki">Lelaki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div>
									</div>
									<div class="form-group">
										<label for="code" class="col-sm-2"> No kad pengenalan :</label>
											<div class="col-sm-3">
												<input type="text" name="tc_cityzenid" class="form-control">
											</div>
									</div>
									<div class="form-group">
										<label for="code" class="col-sm-2"> No Rumah :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_housenumber" name="tc_housenumber" required>
											</div>
										<label for="code" class="col-sm-1"> Kampong</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_village" name="tc_village" required>
											</div>
									</div>
									<div class="form-group">
										<label for="code" class="col-sm-2"> Tempat :</label>
											<div class="col-sm-2">
												<input type="text" class="form-control" id="tc_placenumber" name="tc_placenumber" required>
											</div>
											<div class="col-sm-1">
											</div>
										<label for="code" class="col-sm-1"> Mukim</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_subdistrict" name="tc_subdistrict" required>
											</div>
									</div>
									<div class="form-group">
										<label for="code" class="col-sm-2"> Dairah :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_districk" name="tc_district" required>
											</div>
										<label for="code" class="col-sm-1"> Wilayah</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_province" name="tc_province" required>
											</div>
									</div>
									<div class="form-group">
										<label for="code" class="col-sm-2"> Kod POS :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_postcode" name="tc_postcode" required>
											</div>
										<label for="code" class="col-sm-1"> Telepon</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="tc_telephone" name="tc_telephone" >
										</div>
									</div>
									<div class="form-group">
										<label for="code" class="col-sm-2"> Email :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="tc_email" name="tc_email" >
											</div>
									</div>
									
							</fieldset>
							
							<div align="center">
								<a href="teacher_list"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back</button></a>
								<button type="submit" name="save" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
								<button type="reset"  class="btn btn-success">Reset</button>
							</div>
						
						</form>
						
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

</body>

</html>
