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
	//include("function/all_function.php");
	//saveexamregister();
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
				<a href="index.php"><?php include ("layout/logo.php"); ?></a>
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
                        <h4><span class="glyphicon glyphicon-book"><b> Sistem pendaftaran</b></span></h4>
                        <hr>
                        
                        <div class="pull-right">
                        	<?php //include("layout/register_menu.php"); ?>
                        </div>
                        <br><br><br>

						<?php 
							include("connect.php");
							
							$sql_st = "select * from students where st_id = '$ses_userid' ";
							$query_st = mysql_query($sql_st);
							$result_st = mysql_fetch_array($query_st);
							$student_id = $result_st['student_id'];
							
							$sql = "select year.* , register_exam.*,term.* from register_exam join year on year.y_id = register_exam.y_id join term on term.t_id = register_exam.t_id";
							$query = mysql_query($sql);
							//$result = mysql_fetch_array($query);
							$current_year = date("Y");
							while($result = mysql_fetch_array($query)){
								if($result['tu_id'] == '1'){
								$status = $result['tu_id'];
								$start_date = $result['start_date']; 
								$end_date = $result['end_date']; 
								$prize = $result['prize']; 
								$year =  $result['year'];
								$term = $result['term'];
								
								$st_id =  $ses_userid;
								$rx_id = $result['rx_id'];
								}
							}
						?>

							<div align="center">
								<a href="register.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Daftar belajar klik</button></a>
								<a href="exam_register.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Daftar ujian klik</button></a>
							</div>
							
								</form>
										<br><br><br><br>
											<p align="center"><strong><font color="jinggle">Sistem pendaftaran masih di tahap percubaan , Jika di jumpa kekurang di dalamnya mohon maaf</strong></p>
											<p align="center"><strong><i>Bahagian IT , JISDA ....! Terima kasih</i></font></strong></p>
										<br><br><br><br><br><br><br>
								</div><br><br>

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
</body>

</html>
