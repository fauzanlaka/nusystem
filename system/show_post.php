<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>JISDA SYSTEM | Jamiah Islam syaik daud</title>
  
    <!-- Custom CSS -->
    <link href="shop-item/css/shop-item.css" rel="stylesheet">
    
    <link href="shop-item/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootflat Core CSS -->
    <link href="bootflat/bootflat/css/bootflat.css" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="bootflat/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Latest compiled and minified CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	    <style>
			.max-lines {
			  text-overflow: ellipsis;
			  word-wrap: break-word;
			  line-height: 1.8em;
			}
		</style>
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

   <?php include("layout/nav.php") ?>
   
	<br><br><br>
    
    
   <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <img src="images/LOGO_JISDA_WEB.png" class="img-rounded">
                 <?php include("layout/left_menu.php");?> 
                </div></p>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    
                    <div class="caption-full">
                        <h4 class="pull-right">
							<?php
								echo "Hari bulan : " . date("l")  . date(" Y/m/d") . "<br>";
							?>
						</h4>
                        <h4><span class="glyphicon glyphicon-home" ></span>  Maklumat</h4>
                        </h4>
						<hr>
                         <?php
							$id = $_GET[id];
							include("connect.php");
							$sql = "select * from post where p_id='$id'";
							$query = mysql_query($sql);
							$result1 = mysql_fetch_array($query);
						?>
                        <h4 align="center"><font color="blue"><?= $result1['p_title']; ?></font></h4>                        
                        <!-- Post list -->
                       
						<?php
							$id = $_GET[id];
							$sql = "select * from post where p_id='$id'";
							$query = mysql_query($sql);
							while($result = mysql_fetch_array($query)){
								$name = $result['file'];
								$post = str_replace("\'", "&#39;", $result['p_post']);
						?>
                 
							<div class="max-lines">
								<?= $post;?></p>
							</div>
							<br>
							<div align="left">
								<b><font color="red">Link untuk download : </font></b><a href="download.php?filename=<?= $name ;?>" ><?= $name ;?></a>
							</div>

                        <br>
                        <b><font color="red">Catatan :</font></b>
						<?= $result['p_other']; ?>                        
                        <? } ?><br><br>
                        <a href="index.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Beranda depan</button></a>
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
    <script src="bootflat/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</body>

</html>
