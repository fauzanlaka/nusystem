<?php

	include("connect.php");
	
	if(isset($_POST['save'])){

		if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"])){
			echo "<script language='JavaScript'>";
			echo "alert('Upload gambar berjaya')";
			echo "</script>";
		}
		else{
			echo "<script language='javascript>";
			echo "alert(Upload gambar gagal)";	
		}
		  
		$name = $_POST['name'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$sex = $_POST['sex'];
		$status = $_POST['status'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		$sql = "insert into user (u_fname,u_telephone,u_email,u_address,u_postcode,u_sex,u_status,u_image,u_user,u_passwod) values ('$name','$telephone','$email','$address','$postcode','$sex','$status','".$_FILES['image']['name']."','$username','$password')";
		
		if (mysql_query($sql)){
    	echo "<script language='JavaScript'>";
		echo "alert('Tambah user baru berjaya')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0;url=user.php' />";
		} else {
    	echo "Error: " . $sql . "<br>" . mysql_error($connect);
		}
		
		//mysql_query($sql) or die('Insert error');
	}
?>
<!DOCTYPE html>
<html lang="en">
<body>
</body>
</html>