<?php
session_start(); 
$ses_userid = $_SESSION[ses_userid];                                         
$ses_username = $_SESSION[ses_username];                         
	if($ses_userid =="" or $ses_username ==""){
		echo "Harap login system<br />";
	}
	if($_SESSION[ses_status] != "student") {
		echo "<a href=../login_form.php>Back</a>";
		exit();
	}
	include("function/all_function.php");
	editpssw();
?>		


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student | Daftar ujian</title>
  
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
		hee1 {
			text-decoration: overline;
		}

		hee2 {
			text-decoration: line-through;
		}

		hee3 {
			text-decoration: underline;
		}
</style>
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
<br>
<body style="background:#eee;">
   <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <a href="index.php"><?php include("layout/logo.php"); ?></a>
                <!--Left menu-->
                <?php include("layout/left_menu.php"); ?>
                    
            </div>
        </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    
                    <div class="caption-full">
                        <h6 class="pull-right">
						<?php
							echo "<b>Hari bulan : </b>" . date("l")  . date("Y/m/d") . "<br>";
						?>
						
                        </h6>
                        <h4><span class="glyphicon glyphicon-edit"><b> Ubah password</b></span></h4>
                        <hr>
                        
                        <div class="pull-right">
                        	<?php //include("layout/register_menu.php"); ?>
                        </div>
                        <br><br><br>
						
						<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="<?= editpssw(); ?>" name="form1" onsubmit="return chkpssw();"><!-- Form -->
                      
							<div class="form-group">
									<label for="Inputname" class="col-sm-2">Password :</label>
										<div class="col-sm-3">
											<input type="password" class="form-control" id="password" name="password" placeholder="Password baru" required>
										</div>
							</div>
							<div class="form-group">
									<label for="Inputname" class="col-sm-2">Confirmasi password :</label>
										<div class="col-sm-3">
											<input type="password" class="form-control" id="conpassword"  placeholder="Confirmasi password" required>
										</div>
							</div>
							<?php
									$id = $ses_userid;
							?>
							<div align="center">
								<input type="hidden" name="id" value="<?= $id ?>">
								<button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span>  Simpan</button>
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

   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootflat/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="function/function.js"></script>
	<script language="javascript">
		function chkpssw(){
			if(document.form1.password.value != document.form1.conpassword.value){
				alert('Kata password tidak sama');
				document.form1.conpassword.focus();     
				return false;
			} 
		document.form1.submit();
		}
	</script>
</body>

</html>
