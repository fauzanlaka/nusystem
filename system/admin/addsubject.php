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
addsubjects();
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
                        <h4><span class="glyphicon glyphicon-list-alt"><b> TAMBAH DATA GURU</b></span></h4>
                        <hr>
						
						<div class="pull-right">
							<?php include("layout/subject_menu.php"); ?>
						</div><br><br><br>
                   
						<form class="form-horizontal" role="form" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" ><!-- Form -->

							<fieldset class="scheduler-border">
								
								<legend class="scheduler-border"><font color="green"><b>Data mata kuliah</b></font></legend>
							
									<div class="form-group">
										<label for="code" class="col-sm-2"> Kode :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="sj_code" required>
										</div>
									</div>
								
									<div class="form-group">
										<label for="code" class="col-sm-2"> Title :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="sj_name" required>
										</div>
									</div>
								
									<div class="form-group">
										<label for="code" class="col-sm-2"> Unit (SKS) :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="sj_unit" required>
										</div>
									</div>
								
									<div class="form-group">
										<label for="code" class="col-sm-2"> Detil :</label>
										<div class="col-sm-10">
											<textarea class="form-control" name="sj_describtion" ></textarea>
										</div>
									</div>
								
									<div class="form-group">
										<label for="code" class="col-sm-2"> Guru :</label>
										<div class="col-sm-3">
											<select class="form-control" name="tc_id">
												<?php
													include("connect.php");
													$sql = "select * from teachers";
													$query = mysql_query($sql);
												?>
												<option value="0">------------ Pilih ------------</option>
												<?php
													while($result = mysql_fetch_array($query)){
												?>
												<option value="<?= $result['tc_id']; ?>"><?php echo $result['tc_name']; ?> - <?php echo $result['tc_lastname']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								
							</fieldset>
							
							<div align="center">
								<a href="idxsubject.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back</button></a>
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