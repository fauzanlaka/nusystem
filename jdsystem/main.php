<?php
	session_start();
	require_once("loginConfig.php");

	if(!isset($_SESSION['UserID']))
	{
		echo "Please Login!";
                header("location:index.php");
		exit();
	}
	
	//*** Update Last Stay in Login System
	$sql = "UPDATE students SET LastUpdate = NOW() WHERE st_id = '".$_SESSION["UserID"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM students WHERE st_id = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JISDA || Jamiah islam syaikh daut al-fathani</title>
    <link rel="icon" href="icon/favicon.png" sizes="16x16" type="image/png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Pagination -->
    <link rel="stylesheet" href="pagination/reset.css" type="text/css">
    <link rel="stylesheet" href="pagination/style.css" type="text/css">
    <link rel="stylesheet" href="pagination/public/css/zebra_pagination.css" type="text/css">
    <link rel="stylesheet" href="select/dist/css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->


  </head>
    <body> 
        
        <?php include("menu/student/indexMenu.php"); ?>
        <br><br><br>
        
        <div class="col-md-9">
        
           <?php 
                        include("connect.php");
                        
                        $page = $_GET['page']; // To get the page

                        switch ($page) {

                            case 'main':
                                include 'module/index.php';
                                break;
                            case 'register':
                                include 'module/register/register.php';
                                break;
                            case 'payment':
                                include 'module/payment/payment.php';
                                break;
                            case 'news':
                                include 'module/news/news.php';
                                break;
                            case 'profile':
                                include 'module/profile/profile.php';
                                break;
                            case 'activity':
                                include 'module/activity/index.php';
                                break;
                        }
            ?>
            
        </div>
        
        <div class="col-md-3">
             <?php include("menu/student/sidebarMenu.php"); ?>
        </div>
           
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="pagination/public/javascript/zebra_pagination.js"></script>
        <script type="text/javascript" src="module/profile/editpassword.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="select/dist/js/bootstrap-select.js"></script>
        
        <script>
            $(document).ready(function () {
              var mySelect = $('#first-disabled2');

              $('#special').on('click', function () {
                mySelect.find('option:selected').prop('disabled', true);
                mySelect.selectpicker('refresh');
              });

              $('#special2').on('click', function () {
                mySelect.find('option:disabled').prop('disabled', false);
                mySelect.selectpicker('refresh');
              });

              $('#basic2').selectpicker({
                liveSearch: true,
                maxOptions: 1
              });
            });
        </script>
        
        <script language="javascript">
            function printdiv(printpage)
            {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr+newstr+footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
            }
        </script>

    </body>
</html>
<?
	mysqli_close($con);
?>
