<?php
	include("../connect.php");
	$sql = " DELETE FROM teachers WHERE tc_id='".$_GET['t_id']."' ";

	if($_GET['t_id']!= ""){
	if (!mysql_query($sql))
		{
			die('Error: ' . mysql_error());
		}
	else{
		echo"<script language='JavaScript'>";
		echo"alert('Hapus berjaya');";
		echo"</script>";		
		echo "<meta http-equiv='refresh' content='0;url=../index_teacher.php' />";
	}
	}		
?>