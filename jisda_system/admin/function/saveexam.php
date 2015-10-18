<?php
include("../connect.php");
		$y_id  = $_POST['y_id'];
		$t_id =  $_POST['t_id'];
		
		$sql_yt = "select count(*) from register_exam where (y_id = '$y_id' and t_id = '$t_id')";
		$qeury_yt = mysql_query($sql_yt);
		$row_yt = mysql_fetch_array($qeury_yt);
		
		if($row_yt[0] > 0){
				echo "<script type='text/javascript'>";
				echo "alert('Tahun atau penngal pembukaan daftar ujian sudah ada !!!')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=../exam.php' />";
		}else{
			if(isset($_POST['save'])){
				$y_id = mysql_real_escape_string($_POST['y_id']);
				$t_id = mysql_real_escape_string($_POST['t_id']);
				$start_date = mysql_real_escape_string($_POST['start_date']);
				$end_date = mysql_real_escape_string($_POST['end_date']);
				$prize = mysql_real_escape_string($_POST['prize']);
				$tu_id = mysql_real_escape_string($_POST['status']);
				
				$sql_i = "insert into register_exam (y_id,t_id,start_date,end_date,prize,tu_id) values ('$y_id','$t_id','$start_date','$end_date','$prize','$tu_id')";
				
				if (mysql_query($sql_i)){
							echo "<script type='text/javascript'>";
							echo "alert('Tambah pembukaan daftar ujian berjaya')";
							echo "</script>";
							echo "<meta http-equiv='refresh' content='0;url=../exam_list.php' />";
				}
			}
		}	
?>