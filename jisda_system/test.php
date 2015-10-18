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
	
	

</head>

<body style="background:#eee;">

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

            <div class="col-md-9">

                <div class="thumbnail">
                    
                    <div class="caption-full">
                        <h4 class="pull-right"><?php
							echo "Hari bulan : " . date("l")  . date(" Y/m/d") . "<br>";
						?></h4>
                        <h4><span class="glyphicon glyphicon-home" ></span>  Maklumat</h4>
                        </h4>
                        <hr>
                        <p>
                        <style>
   .feed {padding: 5px 0}
</style>
<form method="post" action="new_ele2.php" onsubmit="return validate(this)">
<table>
<tr>
	<td valign=top> Feed URL (s):</td>
	<td valign=top>
		<div id="newlink">
			<div class="feed">
			   <input type="text" name="feedurl[]" value="http://feeds.feedburner.com/satya-weblog/scripting" size="50">
			</div>
		</div>
	</td>
</tr>
</table>
	<p>
		<br>
		<input type="submit" name="submit1">
		<input type="reset" name="reset1">
	</p>
<p id="addnew">
	<a href="javascript:add_feed()">Add New </a>
</p>
</form>
<!-- Template. This whole data will be added directly to working form above -->
<div id="newlinktpl" style="display:none">
	<div class="feed">
	 <input type="text" name="feedurl[]" value=""  size="50">
	</div>
</div>
						</p>
                    </div><br><br><br><br><br><br><br><br><br><br>
                 	
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
                	
                    <p align="center"><b>Developed by JISDA , Copy right 2014</b>
					
					</p>
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
<script type="text/javascript">
function validate(frm)
{
	var ele = frm.elements['feedurl[]'];
	if (! ele.length)
	{
		alert(ele.value);
	}
	for(var i=0; i<ele.length; i++)
	{
		alert(ele[i].value);
	}
	return true;
}
function add_feed()
{
	var div1 = document.createElement('div');
	// Get template data
	div1.innerHTML = document.getElementById('newlinktpl').innerHTML;
	// append to our form, so that template data
	//become part of form
	document.getElementById('newlink').appendChild(div1);
}
</script>
	

</body>

</html>
