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

    <title>ADMIN | JISDA</title>
  
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
p{
    text-indent: 50px;
}

d.sansserif {
    font-family: Arial, Helvetica, sans-serif;
	font-size:12px;
	font-style:italic
}
.max-lines {
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: scroll;
  max-height: 30.5em;
  line-height: 1.8em;
  text-indent: 2.5em;
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
                         <?php
							$id = $_GET[id];
							include("connect.php");
							$sql = "select * from post where p_id='$id'";
							$query = mysql_query($sql);
							$result1 = mysql_fetch_array($query);
						?>
                        <h4><h4><?= $result1['p_title']; ?></h4>
                        <hr>
                        
                        <!-- Post list -->
                       
<?php
							$id = $_GET[id];
$sql = "select * from post where p_id='$id'";
							$query = mysql_query($sql);
					while($result = mysql_fetch_array($query)){
						?>
                        
						
							<div class="max-lines">
								<?= $result["p_post"];?></p>
							</div>
						
						
                        <br>
                        <b>Catatan :</b>
						<?= $result['p_other']; ?>                        
                        <? } ?><br><br>
                        <a href="index.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back to home</button></a>
                        
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