<?php
include("../connect.php");
$sj_code = mysql_real_escape_string($_POST['sj_code']);
	$sj_name = mysql_real_escape_string($_POST['sj_name']);
	$sj_unit = mysql_real_escape_string($_POST['sj_unit']);
	$sj_describtion = mysql_real_escape_string($_POST['sj_describtion']);
	$tc_id = mysql_real_escape_string($_POST['tc_id']);
	if(isset($_POST['save'])){
	$sql = "insert into subjeck (sj_code,sj_name,sj_unit,sj_describtion,tc_id) values ('$sj_code','$sj_name','$sj_unit','$sj_describtion','$tc_id')";
	if(mysql_query($sql)){
			echo "<script language='JavaScript'>";
			echo "alert('Tambah data mata kuliah baru berjaya')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=idxsubjeck.php' />";
			}else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
	}
?>