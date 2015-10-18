<?php
	session_start();

	require_once("../connect1.php");

	//*** Update Status
	$sql = "UPDATE students SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00' WHERE st_id = '".$_SESSION["UserID"]."' ";
	$query = mysqli_query($con,$sql);

	session_destroy();
	header("location:../login_form.php");
?>