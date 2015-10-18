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
                        	<?php include("layout/registered_menu.php");  ?>
                        </div>
						<div class="pull-left">
							<form class="navbar-form" role="search" action="no_registered_search.php" method="post">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Nanma atau nomor pokok" name="student_id" required>
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
						</div>
                        <br><br><br>
						
						<!-- Users query --> 
                        <?php 
							include("connect.php");
							$student_id = $_POST['student_id'];
							$strSQL = "select sr.*,st.*,re.* from student_register sr inner join students st on sr.st_id = st.st_id inner join register re on sr.re_id = re.re_id where (stu_id = '".$student_id."')  "; 
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
							$strSQL .="order  by sr_id ASC LIMIT $Page_Start , $Per_Page";
							$objQuery  = mysql_query($strSQL);
						?>
                <table>
               		<table class="table table-hover">
						<tr>
                            <td align="center"><strong>No.Pokok</strong></td>
                            <td align="center"><strong>Nama-baka</strong></td>
							<td align="center"><strong>Penggal/Tahun</strong></td>
                            <td align="center"><strong>Telepon</strong></td>
                            <td align="center"><strong>Email</strong></td>
                            <td align="center"><strong>Status pembayaran</strong></td>
                            <td align="center"><strong>Hapus</strong></td>
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
							$term = str_replace("\'", "&#39;", $objResult['term']);
                                                        $id = $objResult['sr_id'];
						?>
                          <tr>        
                             <td align="center"><a href="pay_tuition.php?id=<?= $objResult['sr_id']; ?>"><?= $student_id; ?></a></td>
                             <td align="left"><?= $firstname_rumi; ?> -  <?= $lastname_rumi; ?></td>
							 <td align="center"><?= $term; ?>/<?= $year; ?></td>
                             <td align="center"><?= $telephone; ?></td>
                             <td align="center"><?= $email; ?></td>
							 <?php 
							 if($pay_status == "Belum bayar"){
							 ?>
							<td align="center"><font color="red"><b><?= $pay_status; ?><b></font></td>
							<?php 
							}else{
							?>
							<td align="center"><font color="green"><b><a href="edit_pay_tuition.php?id=<?= $objResult['sr_id']; ?>"><?= $pay_status; ?></a><b></font></td>
							<?php } ?>
                             <td align="center"><a href="function/delete_registered_student.php?id=<?= $id ?>" onclick="return confirm('Anda yakin untuk hapus data ini?');"><span class="glyphicon glyphicon-trash"></a></td>
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