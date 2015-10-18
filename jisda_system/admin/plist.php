<?php
session_start(); 
$id = $_SESSION[ses_userid];                          
	if(!isset($id)){
		echo "Harap login<br />";
	}
	if($_SESSION[ses_status] != "admin" and $_SESSION[ses_status] != "user") {
		echo "Laman ini untuk admin!";
		echo "<a href=login_form.php>Back</a>";
		exit();
	}
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Post semua</title>
    
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
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
		selector: "textarea",
		theme: "modern",
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons",
		image_advtab: true,
		templates: [
			{title: 'Test template 1', content: 'Test 1'},
			{title: 'Test template 2', content: 'Test 2'}
		]
	});
	</script>
</head>

<body style="background:#eee;">

    <!-- Navigation -->
    <?php include("layout/nav.php"); ?>
	<br>
    <br>
    <br>
    
    <div class="container"><!-- Container -->
        <div class="row"><!-- Row -->
        
            <div class="col-md-3"><!-- col-md3  Left menu-->
                <img src="../images/LOGO_JISDA_WEB.png" class="img-rounded"><!-- Logo -->
                <?php include("layout/left_menu.php"); ?><!--Left menu-->    
                </div>
            </div><!-- /.col-md-3  Left menu -->
            
            <div class="col-md-9"><!-- col-md-9 Content body -->
            	<div class="panel panel-success"><!-- Panel success--> 
                    <div class="panel-heading"><!-- Panel heading-->
                    	<h3 class=" panel-title"><span class="glyphicon glyphicon-text-width"></span> Post semua</h3>
                    </div><!-- /.Panel heading-->
                    <div class="panel-body"><!-- Panel body-->
						<div class="pull-left">
							<form class="navbar-form" role="search" action="<?=$_SERVER['PHP_SELF'];?>" method="get">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Cari post" name="p_title" required>
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit" name="save"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
						</div>
						<?php include("layout/post_menu.php"); ?>
                    <br><br><br>		
                    
					<?php
						if(isset($_GET['save'])){
						include("connect.php");
						$p_title = $_GET['p_title'];
						$strSQL = "select * from post where p_title LIKE '%".$p_title."%'";
						$objQuery = mysql_query($strSQL);
						$Num_Rows = mysql_num_rows($objQuery);
							
						//Pageination
						$Per_Page = 20;   // Per Page

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
							$strSQL .=" order  by p_id DESC LIMIT $Page_Start , $Per_Page";
							$objQuery  = mysql_query($strSQL);
						?>
                <table>
               		<table class="table table-hover">
						<tr>
                            <td align="center"><strong>Tanggal</strong></td>
                            <td align="center"><strong>Tajuk</strong></td>
                            <td align="center"><strong>Poster</strong></td>
                            <td align="center"><strong>Publikasi</strong></td>
                            <td align="center"><strong>Edit</strong></td>
                        </tr>
						<?php
							while($objResult = mysql_fetch_array($objQuery))
						{
						?>
                         <tr>        
                             <td align="center"><?= $objResult['p_date']; ?></td>
                             <td><?= $objResult['p_title']; ?></td>
                             <td><?= $objResult['p_author']; ?></td>
                             <td align="center">
								<?php 
									$publish = $objResult['publish']; 
									if($publish == '0'){
										$pvalue = "Tidak publik";
									}if($publish  == '1' ){
										$pvalue = "Umum";
									}if($publish == '2'){
										$pvalue = "Mahasiswa";
									}if($publish == '3'){
										$pvalue = "Guru";
									}
								?>
								<?= $pvalue ?></td>
                             <td align="center"><a href="edtpost.php?p_id=<?= $objResult['p_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                         </tr>
						<?php } ?>
				</table>
<br>

						Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :

						<?php
							if($Prev_Page)
							{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&p_title=$_GET[p_title]&save=$_GET[save]'><< Back</a> ";
							}
							for($i=1; $i<=$Num_Pages; $i++)
							{
								if($i != $Page)
								{
									echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i&p_title=$_GET[p_title]&save=$_GET[save]'>$i</a> ";

								}
								else
								{
								echo "<b> $i </b>";
								}
							}
									if($Page!=$Num_Pages)
									{
										echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&p_title=$_GET[p_title]&save=$_GET[save]'>Next>></a> ";
									}	
					?>
					<?php	
					}else{
					?>
					<!-- Users query --> 
                    <?php 
						include("connect.php");
						$strSQL = "select * from post";
						$objQuery = mysql_query($strSQL);
						$Num_Rows = mysql_num_rows($objQuery);
							
						//Pageination
						$Per_Page = 20;   // Per Page

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
							$strSQL .=" order  by p_id DESC LIMIT $Page_Start , $Per_Page";
							$objQuery  = mysql_query($strSQL);
						?>
                <table>
               		<table class="table table-hover">
						<tr>
                            <td align="center"><strong>Tanggal</strong></td>
                            <td align="center"><strong>Tajuk</strong></td>
                            <td align="center"><strong>Poster</strong></td>
                            <td align="center"><strong>Publikasi</strong></td>
                            <td align="center"><strong>Edit</strong></td>
                        </tr>
						<?php
							while($objResult = mysql_fetch_array($objQuery))
						{
						?>
                         <tr>        
                             <td align="center"><?= $objResult['p_date']; ?></td>
                             <td><?= $objResult['p_title']; ?></td>
                             <td><?= $objResult['p_author']; ?></td>
                             <td align="center">
								<?php 
									$publish = $objResult['publish']; 
									if($publish == '0'){
										$pvalue = "Tidak publik";
									}if($publish  == '1' ){
										$pvalue = "Umum";
									}if($publish == '2'){
										$pvalue = "Mahasiswa";
									}if($publish == '3'){
										$pvalue = "Guru";
									}
								?>
								<?= $pvalue ?></td>
                             <td align="center"><a href="edtpost.php?p_id=<?= $objResult['p_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
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
					<?php } ?>
                    </div><!-- /.Panel body -->

                </div><!-- Panel success -->
                
            </div><!--/.col-md-9 Body content -->

        </div><!--/.Row -->
        
        <hr>

        <footer><!-- Footer -->
            <div class="row">
            
                <div class="col-lg-12">
                    <p align="center"><b>Developed by JISDA , Copy right 2014</b></p>
                </div>
            </div>
        </footer>
    
    </div><!-- /.container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="../bootflat/js/bootstrap.min.js"></script>

</body>

</html>
