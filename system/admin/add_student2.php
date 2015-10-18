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
echo "<a href=../index.php>Back</a>";
exit();
}
	
	include("function/all_function.php");
	saveaddstudentt();
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<title>ADMIN | Tambah pelajar</title>

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
						
                        <h4><span class="glyphicon glyphicon-bookmark"><b> Tambah pelajar baru</b></span></h4>
                        <hr>
                        <!-- Post list -->
                        <div class="pull-right">
                        	
                        </div>
						<div class="pull-left">
							step1 ><font color="red"><b> step2</b></font>
						</div>
                        <br><br><br>
					
						<form class="form-horizontal" role="form" action="<?= saveaddstudentt(); ?>" method="post" enctype="multipart/form-data" ><!-- Form -->

								<?php
									$id = $_GET['id'];
									$sql1 = "select * from students where st_id = '$id' ";
									$query1 = mysql_query($sql1);
									$result1 = mysql_fetch_array($query1);
								?>
								
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>ส่วนที่ 1 : ข้อมูลทั่วไป</b></font></legend>
								
								<div class="form-group">
										<label for="code" class="col-sm-2" > รหัสประจำตัว  :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control"  value="<?= $result1['student_id']; ?>" disabled>
										</div>
								</div>
								
								<div class="form-group">
										<label for="code" class="col-sm-2"> ชื่อ  :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="t_studentname" name="t_studentname">
										</div>
										<label for="code" class="col-sm-1">นามสกุล  </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="t_studentlastname" name="t_studentlastname" >
										</div>
								</div>
								
								<div class="form-group">
										<label for="code" class="col-sm-2"> เลขประจำตัวประชาชน  :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="student_id" name="student_id" value="<?= $result1['cityzen_id']; ?>"  disabled>
										</div>
								</div>
								
								<div class="form-group">
										<label for="code" class="col-sm-2"> ว/ด /ป เกิด  :</label>
										<div class="col-sm-3">
											<input type="date" class="form-control" value="<?= $result1['birdth_date'] ?>" disabled> 
										</div>
								</div>
								
								<div class="form-group">
										<label for="code" class="col-sm-2"> สถานที่เกิด (จังหวัด)  :</label>
										<div class="col-sm-3">
											<?php
												include("connect.php");
												$sql_pr = "select * from province";
												$query_pr = mysql_query($sql_pr);
												//$select = $query_pr['PROVINCE_ID'];
											?>
											<select name="t_province" class="form-control" >
												<option value="0">---------Pilih---------</option>
											<?php while($result_pr = mysql_fetch_array($query_pr)){ ?>
												<option value="<?= $result_pr['PROVINCE_ID']; ?>" ><?= $result_pr['PROVINCE_NAME']; ?></option>
											<?php } ?>
											</select>
										</div>
								</div>
								
								<div class="form-group">
										<label for="code" class="col-sm-2">บิดา ชื่อ  :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="t_fathername" name="t_fathername" >
										</div>
										<label for="code" class="col-sm-1">นามสกุล  </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="t_fatherlastname" name="t_fatherlastname">
										</div>
								</div>
								
								<div class="form-group">
										<label for="code" class="col-sm-2">มารดา ชื่อ  :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="t_mothername" name="t_mothername" >
										</div>
										<label for="code" class="col-sm-1">นามสกุล  </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="t_motherlastname" name="t_motherlastname" >
										</div>
								</div>
							</fieldset>
							
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>ส่วนที่ 2 : ที่อยู่</b></font></legend>
								
								<div class="form-group">
										<label for="code" class="col-sm-2"><font color="blue">ที่อยู่  :- </font></label>
								</div>
								
								<div class="form-group">
										<label for="code" class="col-sm-2">หมู่บ้าน  :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="t_village_name" name="t_village_name" >
										</div>
										<label for="code" class="col-sm-2">บ้านเลขที่  :</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" value="<?= $result1['house_number']; ?>" disabled>
										</div>
								</div>
								
								<div class="form-group">
									<label for="code" class="col-sm-2">หมู่ที่  :</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" value="<?= $result1['place']; ?>" disabled>
										</div>
										<div class="col-sm-2">
										</div>
									<label for="code" class="col-sm-2">ซอย  :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="student_id" name="t_road"   >
										</div>
								</div>
								
								<div class="form-group">
									<label for="code" class="col-sm-2">ตำบล  :</label>
										<div class="col-sm-3">
											<select name="t_subdistrict"  class="form-control" >
												<option value="0">---------Pilih---------</option>
												<?php 
													$sql_ds ="select * from district";
													$query_ds = mysql_query($sql_ds);
													while($result_ds = mysql_fetch_array($query_ds)){
												?>
												<option value="<?= $result_ds['DISTRICT_ID'] ?>"><?= $result_ds['DISTRICT_NAME']  ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-sm-1">
										</div>
									<label for="code" class="col-sm-2">อำเภอ : </label>
										<div class="col-sm-3">
											<select name="t_district"  class="form-control" >
												<option value="0">---------Pilih---------</option>
												<?php 
													$sql_ap ="select * from amphur";
													$query_ap = mysql_query($sql_ap);
													while($result_ap = mysql_fetch_array($query_ap)){
												?>
												<option value="<?= $result_ap['AMPHUR_ID'] ?>"><?= $result_ap['AMPHUR_NAME']  ?></option>
												<?php } ?>
											</select>
										</div>
								</div>
								
								<div class="form-group">
									<label for="code" class="col-sm-2">จังหวัด  :</label>
										<div class="col-sm-3">
											<?php
												include("connect.php");
												$sql_pr = "select * from province";
												$query_pr = mysql_query($sql_pr);
												//$select = $query_pr['PROVINCE_ID'];
											?>
											<select name="t_province_sec" class="form-control" >
												<option value="0">---------Pilih---------</option>
											<?php while($result_pr = mysql_fetch_array($query_pr)){ ?>
												<option value="<?= $result_pr['PROVINCE_ID']; ?>" ><?= $result_pr['PROVINCE_NAME']; ?></option>
											<?php } ?>
											</select>
										</div>
										<div class="col-sm-1">
										</div>
									<label for="code" class="col-sm-2">รหัสไปรษณีย์ : </label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?= $result1['post'] ?>" disabled >
										</div>
								</div>
								
								<div class="form-group">
									<label for="code" class="col-sm-2">โทรศัพท์  :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?= $result1['telephone'] ?>" disabled >
										</div>
								</div><br>
								
								<div class="form-group">
									<label for="code" class="col-sm-3">จบชั้น ม. 6 จากโรงเรียน :</label>
										<div class="col-sm-5">
											<input type="text" class="form-control" id="t_higschool" name="t_higschool"   >
										</div>
								</div>
								
								<div class="form-group">
									<label for="code" class="col-sm-3">จบชั้น 10 จากโรงเรียน :</label>
										<div class="col-sm-5">
											<input type="text" class="form-control" id="t_relegion" name="t_relegion"  >
										</div>
								</div>
								
		
								
							</fieldset> 
							
							<div align="center">
								<input type="hidden" name="id" value="<?= $result1['st_id']; ?>" >
								<button type="submit" name="save" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
								<button type="reset" name="save" class="btn btn-success">Reset</button>
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
	
	$(function() {
    var temp="75"; 
    $("#MySelect").val(temp);
	});
	
	$(function() {
    var temp="8708"; 
    $("#ds").val(temp);
	});
	
	$(function() {
    var temp="977"; 
    $("#ap").val(temp);
	});
	
	$(function() {
    var temp="75"; 
    $("#pv").val(temp);
	});
    </script>

</body>

</html>