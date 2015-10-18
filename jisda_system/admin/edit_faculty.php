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
	
	include("function/function.php");
	ftname2check();
	ftcode2check();
	
	include("function/all_function.php");
	editfaculty();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Ubah data fakulti</title>
  
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
                <img src="../images/LOGO_JISDA_WEB.png" class="img-rounded">
                <!--Left menu-->
                <?php include("layout/left_menu.php"); ?>
                    
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    
                    <div class="caption-full">
                        <h6 class="pull-right">
						<?php
echo "<b>Hari bulan : </b>" . date("l")  . date(" Y/m/d") . "<br>";
?>
						
                        </h6>
                        <h4><span class="glyphicon glyphicon-bookmark"><b> Ubah data fakulti</b></span></h4>
                        <hr>
                        <p>
                        
                        <div class="pull-right">
                        	<?php include("layout/fd_menu.php"); ?>
                        </div>
                        <br><br><br>
                      
						<?php
							// Faculty  query
							include("connect.php");
							$id = $_GET[id];
							$sql_faculty = "select * from fakultys where ft_id ='$id' ";
							$query_faculty = mysql_query($sql_faculty);
							$result_faculty = mysql_fetch_array($query_faculty);
							
							$ft_name = str_replace("\'", "&#39;", $result_faculty['ft_name']);
							$ft_describtion =str_replace("\'", "&#39;", $result_faculty['ft_describtion']);
						?>
						
						
                     
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="<?= editfaculty()?>"><!-- Form -->
                      
						<div class="form-group">
								<label for="Inputname" class="col-sm-3">Fakulti :</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="ft_name" name="ft_name" placeholder="Ex : Tarbiah" required onBlur="ftnamecheck()" value="<?= $ft_name ?>" >
										</div><span id="ftnamestatus"></span>
						</div>
						
						<div class="form-group">
								<label for="Input_fakulty" class="col-sm-3">Perinci :</label>
									<div class="col-sm-5">
										<textarea class="form-control" id="ft_describe" name="ft_describtion"  ><?= $ft_describtion;?></textarea>
									</div>
						</div>
									
						<div class="form-group">
							<label for="Iputfacultycode" class="col-sm-3">Kod fakulti :</label>
							<div class="col-sm-2">
								<input type="text" name="ft_code" class="form-control" id="ft_code" placeholder="EX: TA001" required onBlur="checkftcode()" value="<?= $result_faculty['ft_code']; ?>">
							</div>
								<span id="ftcodestatus"></span>  	
						</div>
                            
                        <div class="form-group">
                                	<label for="IputImage" class="col-sm-3">Logo / Lambang :</label>
                                    <div class="col-sm-4">
                                    	<input type="file" name="image" class="form-control" id="image"> 
                                    </div>
                        </div>
                       	
							<input type="hidden" name="id" value="<?= $result_faculty['ft_id']; ?>">
							<a href="faculty_list.php"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</button></a>
                            <button type="submit" class="btn btn-success" name="save"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
                   	</form>
                      <!-- /.Form -->
						
                      <br>
                      </p>
                      
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
