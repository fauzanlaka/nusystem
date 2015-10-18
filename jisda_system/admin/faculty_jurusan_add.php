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
    <meta name="author" content="Fauzan" >

    <title>ADMIN | JISADA</title>
  
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
                <img src="../images/LOGO_JISDA_WEB.png" class="img-rounded"></p>
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
                        <h4><span class="glyphicon glyphicon-bookmark"><b> Fakulti </b></span></h4>
                        <hr>
                        <p>
                        <!-- Post list -->
                        <div class="pull-right">
                        	<?php include("layout/fd_menu.php"); ?>
                        </div>
                        <br><br><br>
                        <?php
							include("connect.php");
							$sql = "select * from fakultys";
							$query = mysql_query($sql);
							$id = $result['ft_id'];
						?>
                        <table class="table table-hover">
  							<tr>
                            	<td>
                                	<b>Bil</b>
                                </td>
                                <td>
                                	<b>Nama fakulti</b>
                                </td>
                                <td align="center">
                                	<b>Ubah</b>
                                </td>
                                <td align="center">
                                	<b>Hapus</b>
                                </td>
                            </tr>
                            <?php
								$i = 0;
								while($result=mysql_fetch_array($query)){							
								$i++;
							?>
                            <tr>
                            	<td><?= $i ?></td>
                                <td><?= $result[ft_name]; ?></td>
                                <td align="center"><a href="edit_faculty.php?id=<?= $result[ft_id];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                                <td align="center"><a href="function/faculty_delete.php?id=<?= $result['ft_id'];?>"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                            </tr>
                            <?php } ?>
						</table>
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

   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootflat/js/bootstrap.min.js"></script>

</body>

</html>
