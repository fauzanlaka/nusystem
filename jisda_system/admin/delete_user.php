<?php
session_start(); 
$ses_userid = $_SESSION[ses_userid];
$ses_password = $_SESSION[ses_password];                                         
$ses_username = $_SESSION[ses_username];                          
	if($ses_userid <> $_SESSION[ses_userid] or $ses_username ==""){
		echo "Harap login<br />";
	}
	if($_SESSION[ses_status] != "admin" and $_SESSION[ses_status] != "user") {
		echo "Laman ini untuk admin!";
		echo "<a href=login_form.php>Back</a>";
		exit();
	}
?>
<?php
	include("connect.php");
	$sql = "DELETE FROM user WHERE u_id='".$_GET['u_id']."'";

	if($_GET['u_id']!= ""){
	if (!mysql_query($sql))
		{
			die('Error: ' . mysql_error());
		}
	else{
		echo"<script language='JavaScript'>";
		echo"alert('Sudah padam');";
		echo"</script>";		
		echo "<meta http-equiv='refresh' content='0;url=user.php' />";
	}
	}		
?>

