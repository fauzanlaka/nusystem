<?php include("../connect.php");
		$st_id = $_POST['st_id'];
		$re_id = $_POST['re_id'];
		
		$sql_d = "select count(*) from student_register where (st_id = '$st_id' and re_id = '$re_id')";
		$result_d = mysql_query($sql_d);
		$row_d = mysql_fetch_array($result_d);
		
		if( $row_d[0] > 0){
				echo "<script type='text/javascript'>";
				echo "alert('Anda sudah daftar , Sila periksa di menu Pelajar terdaftar ')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=../register.php' />";
		}else{
			
			if(isset($_POST['save'])){
				$st_id = $_POST['st_id'];
				$rs_date = date('Y-m-d H:i:s');
				$re_id = $_POST['re_id'];
				$rs_type = $_POST['rs_type'];
				$subject = $_POST['subject'];
				$pay_status = "Belum bayar";
				$academic_year =  $_POST['academic_year'];
				$term =  $_POST['term'];
				$student_id = $_POST['student_id'];
				$rs_type_text = $_POST['rs_type_text'];
			
				$sql = "INSERT INTO student_register (st_id,rs_date,re_id,rs_type,subject,pay_status,academic_year,term,stu_id) values ('$st_id','$rs_date','$re_id','$rs_type','$subject','$pay_status','$academic_year','$term','$student_id')";
			
			if (mysql_query($sql)){
							echo "<script type='text/javascript'>";
							echo "alert('Pendaftaran anda sudah sempurna , Harap hubungi idarah untuk bayar yuran , Terima kasih')";
							echo "</script>";
							echo "<meta http-equiv='refresh' content='0;url=../registered_list.php' />";
			}
		}
	}
?>