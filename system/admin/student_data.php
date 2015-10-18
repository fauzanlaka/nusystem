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
echo "<a href=../login_form>Back</a>";
exit();
}

	include("function/all_function.php");
	editstudentm();
	editstudentt();
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
							<?php
								include("connect.php");
								$id_data = $_GET['id'];
								$sql_data = "select * from students where st_id = '$id_data' ";
								$query_data = mysql_query($sql_data);
								$result_data = mysql_fetch_array($query_data);
							?>
                        <h4><span class="glyphicon glyphicon-user"><b> Data : <?= $result_data['firstname_rumi']; ?> - <?= $result_data['lastname_rumi']; ?></b></span></h4>
                        <hr>
                        <!-- Post list -->
                        <div class="pull-right">
							<?php include("layout/student_menu.php"); ?>
                        </div><br><br><br>
                       
						
						<div role="tabpanel">

							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Melayu</a></li>
								<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thai</a></li>
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">

								<form class="form-horizontal" role="form"  method="post" enctype="multipart/form-data" action="<?= editstudentm(); ?>"><!-- Form -->
									<table>
										<tr>
											<td>
												<div class="form-group">
															<label for="code" class="col-sm-4"> No. Pokok  :</label>
															<div class="col-sm-4">
																<input type="text" class="form-control" id="student_id" name="student_id"  value="<?= $result_data['student_id'] ?>" >
															</div><span id="stcodestatus"></span> 
												</div>
												<div class="form-group">
															<label for="code" class="col-sm-4"> Tahun daftar  masuk :</label>
															<div class="col-sm-4">
																<input type="text" class="form-control" id="income_year" name="income_year"  value="<?= $result_data['income_year'] ?>"  >
															</div>
												</div>
												
												<div class="form-group">
															<label for="code" class="col-sm-4">Fakulti :</label>
															<div class="col-sm-4">
																<!-- Faculties query  -->
																<?php 
																include("connect.php");
																	$sql_ft= "select * from fakultys";
																	$query_ft = mysql_query("$sql_ft");
																	if(!$query_ft) {
																		echo "fakultys data not found ".mysql_error();
																	}
																	
																	$id = $_GET['id'];
																	$sql_s = mysql_query("select * from students where st_id=".$id );
																	$result_s = mysql_fetch_array($sql_s);
																	if(mysql_num_rows($sql_s) > 0){
																		$data = $result_s['ft_id'];
																	}
																?>
																<select name="ft_id" class="form-control">
																<?php 
																	while($row = mysql_fetch_array($query_ft)){
																	$ft_name = str_replace("\'", "&#39;", $row['ft_name']);
																?>
																	<option value="<?= $row['ft_id']  ?>" <?php if($data==$row['ft_id']){echo 'selected="selected" ';} ?> ><?= $ft_name ?></option>
																<?php } ?>
																</select>
															</div> 
												</div>
												
												<div class="form-group">
															<label for="code" class="col-sm-4">Jurusan :</label>
															<div class="col-sm-4">
																<!-- Faculties query  -->
																<?php 
																include("connect.php");
																	$sql_dp= "select * from departments";
																	$query_dp = mysql_query("$sql_dp");
																	if(!$query_dp) {
																		echo "department data not found ".mysql_error();
																	}
																	
																	$id = $_GET['id'];
																	$sql_s = mysql_query("select * from students where st_id=".$id );
																	$result_s = mysql_fetch_array($sql_s);
																	if(mysql_num_rows($sql_s) > 0){
																		$data = $result_s['dp_id'];
																	}
																?>
																<select name="dp_id" class="form-control">
																	<option value='0'>------Pilih------</option>
																	<?php 
																		while($row = mysql_fetch_array($query_dp)){
																		$dp_name = str_replace("\'", "&#39;", $row['dp_name']);
																	?>
																	<option value="<?= $row['dp_id']  ?>" <?php if($data==$row['dp_id']){echo 'selected="selected" ';} ?> ><?= $dp_name ?></option>
																<?php } ?>
																</select>
															</div> 
												</div>
												
												<div class="form-group">
													<label for="code" class="col-sm-4"> Kelas:</label>
															<div class="col-sm-2">
																<input type="text" class="form-control" id="class" name="class" value="<?= $result_data['class']; ?>">
															</div>
												</div>
										</td>
										<td width="18%">
											<img src="images/<?= $result_data[image]; ?>" alt="Responsive image" class="img-rounded"  height="190px">
											
										</td>
									</tr>
								</table>
								
								<fieldset class="scheduler-border">
									<legend class="scheduler-border"><font color="green"><b>Bahagian  1 : Biodata</b></font></legend>

									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Nama (Rumi)  :</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="firstname_rumi" name="firstname_rumi" value="<?= $result_data['firstname_rumi']; ?>" > 
										</div> 
										<label for="Inputname" class="col-sm-1">Baka </label>
										<div class="col-sm-4">	
											<input type="text" class="form-control" id="lastname_rumi" name="lastname_rumi" value="<?= $result_data['lastname_rumi']; ?>" >
										</div>
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Nama (Jawi) : </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="firstname_jawi" name="firstname_jawi" value="<?= $result_data['firstname_jawi']; ?>" > 
										</div> 
										<label for="Inputname" class="col-sm-1">Baka </label>
										<div class="col-sm-4">	
											<input type="text" class="form-control" id="lastname_jawi" name="lastname_jawi" value="<?= $result_data['lastname_jawi']; ?>" >
										</div>
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Nama (Engris) : </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="firstname_eng" name="firstname_eng" value="<?= $result_data['firstname_eng']; ?>" > 
										</div> 
										<label for="Inputname" class="col-sm-1">Baka </label>
										<div class="col-sm-4">	
											<input type="text" class="form-control" id="lastname_eng" name="lastname_eng" value="<?= $result_data['lastname_eng']; ?>"  >
										</div>
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">No. Kad pengenalan : </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="cityzen_id" name="cityzen_id" value="<?= $result_data['cityzen_id']; ?>" > 
										</div> 
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Tanggal lahir : </label>
										<div class="col-sm-4">
											<input type="date" class="form-control" id="dp" name="birdth_date" value="<?= $result_data['birdth_date']; ?>" > 
										</div> 
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Tempat lahir : </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="born_place" name="born_place" value="<?= $result_data['born_place']; ?>" > 
										</div> 
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Penyakit pembawaaan : </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="disease" name="disease"  value="<?= $result_data['disease']; ?>"> 
										</div> 
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Nama bapa : </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="father_name" name="father_name" value="<?= $result_data['father_name']; ?>"> 
										</div> 
										<label for="Inputname" class="col-sm-1">Pekerjaan</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="father_job" name="father_job" value="<?= $result_data['father_job']; ?>"> 
										</div> 
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Nama ibu : </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="mother_name" name="mother_name" value="<?= $result_data['mother_name']; ?>"> 
										</div> 
										<label for="Inputname" class="col-sm-1">Pekerjaan </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="mother_job" name="mother_job" value="<?= $result_data['mother_job']; ?>"> 
										</div> 
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3"><font color="blue">Alamat tempat tinggal :- </font></label>
									</div>
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">No. Rumah : </label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="house_number" name="house_number" value="<?= $result_data['house_number']; ?>"> 
										</div>
										<div class="col-sm-2">
										</div>
										<label for="Inputname" class="col-sm-1">Kampong </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="village_name" name="village_name" value="<?= $result_data['village_name']; ?>"> 
										</div>
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Tempat : </label>
										<div class="col-sm-2">
											<input type="text" class="form-control" id="place" name="place" value="<?= $result_data['place']; ?>"> 
										</div>
										<div class="col-sm-2">
										</div>
										<label for="Inputname" class="col-sm-1">Mukim </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="subdistrict" name="subdistrict" value="<?= $result_data['subdistrict']; ?>"> 
										</div>
									</div>
									
									<div class="form-group">
										<label for="Inputname" class="col-sm-3">Dairah : </label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="districk" name="districk" value="<?= $result_data['districk']; ?>" > 
										</div>
										<div class="col-sm-1">
										</div>
										<label for="Inputname" class="col-sm-1">Wilayah</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="province" name="province" value="<?= $result_data['province']; ?>" > 
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Kod POS :</label> 
										<div class="col-sm-2">
											<input type="text" class="form-control" id="post" name="post" value="<?= $result_data['post']; ?>"> 
										</div>
										<div class="col-sm-2">
										</div>
										<label for="inputcodepost" class="col-sm-1">Telepon</label> 
										<div class="col-sm-4">
											<input type="text" class="form-control" id="telephone" name="telephone" value="<?= $result_data['telephone']; ?>"> 
										</div>
									</div>
									
									<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Email :</label> 
										<div class="col-sm-4">
											<input type="text" class="form-control" id="email" name="email" value="<?= $result_data['email']; ?>"> 
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
												<input type="text" class="form-control" id="ibtidai_graduate" name="ibtidai_graduate" value="<?= $result_data['ibtidai_graduate']; ?>"> 
											</div>
											<label for="inputcodepost" class="col-sm-1">Tahun</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="ibtidai_graduate_year" name="ibtidai_graduate_year" value="<?= $result_data['ibtidai_graduate_year']; ?>"> 
											</div>
									</div>
									
									<div class="form-group">
											<label for="inputcodepost" class="col-sm-3">Mutawasit dari sekolah :</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="mutawasit_graduate" name="mutawasit_graduate" value="<?= $result_data['mutawasit_graduate']; ?>"> 
											</div>
											<label for="inputcodepost" class="col-sm-1">Tahun</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="mutawasit_graduate_year" name="mutawasit_graduate_year" value="<?= $result_data['mutawasit_graduate_year']; ?>"> 
											</div>
									</div>
									
									<div class="form-group">
											<label for="inputcodepost" class="col-sm-3">Sanawi dari sekolah :</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="sanawi_graduate" name="sanawi_graduate" value="<?= $result_data['sanawi_graduate']; ?>"> 
											</div>
											<label for="inputcodepost" class="col-sm-1">Tahun</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="sanawi_graduate_year" name="sanawi_graduate_year" value="<?= $result_data['sanawi_graduate_year']; ?>"> 
											</div>
									</div>
									
									<div class="form-group">
											<label for="inputcodepost" class="col-sm-3"><font color="blue">Pendidikan akadimik :-</font></label> 
									</div>
									
									<div class="form-group">
											<label for="inputcodepost" class="col-sm-3">Sekolah dasar :</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="down_graduate" name="down_graduate" value="<?= $result_data['down_graduate']; ?>"> 
											</div>
											<label for="inputcodepost" class="col-sm-1">Tahun</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="down_graduate_year" name="down_graduate_year" value="<?= $result_data['down_graduate_year']; ?>"> 
											</div>
									</div>
									
									<div class="form-group">
											<label for="inputcodepost" class="col-sm-3">Sekolah menengah bawah :</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="first_highschool_graduate" name="first_highschool_graduate" value="<?= $result_data['first_highschool_graduate']; ?>"> 
											</div>
											<label for="inputcodepost" class="col-sm-1">Tahun</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="first_highschool_graduate_year" name="first_highschool_graduate_year" value="<?= $result_data['first_highschool_graduate_year']; ?>"> 
											</div>
									</div>
									
									<div class="form-group">
											<label for="inputcodepost" class="col-sm-3">Sekolah menengah atas :</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="second_highschool_graduate" name="second_highschool_graduate" value="<?= $result_data['second_highschool_graduate']; ?>"> 
											</div>
											<label for="inputcodepost" class="col-sm-1">Tahun</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="second_highschool_graduate_year" name="second_highschool_graduate_year" value="<?= $result_data['second_highschool_graduate_year']; ?>"> 
											</div>
									</div><br>

									<div class="form-group">
											<label for="inputcodepost" class="col-sm-3">Lain - lain :</label>
											<div class="col-sm-9">
												<textarea class="form-control" id="other" name="other"><?= $result_data['other']; ?></textarea>
											</div>
									</div>
								
								</fieldset>
								
								<fieldset class="scheduler-border">
									<legend class="scheduler-border"><font color="green"><b>Bahagian  3 : Pengetahuan bahasa</b></font></legend>
									 <?php
										$chk1 = array();
										$chk1['Kurang'] = 'checked="checked"';
										$chk1['Cukup'] = '';
										$chk1['Lancar'] = '';
										if(isset($result_data['melayu_lang_skill'])){
											if($result_data['melayu_lang_skill']=='Cukup'){
												$chk1['Kurang'] = '';
												$chk1['Cukup'] = 'checked="checked"';
												$chk1['Lancar'] = '';
											}if($result_data['melayu_lang_skill']=='Lancar'){
												$chk1['Kurang'] = '';
												$chk1['Cukup'] = '';
												$chk1['Lancar'] = 'checked="checked"';
											}
										}
									 ?>
									<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Bahasa melayu :</label>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Kurang" <?= $chk1['Kurang']; ?>> Kurang
										</div>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill2" name="melayu_lang_skill" value="Cukup" <?= $chk1['Cukup']; ?>> Cukup
										</div>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill3" name="melayu_lang_skill" value="Lancar" <?= $chk1['Lancar']; ?>> Lancar
										</div>
									</div>
									<?php
										$chk2 = array();
										$chk2['Kurang'] = 'checked="checked"';
										$chk2['Cukup'] = '';
										$chk2['Lancar'] = '';
										if(isset($result_data['arab_lang_skill'])){
											if($result_data['arab_lang_skill']=='Cukup'){
												$chk2['Kurang'] = '';
												$chk2['Cukup'] = 'checked="checked"';
												$chk2['Lancar'] = '';
											}if($result_data['arab_lang_skill']=='Lancar'){
												$chk2['Kurang'] = '';
												$chk2['Cukup'] = '';
												$chk2['Lancar'] = 'checked="checked"';
											}
										}
									 ?>
									<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Bahasa arab :</label>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill1" name="arab_lang_skill" value="Kurang" <?= $chk2['Kurang']; ?>> Kurang
										</div>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill2" name="arab_lang_skill" value="Cukup" <?= $chk2['Cukup']; ?>> Cukup
										</div>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill3" name="arab_lang_skill" value="Lancar" <?= $chk2['Lancar']; ?>> Lancar
										</div>
									</div>
									<?php
										$chk3 = array();
										$chk3['Kurang'] = 'checked="checked"';
										$chk3['Cukup'] = '';
										$chk3['Lancar'] = '';
										if(isset($result_data['ingris_lang_skill'])){
											if($result_data['ingris_lang_skill']=='Cukup'){
												$chk3['Kurang'] = '';
												$chk3['Cukup'] = 'checked="checked"';
												$chk3['Lancar'] = '';
											}if($result_data['ingris_lang_skill']=='Lancar'){
												$chk3['Kurang'] = '';
												$chk3['Cukup'] = '';
												$chk3['Lancar'] = 'checked="checked"';
											}
										}
									 ?>
									<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Bahasa ingris :</label>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Kurang" <?= $chk3['Kurang']; ?>> Kurang
										</div>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill2" name="ingris_lang_skill" value="Cukup" <?= $chk3['Cukup']; ?>> Cukup
										</div>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill3" name="ingris_lang_skill" value="Lancar" <?= $chk3['Lancar']; ?>> Lancar
										</div>
									</div>
										<?php
										$chk3 = array();
										$chk3['Kurang'] = 'checked="checked"';
										$chk3['Cukup'] = '';
										$chk3['Lancar'] = '';
										if(isset($result_data['thai_lang_skill'])){
											if($result_data['thai_lang_skill']=='Cukup'){
												$chk3['Kurang'] = '';
												$chk3['Cukup'] = 'checked="checked"';
												$chk3['Lancar'] = '';
											}if($result_data['thai_lang_skill']=='Lancar'){
												$chk3['Kurang'] = '';
												$chk3['Cukup'] = '';
												$chk3['Lancar'] = 'checked="checked"';
											}
										}
									 ?>
									<div class="form-group">
										<label for="inputcodepost" class="col-sm-3">Bahasa thai :</label>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill1" name="thai_lang_skill" value="Kurang" <?= $chk3['Kurang']; ?>> Kurang
										</div>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill2" name="thai_lang_skill" value="Cukup" <?= $chk3['Cukup']; ?>> Cukup
										</div>
										<div class="col-sm-2">
											<input type="radio" id="lang_skill3" name="thai_lang_skill" value="Lancar" <?= $chk3['Lancar']; ?>> Lancar
										</div>
									</div>
									
								</fieldset>
								
								<fieldset class="scheduler-border">
								<legend class="scheduler-border"><font color="green"><b>Bahagian  4 : Persyaratan</b></font></legend>
								
									<div class="form-group">
										<div class="checkbox">
											<label>
											  <input type="checkbox" name="certificate" value="1" <?php $select = $result_data['certificate']; if($select == '1'){ echo "checked"; } ?> > Syahadah/Tasdik asli
											</label>
										  </div>
										  <div class="checkbox">
											<label>
											  <input type="checkbox" name="citizen_book" value="1" <?php $select = $result_data['citizen_book']; if($select == '1'){ echo "checked"; } ?>> Senarai dapur
											</label>
										  </div>
										  <div class="checkbox">
											<label>
											  <input type="checkbox" name="id_book" value="1" <?php $select = $result_data['id_book']; if($select == '1'){ echo "checked"; } ?> > Kad pengenalan
											</label>
										  </div>
										  <div class="checkbox" name="photo"  >
											<label>
											  <input type="checkbox" value="1" name="photo" <?php $select = $result_data['photo']; if($select == '1'){ echo "checked"; } ?>> Gambar 1 inci 4 keping
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
											<input type="password" class="form-control"  name="password" placeholder="Password baru" value="<?= $result_data['password']; ?>" > 
										</div>
									</div>
								
							</fieldset>
								
								<div align="center">
									<a href="student_list.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back</button></a>
									<input type="hidden" name="st_id" value="<?= $result_data['st_id']; ?>">
									<button type="submit" name="save" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
									<button type="reset" name="save" class="btn btn-success">Reset</button>
								</div>
							</form>
								</div>
								<div role="tabpanel" class="tab-pane" id="profile">
								
								<form class="form-horizontal" role="form"  method="post" enctype="multipart/form-data"  action="<?= editstudentt(); ?>"><!-- Form -->

									<fieldset class="scheduler-border">
									<legend class="scheduler-border"><font color="green"><b>ส่วนที่ 1 : ข้อมูลทั่วไป</b></font></legend>
									
									<div class="form-group">
											<label for="code" class="col-sm-2" > รหัสประจำตัว  :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control"  value="<?= $result_data ['student_id']; ?>"  disabled>
											</div>
									</div>
									
									<div class="form-group">
											<label for="code" class="col-sm-2"> ชื่อ  :</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="t_studentname" name="t_studentname"  value="<?= $result_data ['t_studentname']; ?>" >
											</div>
											<label for="code" class="col-sm-1">นามสกุล  </label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="t_studentlastname" name="t_studentlastname"  value="<?= $result_data ['t_studentlastname']; ?>"  >
											</div>
									</div>
									
									<div class="form-group">
											<label for="code" class="col-sm-2"> เลขประจำตัวประชาชน  :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="student_id" name="cityzen_id"  value="<?= $result_data ['cityzen_id']; ?>" >
											</div>
									</div>
									
									<div class="form-group">
											<label for="code" class="col-sm-2"> ว/ด /ป เกิด  :</label>
											<div class="col-sm-3">
												<input type="date" class="form-control" value="<?= $result_data ['birdth_date'] ?>"  name="birdth_date"> 
											</div>
									</div>
									
									<div class="form-group">
											<label for="code" class="col-sm-2"> สถานที่เกิด (จังหวัด)  :</label>
											<div class="col-sm-3">
											<!-- province query  -->
											<?php 
											include("connect.php");
												$sql_pr = "select * from province";
												$query_pr = mysql_query("$sql_pr");
												if(!$query_pr) {
													echo "province data not found ".mysql_error();
												}
												
												$id = $_GET['id'];
												$sql_stpr = mysql_query("select * from students where st_id=".$id );
												$result_stpr = mysql_fetch_array($sql_stpr);
												if(mysql_num_rows($sql_stpr) > 0){
													$data = $result_stpr['t_province'];
												}
											?>
												<select name="t_province" class="form-control" >
													<option value="0">---------Pilih---------</option>
													<?php 
														while($row = mysql_fetch_array($query_pr)){
														$PROVINCE_NAME = str_replace("\'", "&#39;", $row['PROVINCE_NAME']);
													?>
													<option value="<?= $row['PROVINCE_ID']  ?>" <?php if($data==$row['PROVINCE_ID']){echo 'selected="selected" ';} ?> ><?= $PROVINCE_NAME ?></option>
												<?php } ?>
												</select>
											</div>
									</div>
									
									<div class="form-group">
											<label for="code" class="col-sm-2">บิดา ชื่อ  :</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="t_fathername" name="t_fathername"  value="<?= $result_data['t_fathername'] ?>"  >
											</div>
											<label for="code" class="col-sm-1">นามสกุล  </label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="t_fatherlastname" name="t_fatherlastname"  value="<?= $result_data['t_fatherlastname'] ?>"  >
											</div>
									</div>
									
									<div class="form-group">
											<label for="code" class="col-sm-2">มารดา ชื่อ  :</label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="t_mothername" name="t_mothername"  value="<?= $result_data['t_mothername'] ?>"  >
											</div>
											<label for="code" class="col-sm-1">นามสกุล  </label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="t_motherlastname" name="t_motherlastname"  value="<?= $result_data['t_motherlastname'] ?>"  >
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
												<input type="text" class="form-control" id="t_village_name" name="t_village_name" value="<?= $result_data['t_village_name'] ?>" >
											</div>
											<label for="code" class="col-sm-2">บ้านเลขที่  :</label>
											<div class="col-sm-2">
												<input type="text" class="form-control" value="<?= $result_data ['house_number']; ?>"  name="house_number">
											</div>
									</div>
									
									<div class="form-group">
										<label for="code" class="col-sm-2">หมู่ที่  :</label>
											<div class="col-sm-2">
												<input type="text" class="form-control" value="<?= $result_data ['place']; ?>"  name="place">
											</div>
											<div class="col-sm-2">
											</div>
										<label for="code" class="col-sm-2">ซอย  :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="student_id" name="t_road" value="<?= $result_data ['t_road']; ?>"  >
											</div>
									</div>
									
									<div class="form-group">
										<label for="code" class="col-sm-2">ตำบล  :</label>
											<div class="col-sm-3">
												<select name="t_subdistrict"  class="form-control" >
													<!-- subdistrict query  -->
													<?php 
													include("connect.php");
														$sql_ds = "select * from district";
														$query_ds = mysql_query("$sql_ds");
														if(!$query_ds) {
															echo "district data not found ".mysql_error();
														}
														
														$id = $_GET['id'];
														$sql_dspr = mysql_query("select * from students where st_id=".$id );
														$result_dspr = mysql_fetch_array($sql_dspr);
														if(mysql_num_rows($sql_dspr) > 0){
															$data = $result_dspr['t_subdistrict'];
													}
													?>
													<option value="0">---------Pilih---------</option>
													<?php 
														while($row = mysql_fetch_array($query_ds)){
														$DISTRICT_NAME = str_replace("\'", "&#39;", $row['DISTRICT_NAME']);
													?>
													<option value="<?= $row['DISTRICT_ID']  ?>" <?php if($data==$row['DISTRICT_ID']){echo 'selected="selected" ';} ?> ><?= $DISTRICT_NAME ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-sm-1">
											</div>
										<label for="code" class="col-sm-2">อำเภอ : </label>
											<div class="col-sm-3">
												<select name="t_district"  class="form-control" >
													<!-- subdistrict query  -->
													<?php 
														include("connect.php");
														$sql_ap = "select * from amphur";
														$query_ap = mysql_query("$sql_ap");
														if(!$query_ap) {
															echo "amphur data not found ".mysql_error();
														}
														
														$id = $_GET['id'];
														$sql_appr = mysql_query("select * from students where st_id=".$id );
														$result_appr = mysql_fetch_array($sql_appr);
														if(mysql_num_rows($sql_appr) > 0){
															$data = $result_appr['t_district'];
													}
													?>
													<option value="0">---------Pilih---------</option>
													<?php 
														while($row = mysql_fetch_array($query_ap)){
														$AMPHUR_NAME = str_replace("\'", "&#39;", $row['AMPHUR_NAME']);
													?>
													<option value="<?= $row['AMPHUR_ID']  ?>" <?php if($data==$row['AMPHUR_ID']){echo 'selected="selected" ';} ?> ><?= $AMPHUR_NAME ?></option>
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
												$query_pr = mysql_query("$sql_pr");
												if(!$query_pr) {
													echo "province data not found ".mysql_error();
												}
												
												$id = $_GET['id'];
												$sql_stpr = mysql_query("select * from students where st_id=".$id );
												$result_stpr = mysql_fetch_array($sql_stpr);
												if(mysql_num_rows($sql_stpr) > 0){
													$data = $result_stpr['t_province_sec'];
												}
											?>
												<select name="t_province_sec" class="form-control" >
													<option value="0">---------Pilih---------</option>
													<?php 
														while($row = mysql_fetch_array($query_pr)){
														$PROVINCE_NAME = str_replace("\'", "&#39;", $row['PROVINCE_NAME']);
													?>
													<option value="<?= $row['PROVINCE_ID']  ?>" <?php if($data==$row['PROVINCE_ID']){echo 'selected="selected" ';} ?> ><?= $PROVINCE_NAME ?></option>
												<?php } ?>
												</select>
											</div>
											<div class="col-sm-1">
											</div>
										<label for="code" class="col-sm-2">รหัสไปรษณีย์ : </label>
											<div class="col-sm-3">
												<input type="text" class="form-control" value="<?= $result_data ['post'] ?>"  name="post">
											</div>
									</div>
									
									<div class="form-group">
										<label for="code" class="col-sm-2">โทรศัพท์  :</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" value="<?= $result_data ['telephone'] ?>"  name="telephone">
											</div>
									</div><br>
									
									<div class="form-group">
										<label for="code" class="col-sm-3">จบชั้น ม. 6 จากโรงเรียน :</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" id="t_higschool" name="t_higschool"  value="<?= $result_data['t_higschool'] ?>" >
											</div>
									</div>
									
									<div class="form-group">
										<label for="code" class="col-sm-3">จบชั้น 10 จากโรงเรียน :</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" id="t_relegion" name="t_relegion"  value="<?= $result_data['t_relegion'] ?>"  >
											</div>
									</div>
									
								</fieldset>

							
							
							<div align="center">
								<a href="student_list.php"><button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-arrow-left"></span> Back</button></a>
								<input type="hidden" name="st_id" value="<?= $result_data['st_id']; ?>">
								<button type="submit" name="save2" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Simpan</button>
								<button type="reset"  class="btn btn-success">Reset</button>
							</div>
						</form>
								</div>
								
							  </div>

						</div>
							
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