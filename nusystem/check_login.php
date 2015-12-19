<?php
function login(){
	session_start();

	require_once("connect.php");
	
        if(isset($_POST['save'])){
	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM users WHERE u_username = '".$strUsername."' and u_password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
              echo '<script language="javascript">';
                echo 'alert("message successfully sent")';
                echo '</script>';
         
		}
		else
		{
                        echo "Tunggu sekejab...";
			//*** Update Status Login
			$sql = "UPDATE users SET LoginStatus = '1' , LastUpdate = NOW() WHERE u_id = '".$objResult["u_id"]."' ";
			$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION["UserID"] = $objResult["u_id"];
                        $_SESSION["UserType"] = $objResult["u_utype"];
			session_write_close();

			//*** Go to Main page
			header("location:main.php?page=main");
		}
			
	}
	mysqli_close($con);
    }   

?>