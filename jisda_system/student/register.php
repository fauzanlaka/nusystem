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

?>		


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student | Daftar belajar</title>
  
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
                        <h4><span class="glyphicon glyphicon-book"><b> Pendaftaran</b></span></h4>
                        <hr>
                        
                        <div class="pull-right">
                        	<?php include("layout/register_menu.php") ?>
                        </div>
                        <br><br><br>

						<?php 
							include("connect.php");
							
							$sql_st = "select * from students where st_id = '$ses_userid' ";
							$query_st = mysql_query($sql_st);
							$result_st = mysql_fetch_array($query_st);
							$student_id = $result_st['student_id'];
							
							$sql = "select year.* , register.*,term.* from register join year on year.y_id = register.y_id join term on term.t_id = register.term_id";
							$query = mysql_query($sql);
							//$result = mysql_fetch_array($query);
							$current_year = date("Y");
							while($result = mysql_fetch_array($query)){
								if($current_year == $result['year'] and $result['tu_id'] == '1'){
								$status = $result['tu_id'];
								$year_q = $result['year'];
								$term = $result['term'];
								$start_date = $result['start_date']; 
								$end_date = $result['end_date']; 
								$common_prize = $result['common_prize']; 
								$special_prize = $result['special_prize']; 
								$acdemic_year =  $result['year'];
								$term = $result['term'];
								
								
								$st_id =  $ses_userid;
								$re_id = $result['re_id'];
								}
							}
							if($year_q == $current_year and $status == '1'){
						?>
						
								<div class="col-sm-12">
									<div class="form-group">
										<table width="100%">
										<tr>
											<td><b>Pendaftaran tahun :</b> <?= $year_q; ?><b> penggal : </b><?= $term; ?></td>
											<td align="right"><b>Masa daftar : </b> <?= $start_date; ?> <b> Hingga : </b><?= $end_date; ?></td>
										</tr>
										</table>
									</div></div><br><br>
							
							<form class="form-horizontal" role="form" action="function/saveregister.php" enctype="multipart/form-data" method="post"  ><!-- Form -->
									
								<fieldset class="scheduler-border">
									<legend class="scheduler-border"><font color="green" size="2px"><b>Untuk mahasiswa generasi 2015</b></font></legend>
										<div class="form-group">
											<div class="col-sm-3">
												<input type="radio" id="lang_skill1" name="rs_type" value="special_prize" required> Pilih untuk daftar
											</div>
											
								</fieldset>
                                                                <fieldset class="scheduler-border">
									<legend class="scheduler-border"><font color="green" size="2px"><b>Untuk mahasiswa generasi 2012 - 2014</b></font></legend>
										<div class="form-group">
											<div class="col-sm-3">
												<input type="radio" id="lang_skill1" name="rs_type" value="common_prize" required> Pilih untuk daftar
											</div>
											
								</fieldset>
									
									<br><br>
								<div align="center">
									<input type="hidden" name="st_id" value="<?= $st_id; ?>" >
									<input type="hidden" name="re_id" value="<?= $re_id; ?>" >
									<input type="hidden" name="academic_year" value="<?= $acdemic_year; ?>" >
									<input type="hidden" name="term" value="<?= $term; ?>" >
									<input type="hidden" name="student_id" value="<?= $student_id; ?>" >
									<a href="index_register.php"><button type="submit" class="btn btn-success" name="save"><span class=""></span> Back</button></a>
									<button type="submit" class="btn btn-success" name="save"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
								</div>
							</form><!-- /.Form -->
						
						<?php
							}else{
								$sql2 = "select year.* , register.*,term.* from register join year on year.y_id = register.y_id join term on term.t_id = register.term_id";
								$query2 = mysql_query($sql2);
								$current_year = date("Y");
								//$current_year = "2016";
								while($result2 = mysql_fetch_array($query2)){
								if($current_year == $result2['year'] and $result2['tu_id'] == '2'){
								$status = $result2['tu_id'];
								$year_q2 = $result2['year'];
								$term2 = $result2['term'];
								$start_date2 = $result2['start_date']; 
								$end_date2 = $result2['end_date']; 
								}
							}
						?>

							<form class="form-horizontal" role="form" enctype="multipart/form-data"  ><!-- Form -->
								<div class="form-group">
									<div class="col-sm-12">
										<table width="100%">
										<tr>
											<td><b><font color="black">Pendaftaran belajar tahun :</b> <?= $year_q2; ?> <b> penggal ini Sudah habis waktu</b></font></td>
										</tr>
										</table>
									
										<br><br><br><br><br><br><br><br>
												<div align="center"><h3><font color="red">Sila hubungi idarah dengan segera...</font></h3></div>
										<br><br><br><br><br><br><br><br>
									</div>
								</div>
							</form>
						
						<?php }  ?>
      
							
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
