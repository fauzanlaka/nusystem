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

    <title>ADMIN | Sejarah bayaran</title>
  
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
<br>
    
   <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <a href="index.php"><img src="../images/LOGO_JISDA_WEB.png" class="img-rounded"></a>
                <!--Left menu-->
                <?php include("layout/left_menu.php"); ?>
                    
                </div>
            </div>

            <div class="col-md-9">
				<div class="thumbnail">
						<div class="caption-full">
							<h4 class="pull-left">
								<b><span class="glyphicon glyphicon-folder-open"></span> Profil anda</b>
							</h4>
							<h6 class="pull-right">
							<?php
									echo "<b>Hari bulan : </b>" . date("l")  . date(" Y/m/d") . "<br>";	
							?>
							</h6>
							<h4></h4><br>
                        	<hr>
							
							<?php
							include("connect.php");
							$sqld = "select s.*,f.*,d.* from students s INNER JOIN fakultys f on s.ft_id=f.ft_id INNER JOIN departments d on s.dp_id=d.dp_id where s.student_id='$ses_username'";
							$queryd = mysql_query($sqld);
							$resultd = mysql_fetch_array($queryd);							
						?>
							<b>ID :</b> <?php echo $resultd['student_id']; ?><br>
							<b>Nama - Bako :</b> <?php echo $resultd['firstname_rumi']; ?> - <?php echo $resultd['lastname_rumi']; ?> || <?php echo $resultd['firstname_jawi']; ?> - <?php echo $resultd['lastname_jawi']; ?><br>
							<b>Fakulti : </b><?php echo $resultd['ft_name']; ?> <br>
						<?php
							$dp = $resultd['dp_id'];
							if($dp !="0"){	
						?>
							<b>Jurusan : </b><?php echo $resultd['dp_name']; ?>
							<?php 
							}
							?>
						<br>	
						<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green">Biodata</font></legend>
							<b>ชื่อ - นามสกุล : </b> <?php echo $resultd[t_studentname]; ?> - <?php echo $resultd[t_studentlastname]; ?><br>
							<b>เลขประจำตัวประชาชน :</b> <?php echo $resultd[cityzen_id]; ?><br>
							<b>ว/ด /ป เกิด : </b> <?php echo $resultd['birdth_date']; ?>
						</fieldset>
							
					</div>

        </div>
    </div><!-- /.container -->

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