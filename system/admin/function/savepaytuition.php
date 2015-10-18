<?php
			include("../connect.php");
		
			$sr_id = mysql_real_escape_string($_POST['sr_id']);
			$st_id = mysql_real_escape_string($_POST['st_id']);
			$pay_date = mysql_real_escape_string($_POST['pay_date']);
			$money = mysql_real_escape_string($_POST['money']);
			$penalty = mysql_real_escape_string($_POST['penalty']);
			$reciet_code = mysql_real_escape_string($_POST['receipt']);
			$pay_status = "Sudah bayar";
			$mc = mysql_real_escape_string($_POST['mc']);
			
		
			if(isset($_POST['save'])){
					
				
						$sql_ch = "select count(*) from payments where (sr_id = '$sr_id')";
						$result_ch = mysql_query($sql_ch);
						$row_ch = mysql_fetch_array($result_ch);
		
						if( $row_ch[0] > 0){
								echo "<script type='text/javascript'>";
								echo "alert('Sudah di bayar sebelumnya')";
								echo "</script>";
								echo "<meta http-equiv='refresh' content='0;url=../pay_tuition.php?id=$sr_id' />";
						}else{
							if($money < $mc){
								echo "<script type='text/javascript'>";
								echo "alert('Jumlah duit belum cukup')";
								echo "</script>";
								echo "<meta http-equiv='refresh' content='0;url=../pay_tuition.php?id=$sr_id' />";
						}else{
							$sql = mysql_query("insert into payments (sr_id ,st_id,pay_date,money,penalty,reciet_code) values ('$sr_id','$st_id','$pay_date','$money','$penalty','$reciet_code')");
							$sql2 = "update student_register set pay_status = '$pay_status' where sr_id = '$sr_id' ";
							if(mysql_query($sql2)){
								echo "<script type='text/javascript'>";
								echo "alert('Pembayaran berhasil di rakam')";
								echo "</script>";
								echo "<meta http-equiv='refresh' content='0;url=../pay_tuition.php?id=$sr_id' />";
							}else{
								echo "Error: " . $sql. "<br>" . mysql_error($connect);
							}
						}
				}
		}
?>