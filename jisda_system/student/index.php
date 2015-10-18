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
    

    <title>JISDA SYSTEM | Jamiah Islam syaik daud</title>
  
    <!-- Custom CSS -->
    <link href="../shop-item/css/shop-item.css" rel="stylesheet">
    
    <link href="../shop-item/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootflat Core CSS -->
    <link href="../bootflat/bootflat/css/bootflat.css" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="../bootflat/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Latest compiled and minified CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#eee;">
    <br>
   <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <a href="index.php"><?php include("layout/logo.php"); ?></a>
                 <?php include("layout/left_menu.php");?> 
                </div></p>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    
                    <div class="caption-full">
                        <h4 class="pull-right"><?php
echo "Hari bulan : " . date("l")  . date(" Y/m/d") . "<br>";
?></h4>
                        <h4><span class="glyphicon glyphicon-home" ></span>  Maklumat</h4>
                        </h4>
                        <hr>
                    
						<?php
								require_once("../connect1.php");
								$sql_q = "select * from post order by p_id DESC LIMIT 0,20";
								$query_q = mysqli_query($con,$sql_q);
							
								while($result = mysqli_fetch_array($query_q)){
							?>
							
							<a href="show_post.php?id=<?= $result['p_id']; ?>"><d class="serif">  <?= $result['p_title']; ?></d></a> , <d class="sansserif"><?= $result['p_author']; ?> <?= $result['p_date']; ?></d> <br>
							<?php } ?>
						
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
    <!-- Latest compiled and minified JavaScript -->
	

</body>

</html>
<?
	mysqli_close($con);
?>