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
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Data guru</title>
  
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
d.serif {
    font-family: Arial, Helvetica, sans-serif;
	font-size:16px;
}

d.sansserif {
    font-family: Arial, Helvetica, sans-serif;
	font-size:12px;
	font-style:italic
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
                        <h4><span class="glyphicon glyphicon-magnet"><b> DATA GURU</b></span></h4>
                        <hr>
						<div class="pull-right">
							<?php include("layout/teacher_menu.php"); ?>
						</div>
                        <div class="pull-left">
							<form class="navbar-form" role="search" action="<?=$_SERVER['PHP_SELF']?>" method="get">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Nama atau kode" name="q" required>
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit" name="save"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
						</div>
                        <br><br><br>
						
						<?php
							if(isset($_POST['save'])){
							include("connect.php");
							$q = $_GET['q'];
							$strSQL = "select * from teachers where tc_code LIKE '%".$q."%' or tc_name LIKE '%".$q."'";
							$objQuery = mysql_query($strSQL);
							$Num_Rows = mysql_num_rows($objQuery);
							
							//Pageination
						$Per_Page = 2;   // Per Page

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
							$strSQL .=" order  by tc_id DESC LIMIT $Page_Start , $Per_Page";
							$objQuery  = mysql_query($strSQL);
						?>
                <table>
               		<table class="table table-hover">
						<tr>
                            <td align="center"><strong>Kode</strong></td>
                            <td align="center"><strong>Nama-Baka</strong></td>
                            <td align="center"><strong>Telephone</strong></td>
                            <td align="center"><strong>Email</strong></td>
                            <td align="center"><strong>Hapus</strong></td>
                        </tr>
						<?php
							while($objResult = mysql_fetch_array($objQuery))
						{
							$tc_code = str_replace("\'", "&#39;", $objResult['tc_code']);
							$tc_name = str_replace("\'", "&#39;", $objResult['tc_name']);
							$tc_lastname = str_replace("\'", "&#39;", $objResult['tc_lastname']);
							$tc_telephone = str_replace("\'", "&#39;", $objResult['tc_telephone']);
							$tc_email = str_replace("\'", "&#39;", $objResult['tc_email']);
						?>
                         <tr>        
                             <td align="center"><a href="edt_teacher.php?id=<?= $objResult[tc_id]; ?>"><?= $tc_code; ?></a></td>
                             <td align="center"><?= $tc_name;  ?>-<?= $tc_lastname; ?></td>
                             <td align="center"><?= $tc_telephone; ?></td>
                             <td align="center"><?= $tc_email; ?></td>
                             <td align="center"><a href="function/dltteacher.php?t_id=<?= $objResult[tc_id]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                         </tr>
						<?php } ?>
				</table>
<br>

						Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :

						<?php
							if($Prev_Page)
							{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&p_title=$_GET[p_title]&save=$_GET[save]'><< Back</a> ";
							}
							for($i=1; $i<=$Num_Pages; $i++)
							{
								if($i != $Page)
								{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i&p_title=$_GET[p_title]&save=$_GET[save]'>$i</a> ";

								}
								else
								{
								echo "<b> $i </b>";
								}
							}
									if($Page!=$Num_Pages)
									{
										echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&p_title=$_GET[p_title]&save=$_GET[save]'>Next>></a> ";
									}	
					?>
						<?php
							}else{
						?>
						
                        <!-- Post list -->
						<?php
						include("connect.php");
						$strSQL = "select * from teachers";
						$objQuery = mysql_query($strSQL);
						$Num_Rows = mysql_num_rows($objQuery);
							
						//Pageination
						$Per_Page = 2;   // Per Page

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
							$strSQL .=" order  by tc_id DESC LIMIT $Page_Start , $Per_Page";
							$objQuery  = mysql_query($strSQL);
						?>
                <table>
               		<table class="table table-hover">
						<tr>
                            <td align="center"><strong>Kode</strong></td>
                            <td align="center"><strong>Nama-Baka</strong></td>
                            <td align="center"><strong>Telephone</strong></td>
                            <td align="center"><strong>Email</strong></td>
                            <td align="center"><strong>Hapus</strong></td>
                        </tr>
						<?php
							while($objResult = mysql_fetch_array($objQuery))
						{
							$tc_code = str_replace("\'", "&#39;", $objResult['tc_code']);
							$tc_name = str_replace("\'", "&#39;", $objResult['tc_name']);
							$tc_lastname = str_replace("\'", "&#39;", $objResult['tc_lastname']);
							$tc_telephone = str_replace("\'", "&#39;", $objResult['tc_telephone']);
							$tc_email = str_replace("\'", "&#39;", $objResult['tc_email']);
						?>
                         <tr>        
                             <td align="center"><a href="edt_teacher.php?id=<?= $objResult[tc_id]; ?>"><?= $tc_code; ?></a></td>
                             <td align="center"><?= $tc_name;  ?>-<?= $tc_lastname; ?></td>
                             <td align="center"><?= $tc_telephone; ?></td>
                             <td align="center"><?= $tc_email; ?></td>
                             <td align="center"><a href="function/dltteacher.php?t_id=<?= $objResult[tc_id]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                         </tr>
						<?php } ?>
				</table>
<br>

						Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :

						<?php
							if($Prev_Page)
							{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&p_title=$_GET[p_title]&save=$_GET[save]'><< Back</a> ";
							}
							for($i=1; $i<=$Num_Pages; $i++)
							{
								if($i != $Page)
								{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i&p_title=$_GET[p_title]&save=$_GET[save]'>$i</a> ";

								}
								else
								{
								echo "<b> $i </b>";
								}
							}
									if($Page!=$Num_Pages)
									{
										echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&p_title=$_GET[p_title]&save=$_GET[save]'>Next>></a> ";
									}	
							}
					?>
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
