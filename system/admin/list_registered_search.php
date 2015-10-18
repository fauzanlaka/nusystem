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
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Mahasiswa terdaftar</title>

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
						
                        <h4><span class="glyphicon glyphicon-list-alt"><b> Mahasiswa terdaftar</b></span></h4>
                        <hr>
                        <!-- Post list -->
                        <div class="pull-right">
							<?php include("layout/registered_menu.php"); ?>
                        </div><br><br><br>
					
							<form class="form-horizontal" role="form" enctype="multipart/form-data" method="get" action="list_registered_search.php"><!-- Form -->
                      
								<div class="form-group">
											<div class="col-sm-2">
												<?php
													include("connect.php");
													$sql = "select * from year order by year";
													$query = mysql_query($sql);
												?>
												<select name="year" class="form-control" >
													<option value="0">Tahun</option>
													<?php while($row = mysql_fetch_array($query)){ ?>
													<option value="<?= $row[year] ?>"><?= $row['year']; ?></option>
													<?php } ?>
												</select>
											</div>
											
											<div class="col-sm-2">
												<?php
													include("connect.php");
													$sql = "select * from term";
													$query = mysql_query($sql);
												?>
												<select name="term" class="form-control" >
													<option value="0">Penggal</option>
													<?php while($row = mysql_fetch_array($query)){ ?>
													<option value="<?= $row[term] ?>"><?= $row['term']; ?></option>
													<?php } ?>
												</select>
											</div>
											
											<div class="col-sm-3">
												<select name="daftar" class="form-control">
													<option value="0">----Jenis daftar----</option>
													<option value="1">Belajar</option>
													<option value="2">Ujian</option>
												</select>
											</div>
											
											<div class="col-sm-2">
												<select name="pay_status" class="form-control">
													<option value="0">--Status--</option>
													<option value="bayar">Semua</option>
													<option value="Belum bayar">Belum bayar</option>
													<option value="Sudah bayar">Sudah bayar</option>
												</select>
											</div>
											
											<div class="col-sm-2">
												<button type="submit" class="btn btn-primary"><span class=" glyphicon glyphicon-search"></span> Search</button> 
											</div>
								</div>
								
							</form>
					
                        <br>
						
						<!-- Users query --> 
                        <?php 
							include("connect.php");
							$year = $_GET['year'];
							$term = $_GET['term'];
							$pay_status = $_GET['pay_status'];
							$daftar = $_GET['daftar'];
							
							if($daftar == '1'){
								$strSQL = "select sr.*,st.*,re.* from student_register sr inner join students st on sr.st_id = st.st_id inner join register re on sr.re_id = re.re_id WHERE (academic_year = '".$year."') and (term = '".$term."') and ( pay_status LIKE '%".$pay_status."%') ";
							}else{
								$strSQL = "select sx.*,st.*,rx.* from student_register_exam sx inner join students st on sx.st_id = st.st_id inner join register_exam rx on sx.rx_id = rx.rx_id WHERE (year = '".$year."') and (term = '".$term."') and ( pay_status LIKE '%".$pay_status."%') "; 
							}

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
							$strSQL .="order  by stu_id ASC LIMIT $Page_Start , $Per_Page";
							$objQuery  = mysql_query($strSQL);
						?>
						
						<div align="center">
							<?php
								if($daftar == '1'){ ?>
									<font color="Blue"><b>Mereka yang daftar belajar </b></font> (<?php echo $term ?>/<?php echo $year ?>)
							<?php }elseif($daftar == '2'){ ?>
									<font color="Blue"><b>Mereka yang daftar periksa </b></font> (<?php echo $term ?>/<?php echo $year ?>)
							<?php }else{ ?>
									<font color="red"><b>Sila pilih filter di atas untuk keluarkan laporan </b></font> 
							<?php } ?>
						</div><br>
					<?= $daftar_re; ?>	
                <table>
               		<table class="table table-hover">
						<tr>
                            <td align="center"><strong>No.Pokok</strong></td>
                            <td align="center"><strong>Nama-baka</strong></td>
							<td align="center"><strong>Penggal/Tahun</strong></td>
                            <td align="center"><strong>Telepon</strong></td>
                            <td align="center"><strong>Email</strong></td>
                            <td align="center"><strong>Status pembayaran</strong></td>
                        </tr>
						<?php
							while($objResult = mysql_fetch_array($objQuery)){
							$student_id = str_replace("\'", "&#39;", $objResult['student_id']);
							$firstname_rumi = str_replace("\'", "&#39;", $objResult['firstname_rumi']);
							$lastname_rumi = str_replace("\'", "&#39;", $objResult['lastname_rumi']);
							$telephone = str_replace("\'", "&#39;", $objResult['telephone']);
							$email = str_replace("\'", "&#39;", $objResult['email']);
							$pay_status = str_replace("\'", "&#39;", $objResult['pay_status']);
							$year = str_replace("\'", "&#39;", $objResult['academic_year']);
							$year2 = str_replace("\'", "&#39;", $objResult['year']);
							$term = str_replace("\'", "&#39;", $objResult['term']);
						?>
                         <tr>        
                             <td align="center"><?= $student_id; ?></td>
                             <td align="left"><?= $firstname_rumi; ?> -  <?= $lastname_rumi; ?></td>
							 <td align="center"><?= $term; ?>/<?= $year; ?><?= $year2 ?></td>
                             <td align="center"><?= $telephone; ?></td>
                             <td align="center"><?= $email; ?></td>
							 <?php 
							 if($pay_status == "Belum bayar"){
							 ?>
							<td align="center"><font color="red"><b><?= $pay_status; ?><b></font></td>
							<?php 
							}else{
							?>
							<td align="center"><font color="green"><b><?= $pay_status; ?><b></font></td>
							<?php } ?>
                         </tr>
						<?php } ?>
				</table>
<br>

						Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :

						<?php
							if($Prev_Page)
							{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&daftar=$_GET[daftar]&year=$_GET[year]&term=$_GET[term]&pay_status=$_GET[pay_status]'><< Back</a> ";
							}
							for($i=1; $i<=$Num_Pages; $i++)
							{
								if($i != $Page)
								{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i&daftar=$_GET[daftar]&year=$_GET[year]&term=$_GET[term]&pay_status=$_GET[pay_status]'>$i</a> ";

								}
								else
								{
								echo "<b> $i </b>";
								}
							}
									if($Page!=$Num_Pages)
									{
										echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&daftar=$_GET[daftar]&year=$_GET[year]&term=$_GET[term]&pay_status=$_GET[pay_status]'>Next>></a> ";
									}	
						?>

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
