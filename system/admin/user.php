<?php
session_start(); 
$ses_userid = $_SESSION[ses_userid];
$ses_password = $_SESSION[ses_password];                                         
$ses_username = $_SESSION[ses_username];                          
	if($ses_userid <> $_SESSION[ses_userid] or $ses_username ==""){
		echo "Harap login<br />";
	}
	if($_SESSION[ses_status] != "admin" and $_SESSION[ses_status] != "user") {
		echo "Laman ini untuk admin!";
		echo "<a href=login_form.php>Back</a>";
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Pengguna sistem</title>
    
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

</head>

<body style="background:#eee;">

    <!-- Navigation -->
    <?php include("layout/nav.php"); ?>
	<br>
    <br>
    <br>
    
    <div class="container"><!-- Container -->
        <div class="row"><!-- Row -->
        
            <div class="col-md-3"><!-- col-md3  Left menu-->
                <img src="../images/LOGO_JISDA_WEB.png" class="img-rounded"><!-- Logo -->
                <?php include("layout/left_menu.php"); ?><!--Left menu-->    
                </div>
            </div><!-- /.col-md-3  Left menu -->
            
            <div class="col-md-9"><!-- col-md-9 Content body -->
            	<div class="panel panel-success"><!-- Panel success--> 
                    <div class="panel-heading"><!-- Panel heading-->
                    	<h3 class=" panel-title"><span class="glyphicon glyphicon-user"></span> Pengguna sistem</h3>
                    </div><!-- /.Panel heading-->    
                  	<div class="panel-body"><!-- Panel body-->
                    	<div class="pull-right"><!-- pull right -->
                            <a href="add_user.php"><button type="button" name="add_user" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Tambah pengguna</button></a>
							<a href="user.php"><button type="button" name="add_user" class="btn btn-success"><span class="glyphicon glyphicon-list"></span> Daftar anggota</button></a>
						</div><!-- /.pull right -->
                        <br><br><br>
						
                        <!-- Users query --> 
                        <?php 
							include("connect.php");
							$strSQL = "select * from user where u_id <> $ses_userid";
							$objQuery = mysql_query($strSQL);
							$Num_Rows = mysql_num_rows($objQuery);
							
						//Pageination
						$Per_Page = 10;   // Per Page

						$Page = $_GET["Page"];

						if(!$_GET["Page"])	
							{
								$Page=1;
							}
							$Prev_Page = $Page-1;
							$Next_Page = $Page+1;
							$Page_Start = (($Per_Page*$Page)-$Per_Page);	
						if($Num_Rows<=$Per_Page)
							{
							$Num_Pages =1;
							}
						else if(($Num_Rows % $Per_Page)==0)
							{
							$Num_Pages =($Num_Rows/$Per_Page) ;
							}
						else
							{
							$Num_Pages =($Num_Rows/$Per_Page)+1;
							$Num_Pages = (int)$Num_Pages;
							} 
							$strSQL .=" order  by u_id ASC LIMIT $Page_Start , $Per_Page";
							$objQuery  = mysql_query($strSQL);
						?>
                <table>
               		<table class="table table-hover">
						<tr>
                            <td><strong>ID</strong></td>
                            <td><strong>Nama-baqa</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Telepon</strong></td>
                            <td align="center"><strong>Edit</strong></td>
                            <td align="center"><strong>Hapus</strong></td>
                        </tr>
						<?php
							while($objResult = mysql_fetch_array($objQuery))
						{
						?>
                         <tr>        
                             <td><?= $objResult['u_id']; ?></td>
                             <td><?= $objResult['u_fname']; ?></td>
                             <td><?= $objResult['u_email']; ?></td>
                             <td><?= $objResult['u_telephone']; ?></td>
                             <td align="center"><a href="edit_user_profile.php?u_id=<?= $objResult['u_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                             <td align="center"><a href="delete_user.php?u_id=<?= $objResult['u_id']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                         </tr>
						<?php } ?>
				</table>
<br>

						Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :

						<?php
							if($Prev_Page)
							{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
							}
							for($i=1; $i<=$Num_Pages; $i++)
							{
								if($i != $Page)
								{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ";

								}
								else
								{
								echo "<b> $i </b>";
								}
							}
									if($Page!=$Num_Pages)
									{
										echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
									}	
						?>
     
                    </div><!-- /.Panel body -->

                </div><!-- Panel success -->
                
            </div><!--/.col-md-9 Body content -->

        </div><!--/.Row -->
        
        <hr>

        <footer><!-- Footer -->
            <div class="row">
                <div class="col-lg-12">
                    <p align="center"><b>Developed by JISDA , Copy right 2014</b></p>
                </div>
            </div>
        </footer>
    
    </div><!-- /.container -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/jquery-ui.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootflat/js/bootstrap.min.js"></script>

</body>

</html>
