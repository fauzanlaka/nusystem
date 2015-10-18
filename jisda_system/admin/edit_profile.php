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
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN | Ubah profil</title>
    
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
                    	<h3 class=" panel-title"><span class="glyphicon glyphicon-cog"></span> Ubah Profile</h3>
                    </div><!-- /.Panel heading-->    
                    <div class="panel-body"><!-- Panel body-->
                    
                        <table>
                        	<tr>
                            	<td width="100%">
                                
                        		<!-- Query -->		
                        		<?php
								include("connect.php");
								$sql = mysql_query("select * from user where u_id='$id'");
								$result = mysql_fetch_array($sql);
								?>
                       
                        		<form class="form-horizontal" role="form" action="save_edit_profile.php" method="post" enctype="multipart/form-data" ><!-- Form -->
                        		<div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Nama :</label>
                                	<div class="col-sm-5">
                                	<input type="text" class="form-control" id="name" name="name" value="<?= $result['u_fname'];?>" >
                                	</div>
                            	</div>
                            	<div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Telephone :</label>
                                	<div class="col-sm-5">
                                	<input type="text" class="form-control" id="name" name="telephone" value="<?= $result['u_telephone'];?>" required placeholder="0x-xxxxxxxx" >
                                	</div>
                            	</div>
                            	<div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Email :</label>
                                	<div class="col-sm-5">
                                		<input type="text" class="form-control" id="name" name="email" value="<?= $result['u_email'];?>">
                                	</div>
                            	</div>
                                <div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Alamat :</label>
                                	<div class="col-sm-5">
                                		<textarea class="form-control" id="address" name="address"><?= $result['u_address'];?></textarea> 
                                	</div>
                            	</div>
                                <div class="form-group">
                                	<label for="InputPostcode" class="col-sm-3">Post code :</label>
                               		<div class="col-sm-2">		
                                    	<input type="text" class="form-control" id="postcode" value="<?= $result['u_postcode'] ?>" name="postcode" required >
                                    </div>     
                                    
                                </div>
                                <div class="form-group">
                                	<label for="InputPostcode" class="col-sm-3">kelamin  :</label>
                               		<div class="col-sm-3">
                                    <?php
										$chk = array();
										$chk['Lelaki'] = 'checked="checked"';
										$chk['perempuan'] = '';
										if(isset($result['u_sex'])){
											if($result['u_sex']=='Perempuan'){
												$chk['Lelaki'] = '';
												$chk['Perempuan'] = 'checked="checked"';
												}
											}
									 ?>		
                                    	<input type="radio" id="sex1" name="sex" value="Lelaki" <?= $chk['Lelaki']; ?> > Lelaki <br>
                                        <input type="radio" id="sex2" name="sex" value="Perempuan" <?= $chk['Perempuan']; ?> > Perempuan
                                    </div>     
                                    
                                </div>
                                <div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Status :</label>
                                	<div class="col-sm-4">
                                    <?php
										$chk = array();
										$chk['admin'] = 'selected="selected"';
										$chk['user'] = '';
										if(isset($result['u_status'])){
											if($result['u_status']=='user'){
												$chk['admin'] = '';
												$chk['user'] = 'selected="selected"';
												}
											}
									 ?>
                                		<select name="status" class="form-control">
                                        	<option value="admin" <?= $chk['admin'];?> >Administrator</option>
                                            <option value="user" <?= $chk['user'];?> >Pegawai idarah</option> 
                                        </select> 
                                	</div>
                            	</div>
                                <div class="form-group">
                                	<label for="IputImage" class="col-sm-3">Gambar :</label>
                                    <div class="col-sm-4">
                                    	<input type="file" name="image" class="form-control">
										<input type="hidden" name="image" value="<?= $result['u_image']; ?>" > 
                                    </div>
                                </div>
                            	<div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Username baru :</label>
                                	<div class="col-sm-5">
                                		<input type="text" class="form-control" id="name" name="username" value="<?= $result['u_user'];?>">
                                	</div>
                            	</div>
                            	<div class="form-group">
                            		<label for="Inputname" class="col-sm-3">Password baru :</label>
                                	<div class="col-sm-5">
                                		<input type="password" class="form-control" id="password" name="password" value="<?= $result['u_passwod'];?>">
                                	</div>
                            	</div>
                                <input type="hidden" name="u_id" value="<?= $result['u_id']; ?>" >
                            <a href="index_admin.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left" ></span> Back to Home</button></a>
                            <button type="submit" class="btn btn-success" name="save" ><span class="glyphicon glyphicon-floppy-saved"></span> Mengesahkan</button>
                            
                        	</form><!-- /.Form -->
                        </p>
                        		</td>
                             
                                <td valign="top">
                        			<p align="right"><?php echo '<img src="images/'.$result[u_image].'" width="140px" height="200px" >' ?></p>	
                         		</td>
                                
                         	</tr>
                         </table>
                         
                              
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
