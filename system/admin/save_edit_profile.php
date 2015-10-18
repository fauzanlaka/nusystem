<?php
	// connect to data base
	include("connect.php");
	
	// Check for has new image check
	if(isset($_POST['save'])){
		if(!empty($_FILES['image']['tmp_name'])){
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
		$u_id = $_POST['u_id'];
		
		$sql = "UPDATE user SET  u_fname='$name',u_telephone='$telephone',u_email='$email',u_address='$address',u_postcode='$postcode',u_sex='$sex',u_status='$status',u_image='".$_FILES["image"]["name"]."',u_user='$username',u_passwod='$password' where u_id=$u_id";
		
		if (mysql_query($sql)){
    	echo "<script language='JavaScript'>";
		echo "alert('Perubahan berjaya')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0;url=edit_profile.php' />";
		} else {
    	echo "Error: " . $sql . "<br>" . mysql_error($connect);
		}
		}
		
		else{	
		$name = $_POST['name'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$sex = $_POST['sex'];
		$status = $_POST['status'];
		$image = $_POST['image'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$u_id = $_POST['u_id'];
		
		$sql = "UPDATE user SET  u_fname='$name',u_telephone='$telephone',u_email='$email',u_address='$address',u_postcode='$postcode',u_sex='$sex',u_status='$status',u_image='$image',u_user='$username',u_passwod='$password' where u_id=$u_id";
		
		if (mysql_query($sql)){
    	echo "<script language='JavaScript'>";
		echo "alert('Perubahan berjaya')";
		echo "</script>";
		echo "<meta http-equiv='refresh' content='0;url=edit_profile.php' />";
		} else {
    	echo "Error: " . $sql . "<br>" . mysql_error($connect);
		}	
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
<body>
</body>
</html>