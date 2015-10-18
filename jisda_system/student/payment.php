<?php
session_start(); 
$ses_userid = $_SESSION[ses_userid];                                         
$ses_username = $_SESSION[ses_username];                         
	if($ses_userid =="" or $ses_username ==""){
		echo "Harap login system<br />";
	}
	
	if($_SESSION[ses_status] != "student") {
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

    <title>ADMIN | Sejarah bayaran</title>
  
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
p{
    text-indent: 50px;
}

d.sansserif {
    font-family: Arial, Helvetica, sans-serif;
	font-size:12px;
	font-style:italic
}
.max-lines {
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: scroll;
  max-height: 30.5em;
  line-height: 1.8em;
  text-indent: 2.5em;
}
</style>

</head>

<body style="background:#eee;">
<br>
    
   <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <a href="index.php"><img src="../images/LOGO_JISDA_WEB.png" class="img-rounded"></a>
                <!--Left menu-->
                <?php include("layout/left_menu.php"); ?>
                    
                </div></p>
            </div>

            <div class="col-md-9">
				<div class="thumbnail">
                    <div class="caption-full">
						<h4 class="pull-left">
							<b><span class="glyphicon glyphicon-usd"></span> Sejarah bayaran</b>
						</h4>
                        <h6 class="pull-right">
						<?php
								echo "<b>Hari bulan : </b>" . date("l")  . date(" Y/m/d") . "<br>";	
						?>
                        </h6>
                        
                        <h4><h4><?= $result1['p_title']; ?></h4><br>
                        <hr>
                        
						<?php
							include("connect.php");
							$sql = "select s.*,r.*,t.* from student_register s inner join register r on s.re_id = r.re_id inner join students t on s.st_id = t.st_id where s.st_id = '$ses_userid' order by s.sr_id ASC";
							$query = mysql_query($sql);
							$result = mysql_fetch_array($query);
							$query_l = mysql_query($sql);
						?>
						<?php
							$sqld = "select * from students where student_id='$ses_username'";
							$queryd = mysql_query($sqld);
							$resultd = mysql_fetch_array($queryd);
						?>
							<h5><b><?= $resultd['student_id']; ?> <?= $resultd['firstname_rumi'] ?> - <?= $resultd['lastname_rumi']; ?></b></h5>
                        </div>
						
						<div role="tabpanel">
							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Belajar</a></li>
								<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ujian</a></li>
                                                                <li role="presentation"><a href="#muqaddimah" aria-controls="profile" role="tab" data-toggle="tab">Muqaddimah</a></li>
                                                          </ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div align="center"><font color="blue"><b>SEJARAH DAFTAR BELAJAR DAN BAYARAN ANDA</b></font></div><br>
									<table class="table table-hover">
											<tr>
												<td align="center">
													<b>Penggal/Tahun</b>
												</td>
												<td align="center">
													<b>Jumlah duit</b>
												</td>
												<td align="center">
													<b>Status</b>
												</td>
											</tr>
											<?php
												while($row = mysql_fetch_array($query_l)){
											?>
											<tr>
												<td align="center"><?= $row["term"]; ?>/<?= $row['academic_year']; ?></td>
												<td align="center">
													<?php
														$re_id = $row['re_id'];
														$rs_type = $row['rs_type'];
														$sql_prz = "select * from register where re_id = '$re_id'";
														$query_prz = mysql_query($sql_prz);
														$result_prz = mysql_fetch_array($query_prz); 
														if($rs_type == "common_prize"){
															$prize = $result_prz['common_prize'];
														}else{
															$prize = $result_prz['special_prize'];
														}?>	
													<?= $prize; ?>
												</td>
												<?php if($row['pay_status'] == "Sudah bayar" ){?>
												<td align="center"><font color="green"><b><?= $row['pay_status'];?></b></font></td>
												<?php }else{ ?>
												<td align="center"><font color="red"><b><?= $row['pay_status'];?></b></font></td>
												<?php } ?>
											</tr>
											<?php
											}
											?>
									</table>
							</div>
							
							<div role="tabpanel" class="tab-pane" id="profile">
								<div align="center"><font color="blue"><b>SEJARAH DAFTAR UJIAN DAN BAYARAN ANDA</b></font></div><br>
								<?php
									include("connect.php");
									$sql = "select s.*,r.*,t.* from student_register_exam s inner join register_exam r on s.rx_id = r.rx_id inner join students t on s.st_id = t.st_id where s.st_id = '$ses_userid' order by s.srx_id " ;
									$query = mysql_query($sql);
									$result = mysql_fetch_array($query);
									$query_l = mysql_query($sql);
								?>
								<table class="table table-hover">
											<tr>
												<td align="center">
													<b>Penggal/Tahun</b>
												</td>
												<td align="center">
													<b>Jumlah duit</b>
												</td>
												<td align="center">
													<b>Status</b>
												</td>
											</tr>
											<?php
												while($row = mysql_fetch_array($query_l)){
											?>
											<tr>
												<td align="center"><?= $row["term"]; ?>/<?= $row['year']; ?></td>
												<td align="center">
													<?php
														$rx_id = $row['rx_id'];
														$rs_type = $row['rs_type'];
														$sql_prz = "select * from register_exam where rx_id = '$rx_id'";
														$query_prz = mysql_query($sql_prz);
														$result_prz = mysql_fetch_array($query_prz); 
														$prize = $result_prz['prize'];
													?>	
													<?= $prize; ?>
												</td>
												<?php if($row['pay_status'] == "Sudah bayar" ){?>
												<td align="center"><font color="green"><b><?= $row['pay_status'];?></b></font></td>
												<?php }else{ ?>
												<td align="center"><font color="red"><b><?= $row['pay_status'];?></b></font></td>
												<?php } ?>
											</tr>
											<?php
											}
											?>
									</table>
							</div>
							<div role="tabpanel" class="tab-pane" id="muqaddimah">
                                                            <div align="center"><font color="blue"><b>Bayar muqaddimah</b></font></div><br>
                                                            <table>
                                                                
                                                            </table>
                                                        </div>
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