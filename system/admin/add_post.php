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

    <title>ADMIN | Post baru</title>
    
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
                    	<h3 class=" panel-title"><span class="glyphicon glyphicon-text-width"></span> Post baru</h3>
                    </div><!-- /.Panel heading-->    
                    <div class="panel-body"><!-- Panel body-->
                    	<div class="pull-left">
                        <p><font color="#E81C4B">Harap sempurna form di bawah :-</font></p>
                        </div>
						<?php include("layout/post_menu.php"); ?>
                    	<br><br><br>		
                        </p>
                        <?php 
                        $sql = "select * from user where u_id='$id'";
						$query = mysql_query($sql);
						$result = mysql_fetch_array($query);
                        ?>
                        <form class="form-horizontal" role="form" action="save_add_post.php" method="post" enctype="multipart/form-data">
                        	<div class="form-group">
                            	<label for="Input-post-title" class="col-sm-2">Tajuk :</label>
                            	<div class="col-sm-9">
                            	<input type="text" class="form-control" id="p_title" name="p_title" placeholder="Tajuk maklumat" required>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<label for="input_post" class="col-sm-2">Maklumat :</label>
 								<div class="col-sm-9"> 
                                	<textarea id="p_post" name="p_post" class="form-control" rows="8" style="width:100%" required>		</textarea> 
                            	</div>
                            </div>
							<div class="form-group">
								<label class="col-sm-2" for="input_other">Upload file : </label>
                                <div class="col-sm-3">
                                	<input type="file" id="file" name="image" class="form-control">
                                </div>
							</div>
                            <div class="form-group">
                            	<label class="col-sm-2" for="input_other">Catatan : </label>
                                <div class="col-sm-9">
                                	<input type="text" id="p_other" name="p_other" class="form-control" placeholder="Peringatan" required>
                                </div>
                            </div>
							<div class="form-group">
                            	<label class="col-sm-2" for="input_other">Publikasi : </label>
                                <div class="col-sm-3">
                                	<select name="publish" class="form-control">
										<option value="0">Tidak publik</option>
										<option value="1">Umum</option>
										<option value="2">Mahasiswa</option>
										<option value="3">Guru</option>
									</select>
                                </div>
                            </div>
                            <a href="index_admin"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Home</button></a>
                            <button type="submit" name="save" id="post" class="btn btn-success"><span class="glyphicon glyphicon-floppy-open"></span> Post</button> 
                            <button type="reset" class="btn btn-success">Reset</button>
                            <input type="hidden" name="u_id" value="<?= $result[u_id];?>">
                        </form>
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
