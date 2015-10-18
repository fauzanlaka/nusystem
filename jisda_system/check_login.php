<?php
session_start();

	require_once("connect.php");
	
	$strUsername = mysqli_real_escape_string($con,$_POST['username']);
	$strPassword = mysqli_real_escape_string($con,$_POST['password']);

	$strSQL = "SELECT * FROM user WHERE u_user = '".$strUsername."' and u_passwod = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "Username and Password Incorrect!";
		exit();
	}
	else
	{
		if($objResult["LoginStatus"] == "1")
		{
			echo "'".$strUsername."' Exists login!";
			exit();
		}
		else
		{
			//*** Update Status Login
			$sql = "UPDATE students SET LoginStatus = '1' , LastUpdate = NOW() WHERE st_id = '".$objResult["st_id"]."' ";
			$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION[ses_userid] = $data[u_id];            
			$_SESSION[ses_username] = $username;
			$_SESSION[ses_password] = $password;      
			$_SESSION[ses_status] = "admin";   
			session_write_close();

			//*** Go to Main page
			header("location:admin/index_admin.php");
		}
			
	}
	mysqli_close($con);
?>
