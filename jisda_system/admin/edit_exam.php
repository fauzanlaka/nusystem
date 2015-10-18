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
echo "<a href=../login_form.php>Back</a>";
exit();
}

	include("function/all_function.php");
	editexam();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Ubah data pembukaan ujian</title>

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
						
                        <h4><span class="glyphicon glyphicon-list-alt"><b> Ubah data daftar ujian</b></span></h4>
                        <hr>
                        <!-- Post list -->
                        <div class="pull-right">
							<?php include("layout/register_menu.php"); ?>
                        </div><br><br><br>
					
					 <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="<?= editexam(); ?>"><!-- Form -->
					 
					 <?php
						include("connect.php");
						$id = $_GET[id];
						$sql = "select * from register_exam where rx_id = '$id' ";
						$query = mysql_query($sql);
						$result = mysql_fetch_array($query);
					 ?>
                      
						<div class="form-group">
								<label for="Inputyear" class="col-sm-3">Tahun pengajian :</label>
									<div class="col-sm-2">
										<?php 
												include("connect.php");
												$sql_y= "select * from year";
												$query_y = mysql_query("$sql_y");
												if(!$query_y) {
													echo "year data not found ".mysql_error();
												}
																	
												$id = $_GET['id'];
												$sql_r = mysql_query("select * from register_exam where rx_id=".$id );
												$result_r = mysql_fetch_array($sql_r);
												if(mysql_num_rows($sql_r) > 0){
													$data = $result_r['y_id'];
												}
												?>
												<select name="academic_year" class="form-control" disabled>
												<?php 
													while($row = mysql_fetch_array($query_y)){
													$year = str_replace("\'", "&#39;", $row['year']);
												?>
													<option value="<?= $row['y_id']  ?>" <?php if($data==$row['y_id']){echo 'selected="selected" ';} ?> ><?= $year ?></option>
												<?php } ?>
											</select>
									</div>
						</div>
						
						<div class="form-group">
								<label for="Input_fakulty" class="col-sm-3">Penggal :</label>
									<div class="col-sm-2">
										<?php 
												include("connect.php");
												$sql_t = "select * from term";
												$query_t = mysql_query("$sql_t");
												if(!$query_t) {
													echo "Term data not found ".mysql_error();
												}
																	
												$id = $_GET['id'];
												$sql_r = mysql_query("select * from register_exam where rx_id=".$id );
												$result_r = mysql_fetch_array($sql_r);
												if(mysql_num_rows($sql_r) > 0){
													$data = $result_r['t_id'];
												}
												?>
												<select name="term" class="form-control" disabled>
												<?php 
													while($row = mysql_fetch_array($query_t)){
													$term = str_replace("\'", "&#39;", $row['term']);
												?>
													<option value="<?= $row['t_id']  ?>" <?php if($data==$row['t_id']){echo 'selected="selected" ';} ?> ><?= $term ?></option>
												<?php } ?>
											</select>
									</div>
						</div>
						
						<div class="form-group">
								<label for="Input_fakulty" class="col-sm-3"> Mulai pendaftaran :</label>
									<div class="col-sm-3">
										<input type="date" name="start_date" class="form-control" id="dp" value="<?= $result['start_date']; ?>">
									</div>
						</div>
						
						<div class="form-group">
								<label for="Input_fakulty" class="col-sm-3"> Akhir pendaftaran :</label>
									<div class="col-sm-3">
										<input type="date" name="end_date" class="form-control" id="dp" value="<?= $result['end_date']; ?>">
									</div>
						</div>
						
						<div class="form-group">
								<label for="Input_fakulty" class="col-sm-3">Harga daftar umum :</label>
									<div class="col-sm-3">
										<input type="text" name="prize" class="form-control" value="<?= $result['prize'];?>">
									</div>
						</div>
						
						<div class="form-group">
								<label for="Input_fakulty" class="col-sm-3">Status :</label>
									<div class="col-sm-2">
										<?php 
												include("connect.php");
												$sql_tu= "select * from tuitionstatus";
												$query_tu = mysql_query("$sql_tu");
												if(!$query_tu) {
													echo "tuition data not found ".mysql_error();
												}
																	
												$id = $_GET['id'];
												$sql_r = mysql_query("select * from register_exam where rx_id=".$id );
												$result_r = mysql_fetch_array($sql_r);
												if(mysql_num_rows($sql_r) > 0){
													$data = $result_r['tu_id'];
												}
												?>
												<select name="status" class="form-control">
												<?php 
													while($row = mysql_fetch_array($query_tu)){
													$status = str_replace("\'", "&#39;", $row['status']);
												?>
													<option value="<?= $row['tu_id']  ?>" <?php if($data==$row['tu_id']){echo 'selected="selected" ';} ?> ><?= $status ?></option>
												<?php } ?>
											</select>
									</div>
						</div>
						<div align="left">			
                            <button type="submit" class="btn btn-success" name="save"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
                            <button type="reset" class="btn btn-success">Reset</button>
						</div>
                   	</form>
                      <!-- /.Form -->
						
	
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
</body>

</html>