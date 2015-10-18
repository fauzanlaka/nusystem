<?php 
	function saveregister(){
		include("connect.php");
		if(isset($_POST['save'])){
				//$rs_date = date('Y-m-d H:i:s');
				$st_id = $_POST['st_id'];
				$re_id = $_POST['re_id'];
				$rs_type = $_POST['rs_type'];
				//$pay_status = "Belum bayar";
			
				$sql = "INSERT INTO student_register (st_id,rs_date,re_id,rs_type,pay_status) values ('$st_id','$rs_date','$re_id','$rs_type','$pay_status')";
			
				if(mysql_query($sql)){
								echo "<script type='text/javascript'>";
								echo "alert('Pendaftaran anda sudah sempurna , Harap hubungi idarah untuk bayar yuran , Terima kasih')";
								echo "</script>";
								echo "<meta http-equiv='refresh' content='0;url=index.php' />";
				}else{
					echo "Error: " . $sql . "<br>" . mysql_error($connect);
				}
		}
	}
	
function saveexamregister(){
	include("../connect.php");
		$st_id = $_POST['st_id'];
		$rx_id = $_POST['rx_id'];
		$year_c = $_POST['year'];
		$term_c = $_POST['term'];
		
		$sql_c = "select * from student_register where (academic_year = '$year_c' and term = '$term_c' ) and  st_id = '$st_id' ";
		$result_c = mysql_query($sql_c);
		$row_c = mysql_fetch_array($result_c);
		$row_cu = mysql_num_rows($result_c);
	if(isset($_POST['save'])){
		if($row_c['pay_status'] == "Belum bayar"){
			echo "<script type='text/javascript'>";
			echo "alert('Anda belum bayar yuran , Sila hubungi idarah')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=exam_register.php' />";
		}elseif($row_cu <= 0){
			echo "<script type='text/javascript'>";
			echo "alert('Anda belum daftar untuk belajar pada penngal ini')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=exam_register.php' />";
		}else{
		
		$sql_d = "select count(*) from student_register_exam where (st_id = '$st_id' and rx_id = '$rx_id')";
		$result_d = mysql_query($sql_d);
		$row_d = mysql_fetch_array($result_d);
		
			if( $row_d[0] > 0){
					echo "<script type='text/javascript'>";
					echo "alert('Anda sudah daftar , Sila periksa di menu ujian ')";
					echo "</script>";
					echo "<meta http-equiv='refresh' content='0;url=exam_register.php' />";
			}else{

				$st_id = $_POST['st_id'];
				$rx_date = date('Y-m-d H:i:s');
				$rx_id = $_POST['rx_id'];
				$pay_status = "Belum bayar";
				$year =  $_POST['year'];
				$term =  $_POST['term'];
				$student_id =mysql_real_escape_string($_POST['student_id']);
				
				$sql = "INSERT INTO student_register_exam (st_id,rx_date,rx_id,pay_status,year,term,stu_id) values ('$st_id','$rx_date','$rx_id','$pay_status','$year','$term','$student_id')";
			
			if (mysql_query($sql)){
							echo "<script type='text/javascript'>";
							echo "alert('Pendaftaran anda sudah sempurna , Terima kasih')";
							echo "</script>";
							echo "<meta http-equiv='refresh' content='0;url=exam_list.php' />";
			}
		}
	}
}
}

function editpssw(){
	include("../connect.php");
	
	if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$password = $_POST['password'];
	$sql = " update students set password = '$password' where st_id = '$id'  ";
	
	if (mysql_query($sql)){
		echo "<script language='JavaScript'>";
		echo "alert('Perubahan berjaya')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0;url=edit_password.php' />";
		} 
		else{
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
		}
	}
}


?>