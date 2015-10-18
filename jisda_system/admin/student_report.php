<?php
session_start(); 
$ses_userid = $_SESSION[ses_userid];                                         
$ses_username = $_SESSION[ses_username];                         
	if($ses_userid <> session_id() or $ses_username ==""){
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

    <title>ADMIN | Sistem pelaporan</title>
  
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
    
    
   <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p align="left"><img src="../images/LOGO_JISDA_WEB.png" class="img-rounded"></p>
                <!--Left menu-->
                <?php include("layout/report_menu.php"); ?>
                    
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
                        <h4><span class="glyphicon glyphicon-paperclip"><b> Daftar mahasiswa</b></span></h4>
                        <hr>
						
						<form class="form-horizontal" role="form" enctype="multipart/form-data" method="เำะ" action="search_student_report.php"><!-- Form -->
                      
								<div class="form-group">
											<div class="col-sm-2">
												<?php
													include("connect.php");
													$sql = "select * from year order by year";
													$query = mysql_query($sql);
												?>
												<select name="year" class="form-control" >
													<option value="0">Generasi</option>
													<?php while($row = mysql_fetch_array($query)){ ?>
													<option value="<?= $row[year] ?>"><?= $row['year']; ?></option>
													<?php } ?>
												</select>
											</div>
											
											<div class="col-sm-2">
												<?php
													include("connect.php");
													$sql = "select * from fakultys";
													$query = mysql_query($sql);
												?>
												<select name="ft_id" class="form-control" >
													<option value="0">--Fakulti--</option>
													<?php while($row = mysql_fetch_array($query)){ ?>
													<option value="<?= $row[ft_id] ?>"><?= $row['ft_name']; ?></option>
													<?php } ?>
												</select>
											</div>
											
											<div class="col-sm-2">
												<?php
													include("connect.php");
													$sql = "select * from departments";
													$query = mysql_query($sql);
												?>
												<select name="dp_id" class="form-control" >
													<option value="0">--Jurusan--</option>
													<?php while($row = mysql_fetch_array($query)){ ?>
													<option value="<?= $row[dp_id] ?>"><?= $row['dp_name']; ?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-sm-2">
												<button type="submit" class="btn btn-primary"><span class=" glyphicon glyphicon-search"></span> Search</button> 
											</div>
								</div>
								
							</form>
							
							<!-- Users query --> 
                        <?php 
							include("connect.php");
							$strSQL = "select s.*,f.*,d.* from students s join fakultys f on s.ft_id = f.ft_id join departments d on s.dp_id = d.dp_id  ";
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
							$strSQL .="order  by st_id ASC LIMIT $Page_Start , $Per_Page";
							$objQuery  = mysql_query($strSQL);
						?>
                <table>
               		<table class="table table-hover">
						<tr>
                            <td align="center"><strong>No.Pokok</strong></td>
                            <td align="center"><strong>Nama-baka</strong></td>
							<td align="center"><strong>Fakulti</strong></td>
                            <td align="center"><strong>Telepon</strong></td>

                        </tr>
						<?php
							while($objResult = mysql_fetch_array($objQuery)){
							$student_id = str_replace("\'", "&#39;", $objResult['student_id']);
							$firstname_rumi = str_replace("\'", "&#39;", $objResult['firstname_rumi']);
							$lastname_rumi = str_replace("\'", "&#39;", $objResult['lastname_rumi']);
							$telephone = str_replace("\'", "&#39;", $objResult['telephone']);
							$email = str_replace("\'", "&#39;", $objResult['email']);
							$fakulty = str_replace("\'", "&#39;", $objResult['ft_name']);
							$department =  str_replace("\'", "&#39;", $objResult['dp_name']);
						?>
                          <tr>        
                             <td align="left"><a href="student_data.php?id=<?= $objResult['st_id']; ?>" target="_blank"><?= $student_id; ?></a></td>
                             <td align="left"><?= $firstname_rumi; ?> -  <?= $lastname_rumi; ?></td>
							 <td align="center"><?= $fakulty; ?></td>
                             <td align="center"><?= $telephone; ?></td>
							 
                             
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
