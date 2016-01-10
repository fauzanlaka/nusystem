<?php
	session_start();

	require_once("connect.php");
	
        if(isset($_POST['save'])){
	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);
        

	$strSQL = "SELECT * FROM pretest WHERE pre_username = '".$strUsername."' and pre_password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
?>
        <meta http-equiv="refresh" content="0; url=?page=login">
<?php
                exit();
	}
	else
	{
			//*** Session
			$_SESSION["UserID"] = $objResult["pre_id"];
                        $_SESSION["password"] = $objResult["pre_password"];
			session_write_close();
?>
     <meta http-equiv="refresh" content="0; url=?page=edit">           
<?php
			//*** Go to Main page
			//header("location:main.php?page=edit");
			
	}
	mysqli_close($con);
    }   
?>