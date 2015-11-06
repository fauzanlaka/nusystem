<?php
	session_start();
	require_once("connect.php");

	if(!isset($_SESSION['UserID']))
	{
		echo "Please Login!";
                header("location:index.php");
		exit();
	}
	
	//*** Update Last Stay in Login System
	$sql = "UPDATE user SET LastUpdate = NOW() WHERE u_id = '".$_SESSION["UserID"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM users WHERE u_id = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NUSANTARA || Nusantara Patani</title>
    <link rel="icon" href="icon/favicon.png" sizes="16x16" type="image/png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/otherStyle.css" rel="stylesheet">
    <!-- Pagination -->
    <link rel="stylesheet" href="pagination/reset.css" type="text/css">
    <link rel="stylesheet" href="pagination/style.css" type="text/css">
    <link rel="stylesheet" href="pagination/public/css/zebra_pagination.css" type="text/css">
    <link rel="stylesheet" href="function/checkuser.css" type="text/css">
    <link rel="stylesheet" href="select/dist/css/bootstrap-select.css">
    <style type="text/css">
        body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
        div#pagination_controls{font-size:21px;}
        div#pagination_controls > a{ color:#06F; }
        div#pagination_controls > a:visited{ color:#06F; }
    </style>

  </head>
    <body> 
        
        <?php include("menu/indexMenu.php"); ?>
        <br><br><br>
        
        <div class="col-md-3">
             <?php include("menu/sidebarMenu.php"); ?>
        </div>
        
        <div class="col-md-9">
        
           <?php 
                        include("connect.php");
                        
                        $page = $_GET['page']; // To get the page

                        switch ($page) {

                            case 'main':
                                include 'module/index.php';
                                break;
                            case 'user':
                                include 'module/user/index.php';
                                break;
                            case 'childType':
                                include 'module/childType/index.php';
                                break;
                            case 'child':
                                include 'module/child/index.php';
                                break;
                        }
            ?>
            
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="function/checkuser.js"></script>
        <script src="ng/angular.min.js"></script>
        <script src="select/dist/js/bootstrap-select.js"></script>
        <script type="text/javascript" src="script/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="script/script.js"></script>
        <script type="text/javascript" src="function/function.js"></script>
    </body>
</html>
<?
	mysqli_close($con);
?>
