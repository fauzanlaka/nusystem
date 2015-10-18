<?php
session_start(); //เปิด session
$ses_userid =$_SESSION[ses_userid];                                          //สร้าง session สำหรับเก็บค่า ID
$ses_username = $_SESSION[ses_username];                          //สร้าง session สำหรับเก็บค่า username
//ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
if($ses_username ==""){
echo "Please Login to system<br />";
}

//ตรวจสอบสถานะว่าใช่ admin รึเปล่า ถ้าไม่ใช่ให้หยุดอยู่แค่นี้
if($_SESSION[ses_status] != "admin" and $_SESSION[ses_status] != "user") {
echo "This page for Admin only!";
echo "<a href=index.html>Back</a>";
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

    <title>ADMIN | Bayar yuran</title>
	
	<link href="bootstrap/jquery-ui.css" rel="stylesheet">
  
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

    <!-- Navigation -->
    <?php include("layout/nav.php"); ?>
	<br><br><br>

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
						<?php echo "<b>Hari bulan : </b>" . date("l")  . date(" Y/m/d") . "<br>"; ?>
                        </h6>
						
                        <h4><span class="glyphicon glyphicon-list-alt"><b> Data pendaftaran</b></span></h4>
                        <hr>
                        <!-- Post list -->
                        <div class="pull-right">
							<?php include("layout/registered_menu.php");  ?>
                        </div><br><br><br>
                                                <!-- Query data -->
                                                <?php 
                                                    include("connect.php");
                                                    $id = $_GET['id'];
                                                    $sql = "select s.*,f.*,d.* from students s inner join fakultys f on s.ft_id=f.ft_id inner join departments d on s.dp_id=d.dp_id where st_id='$id'";
                                                    $query = mysql_query($sql);
                                                    $result = mysql_fetch_array($query);
                                                ?>
                        
                        
						<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data"><!-- Form -->
							<fieldset class="scheduler-border">
                                                            <legend class="scheduler-border"><font color="green"><b>Daftar muqaddimah</b></font></legend>
								<div class="form-group">
                                                                    <label for="code" class="col-sm-3"> No. Pokok  :</label>
                                                                    <div class="col-sm-3">
                                                                        <?= $result['student_id'] ?>
                                                                    </div>
                                                                    <label for="code" class="col-sm-3"> Fakulti  :</label>
                                                                    <div class="col-sm-3">
                                                                        <?= $result['ft_name']; ?>
                                                                    </div>
								</div>
								<div class="form-group">
                                                                    <label for="code" class="col-sm-3"> Nama - Baka  :</label>
                                                                    <div class="col-sm-3">
                                                                        <?= $result['firstname_rumi'] ?> - <?= $result['lastname_rumi'] ?>
                                                                    </div>
                                                                    <label for="code" class="col-sm-3"> Jurusan  :</label>
                                                                    <div class="col-sm-3">
                                                                        <?= $result['dp_name']; ?>
                                                                    </div>
								</div>
								
								<div class="form-group">
											<label for="code" class="col-sm-3"> Tanggal daftar  :</label>
											<div class="col-sm-3">
												<?= $result['rs_date'] ?>
											</div>
											<label for="code" class="col-sm-3"> Harus bayar sebelum  : </label>
											<div class="col-sm-3">
												<?= $result['end_date'] ?>
											</div>
								</div>
								
								<div class="form-group">
											<label for="code" class="col-sm-3">Harga yuran :</label>
											<div class="col-sm-3"><b><i>
												 
											</i></b></div>
											<label for="code" class="col-sm-3">Status pembayaran :</label>
								</div>
								
								<div class="form-group">
									
									<label for="code" class="col-sm-3"> Denda  :</label>
									<div class="col-sm-3"><font color="red"><b><i>
											
									</i></b></font></div>
									<label for="code" class="col-sm-3"> Jumlah duit  :</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" name="money" required>
									</div>
								</div>
									<button type="submit" class="btn btn-primary" name="save"><span class="glyphicon glyphicon-usd"></span> Bayar</button>
									<a href="reciet.php?id=<?= $result['sr_id']; ?>" target="_blank"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Print resit</button></a>
		</div>
						</form>
						
						
						
                    </div>        
                </div>
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
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/jquery-ui.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootflat/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="function/function.js"></script>
	<script>
    $(  "#dp" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    </script>

</body>

</html>