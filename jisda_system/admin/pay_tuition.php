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
						
						<form class="form-horizontal" role="form" action="function/savepaytuition.php" method="post" enctype="multipart/form-data" ><!-- Form -->
								
							<?php
								include("connect.php");
								$id = $_GET['id'];
								$sql = "select sr.*,re.*,st.* from student_register sr INNER JOIN students st ON sr.st_id = st.st_id INNER JOIN register re ON sr.re_id = re.re_id WHERE sr_id = '$id'";
								$query = mysql_query($sql);
								$result = mysql_fetch_array($query);
								$sr_id = $result['sr_id'];
								$st_id = $result['st_id'];
								$pay_date = date('Y-m-d H:i:s');
								$subject = $result['subject'];
								
								$getstudent_id = $result['st_id'];
								$sql_fakulty = "select fakultys.*,students.* from fakultys join students on fakultys.ft_id = students.ft_id where st_id = '$getstudent_id'";
								$query_fakulty = mysql_query($sql_fakulty);
								$result_fakulty = mysql_fetch_array($query_fakulty);
								$ft_name = str_replace("\'", "&#39;", $result_fakulty['ft_name']);
								
								$sql_department = " select departments.*,students.* from departments join students on departments.dp_id = students.dp_id where st_id = '$getstudent_id'";
								$query_department = mysql_query($sql_department);
								$result_department = mysql_fetch_array($query_department);
								$dp_name = str_replace("\'", "&#39;", $result_department['dp_name']);
							?>
							
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>Data pendaftaran untuk  : <?= $result['term'] ?>/<?= $result['academic_year'] ?></b></font></legend>
							
								<div class="form-group">
											<label for="code" class="col-sm-3"> No. Pokok  :</label>
											<div class="col-sm-3">
												<?= $result['student_id'] ?>
											</div>
											<label for="code" class="col-sm-3"> Fakulti  :</label>
											<div class="col-sm-3">
												<?= $ft_name; ?>
											</div>
								</div>
								
								<div class="form-group">
											<label for="code" class="col-sm-3"> Nama - Baka  :</label>
											<div class="col-sm-3">
												<?= $result['firstname_rumi'] ?> - <?= $result['lastname_rumi'] ?>
											</div>
											<label for="code" class="col-sm-3"> Jurusan  :</label>
											<div class="col-sm-3">
												<?= $dp_name; ?>
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
												  <?php 
													if($result['rs_type'] == "special_prize" ){
														echo $result['special_prize'];
														$mc = $result['special_prize'];
													}else{
														echo $result['common_prize'];
														$mc = $result['common_prize'];
													}
												  ?> ฿
											</i></b></div>
											<label for="code" class="col-sm-3">Status pembayaran :</label>
											<?php
												if($result['pay_status'] == "Belum bayar"){
												?>
													<div class="col-sm-2"><font color="red"><b>
														<?= $result['pay_status']; ?>
													</b></font></div>
											<?php }else{ ?>
													<div class="col-sm-2"><font color="green"><b>
														<?= $result['pay_status']; ?>
													</b></font></div>
											<?php } ?>
								</div>
								
								<div class="form-group">
									<?php 
										$pay_per_day = 3;//ค่าปรับต่อวัน (บาท)

										$return_date     = $result['end_date'];        //วันที่กำหนดส่งคืน
										$today            = date('Y-m-d');    //วันที่ส่งคืนจริง

										//หาจำนวนวัน กรณีที่วันส่งคืนจริง เลยวันกำหนดส่ง
										$pay = 0;
										$day_late_qty = 0;
										if($today > $return_date){
											$time_today = strtotime($today);        //แปลงวันที่ส่งคืนจริง เป็นตัวเลข timestamp
											$time_return = strtotime($return_date);    //แปลงวันที่กำหนดส่งคืน เป็นตัวเลข timestamp

											$day_late_qty = ($time_today - $time_return) / ( 60 * 60 * 24 ); 
											$pay = ceil($day_late_qty) * $pay_per_day;
										}
									?>
									<label for="code" class="col-sm-3"> Denda  :</label>
									<div class="col-sm-3"><font color="red"><b><i>
											<?php echo $pay; ?> ฿ 
									</i></b></font></div>
									<label for="code" class="col-sm-3"> Jumlah duit  :</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" name="money" value="<?= $mc ?>">
									</div>
								</div>
                                                                <?php
											include("connect.php");
											$sql_rc = "SELECT* FROM payments WHERE p_id = (SELECT MAX(p_id) FROM payments)";
											$query_rc = mysql_query($sql_rc);
											$result_rc = mysql_fetch_array($query_rc);
											
											$maxbill = $result_rc['reciet_code'];
											//$bills = $result_rc['p_id'];
											//$reciet_code = $maxbill+1;
                                                                ?>
                                                                <div class="form-group">
									<div class="col-sm-6"></div>
									<label for="code" class="col-sm-3"> Receipt  : <?= $maxbill; ?></label>
									<div class="col-sm-3">
										<input type="text" class="form-control" name="receipt" required>
									</div>
								</div>
                                                                <div class="form-group">
									<div class="col-sm-6"></div>
									<label for="code" class="col-sm-3"> Tarikh bayar  : </label>
									<div class="col-sm-3">
										<input type="date" class="form-control" name="pay_date" value="<?= date('Y-m-d'); ?>" required>
									</div>
								</div>
								
												<input type="hidden" name="sr_id" value="<?= $sr_id; ?>">
												<input type="hidden" name="st_id" value="<?= $st_id; ?>">
												<input type="hidden" name="penalty" value="<?= $pay; ?>">
												<input type="hidden" name="mc" value="<?= $mc ?>">
											<div align="center">
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