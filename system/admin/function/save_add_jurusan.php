<?php

	 include("../connect.php");
	$dpcode = $_POST['dp_code'];
	
	$sql = "select count(*) from departments where (dp_code='$dpcode')";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	
	
		
	if( $row[0] > 0){
			echo '<script type="text/javascript">';
			echo 'alert("Kode ini sudah di guna")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0;url=../add_jurusan_form.php' />";
	}
	else
	{
	
		if(isset($_POST['save'])){
		
			if(move_uploaded_file($_FILES["image"]["tmp_name"],"../images/".$_FILES["image"]["name"])){
				echo "<script language='JavaScript'>";
				echo "alert('Upload gambar berjaya')";
				echo "</script>";
				
			$name = mysql_real_escape_string($_POST['dp_name']);
			$ft_id = mysql_real_escape_string($_POST['ft_id']);
			$dp_code = mysql_real_escape_string($_POST['dp_code']);
			$describtion = mysql_real_escape_string($_POST['dp_describtion']);
			
			$sql = "insert into departments (dp_name,ft_id,dp_code,dp_describtion,image) values ('$name','$ft_id','$dp_code','$describtion','".$_FILES['image']['name']."')";
			
			if (mysql_query($sql)){
			echo "<script language='JavaScript'>";
			echo "alert('Tambah jurusan baru berjaya')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=../add_jurusan_form.php' />";
			} 
				else {
					echo "Error: " . $sql . "<br>" . mysql_error($connect);
				}
			}
			
			else{
				
			$name = mysql_real_escape_string($_POST['dp_name']);
			$ft_id = mysql_real_escape_string($_POST['ft_id']);
			$dp_code = mysql_real_escape_string($_POST['dp_code']);
			$describtion = mysql_real_escape_string($_POST['dp_describtion']);
			
			$sql = "insert into departments (dp_name,ft_id,dp_code,dp_describtion) values ('$name','$ft_id','$dp_code','$describtion')";
			
			if (mysql_query($sql)){
			echo "<script language='JavaScript'>";
			echo "alert('Tambah jurusan baru berjaya')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=../department_list.php' />";
			} 
				else {
					echo "Error: " . $sql . "<br>" . mysql_error($connect);
				}
			}

		}
	
	}
?>
<!DOCTYPE html>
<html lang="en">
<body>
</body>
</html>