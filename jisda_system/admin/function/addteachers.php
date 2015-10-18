<?php
		include("../connect.php");
		$tc_code = mysql_real_escape_string($_POST['tc_code']);
		$tc_name = mysql_real_escape_string($_POST['tc_name']);
		$tc_lastname = mysql_real_escape_string($_POST['tc_lastname']);
		$tc_gender  = mysql_real_escape_string($_POST['tc_gender']);
		$tc_cityzenid = mysql_real_escape_string($_POST['tc_cityzenid']);
		$tc_housenumber = mysql_real_escape_string($_POST['tc_housenumber']);
		$tc_village = mysql_real_escape_string($_POST['tc_village']);
		$tc_placenumber = mysql_real_escape_string($_POST['tc_placenumber']);
		$tc_subdistrict = mysql_real_escape_string($_POST['tc_subdistrict']);
		$tc_district = mysql_real_escape_string($_POST['tc_district']);
		$tc_province = mysql_real_escape_string($_POST['tc_province']);
		$tc_postcode = mysql_real_escape_string($_POST['tc_postcode']);
		$tc_telephone = mysql_real_escape_string($_POST['tc_telephone']);
		$tc_email = mysql_real_escape_string($_POST['tc_email']);
		if(isset($_POST['post'])){
		$sql = "insert into teachers (tc_code) values ('$tc_code')";
		if (mysql_query($sql)){
			echo "<script language='JavaScript'>";
			echo "alert('Tambah data guru berjaya')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=teacher_list.php' />";
			}else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
	}
?>