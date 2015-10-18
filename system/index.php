<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>JISDA SYSTEM</title>
  
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

</head>

<body style="background:#eee;">

    <!-- Navigation -->
   <?php include("layout/nav.php") ?>
	<br><br><br>
    
    
   <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p align="left"><img src="images/LOGO_JISDA_WEB.png" class="img-rounded"></p>
                 <?php include("layout/left_menu.php");?> 
                </div></p>
            </div>
			<br><br><br><br><br>
            <div class="col-md-9"><!-- col-md-9 -->
				<div class="col-md-3">
                </div>
                <div class="col-md-5">
                	<div class="panel panel-default">
  						<div class="panel-body">
    						<div class="page-header">
  								<h3>LogIn</h3>
							</div>
                            <form role="form" method="POST" action="login.php">
  								<div class="form-group">
    								<label for="exampleInputEmail1">E-mail atau username</label>
    								<div class="input-group">
  										<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
  											<input type="text" class="form-control" placeholder="Username" name="username" required>
									</div>
  								</div>
 							 	<div class="form-group">
    								<label for="exampleInputPassword1">Password</label>
    								<div class="input-group">
  										<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
  											<input type="password" class="form-control" placeholder="Password" name="password" required >
									</div>
  								</div>
  								<a href="index.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back</button></a>
                                <button type="submit" name="Submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> LogIn</button>
								</form>
 				 		</div>
					</div>
                </div>
                <div class="col-md-1">
                </div>
            </div><!-- /.col-md-9 -->

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
