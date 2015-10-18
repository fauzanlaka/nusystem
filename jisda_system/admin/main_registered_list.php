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
        
            <?php
                include("../connect.php");
                
                //Mereka yang daftar tahun 1
                $current_year = date('Y');
                $sql_study1 = mysql_query("select sr.*,st.* from student_register sr inner join students st on sr.st_id=st.st_id where st.income_year='$current_year' and sr.term='1'");
                $result_study1 = mysql_num_rows($sql_study1);
                
                //Mereka yang daftar tahun 2
                $year2 = $current_year-1;
                $sql_study2 = mysql_query("select sr.*,st.* from student_register sr inner join students st on sr.st_id=st.st_id where st.income_year='$year2' and sr.term='1'");
                $result_study2 = mysql_num_rows($sql_study2);
                
                //Mereka yang daftar tahun 3
                $year3 = $current_year-2;
                $sql_study3 = mysql_query("select sr.*,st.* from student_register sr inner join students st on sr.st_id=st.st_id where st.income_year='$year3' and sr.term='1'");
                $result_study3 = mysql_num_rows($sql_study3);
                
                //Mereka yang daftar tahun 4
                $year4 = $current_year-3;
                $sql_study4 = mysql_query("select sr.*,st.* from student_register sr inner join students st on sr.st_id=st.st_id where st.income_year='$year4' and sr.term='1'");
                $result_study4 = mysql_num_rows($sql_study4);
                
                //Laporan mereka yang "Belum bayar" tahun 1
                $sql_payed1 = mysql_query("select st.*,sr.* from students st inner join student_register sr on st.st_id=sr.st_id where sr.pay_status='Belum bayar' and st.income_year='$current_year'");
                $result_payed1 = mysql_num_rows($sql_payed1);
                
                //Laporan mereka yang "Sudah bayar" tahun 1
                $sql_pay1 = mysql_query("select st.*,sr.* from students st inner join student_register sr on st.st_id=sr.st_id where sr.pay_status='Sudah bayar' and st.income_year='$current_year'");
                $result_pay1 = mysql_num_rows($sql_pay1);
                
                //Laporan mereka yang "Belum bayar" tahun 2
                $sql_payed2 = mysql_query("select st.*,sr.* from students st inner join student_register sr on st.st_id=sr.st_id where sr.pay_status='Belum bayar' and st.income_year='$year2'");
                $result_payed2 = mysql_num_rows($sql_payed2);
                
                //Laporan mereka yang "Sudah bayar" tahun 2
                $sql_pay2 = mysql_query("select st.*,sr.* from students st inner join student_register sr on st.st_id=sr.st_id where sr.pay_status='Sudah bayar' and st.income_year='$year2'");
                $result_pay2 = mysql_num_rows($sql_pay2);
                
                //Laporan mereka yang "Belum bayar" tahun 3
                $sql_payed3 = mysql_query("select st.*,sr.* from students st inner join student_register sr on st.st_id=sr.st_id where sr.pay_status='Belum bayar' and st.income_year='$year3'");
                $result_payed3 = mysql_num_rows($sql_payed3);
                
                //Laporan mereka yang "Sudah bayar" tahun 3
                $sql_pay3 = mysql_query("select st.*,sr.* from students st inner join student_register sr on st.st_id=sr.st_id where sr.pay_status='Sudah bayar' and st.income_year='$year3'");
                $result_pay3 = mysql_num_rows($sql_pay3); 
                
                //Laporan mereka yang "Belum bayar" tahun 4
                $sql_payed4 = mysql_query("select st.*,sr.* from students st inner join student_register sr on st.st_id=sr.st_id where sr.pay_status='Belum bayar' and st.income_year='$year4'");
                $result_payed4 = mysql_num_rows($sql_payed4);
                
                //Laporan mereka yang "Sudah bayar" tahun 4
                $sql_pay4 = mysql_query("select st.*,sr.* from students st inner join student_register sr on st.st_id=sr.st_id where sr.pay_status='Sudah bayar' and st.income_year='$year4'");
                $result_pay4 = mysql_num_rows($sql_pay4); 
            ?>

            <div class="col-md-9">
			
                <div class="thumbnail">

                    <div class="caption-full">
					
                        <h6 class="pull-right">
                            <?php echo "<b>Hari bulan : </b>" . date("l")  . date(" Y/m/d") . "<br>"; ?>
                        </h6>
						
                        <h4><span class="glyphicon glyphicon-list-alt"><b> Sistem pendaftaran</b></span></h4>
                        <hr>
                        <!-- Post list -->
                        <div class="pull-left">
                            <h3>Loporan pendaftaran mahasiswa</h3>
                        </div>
                        <div class="pull-right">
                            <?php include("layout/registered_menu.php"); ?>
                        </div>	
                        <br><br><br>
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">Laporan mahasiswa yang daftar P/T : 1/<?= $current_year; ?></div>
                                            <div class="panel-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td align="center"><b>Tahun</b></th>
                                                        <td align="center"><b>Jumlah Orang</b></th>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>1</b></td>
                                                        <td align="center"><?= $result_study1 ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>2</b></td>
                                                        <td align="center"><?= $result_study2 ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>3</b></td>
                                                        <td align="center"><?= $result_study3 ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>4</b></td>
                                                        <td align="center"><?= $result_study4 ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>Total</b></td>
                                                        <td align="center"><b><?= $result_study1+$result_study2+$result_study3+$result_study4 ?></b></td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">Laporan pembayaran P/T : 1/<?= $current_year; ?></div>
                                            <div class="panel-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Tahun</th>
                                                        <th>Sudah bayar</th>
                                                        <th>Belum bayar</th>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>1</b></td>
                                                        <td align="center"><font color=green><?= $result_pay1 ?></font></td>
                                                        <td align="center"><font color="red"><?= $result_payed1 ?></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>2</b></td>
                                                        <td align="center"><font color="green"><?= $result_pay2 ?></font></td>
                                                        <td align="center"><font color="red"><?= $result_payed2 ?></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>3</b></td>
                                                        <td align="center"><font color="green"><?= $result_pay3 ?></font></td>
                                                        <td align="center"><font color="red"><?= $result_payed3 ?></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>4</b></td>
                                                        <td align="center"><font color="green"><?= $result_pay4 ?></font></td>
                                                        <td align="center"><font color="red"><?= $result_payed4 ?></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>Total</b></td>
                                                        <td align="center"><font color="green"><b><?= $result_pay1+$result_pay2+$result_pay3+$result_pay4 ?></b></font></td>
                                                        <td align="center"><font color="red"><b><?= $result_payed1+$result_payed2+$result_payed3+$result_payed4 ?></b></font></td>
                                                    </tr>
                                                </table>
                                                <?php
                                                    //Total hasil duit yuran
                                                    $sql_yuran = mysql_query("SELECT SUM(money) AS money FROM payments");
                                                    $result_yuran = mysql_fetch_assoc($sql_yuran);
                                                    ?>
                                                <p><b>Jumlah duit : <?= number_format($result_yuran['money']); ?> ฿.</b> 
                                                    
                                                </p>
                                                
                                            </div>
                                    </div>
                                </div>
                            </div> <hr>
                            
                        </form>
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