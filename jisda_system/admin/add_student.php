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
	include("function/function.php");
	stcode2check();
	include("function/all_function.php");
	saveaddstudent();

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
						
                        <h4><span class="glyphicon glyphicon-list-alt"><b> Tambah pelajar baru</b></span></h4>
                        <hr>
                        <!-- Post list -->
                        <div class="pull-right">
                        	<?php include("layout/student_menu.php"); ?>
                        </div>
						<div class="pull-left">
							<font color="red"><b>step1 ></b></font> step2
						</div>
                        <br><br><br>
						
						<form class="form-horizontal" role="form" action="<?= saveaddstudent(); ?>" method="post" enctype="multipart/form-data" ><!-- Form -->

							<div class="form-group">
										<label for="code" class="col-sm-3"> No. Pokok  :</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="student_id" name="student_id"  required onBlur="checkstcode()" >
										</div><span id="stcodestatus"></span> 
							</div>
							
							<div class="form-group">
										<label for="code" class="col-sm-3"> Tahun daftar  masuk :</label>
										<div class="col-sm-3">
											<?php
											include("connect.php");
											$sql = "select * from year order by year";
											$query = mysql_query($sql);
											?>
											<select name="income_year" class="form-control">
												<option value="0">------------Pilih------------</option>
												<?php while($row = mysql_fetch_array($query)){ ?>
												<option value="<?= $row[year] ?>"><?= $row['year']; ?></option>
												<?php } ?>
										</select>
										</div>
							</div>
							
							<div class="form-group">
										<label for="code" class="col-sm-3"> Fakulti:</label>
										<div class="col-sm-3">
											<?php
												include("connect.php");
												$sql_fk = "select * from fakultys";
												$query_fk = mysql_query($sql_fk);
											?>
											<select name="ft_id" class="form-control">
											<option value="0">------------Pilih------------</option>
											<?php
												while($result = mysql_fetch_array($query_fk)){
												$ft_name = str_replace("\'", "&#39;", $result['ft_name']);
											?>
												<option value="<?= $result['ft_id'] ?>"><?= $ft_name ?></option>
											<?php } ?>
											</select>
										</div>
							</div>

							<div class="form-group">
										<label for="code" class="col-sm-3">Jurusan :</label>
										<div class="col-sm-3">
											<?php
												include("connect.php");
												$sql = "select * from departments";
												$query = mysql_query($sql);
											?>
											<select name="dp_id" class="form-control">
											<option value="0">------------Pilih------------</option>
											<?php
												while($result = mysql_fetch_array($query)){
												$dp_name = str_replace("\'", "&#39;", $result['dp_name']);
											?>
												<option value="<?= $result['dp_id'] ?>"><?= $dp_name ?></option>
											<?php } ?>
											</select>
										</div> 
							</div>
							<div class="form-group">
								<label for="code" class="col-sm-3"> Kelas:</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="class" name="class">
										</div>
										<span id="stcodestatus"></span> 
							</div>
							
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>Bahagian  1 : Biodata</b></font></legend>

								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Nama (Rumi)  :</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="firstname_rumi" name="firstname_rumi" placeholder="Nama lengkap tulisan RUMI" required > 
									</div> 
									<label for="Inputname" class="col-sm-1">Baka </label>
									<div class="col-sm-4">	
										<input type="text" class="form-control" id="lastname_rumi" name="lastname_rumi" placeholder="Baka tulisan RUMI"  required >
									</div>
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Nama (Jawi) : </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="firstname_jawi" name="firstname_jawi" placeholder="Nama lengkap tulisan JAWI" required > 
									</div> 
									<label for="Inputname" class="col-sm-1">Baka </label>
									<div class="col-sm-4">	
										<input type="text" class="form-control" id="lastname_jawi" name="lastname_jawi" placeholder="Baka tulisan JAWI"  required >
									</div>
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Nama (Engris) : </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="firstname_eng" name="firstname_eng" placeholder="Nama lengkap tulisan ENGRIS"  > 
									</div> 
									<label for="Inputname" class="col-sm-1">Baka </label>
									<div class="col-sm-4">	
										<input type="text" class="form-control" id="lastname_eng" name="lastname_eng" placeholder="Baka tulisan ENGRIS" >
									</div>
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">No. Kad pengenalan : </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="cityzen_id" name="cityzen_id" placeholder="Kad pengenalan" > 
									</div> 
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Tanggal lahir : </label>
									<div class="col-sm-4">
										<input type="date" class="form-control" id="dp" name="birdth_date"> 
									</div> 
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Tempat lahir : </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="born_place" name="born_place" placeholder="Wilayah / Provinsi" > 
									</div> 
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Penyakit pembawaaan : </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="disease" name="disease"  placeholder="Penyakit pembawaaan"> 
									</div> 
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Nama bapa : </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="father_name" name="father_name" placeholder="Nama-baka"> 
									</div> 
									<label for="Inputname" class="col-sm-1">Pekerjaan</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="father_job" name="father_job" placeholder="Pekerjaan bapa" > 
									</div> 
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Nama ibu : </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Nama-baka" > 
									</div> 
									<label for="Inputname" class="col-sm-1">Pekerjaan </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="mother_job" name="mother_job" placeholder="Pekerjaan ibu" > 
									</div> 
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3"><font color="blue">Alamat tempat tinggal :- </font></label>
								</div>
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">No. Rumah : </label>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="house_number" name="house_number" placeholder="EX : 65/1"> 
									</div>
									<div class="col-sm-2">
									</div>
									<label for="Inputname" class="col-sm-1">Kampong </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="village_name" name="village_name" placeholder="EX : Laka"> 
									</div>
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Tempat : </label>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="place" name="place" placeholder="EX : 4" > 
									</div>
									<div class="col-sm-2">
									</div>
									<label for="Inputname" class="col-sm-1">Mukim </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="EX : Jaha"> 
									</div>
								</div>
								
								<div class="form-group">
									<label for="Inputname" class="col-sm-3">Dairah : </label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="districk" name="districk" placeholder="EX : Jaha" > 
									</div>
									<div class="col-sm-1">
									</div>
									<label for="Inputname" class="col-sm-1">Wilayah</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="province" name="province" placeholder="EX : Jala"> 
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputcodepost" class="col-sm-3">Kod POS :</label> 
									<div class="col-sm-2">
										<input type="text" class="form-control" id="post" name="post" placeholder="EX : 95120"> 
									</div>
									<div class="col-sm-2">
									</div>
									<label for="inputcodepost" class="col-sm-1">Telepon</label> 
									<div class="col-sm-4">
										<input type="text" class="form-control" id="telephone" name="telephone" placeholder="EX : 0938746529"> 
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputcodepost" class="col-sm-3">Email :</label> 
									<div class="col-sm-4">
										<input type="text" class="form-control" id="email" name="email" placeholder="EX : xxxx@xmail.com"> 
									</div>
								</div>
								
							</fieldset>

							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>Bahagian  2 : Sejarah pendidikan</b></font></legend>
						
							<div class="form-group">
									<label for="inputcodepost" class="col-sm-3"><font color="blue">Pendidikan agama :-</font></label> 
							</div>
							
								<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Ibtidai dari sekolah :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="ibtidai_graduate" name="ibtidai_graduate" placeholder="Nama sekoah"> 
										</div>
										<label for="inputcodepost" class="col-sm-1">Tahun</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="ibtidai_graduate_year" name="ibtidai_graduate_year" placeholder="Tahun tamat (EX : 2007)"> 
										</div>
								</div>
								
								<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Mutawasit dari sekolah :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="mutawasit_graduate" name="mutawasit_graduate" placeholder="Nama sekoah"> 
										</div>
										<label for="inputcodepost" class="col-sm-1">Tahun</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="mutawasit_graduate_year" name="mutawasit_graduate_year" placeholder="Tahun tamat (EX : 2007)"> 
										</div>
								</div>
								
								<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Sanawi dari sekolah :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="sanawi_graduate" name="sanawi_graduate" placeholder="Nama sekoah"> 
										</div>
										<label for="inputcodepost" class="col-sm-1">Tahun</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="sanawi_graduate_year" name="sanawi_graduate_year" placeholder="Tahun tamat (EX : 2007)"> 
										</div>
								</div>
								
								<div class="form-group">
										<label for="inputcodepost" class="col-sm-3"><font color="blue">Pendidikan akadimik :-</font></label> 
								</div>
								
								<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Sekolah dasar :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="down_graduate" name="down_graduate" placeholder="Nama sekoah"> 
										</div>
										<label for="inputcodepost" class="col-sm-1">Tahun</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="down_graduate_year" name="down_graduate_year" placeholder="Tahun tamat (EX : 2007)"> 
										</div>
								</div>
								
								<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Sekolah menengah bawah :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="first_highschool_graduate" name="first_highschool_graduate" placeholder="Nama sekoah"> 
										</div>
										<label for="inputcodepost" class="col-sm-1">Tahun</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="first_highschool_graduate_year" name="first_highschool_graduate_year" placeholder="Tahun tamat (EX : 2007)"> 
										</div>
								</div>
								
								<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Sekolah menengah atas :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="second_highschool_graduate" name="second_highschool_graduate" placeholder="Nama sekoah"> 
										</div>
										<label for="inputcodepost" class="col-sm-1">Tahun</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="second_highschool_graduate_year" name="second_highschool_graduate_year" placeholder="Tahun tamat (EX : 2007)"> 
										</div>
								</div><br>

								<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Lain - lain :</label>
										<div class="col-sm-9">
											<textarea class="form-control" id="other" name="other"></textarea>
										</div>
								</div>
							
							</fieldset>
							
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>Bahagian  3 : Pengetahuan bahasa</b></font></legend>

								<div class="form-group">
									<label for="inputcodepost" class="col-sm-3">Bahasa melayu :</label>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Kurang"> Kurang
									</div>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill2" name="melayu_lang_skill" value="Cukup"> Cukup
									</div>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill3" name="melayu_lang_skill" value="Lancar"> Lancar
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputcodepost" class="col-sm-3">Bahasa arab :</label>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill1" name="arab_lang_skill" value="Kurang"> Kurang
									</div>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill2" name="arab_lang_skill" value="Cukup"> Cukup
									</div>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill3" name="arab_lang_skill" value="Lancar"> Lancar
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputcodepost" class="col-sm-3">Bahasa ingris :</label>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Kurang"> Kurang
									</div>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill2" name="ingris_lang_skill" value="Cukup"> Cukup
									</div>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill3" name="ingris_lang_skill" value="Lancar"> Lancar
									</div>
								</div>

								<div class="form-group">
									<label for="inputcodepost" class="col-sm-3">Bahasa thai :</label>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill1" name="thai_lang_skill" value="Kurang"> Kurang
									</div>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill2" name="thai_lang_skill" value="Cukup"> Cukup
									</div>
									<div class="col-sm-2">
										<input type="radio" id="lang_skill3" name="thai_lang_skill" value="Lancar"> Lancar
									</div>
								</div>
								
							</fieldset>
							
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>Bahagian  4 : Persyaratan</b></font></legend>
								
									<div class="form-group">
										<div class="checkbox">
											<label>
											  <input type="checkbox" name="certificate" value="1"> Syahadah/Tasdik asli
											</label>
										  </div>
										  <div class="checkbox">
											<label>
											  <input type="checkbox" name="citizen_book" value="1"> Senarai dapur
											</label>
										  </div>
										  <div class="checkbox">
											<label>
											  <input type="checkbox" name="id_book" value="1"> Kad pengenalan
											</label>
										  </div>
										  <div class="checkbox" >
											<label>
											  <input type="checkbox" name="photo" value="1"> Gambar 1 inci 4 keping
											</label>
										  </div>
									</div>
							</fieldset>
							
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>Bahagian  5 : Lain - lain</b></font></legend>
								
									<div class="form-group">
										<label for="inputcodepost" class="col-sm-2">Pilih gambar :</label>
										<div class="col-sm-3">
											<input type="file" class="form-control"  name="image"> 
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputcodepost" class="col-sm-2">Password :</label>
										<div class="col-sm-3">
											<input type="password" class="form-control"  name="password" required> 
										</div>
									</div>
								
							</fieldset>
							
							<div align="center">
								<a href="student_list"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back</button></a>
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
    </script>

</body>

</html>